<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\Teacher;
use App\Models\Student;
use App\Models\School;



class ClassController extends Controller
{
    public function assignTeacher(Request $req){

        $ogr = $req->input('ogretmenler');
        $sinif = $req->input('siniflar');

        $students = Student::where('student_class', $sinif)->get();
        $teacher= Teacher::where('id', $ogr)->first();

        foreach ($students as $student) {
            $student->stu_teacher_id = $teacher->id;
            $student->save();
        }

    return redirect('/admin/ogretmen-ata');

    }


    public function listAssignedTeacher(Request $req){

        // $classes = Student::where('stu_school_id', session('teacher')->te_school_id)->distinct()->get('student_class', );
        $classes= DB::table('students')-> where('stu_school_id', session('teacher')->te_school_id)->distinct()->get('student_class');

        foreach ($classes as $class) {
            $students = Student::where('student_class', $class->student_class)->first();
        }

        $teachers = Teacher::where('te_school_id', session('teacher')->te_school_id)->where('role', 2)->get();
        
        return view('admin.assign-teacher')->with('classes', $classes)->with('teachers', $teachers)->with('students', $students);

    }


    public function listStudents($sinif_id){

        $students = Student::where('stu_school_id', session('teacher')->te_school_id)->where('student_class', $sinif_id)->get();
        //return $classes;
        return view('class-list')->with('students', $students)->with('sinif_id', $sinif_id);
    }



}
