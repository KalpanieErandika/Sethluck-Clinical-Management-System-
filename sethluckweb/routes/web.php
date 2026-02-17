<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AppointmentController;

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

Route::get('/', function () {
    return redirect()->route('home');
});

Route::get('/home', function () {
    return view('home');
})->middleware('guest')->name('home');

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/register', function () {
    return view('register');
})->name('register');



Route::post('/register_user', [UserController::class, 'register_user'])->name('register_user');
Route::post('/login_user', [UserController::class, 'login_user'])->name('login_user');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');

Route::middleware('auth.user')->group(function () {
    Route::get('/loginhome', function () {
        return view('loginhome');
    })->name('loginhome');

    Route::get('/', function () {
        return redirect()->route('loginhome');
    });

    Route::get('/appointment', function () {
        return view('appointmenttime');
    })->name('appointment');

    Route::post('/get_appointments', [AppointmentController::class, 'getappointments'])->name('getappointments');
    Route::post('/set_appointment', [AppointmentController::class, 'setappointment'])->name('setappointment');
    Route::get('/view_appointments', [AppointmentController::class, 'viewappointments'])->name('viewappointments');
});