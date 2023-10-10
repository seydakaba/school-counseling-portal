<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $table = 'appointments'; 
    protected $fillable = ['ap_student_id', 'ap_teacher_id', 'start' , 'ends']; 

    public function student()
    {
        return $this->belongsTo(Student::class, 'ap_student_id');
    }

    public function teacher()
    {
        return $this->belongsTo(Teacher::class, 'ap_teacher_id');
    }

    public function note()
    {
        return $this->hasOne(Note::class, 'no_ap_id');
    }
}
