<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    protected $table = 'schools'; // Veritabanında kullanılan tablo adı
    protected $fillable = ['school_name']; // Doldurulabilir sütunlar

    // İlişkilendirme örnekleri buraya eklenebilir (örneğin, öğrenciler veya öğretmenler ile ilişkilendirme)

    public function students()
    {
        return $this->hasMany(Student::class, 'stu_school_id');
    }

    public function teachers()
    {
        return $this->hasMany(Teacher::class, 'te_school_id');
    }

    public function admins()
    {
        return $this->hasMany(Admin::class, 'ad_school_id');
    }

    public function groups()
    {
        return $this->hasMany(Group::class, 'gr_school_id');
    }
}
