<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/home',[HomeController::class,'redirect'])->middleware('auth',"verified");
Route::get('/',[HomeController::class,'index']);
Route::get('/myappointment',[HomeController::class,'myappointment']);
Route::post('/upload_doctor',[AdminController::class,'upload']);
Route::post('/sendemail/{id}',[AdminController::class,'sendemail']);
Route::get('/showAppointments',[AdminController::class,'showAppointments']);
Route::post('/makeAppointment',[HomeController::class,'appointment']);
Route::get('/cancel_appointment/{id}',[HomeController::class,'cancel']);
Route::get('/approve_appointment/{id}',[AdminController::class,'approve']);
Route::get('/canceled/{id}',[AdminController::class,'cancel_appointment']);
Route::get('/Delete/{id}',[AdminController::class,'delete']);
Route::get('/update/{id}',[AdminController::class,'update']);
Route::post('/editDoctor/{id}',[AdminController::class,'editDoctor']);
Route::get('/send_Mail/{id}',[AdminController::class,'send_mail']);
Route::get('/add_doctor',[AdminController::class,'addview']);
Route::get('/doctors',[AdminController::class,'doctors']);
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');