<?php

use App\Http\Controllers\MsUserController;
use Illuminate\Support\Facades\Route;

Route::get('/signup', function () {
    return view('signup');
})->name("signup");

Route::post('register', [MsUserController::class, 'create'])->name('register');

