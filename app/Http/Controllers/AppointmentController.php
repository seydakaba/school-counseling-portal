<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teacher;
use App\Models\School;
use App\Models\Student;
use App\Models\Appointment;
use App\Models\Note;

class AppointmentController extends Controller
{

    public function makeAppointment(Request $request){
        $appointment = new Appointment;
        $appointment->ap_teacher_id = session('teacher')->id;

        $student=Student::where('student_no',$request->student_no)->where('stu_school_id',session('teacher')->te_school_id)->select('id')->first();
        if($student==null){
            return view('teacher.add-appointment')->with('error','Öğrenci bulunamadı');
        }
        $appointment->ap_student_id = $student->id;
        $appointment->start = $request->start;
        $appointment->save();

        return view('teacher.add-appointment')->with('success','Randevu oluşturuldu');
    }

    public function deleteAppointment($id){
        $appointment = Appointment::find($id);
        $appointment->delete();
        return redirect()->back()->with('success','Randevu silindi');
    }


    public function listAppointment(Request $request){

        switch($request->input('action')){
            case 'all':
                $appointments = Appointment::where('ap_teacher_id',session('teacher')->id)->get();
                return view('teacher.add-appointment')->with('appointments',$appointments);
                break;
            case 'today':
                $appointments = Appointment::where('ap_teacher_id',session('teacher')->id)->whereDate('start',date('Y-m-d'))->get();
                return view('teacher.add-appointment')->with('appointments',$appointments);
                break;
            case 'week':
                $appointments = Appointment::where('ap_teacher_id',session('teacher')->id)->whereBetween('start',[date('Y-m-d'),date('Y-m-d',strtotime('+1 week'))])->get();
                return view('teacher.add-appointment')->with('appointments',$appointments);
                break;
            case 'month':
                $appointments = Appointment::where('ap_teacher_id',session('teacher')->id)->whereBetween('start',[date('Y-m-d'),date('Y-m-d',strtotime('+1 month'))])->get();
                return view('teacher.add-appointment')->with('appointments',$appointments);
                break;
            case 'year':
                $appointments = Appointment::where('ap_teacher_id',session('teacher')->id)->whereBetween('start',[date('Y-m-d'),date('Y-m-d',strtotime('+1 year'))])->get();
                return view('teacher.add-appointment')->with('appointments',$appointments);
                break;
            case 'past':
                $appointments = Appointment::where('ap_teacher_id',session('teacher')->id)->where('start','<',date('Y-m-d'))->get();
                return view('teacher.add-appointment')->with('appointments',$appointments);
                break;
            case 'future':
                $appointments = Appointment::where('ap_teacher_id',session('teacher')->id)->where('start','>',date('Y-m-d'))->get();
                return view('teacher.add-appointment')->with('appointments',$appointments);
                break;
            default:
                $appointments = Appointment::where('ap_teacher_id',session('teacher')->id)->get();
                return view('teacher.add-appointment')->with('appointments',$appointments);
                break;
        }
    }

    public function appointmentPage($id){

        $appointment = Appointment::find($id);
        if($appointment->ap_teacher_id != session('teacher')->id){
            return redirect()->back()->with('error','Bu randevuya erişim yetkiniz yok');
        }
        $student = Student::find($appointment->ap_student_id);
        return view('teacher.appointment-page')->with('appointment',$appointment)->with('student',$student);
    }

    //new note function
    public function addNotePage($id, Request $request){

        $this->validate($request,[
            'note' => 'required'
        ]);
        
        $note = new Note;
        
        $note->note=$request->input('note');
        $note->no_ap_id = $id;
        $note->save();

        return redirect()->back()->with('success','Not eklendi');

    }



}
