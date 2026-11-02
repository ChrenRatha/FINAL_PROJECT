<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\StudentDashboardController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $user = Auth::user();

    if ($user) {
        if ($user->role === 'admin') {
            return redirect()->route('dashboard');
        }

        if ($user->role === 'student') {
            return redirect()->route('student.dashboard');
        }
    }

    return redirect()->route('login');
});


/*
|--------------------------------------------------------------------------
| ADMIN DASHBOARD
|--------------------------------------------------------------------------
*/

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified', 'admin'])->name('dashboard');


/*
|--------------------------------------------------------------------------
| ADMIN AND STUDENT ROUTES
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    /*
    |--------------------------------------------------------------------------
    | ADMIN ROUTES
    |--------------------------------------------------------------------------
    */

    Route::middleware('admin')->group(function () {

        /*
        | STUDENT MANAGEMENT
        */

        Route::get('/student', [
            StudentController::class,
            'create'
        ])->name('student.create');

        Route::post('/student', [
            StudentController::class,
            'store'
        ])->name('student.store');

        Route::get('/student/list', [
            StudentController::class,
            'show'
        ])->name('student.list');

        Route::get('/student/{studentid}/edit', [
            StudentController::class,
            'edit'
        ])->name('student.edit');

        Route::put('/student/{studentid}', [
            StudentController::class,
            'update'
        ])->name('student.update');

        Route::delete('/student/{studentid}', [
            StudentController::class,
            'destroy'
        ])->name('student.destroy');


        /*
        | DEPARTMENT MANAGEMENT
        */

        Route::get('/department', [
            DepartmentController::class,
            'create'
        ])->name('department.create');

        Route::post('/department', [
            DepartmentController::class,
            'store'
        ])->name('department.store');

        Route::get('/department/list', [
            DepartmentController::class,
            'show'
        ])->name('department.list');

        Route::get('/department/{id}/edit', [
            DepartmentController::class,
            'edit'
        ])->name('department.edit');

        Route::put('/department/{id}', [
            DepartmentController::class,
            'update'
        ])->name('department.update');

        Route::delete('/department/{id}', [
            DepartmentController::class,
            'destroy'
        ])->name('department.destroy');


        /*
        | ATTENDANCE MANAGEMENT
        */

        Route::get('/attendance', [
            AttendanceController::class,
            'index'
        ])->name('attendance.index');

        Route::get('/attendance/classroom-qr', [
            AttendanceController::class,
            'classroomQr'
        ])->name('attendance.classroom.qr');

        Route::post('/attendance/manual', [
            AttendanceController::class,
            'manual'
        ])->name('attendance.manual');


        /*
        | PROFILE ROUTES
        */

        Route::get('/profile', [
            ProfileController::class,
            'edit'
        ])->name('profile.edit');

        Route::patch('/profile', [
            ProfileController::class,
            'update'
        ])->name('profile.update');

        Route::delete('/profile', [
            ProfileController::class,
            'destroy'
        ])->name('profile.destroy');

    });


    /*
    |--------------------------------------------------------------------------
    | STUDENT ROUTES
    |--------------------------------------------------------------------------
    */

    Route::middleware('student')->group(function () {

        Route::get('/student/dashboard', [
            StudentDashboardController::class,
            'index'
        ])->name('student.dashboard');

        /*
        | CLASSROOM QR CHECK-IN
        */

        Route::get('/attendance/scan', [
            AttendanceController::class,
            'scan'
        ])->name('attendance.scan');

        Route::post('/attendance/check-in', [
            AttendanceController::class,
            'checkIn'
        ])->name('attendance.checkin');

    });

});


/*
|--------------------------------------------------------------------------
| AUTHENTICATION ROUTES
|--------------------------------------------------------------------------
*/

require __DIR__.'/auth.php';
