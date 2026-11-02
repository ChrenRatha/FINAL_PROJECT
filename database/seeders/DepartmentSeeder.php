<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Department;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Department::updateOrCreate(
            ['departmentname' => 'Information Technology'],
            [
                'shortname' => 'IT',
                'description' => 'Information Technology Department',
            ]
        );

        Department::updateOrCreate(
            ['departmentname' => 'Business Administration'],
            [
                'shortname' => 'BA',
                'description' => 'Business Administration Department',
            ]
        );

        Department::updateOrCreate(
            ['departmentname' => 'English'],
            [
                'shortname' => 'ENG',
                'description' => 'English Department',
            ]
        );

        Department::updateOrCreate(
            ['departmentname' => 'Management Information Systems'],
            [
                'shortname' => 'MIS',
                'description' => 'Management Information Systems Department',
            ]
        );
    }
}