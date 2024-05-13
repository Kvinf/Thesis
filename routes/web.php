<?php

use App\Http\Controllers\MsUserController;
use App\Http\Controllers\ProjectController;
use App\Models\Project;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;



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
        $item = Project::where('projectOwner', Auth::id())->get();
        error_log($item);
        return view('dashboard')->with('items', $item);
    })->name("dashboard")->middleware('auth');

    Route::get('/otp', function () {
        return view('otp');
    })->name("otp")->middleware('auth');

    Route::post('register', [MsUserController::class, 'create'])->name('registerPost');
    Route::post('login', [MsUserController::class, 'login'])->name('loginPost');
    Route::post('otp', [MsUserController::class, 'verify'])->name('otpPost');
    Route::post('addproject', [ProjectController::class, 'create'])->name('addproject');
});

