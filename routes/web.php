<?php

use App\Http\Controllers\MsUserController;
use App\Http\Controllers\ProjectController;
use App\Models\Project;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;



Route::get('/profile', function () {
    $item = Auth::user();
    return view('profile')->with('items', $item);
})->name("profile")->middleware("auth");;

Route::get('/project', function () {
    return view('yourproject');
})->name("project")->middleware("auth");

Route::post('register', [MsUserController::class, 'create'])->name('register');
Route::middleware('web')->group(function () {

    Route::get('/signup', function () {
        return view('signup');
    })->name("signup");

    Route::get('/login', function () {
        return view('login');
    })->name("login");

    Route::get('/logout', function () {
        Auth::logout();
        return redirect()->route('');
    })->name("logout");

    Route::get('/dashboardpublic', function () {
        return view('dashboardpublic');
    })->name("dashboardpublic");


    Route::get('/', function () {

        if (Auth::check()) {
            $item = Project::where('projectOwner', Auth::id())->get();
            return view('dashboard')->with('items', $item);
        } else {
            return view('dashboardpublic');
        }
    })->name("dashboard");

    Route::get('/otp', function () {
        return view('otp');
    })->name("otp")->middleware('auth');

    Route::post('register', [MsUserController::class, 'create'])->name('registerPost');
    Route::post('login', [MsUserController::class, 'login'])->name('loginPost');
    Route::post('otp', [MsUserController::class, 'verify'])->name('otpPost');
    Route::post('addproject', [ProjectController::class, 'create'])->name('addproject');
});

