<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Student;
use App\Models\Attendance;
use Endroid\QrCode\Builder\Builder;
use Endroid\QrCode\Writer\SvgWriter;

class AttendanceController extends Controller
{
    // Display Attendance Dashboard
    public function index()
    {
        $students = Student::with('department')->get();

        $attendances = Attendance::with('student')
            ->whereDate('attendance_date', today())
            ->get();

        $totalStudents = $students->count();

        $presentCount = $attendances->where('status', 'Present')->count();

        $absentCount = $attendances->where('status', 'Absent')->count();

        $lateCount = $attendances->where('status', 'Late')->count();

        $permissionCount = $attendances->where('status', 'Permission')->count();

        return view(
            'attendance.index',
            compact(
                'students',
                'attendances',
                'totalStudents',
                'presentCount',
                'absentCount',
                'lateCount',
                'permissionCount'
            )
        );
    }

    // Display One Classroom QR Code
    public function classroomQr()
    {
        $scanUrl = 'http://172.20.10.6:8000' . route('attendance.scan', [], false);

        $result = (new Builder(
            writer: new SvgWriter(),
            writerOptions: [],
            validateResult: false,
            data: $scanUrl,
            size: 300,
            margin: 10,
        ))->build();

        $svg = $result->getString();

        $svg = preg_replace('/<\?xml.*?\?>\s*/s', '', $svg);

        return response($svg)
            ->header('Content-Type', 'image/svg+xml');
    }

    // Display Student Check-in Page
    public function scan()
    {
        $user = Auth::user();

        if ($user->role !== 'student' || !$user->studentid) {
            abort(403, 'Only students can check in.');
        }

        $student = Student::with('department')
            ->findOrFail($user->studentid);

        return view('attendance.scan', compact('student'));
    }

    // Record Student Attendance
    public function checkIn(Request $request)
    {
        $user = Auth::user();

        if ($user->role !== 'student' || !$user->studentid) {
            abort(403, 'Only students can check in.');
        }

        $student = Student::findOrFail($user->studentid);

        $now = now()->timezone('Asia/Phnom_Penh');

        $today = $now->toDateString();

        $checkInTime = $now->format('H:i:s');

        $time = $now->format('H:i');

        if ($time < '07:00') {
            return redirect()
                ->route('attendance.scan')
                ->with('error', 'Attendance check-in starts at 7:00 AM.');
        }

        if ($time <= '07:30') {
            $status = 'Present';
        } elseif ($time <= '08:30') {
            $status = 'Late';
        } else {
            $status = 'Absent';
        }

        $attendance = Attendance::firstOrCreate(
            [
                'studentid' => $student->studentid,
                'attendance_date' => $today,
            ],
            [
                'check_in_time' => $checkInTime,
                'status' => $status,
            ]
        );

        if (!$attendance->wasRecentlyCreated) {
            return redirect()
                ->route('attendance.scan')
                ->with('error', 'Attendance already recorded today!');
        }

        return redirect()
            ->route('attendance.scan')
            ->with('success', 'Attendance recorded successfully! Your status is ' . $status . '.');
    }

    // Manual Attendance
    public function manual(Request $request)
    {
        $request->validate([
            'studentid' => 'required|exists:students,studentid',
            'attendance_date' => 'required|date',
            'status' => 'required|in:Present,Absent,Late,Permission',
            'description' => 'nullable|string',
        ]);

        Attendance::updateOrCreate(
            [
                'studentid' => $request->studentid,
                'attendance_date' => $request->attendance_date,
            ],
            [
                'check_in_time' => in_array(
                    $request->status,
                    ['Present', 'Late']
                ) ? now()->format('H:i:s') : null,
                'status' => $request->status,
                'description' => $request->description,
            ]
        );

        return redirect()
            ->route('attendance.index')
            ->with('success', 'Attendance saved successfully!');
    }
}
