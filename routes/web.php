<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ListController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\AppointmentController;
use App\Models\Teacher;
use App\Models\School;
use App\Models\Student;
use App\Models\Appointment;
use App\Models\Note;
use Illuminate\Http\Request;



Route::prefix('{admin}')->middleware('isAdmin')->group(function(){
    Route::get('/anasayfa', function () {
        return view('admin.home');
    });

    Route::get('/sinif-ekle', function () {
        return view('admin.add-class');
    });
    Route::get('/sinif-ekle', [StudentController::class, 'index']);
    Route::get('/ogretmen-ata', [ListController::class, 'selectTeacher']);
    Route::get('/ogretmen-ekle', [ListController::class, 'listTeacher']);
    

});

Route::prefix('{ogretmen}')->middleware('isTeacher')->group(function(){
    Route::get('/anasayfa', function () {
        return view('teacher.home');
    });
    Route::get('/gorusme-ekle', [AppointmentController::class, 'listAppointment'])->name('listAppointment');
});



Route::get('/giris', function () {
    return view('login');
});


Route::get('/deneme', function () {
    return view('deneme');
});


Route::get('/kayit', function () {
    return view('signup');
});


Route::post('/kayit', [UserController::class, 'register']);
Route::post('/giris', [UserController::class, 'login']);

Route::post('/admin/ogretmen-ekle', [AdminController::class, 'addTeacher']);

Route::post('/admin/sinif-ekle', [StudentController::class, 'import']);

Route::post('/admin/ogretmen-ata', [ClassController::class, 'assignTeacher']);

Route::get('/sinif/{sinif_id}', [ClassController::class, 'listStudents']);

Route::get('/ogrenci/{ogrenci_id}', [StudentController::class, 'profileStudents']);


Route::controller(FullCalendarController::class)->group(function(){
    Route::get('fullcalender', 'index');
    Route::post('fullcalenderAjax', 'ajax');
});



Route::post('/ogretmen/gorusme-ekle', [AppointmentController::class, 'makeAppointment']);

Route::get('/ogretmen/gorusme/{id}', [AppointmentController::class, 'appointmentPage']);
Route::post('/ogretmen/gorusme/{id}', [AppointmentController::class, 'addNotePage']);