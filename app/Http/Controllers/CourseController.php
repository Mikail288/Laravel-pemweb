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

    //methode untuk menampilkan halaman tambah course
    public function create()
    {
        return view('admin.contents.course.create');
    }

    //methode utnuk menyimpan data course
    public function store(Request $request){
        //validasi data yang diterima
        $request->validate([
            'name' => 'required',
            'category' => 'required',
            'desc' => 'required'
        ]);

        //simpan ke database
        Course::create([
            'name' => $request->name,
            'category' => $request->category,
            'desc' => $request->desc,
        ]);
        
        //redirect ke halaman course
        return redirect('/admin/course')->with('pesan', 'berhasil menambahkan course');
    }

    //method untuk menampilkan halaman edit
    public function edit($id){
        //mendapatkan data student berdasarkan id
        $course = Course::find($id);
        //panggil view dan kirim data ke view
        return view('admin.contents.course.edit', [
            'course' => $course,
        ]);
    }

    //method menyimpan hasil update
    public function update(Request $request, $id){
        //mendapatkan data course berdasarkan id
        $course = Course::find($id);

        //validasi data yang diterima
        $request->validate([
            'name' => 'required',
            'category' => 'required',
            'desc' => 'required'
        ]);

        //Simpan Perubahan
        $course->update([
            'name' => $request->name,
            'category' => $request->category,
            'desc' => $request->desc
        ]);

        //redirect ke halaman course
        return redirect('/admin/course')->with('pesan', 'berhasil mengedit course');
    }

    //method utuk menghapus course
    public function destroy($id){
        //mendapatkan data course berdasarkan id
        $course = Course::find($id);
        //hapus data course
        $course->delete();
        //redirect ke halaman course
        return redirect('/admin/course')->with('pesan', 'berhasil menghapus course');
    }
}
