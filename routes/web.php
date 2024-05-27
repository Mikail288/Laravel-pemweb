<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('admin/dashboard', [DashboardController::class, 'index']);

// tampilkan student
Route::get('admin/student', [StudentController::class, 'index']);

Route::get('admin/course', [CourseController::class, 'index']);
