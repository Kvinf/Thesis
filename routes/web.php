<?php

use App\Http\Controllers\APICategoryController;
use App\Http\Controllers\APIListController;
use App\Http\Controllers\MsUserController;
use App\Http\Controllers\ProjectAccessController;
use App\Http\Controllers\ProjectController;
use App\Models\APICategory;
use App\Models\APIList;
use App\Models\MsUser;
use App\Models\Project;
use App\Models\ProjectAccess;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


Route::get('/profile', function () {
    $item = Auth::user();
    return view('profile')->with('items', $item);
})->name("profile")->middleware("auth");;

Route::get('/addapi/{id}', [APIListController::class, 'showAddApiForm'])->name('addapi')->middleware('auth');

Route::get('/editapi/{id}/{init}}', [APIListController::class, 'showEditApiForm'])->name('editapi')->middleware('auth');

Route::get('/project/{id}', function ($id) {

    $item = Project::where('id', $id)->first();

    if ($item) {
        $role = 0;
        if ($item->privateFlag == true) {
            if (Auth::check()) {
                $userid = Auth::id();
                $roleId = ProjectAccess::where(['projectId' =>  $id, 'userId' => $userid])->first();
                if ($roleId) {
                    $role = $roleId->access;
                } else {
                    return redirect()->route("dashboard")->withErrors("You dont have access to this project");
                }
            }
        } else {
            if (Auth::check()) {
                $userid = Auth::id();
                $roleId = ProjectAccess::where('projectId', $id)->where('userId', $userid)->first();
                if ($roleId) {
                    $role = $roleId->access;
                } else {
                    $role = 0;
                }
            }
        }

        $category = APICategory::where('projectId', $id)->get();
        $projectAccess = ProjectAccess::where('projectId', $id)->get();
        $user = MsUser::whereIn('id', $projectAccess->pluck('userId'))->get();
        $usersWithAccess = $user->map(function ($user) use ($projectAccess) {
            $access = $projectAccess->firstWhere('userId', $user->id);
            $user->access = $access->access;
            return $user;
        });
        $result = [];
        foreach ($category as $i) {
            $temp = [];
            $temp['category'] = $i->categoryName;
            $apilist = APIList::where('categoryId', $i->id)->get();
            $temp['api'] = $apilist;
            $result[] = $temp;
        }

        $itemNull = APIList::where('projectId', $id)->where('categoryId', null)->get();

        if ($itemNull->isNotEmpty()) {
            $temp['category'] = "Uncategorized";
            $temp['api'] = $itemNull;
            $result[] = $temp;
        }
        return view('yourproject')->with(['project' => $item, 'api' => $result, 'role' => $role, 'accesslist' =>  $usersWithAccess]);
    } else {
        return redirect()->route("dashboard")->withErrors("Project Not Found");
    }
})->name("project");


Route::post('addapi', [APIListController::class, 'addApi'])->name('addapipost');
Route::post('testapi', [APIListController::class, 'testapi'])->name('testapi');
Route::post('register', [MsUserController::class, 'create'])->name('register');
Route::middleware('web')->group(function () {

    Route::get('/signup', function () {
        return view('signup');
    })->name("signup");

    Route::get('/search', function (Request $request) {

        $search = $request->input('search');
        $category = $request->input('category', null);

        if (Auth::check()) {

            if ($category == null || $category == "projectname") {
                $search = strtolower($search);
                $access = ProjectAccess::where('userId', Auth::id())->pluck('projectId');
                $items = Project::whereIn('id', $access)
                    ->whereRaw('lower(projectName) like ?', ["%{$search}%"])
                    ->get();
                $public = Project::where('privateFlag', false)->where('projectOwner', '!=', Auth::id())->whereRaw('lower(projectName) like ?', ["%{$search}%"])->whereNotIn('id', $access)->get();
                $item = $items->concat($public);
                return view('search')->with('public', $item);
            } else if ($category == "projectauthor") {
                $search = strtolower($search);
                $user = MsUser::whereRaw('lower(username) like ?', ["%{$search}%"])->pluck("id");
                $access = ProjectAccess::where('userId', Auth::id())->pluck('projectId');
                $items = Project::whereIn('id', $access)->whereIn('projectOwner',$user)->where('privateFlag', true)->get();
                $public = Project::where('privateFlag', false)->where('projectOwner',$user)->get();
                $item = $items->concat($public);
                return view('search')->with('public', $item);
            } 
            
            else {
                return redirect()->route("dashboard")->withErrors('No Category');
            }
        } else {
            $search = strtolower($search);
            if ($category == null || $category == "projectname") {
                $item =  Project::where(DB::raw('LOWER(projectName)'), 'LIKE', '%' . strtolower($search) . '%')->where('privateFlag', false)->get();
                return view('search')->with('public', $item);
            } else if ($category == "projectauthor") {
                $user = MsUser::whereRaw('lower(username) like ?', ["%{$search}%"])->pluck("id");
            
                $public = Project::where('privateFlag', false)->whereIn('projectOwner', $user)->get();
                return view('search')->with('public', $public);
            } 
            
            else {
                return redirect()->route("dashboard")->withErrors('No Category');
            }
        }
    })->name("search");

    Route::get('/login', function () {
        return view('login');
    })->name("login");

    Route::get('detailapi/{id}', function ($id) {
        $detail = APIList::where('id',$id)->first();

        $item = APICategory::where('id',$detail->categoryId)->first();

        return view('detailapi')->with(['detail' => $detail, 'categoryName' => $item]);
    })->name('detail');

    Route::get('/logout', function () {
        Auth::logout();
        return redirect()->route('dashboard');
    })->name("logout");

    Route::get('/dashboardpublic', function () {
        return view('dashboardpublic');
    })->name("dashboardpublic");

    Route::get('/', function () {
        if (Auth::check()) {
            $access = ProjectAccess::where('userId', Auth::id())->get()->pluck('projectId');
            $item = Project::whereIn('id', $access)->get();
            $public = Project::where('privateFlag', false)->where('projectOwner', '!=', Auth::id())->whereNotIn('id', $access)->get();
            return view('dashboard')->with(['items' => $item, 'public' => $public,]);
        } else {
            $public = Project::where('privateFlag', false)->get();
            return view('dashboardpublic')->with('public', $public);;
        }
    })->name("dashboard");

    Route::get('/otp', function () {
        return view('otp');
    })->name("otp");

    Route::post('register', [MsUserController::class, 'create'])->name('registerPost');
    Route::post('login', [MsUserController::class, 'login'])->name('loginPost');
    Route::post('otp', [MsUserController::class, 'verify'])->name('otpPost');
    Route::post('addproject', [ProjectController::class, 'create'])->name('addproject');
    Route::patch('updateproject', [ProjectController::class, 'updateProject'])->name('updateproject');
    Route::post('addcategory', [APICategoryController::class, 'create'])->name('addcategory');
    Route::post('editusername', [MsUserController::class, 'editUsername'])->name('editusername');
    Route::post('addaccess', [ProjectAccessController::class, 'create'])->name('addaccess');
    Route::patch('updateaccess', [ProjectAccessController::class, 'updateAccess'])->name('updateaccess');
});
