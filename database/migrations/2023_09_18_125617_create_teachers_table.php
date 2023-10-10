<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeachersTable extends Migration
{
    public function up()
    {
        Schema::create('teachers', function (Blueprint $table) {
            $table->id();
            $table->string('teacher_name', 25);
            $table->string('teacher_lastname', 20);
            $table->string('teacher_password', 255);
            $table->string('teacher_mail', 50)->unique();
            $table->enum('role', ['1', '2']);
            $table->unsignedBigInteger('te_school_id');
            $table->foreign('te_school_id')->references('id')->on('schools');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('teachers');
    }
}
