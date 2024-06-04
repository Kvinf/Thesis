<?php

use App\Http\Controllers\APICategoryController;
use App\Http\Controllers\APIListController;
use App\Http\Controllers\MsUserController;
use App\Http\Controllers\ProjectController;
use App\Models\APICategory;
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

    
    if ($item) {

        $category = APICategory::where('projectId',$id)->get();

        $result = [];

        foreach($category as $i) {
            $temp = [];
            $temp['category'] = $i->categoryName;

            $apilist = APIList::where('categoryId',$i->id)->get();
            $temp['api'] = $apilist;

            $result[] = $temp;
        }

        $itemNull = APIList::where('projectId',$id)->where('categoryId' , null)->get();

        if ($itemNull->isNotEmpty()) {
            $temp['category'] = "Uncategorized";
            $temp['api'] = $itemNull;
            $result[] = $temp;

        }

        return view('yourproject')->with(['project' => $item, 'api' => $result]);
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
    Route::patch('updateproject',[ProjectController::class,'updateProject'])->name('updateproject');
    Route::post('addcategory',[APICategoryController::class,'create'])->name('addcategory');

});
