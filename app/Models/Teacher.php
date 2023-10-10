<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $table = 'teachers'; // Veritabanında kullanılan tablo adı
    protected $fillable = ['teacher_name', 'teacher_lastname', 'teacher_mail', 'teacher_password', 'role', 'te_school_id']; // Doldurulabilir sütunlar

    // İlişkilendirme örnekleri buraya eklenebilir (örneğin, okul ile ilişkilendirme)

    public function school()
    {
        return $this->belongsTo(School::class, 'te_school_id');
    }

    public function appointments()
    {
        return $this->hasMany(Appointment::class, 'ap_teacher_id');
    }
}
