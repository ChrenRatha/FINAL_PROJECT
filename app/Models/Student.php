<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Student extends Model
{
    protected $primaryKey = 'studentid';

    protected $fillable = [
        'studentname',
        'gender',
        'ege',
        'dob',
        'subject',
        'payment',
        'description',
        'dept_id',
        'qr_token',
    ];

    protected static function booted(): void
    {
        static::creating(function ($student) {
            if (empty($student->qr_token)) {
                $student->qr_token = (string) Str::uuid();
            }
        });
    }

    public function department()
    {
        return $this->belongsTo(Department::class, 'dept_id', 'id');
    }

    public function attendances()
    {
        return $this->hasMany(Attendance::class, 'studentid', 'studentid');
    }
}
