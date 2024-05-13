<?php

use App\Http\Controllers\MsUserController;
use Illuminate\Support\Facades\Route;


// <<<<<<< HEAD

Route::get('/', function () {
    return view('dashboard');
})->name("dashboard");

Route::get('/profile', function () {
    return view('profile');
})->name("profile");

Route::get('/yourproject', function () {
    return view('yourproject');
})->name("yourproject");

Route::post('register', [MsUserController::class, 'create'])->name('register');
// =======
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

    Route::post('register', [MsUserController::class, 'create'])->name('registerPost');
    Route::post('login', [MsUserController::class, 'login'])->name('loginPost');
});
// >>>>>>> 4f8ca5a4649670d7353da3387fa54ebaddeb569f

