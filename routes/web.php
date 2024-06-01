<?php

use App\Http\Controllers\APIListController;
use App\Http\Controllers\MsUserController;
use App\Http\Controllers\ProjectController;
use App\Models\APIList;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;



Route::get('/profile', function () {
    $item = Auth::user();
    return view('profile')->with('items', $item);
})->name("profile")->middleware("auth");;

Route::get('/addapi/{id}', [APIListController::class, 'showAddApiForm'])->name('addapi')->middleware('auth');


Route::get('/project/{id}', function ($id) {

    $item = Project::where('id', $id)->first();

    $itemProject = APIList::where('projectId',$item->id)->get();
    
    if ($item) {
        return view('yourproject')->with(['project' => $item, 'api' => $itemProject]);
    } else {
        return redirect()->route("dashboard")->withErrors("Project Not Found");
    }
})->name("project")->middleware("auth");


Route::post('addapi', [APIListController::class, 'addApi'])->name('addapipost');
Route::post('testapi', [APIListController::class, 'testapi'])->name('testapi');
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
    })->name("otp");

    Route::post('register', [MsUserController::class, 'create'])->name('registerPost');
    Route::post('login', [MsUserController::class, 'login'])->name('loginPost');
    Route::post('otp', [MsUserController::class, 'verify'])->name('otpPost');
    Route::post('addproject', [ProjectController::class, 'create'])->name('addproject');
});
