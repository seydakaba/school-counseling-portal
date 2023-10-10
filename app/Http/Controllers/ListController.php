<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\Teacher;
use App\Models\Student;
use App\Models\School;

class ListController extends Controller
{
    public function listTeacher(Request $req){

        $teachers = Teacher::where('te_school_id', session('teacher')->te_school_id)->where('role', 2)->get();

        return view('admin.create-profile')->with('teachers', $teachers);
    }

    public function selectTeacher(Request $req){

        $teachers = Teacher::where('te_school_id', session('teacher')->te_school_id)->where('role', 2)->get();
        $classes = Student::where('stu_school_id', session('teacher')->te_school_id)->distinct()->get('student_class');
        return view('admin.assign-teacher')->with('classes', $classes)->with('teachers', $teachers);
    }
}