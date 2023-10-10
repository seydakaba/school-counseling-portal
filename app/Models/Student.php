<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table = 'students'; // Veritabanında kullanılan tablo adı
    protected $fillable = ['student_no', 'student_name', 'student_lastname', 'student_class', 'student_gender', 'student_adress', 'student_pno', 'student_status', 'stu_school_id', 'stu_teacher_id']; // Doldurulabilir sütunlar

    // İlişkilendirme örnekleri buraya eklenebilir (örneğin, okul ve öğretmen ile ilişkilendirme)

    public function school()
    {
        return $this->belongsTo(School::class, 'stu_school_id');
    }

    public function teacher()
    {
        return $this->belongsTo(Teacher::class, 'stu_teacher_id');
    }

    public function appointments()
    {
        return $this->hasMany(Appointment::class, 'ap_student_id');
    }

    public function notes()
    {
        return $this->hasMany(Note::class, 'no_ap_id');
    }
}
