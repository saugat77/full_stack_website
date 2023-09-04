<?php

use App\Http\Controllers\Admin\AppointmentController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\ApplicationController;
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

Route::get('/', function () {
    return view('welcome');
});

//users
Route::get('/api/users',[UserController::class,'index']);
Route::get('/api/allroles',[UserController::class,'allRoles']);
Route::post('/api/users/create',[UserController::class,'store']);
Route::get('/api/users/search',[UserController::class,'searchQuery']);
Route::put('/api/users/edit/{user}',[UserController::class,'update']);
Route::delete('/api/users/delete/{user}',[UserController::class,'destroy']);


//Appoinments
Route::get('api/appointments',[AppointmentController::class,'index']);
Route::get('{view}',ApplicationController::class)->where('view','(.*)');
