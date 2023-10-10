<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppointmentsTable extends Migration
{
    public function up()
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ap_student_id');
            $table->unsignedBigInteger('ap_teacher_id');
            $table->foreign('ap_student_id')->references('id')->on('students');
            $table->foreign('ap_teacher_id')->references('id')->on('teachers');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('appointments');
    }
}
