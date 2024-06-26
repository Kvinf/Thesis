<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Models\APICategory;
use App\Models\ProjectAccess;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Throwable;



class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */


    public function updateProject(Request $request)
    {
        try {
            $validateData = $request->validate([
                'id' => 'required',
                'name' => 'required',
                'private' => 'required',
                'description' => 'required'
            ]);

            DB::beginTransaction();

            $insertItem = ([
                'id' => $validateData['id'],
                'projectName' => $validateData['name'],
                'privateFlag' =>  $validateData['private'],
                'projectOwner' => Auth::id(),
                'autoCheck' => false,
                'description' => $validateData['description'],
                'viewCount' => 0,
            ]);

            $project = Project::find($validateData['id']);
            if ($project) {
                $project->update($insertItem);
                DB::commit();
                return redirect()->route('dashboard');
            } else {
                DB::rollBack();
                return redirect()->route('dashboard')->withErrors('Project not found.');
            }
            return redirect()->route('dashboard');
        } catch (Exception $ex) {
            DB::rollBack();
            return redirect()->route('dashboard')->withErrors('An error occurred: ' . $ex->getMessage());
        }
    }

    public function create(Request $request)
    {
        try {
            // Validate the request data
            $validateData = $request->validate([
                'name' => 'required|string|max:255',
                'private' => 'required|boolean',
                'description' => 'required|string'
            ]);
        
            DB::beginTransaction();
        
            $insertItem = [
                'projectName' => $validateData['name'],
                'privateFlag' =>  $validateData['private'],
                'projectOwner' => Auth::id(),
                'autoCheck' => false,
                'description' => $validateData['description'],
                'viewCount' => 0
            ];
        
            // Insert into Project table
            $item = Project::create($insertItem);
        
            // Insert into ProjectAccess table
            ProjectAccess::create([
                'projectId' => $item->id,
                'userId' => Auth::id(),
                'access' => 3,
            ]);
        
            // Insert into APICategory table
            APICategory::create([
                'categoryName' => "Authentication",
                'inserted_by' => Auth::id(),
                'projectId' => $item->id,
            ]);
        
            // Commit the transaction
            DB::commit();
        
            return redirect()->route('dashboard');
        
        } catch (Throwable $ex) {
            DB::rollBack();
            return redirect()->route('dashboard')->withErrors('An error occurred: ' . $ex->getMessage());
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        //
    }
}
