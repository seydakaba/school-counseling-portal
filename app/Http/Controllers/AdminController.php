<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Models\Teacher;
use App\Models\School;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    public function addTeacher(Request $req){

        $this->validate($req, [
            'isim' => 'required',
            'soyisim' => 'required',
            'mail' => 'required',
        ]);


        $teacher = new Teacher();

        $teacher->teacher_name = $req->input('isim');
        $teacher->teacher_lastname = $req->input('soyisim');
        $teacher->teacher_mail = $req->input('mail'); 
        $teacher->te_school_id = session('teacher')->te_school_id;
        $teacher->teacher_password = (Str::random(8));
        $teacher->role = 2;

        if (Teacher::where('teacher_mail', '=', $req->input('mail'))->exists()) {
            return view('admin.create-profile')->with('mailerror', 'Bu e-posta adresi zaten kullanılıyor!');
        }
        else  {

            $teacher->save();

            return view('admin.create-profile')->with('success', 'Kayıt başarılı!');
        }
        
    }
        
}