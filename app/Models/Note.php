<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    protected $table = 'notes'; 
    protected $fillable = ['note', 'no_ap_id']; 


    public function appointment()
    {
        return $this->belongsTo(Appointment::class, 'no_ap_id');
    }
}
