<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Attendance;

class StudentDashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $student = $user->student;

        if (!$student) {
            abort(404, 'Student information not found.');
        }

        $attendances = Attendance::where(
            'studentid',
            $student->studentid
        )
        ->orderByDesc('attendance_date')
        ->get();

        $totalAttendance = $attendances->count();

        $presentCount = $attendances->where('status', 'Present')->count();

        $lateCount = $attendances->where('status', 'Late')->count();

        $absentCount = $attendances->where('status', 'Absent')->count();

        $permissionCount = $attendances->where('status', 'Permission')->count();

        return view('student.dashboard', compact(
            'student',
            'attendances',
            'totalAttendance',
            'presentCount',
            'lateCount',
            'absentCount',
            'permissionCount'
        ));
    }
}
