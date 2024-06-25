<?php

use App\Http\Controllers\DoctorController;
use App\Http\Controllers\LabController;
use App\Http\Controllers\ManagerControler;
use App\Http\Controllers\ReceptionController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/', [UserController::class,'welcome'])->name('welcome');

Route::get('/login', [UserController::class,'login'])->name('login');


Route::get('/logout',[UserController::class,'logout'])->name('logout');

Route::post('/login', [UserController::class, 'authenticate'])->name('authenticate');

Route::middleware(['auth', 'cheackUserRole:lab','prevent-back-history'])->group(function () {
    Route::get('/dashboard/laboratory/{id}', [LabController::class,'index'])->name('labtech.dashboard');
    Route::get('/lab/result/{patientId}',[LabController::class,'result'])->name('labresult');
    Route::get('/finish_labrequest/{patientId}', [LabController::class, 'finishLabRequest'])->name('finish_labrequest');
    Route::post('/storeLabResult/{id}', [LabController::class, 'storeLabResult'])->name('storeLabResult');
});

Route::middleware(['auth', 'cheackUserRole:doctor','prevent-back-history'])->group(function () {
    Route::get('/dashboard/doctor/{id}', [DoctorController::class,'index'])->name('doctor.dashboard');
    Route::get('/medicalHistory/{id}',[DoctorController::class,'history'])->name('medicalHistory');
    Route::get('/result/{id}',[DoctorController::class,'result'])->name('result');
    Route::get('/newmedicalHistory/{id}',[DoctorController::class,'newHistory'])->name('newmedicalHistory');
    Route::post('/mediacal/history/{id}',[DoctorController::class, 'storeMedicalHistory'])->name('storeMedicalHistory');
    Route::post('/apointment/{patientId}',[DoctorController::class, 'apointmentDate']);
    Route::get('finished/{id}', [DoctorController::class,'finished'])->name('finished');
    Route::post('/lab/request',[DoctorController::class, 'labRequest'])->name('labRequest');
    Route::post('/lab/history',[DoctorController::class, 'labHistory'])->name('labHistory');
    Route::post('/other/{id}',[DoctorController::class, 'other'])->name('other');
});


Route::middleware(['auth', 'cheackUserRole:reception','prevent-back-history'])->group(function () {
    Route::get('/dashboard/reception/{id}', [ReceptionController::class,'index'])->name('reception.dashboard');
    Route::post('/dashboard/reception/{reception_id}',[ReceptionController::class, 'store'])->name('storePatient');
    Route::post('/assign/patient',[ReceptionController::class, 'assign'])->name('assign');
    Route::put('/patients/{id}', [ReceptionController::class, 'update'])->name('updateUser');
    Route::get('/patientsDetail/{id}',[ReceptionController::class,'patient'])->name('patientDetail');

});
Route::middleware(['auth', 'cheackUserRole:manager','prevent-back-history'])->group(function () {
    Route::get('/dashboard/manager/{id}', [ManagerControler::class,'index'])->name('manager.dashboard');
    Route::get('/registration/{id}', [ManagerControler::class,'registration'])->name('registration');
    Route::post('/regestration/user/{id}',[UserController::class, 'store'])->name('storeUser');
    Route::get('/user/{id}/edit/{manager_id}', [ManagerControler::class, 'edit'])->name('editUser');
    Route::put('/user/{manager_id}/edit/{id}', [UserController::class, 'update'])->name('updateUser');
    Route::delete('/user/{id}/manager/{manager_id}', [UserController::class, 'destroy'])->name('deleteUser');

 
});


