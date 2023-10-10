<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Imports\StudentsImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Student;
use App\Models\Appointment;
use App\Models\Note;

class StudentController extends Controller
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function index()
    {
        $students = Student::where('stu_school_id', session('teacher')->te_school_id)->get();
        return view('admin.add-class', compact('students'));
    }
        
    /**
    * @return \Illuminate\Support\Collection
    */
    // public function export() 
    // {
    //     return Excel::download(new UsersExport, 'users.xlsx');
    // }
       
    /**
    * @return \Illuminate\Support\Collection
    */
    public function import() 
    {
        Excel::import(new StudentsImport,request()->file('file'));
        return back();
    }

    public function profileStudents($ogrenci_id){

        $students = Student::where('stu_school_id', session('teacher')->te_school_id)->where('id', $ogrenci_id)->first();
        $appointments = Appointment::where('ap_student_id', $ogrenci_id)->orderBy('start', 'desc')->get();
        foreach ($appointments as $appointment) {
            $appointment->notes = Note::where('no_ap_id', $appointment->id)->get();
        }

        return view('student-profile')->with('students', $students)->with('ogrenci_id', $ogrenci_id)->with('appointments', $appointments);
    }
}