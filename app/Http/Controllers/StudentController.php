<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Department;

class StudentController extends Controller
{
    public function create()
    {
        $departments = Department::all();

        return view(
            'student.addstudent',
            compact('departments')
        );
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'studentname' => 'required|string|max:255',
            'gender' => 'required|in:Male,Female',
            'ege' => 'required|integer|min:1',
            'dob' => 'required|date',
            'subject' => 'required|string|max:255',
            'payment' => 'required|numeric|min:0',
            'description' => 'nullable|string',
            'dept_id' => 'required|exists:departments,id',
        ]);

        Student::create($validatedData);

        return redirect()
            ->route('student.list')
            ->with('success', 'Student created successfully!');
    }

    public function show(Request $request)
    {
        $departments = Department::all();

        $query = Student::with('department');

        // Search Student by Name
        if ($request->filled('search')) {
            $query->where(
                'studentname',
                'like',
                '%' . $request->search . '%'
            );
        }

        // Filter Student by Department
        if ($request->filled('dept_id')) {
            $query->where('dept_id', $request->dept_id);
        }

        $students = $query->get();

        return view(
            'student.liststudent',
            compact('students', 'departments')
        );
    }

    public function edit(int $studentid)
    {
        $student = Student::findOrFail($studentid);

        $departments = Department::all();

        return view(
            'student.editstudent',
            compact('student', 'departments')
        );
    }

    public function update(Request $request, int $studentid)
    {
        $student = Student::findOrFail($studentid);

        $validatedData = $request->validate([
            'studentname' => 'required|string|max:255',
            'gender' => 'required|in:Male,Female',
            'ege' => 'required|integer|min:1',
            'dob' => 'required|date',
            'subject' => 'required|string|max:255',
            'payment' => 'required|numeric|min:0',
            'description' => 'nullable|string',
            'dept_id' => 'required|exists:departments,id',
        ]);

        $student->update($validatedData);

        return redirect()
            ->route('student.list')
            ->with('success', 'Student updated successfully!');
    }

    public function destroy(int $studentid)
    {
        $student = Student::findOrFail($studentid);

        $student->delete();

        return redirect()
            ->route('student.list')
            ->with('success', 'Student deleted successfully!');
    }
}