<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Teacher;
use App\Models\School;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function register(Request $req){

        $this->validate($req, [
            'isim' => 'required',
            'soyisim' => 'required',
            'okul' => 'required',
            'mail' => 'required',
            'sifre' => 'required',
        ]);


        $teacher = new Teacher();
        $school = new School();

        $teacher->teacher_name = $req->input('isim');
        $teacher->teacher_lastname = $req->input('soyisim');
        $teacher->teacher_mail = $req->input('mail');  
        $teacher->teacher_password = Hash::make($req->input('sifre'));
        $teacher->role = 1;
        $school->school_name = $req->input('okul'); 

        if (Teacher::where('teacher_mail', '=', $req->input('mail'))->exists()) {
            return view('signup')->with('mailerror', 'Bu e-posta adresi zaten kullanılıyor!');
        }
        else if (strlen($req->input('sifre')) < 8 || strlen($req->input('sifre')) > 16) {
            return view('signup')->with('passworderror', 'Şifre 8 karakterden kısa veya 16 karakterden uzun olamaz!');
        }
        else  {
            $school->save();

            $teacher->te_school_id = $school->where('school_name', $req->input('okul'))->value('id');
            $teacher->save();

            //

            return view('login')->with('success', 'Kayıt başarılı!');
        }

        
        
    }

    public function login(Request $req){
        $this->validate($req, [
            'mail' => 'required',
            'sifre' => 'required',
        ]);

        $teacher = new Teacher();

        $mail = $req->input('mail');
        $password = $req->input('sifre');

        $data = Teacher::where('teacher_mail', '=', $mail)->first();

        if ($data) {
            if (Hash::check($password, $data->teacher_password)) {
                $req->session()->put('teacher', $data);
                if ($data->role == 1) {
                    return redirect('/admin/anasayfa');
                }
                else if ($data->role == 2) {
                    return redirect('/ogretmen');
                }
            }
            else {
                if($password == $data->teacher_password) {
                    $req->session()->put('teacher', $data);
                    return redirect('/ogretmen/anasayfa');
                }
                else{
                    return view('login')->with('passworderror', 'Şifre yanlış!');
                }
            }
        }
        else {
            return view('login')->with('mailerror', 'Bu e-posta adresi ile kayıtlı bir hesap bulunamadı!');
        }
    }

    // public function logout(Request $req){
    //     $req->session()->forget('teacher');
    //     return redirect('/giris');
    // }

   
       
}




