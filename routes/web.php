
<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\DepartmentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('student.list');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


/*
|--------------------------------------------------------------------------
| STUDENT AND DEPARTMENT ROUTES
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    /*
    |--------------------------------------------------------------------------
    | STUDENT ROUTES
    |--------------------------------------------------------------------------
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
    |--------------------------------------------------------------------------
    | DEPARTMENT ROUTES
    |--------------------------------------------------------------------------
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
    |--------------------------------------------------------------------------
    | PROFILE ROUTES
    |--------------------------------------------------------------------------
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

require __DIR__.'/auth.php';
