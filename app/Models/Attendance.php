<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $fillable = [
        'studentid',
        'attendance_date',
        'check_in_time',
        'status',
        'description',
    ];

    public function student()
    {
        return $this->belongsTo(
            Student::class,
            'studentid',
            'studentid'
        );
    }
}