<?php

use App\Http\Controllers\Admin\AppointmentController;
use App\Http\Controllers\Admin\DemandController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\PdfController;
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
    return view('index');
});

Route::get('/company_overview', function () {
    return view('frontend.about-us.company-overview');
})->name('company.overview');


Route::get('/license-and-certification', function () {
    return view('frontend.about-us.license-and-certification');
})->name('company.license');

Route::get('/why-nepal', function () {
    return view('frontend.about-us.why-nepal');
})->name('why.nepal');

Route::get('/our-teams', function () {
    return view('frontend.our-teams.index');
})->name('our.team');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::get('/api/contact/messages', [ContactController::class, 'showMessages']);
Route::post('/contact/store', [ContactController::class, 'store'])->name('send.message');
Route::middleware('auth')->group(function () {

    //users
    Route::get('/api/users', [UserController::class, 'index']);
    Route::get('/api/allroles', [UserController::class, 'allRoles']);
    Route::post('/api/users/create', [UserController::class, 'store']);
    Route::put('/api/users/edit/{user}', [UserController::class, 'update']);
    Route::delete('/api/users/delete/{user}', [UserController::class, 'destroy']);


    //status
    Route::get('/api/statuses', [AppointmentController::class, 'getStatus']);

    //Appoinments
    Route::get('api/appointments', [AppointmentController::class, 'index']);
    Route::post('api/appointments/create', [AppointmentController::class, 'store']);
    Route::get('api/appointments/{appointment}/edit', [AppointmentController::class, 'edit']);
    Route::put('api/appointments/{appointment}/edit', [AppointmentController::class, 'update']);
    Route::delete('api/appointments/{appointment}/delete', [AppointmentController::class, 'delete']);

    //Clients
    Route::get('/api/getClients', [AppointmentController::class, 'getClients']);

    //demands
    Route::get('/api/getDemands', [DemandController::class, 'index']);
    Route::post('api/demands/create', [DemandController::class, 'store']);
    Route::post('/api/demands/image-update', [DemandController::class, 'updateImage']);
    Route::get('api/demands/{demand}/show', [DemandController::class, 'show']);
    Route::put('api/demands/{demand}/edit', [DemandController::class, 'edit']);



    // Resume
    Route::get('/api/get-all-cv', [PdfController::class, 'index']);
    Route::post('/api/resume/create', [PdfController::class, 'store']);
    Route::get('/api/resume/{resume}/edit', [PdfController::class, 'edit']);
    Route::post('/api/resume/{resume}/update', [PdfController::class, 'update']);
    Route::post('/api/resume/image/{id}/delete', [PdfController::class, 'imageReplace']);
    Route::get('/api/resume/create-or-download/pdf/{id}', [PdfController::class, 'viewPdf']);
    Route::delete('/api/resume/{id}/delete/', [PdfController::class, 'deleteId']);
});
Route::get('{view}', ApplicationController::class)->where('view', '(.*)')->middleware('auth');
