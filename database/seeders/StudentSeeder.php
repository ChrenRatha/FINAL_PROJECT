<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Student;
use App\Models\Department;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $it = Department::where('departmentname', 'Information Technology')->firstOrFail();
        $ba = Department::where('departmentname', 'Business Administration')->firstOrFail();
        $eng = Department::where('departmentname', 'English')->firstOrFail();
        $mis = Department::where('departmentname', 'Management Information Systems')->firstOrFail();

        Student::updateOrCreate(
            ['studentname' => 'Dara Sok'],
            [
                'gender' => 'Male',
                'ege' => 22,
                'dob' => '2004-05-15',
                'subject' => 'Programming',
                'payment' => 350.00,
                'description' => 'IT Student',
                'dept_id' => $it->id,
            ]
        );

        Student::updateOrCreate(
            ['studentname' => 'Sokha Chan'],
            [
                'gender' => 'Female',
                'ege' => 21,
                'dob' => '2005-03-20',
                'subject' => 'Management',
                'payment' => 400.00,
                'description' => 'Business Student',
                'dept_id' => $ba->id,
            ]
        );

        Student::updateOrCreate(
            ['studentname' => 'Vanna Kim'],
            [
                'gender' => 'Male',
                'ege' => 23,
                'dob' => '2003-08-10',
                'subject' => 'English',
                'payment' => 300.00,
                'description' => 'English Student',
                'dept_id' => $eng->id,
            ]
        );

        Student::updateOrCreate(
            ['studentname' => 'Lina Heng'],
            [
                'gender' => 'Female',
                'ege' => 22,
                'dob' => '2004-01-25',
                'subject' => 'MIS',
                'payment' => 390.00,
                'description' => 'MIS Student',
                'dept_id' => $mis->id,
            ]
        );
    }
}