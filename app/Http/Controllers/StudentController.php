<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    // method untuk menampilkan halaman student
    public function index(){
        // mendapatkan data student dari database
        $students = Student::all();
        // panggil view dan kirim data ke view
        return view('admin.contents.student.index', [
            'students' => $students
        ]);
    }

    //methode untuk menampilkan halaman tambah student
    public function create()
    {
        return view('admin.contents.student.create');
    }

    //methode utnuk menyimpan data student
    public function store(Request $request){
        //validasi data yang diterima
        $request->validate([
            'name' => 'required',
            'nim' => 'required|numeric',
            'major' => 'required',
            'class' => 'required'
        ]);

        //simpan ke database
        Student::create([
            'name' => $request->name,
            'nim' => $request->nim,
            'major' => $request->major,
            'class' => $request->class
        ]);
        
        //redirect ke halaman student
        return redirect('/admin/student')->with('pesan', 'berhasil menambahkan student');
    }

    //method untuk menampilkan halaman edit
    public function edit($id){
        //mendapatkan data student berdasarkan id
        $student = Student::find($id);
        //panggil view dan kirim data ke view
        return view('admin.contents.student.edit', [
            'student' => $student,
        ]);
    }

    //method menyimpan hasil update
    public function update(Request $request, $id){
        //mendapatkan data student berdasarkan id
        $student = Student::find($id);

        //validasi data yang diterima
        $request->validate([
            'name' => 'required',
            'nim' => 'required|numeric',
            'major' => 'required',
            'class' => 'required'
        ]);

        //Simpan Perubahan
        $student->update([
            'name' => $request->name,
            'nim' => $request->nim,
            'major' => $request->major,
            'class' => $request->class
        ]);

        //redirect ke halaman student
        return redirect('/admin/student')->with('pesan', 'berhasil mengedit student');
    }

    //method utuk menghapus student
    public function destroy($id){
        //mendapatkan data student berdasarkan id
        $student = Student::find($id);
        //hapus data student
        $student->delete();
        //redirect ke halaman student
        return redirect('/admin/student')->with('pesan', 'berhasil menghapus student');
    }
}
