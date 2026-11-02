<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Department;

class DepartmentController extends Controller
{
    public function create()
    {
        return view('department.adddepartment');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'departmentname' => 'required|string|max:255|unique:departments,departmentname',
            'shortname' => 'nullable|string|max:255|unique:departments,shortname',
            'description' => 'nullable|string',
        ]);

        Department::create($validatedData);

        return redirect()
            ->route('department.list')
            ->with('success', 'Department created successfully!');
    }

    public function show()
    {
        $departments = Department::with('students')->get();

        return view(
            'department.listdepartment',
            compact('departments')
        );
    }

    public function edit(int $id)
    {
        $department = Department::findOrFail($id);

        return view(
            'department.editdepartment',
            compact('department')
        );
    }

    public function update(Request $request, int $id)
    {
        $department = Department::findOrFail($id);

        $validatedData = $request->validate([
            'departmentname' => [
                'required',
                'string',
                'max:255',
                Rule::unique('departments', 'departmentname')
                    ->ignore($department->id),
            ],
            'shortname' => [
                'nullable',
                'string',
                'max:255',
                Rule::unique('departments', 'shortname')
                    ->ignore($department->id),
            ],
            'description' => 'nullable|string',
        ]);

        $department->update($validatedData);

        return redirect()
            ->route('department.list')
            ->with('success', 'Department updated successfully!');
    }

    public function destroy(int $id)
    {
        $department = Department::findOrFail($id);

        if ($department->students()->exists()) {
            return redirect()
                ->route('department.list')
                ->with('error', 'Cannot delete department because it has students!');
        }

        $department->delete();

        return redirect()
            ->route('department.list')
            ->with('success', 'Department deleted successfully!');
    }
}