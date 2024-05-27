<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    // method untuk menampilkan halaman course
    public function index(){
        // mendapatkan data course dari database
        $course = Course::all();
        // panggil view dan kirim data ke view
        return view('admin.contents.course.index', [
            'courses' => $course
        ]);
    }
}
