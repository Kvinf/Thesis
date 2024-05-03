<?php

use App\Http\Controllers\MsUserController;
use Illuminate\Support\Facades\Route;


Route::middleware('web')->group(function () {
    
    Route::get('/signup', function () {
        return view('signup');
    })->name("signup");
    
    Route::get('/login', function () {
        return view('login');
    })->name("login");
    
    Route::get('/', function () {
        return view('dashboard');
    })->name("dashboard")->middleware('auth');

    Route::get('/otp', function () {
        return view('otp');
    })->name("otp")->middleware('auth');
    
    Route::post('register', [MsUserController::class, 'create'])->name('registerPost');
    Route::post('login', [MsUserController::class, 'login'])->name('loginPost');
    Route::post('otp', [MsUserController::class, 'verify'])->name('otpPost');

});

