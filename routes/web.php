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

Route::get('/home',[HomeController::class,'redirect']);
Route::get('/',[HomeController::class,'index']);
Route::get('/myappointment',[HomeController::class,'myappointment']);
Route::post('/upload_doctor',[AdminController::class,'upload']);
Route::post('/makeAppointment',[HomeController::class,'appointment']);
Route::get('/cancel_appointment/{id}',[HomeController::class,'cancel']);
Route::get('/add_doctor',[AdminController::class,'addview']);
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');