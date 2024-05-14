<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


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


    public function create(Request $request)
    {   
        try 
        {
            $validateData = $request->validate([
                'name' => 'required',
                'private' => 'required',
                'description' => 'required'
            ]);
    
            DB::beginTransaction();
            
            $insertItem = ([
                'projectName' => $validateData['name'],
                'privateFlag' =>  $validateData['private'],
                'projectOwner' => Auth::id(),
                'autoCheck' => false,
                'description' => $validateData['description'],
                'viewCount' => 0
            ]);
    
            $item = Project::create($insertItem);
            DB::commit();

            return redirect()->route('dashboard');
        }

        catch (Exception $ex) {
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
     */
    public function show(Project $project)
    {
        //
    }

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
