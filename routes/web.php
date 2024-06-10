<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\StudentController;



Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    Route::get('admin/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // tampilkan student
    Route::get('admin/student', [StudentController::class, 'index']);

    //tampilkan course
    Route::get('admin/course', [CourseController::class, 'index']);

    //Route untuk menampilkan form tambah student
    Route::get('admin/student/create', [StudentController::class, 'create']);

    //Route untuk mengirim data form tambah student
    Route::post('admin/student/create', [StudentController::class, 'store']);

    //Route untuk menampilkan halaman edit student
    Route::get('admin/student/edit/{id}', [StudentController::class, 'edit'])->name('student.edit');

    //Route untuk menyimpan hasil Update student
    Route::put('admin/student/update/{id}', [StudentController::class, 'update']);

    //Route untuk menghapus student
    Route::delete('admin/student/delete/{id}', [StudentController::class, 'destroy']);

    //Route untuk menampilkan form tambah course
    Route::get('admin/course/create', [CourseController::class, 'create']);

    //Route untuk mengirim data form tambah course
    Route::post('admin/course/create', [CourseController::class, 'store']);

    //Route untuk menampilkan halaman edit course
    Route::get('admin/course/edit/{id}', [CourseController::class, 'edit'])->name('course.edit');

    //Route untuk menyimpan hasil Update course
    Route::put('admin/course/update/{id}', [CourseController::class, 'update']);

    //Route untuk menghapus course
    Route::delete('admin/course/delete/{id}', [CourseController::class, 'destroy']);

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
