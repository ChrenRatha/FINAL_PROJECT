<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    function show()
    {
        return view('hom');
    }

    function detail($empid, $empname, $position)
    {
        return view('employee.employee_detail', [
            'empid' => $empid,
            'empname' => $empname,
            'position' => $position
        ]);
    }
}