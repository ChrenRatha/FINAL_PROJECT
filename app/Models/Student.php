<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
    ];

    public function department()
    {
        return $this->belongsTo(Department::class, 'dept_id', 'id');
    }
}