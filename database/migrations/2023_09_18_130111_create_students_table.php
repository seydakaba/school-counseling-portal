<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('student_no', 5);
            $table->string('student_name', 25);
            $table->string('student_lastname', 20);
            $table->string('student_class', 5);
            $table->enum('student_gender', ['Erkek', 'Kız']);
            $table->enum('student_status', ['1', '2', '3']);
            $table->unsignedBigInteger('stu_school_id');
            $table->unsignedBigInteger('stu_teacher_id');
            $table->foreign('stu_school_id')->references('id')->on('schools');
            $table->foreign('stu_teacher_id')->references('id')->on('teachers');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('students');
    }
}

