<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Student;
use App\Models\Department;

class ProductController extends Controller
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

    public function show()
    {
        $students = Student::with('department')->get();

        return view(
            'student.liststudent',
            compact('students')
        );
    }
}