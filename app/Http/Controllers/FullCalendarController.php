<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;

class FullCalendarController extends Controller
{
    public function index(Request $request)
    {
        if($request->ajax()) {
       
            $data = Appointment::whereDate('start', '>=', $request->start)
                       ->whereDate('end',   '<=', $request->end)
                       ->get(['id', 'ap_student_id', 'ap_teacher_id', 'start', 'end']);
  
            return response()->json($data);
        }
  
        return view('fullcalendar');        
    }

    public function ajax(Request $request)
{
    switch ($request->type) {
        case 'add':
            $appointment = Appointment::create([
                'ap_student_id' => $request->$student->student_id->where('student_id', $request->session('student')->id),
                'ap_teacher_id' => session('teacher')->id,
                'start' => $request->start,
                'ends' => $request->end, 

                $appointment->save()

            ]);

            return response()->json($appointment);
            break;

        case 'update':
            $appointment = Appointment::find($request->id);
            $appointment->ap_student_id = $request->ap_student_id;
            $appointment->ap_teacher_id = $request->ap_teacher_id;
            $appointment->start = $request->start;
            $appointment->ends = $request->end; 
            $appointment->save();

            return response()->json($appointment);
            break;

        case 'delete':
            $appointment = Appointment::find($request->id);
            $appointment->delete();

            return response()->json($appointment);
            break;

        default:
            return response()->json(['error' => 'Bilinmeyen işlem türü']);
            break;
    }
}

    
}
