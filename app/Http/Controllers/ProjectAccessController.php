<?php

namespace App\Http\Controllers;

use App\Models\ProjectAccess;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProjectAccessRequest;
use App\Http\Requests\UpdateProjectAccessRequest;
use App\Models\MsUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Throwable;
use Exception;


class ProjectAccessController extends Controller
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

    public function updateAccess(Request $request)
    {
        try {
            $userIds = $request->input('userIds');
            $accessLevels = $request->input('accessLevels');

            foreach ($userIds as $index => $userId) {
                $accessLevel = $accessLevels[$index];

                ProjectAccess::where(['userId' => $userId,'projectId' => $request->input('projectId')])
                    ->update(['access' => $accessLevel]);
            }

            return back()->withErrors( 'Access levels updated successfully.');
        } catch (Exception $ex) {
            return back()->withErrors('An error occurred: ' . $ex->getMessage());
        }
    }

    public function create(Request $request)
    {
        try {
            // Validate the request data
            $validateData = $request->validate([
                'email' => 'required|string|max:255',
                'access' => 'required|integer',
                'projectId' => 'required'
            ]);

            DB::beginTransaction();

            $item = MsUser::where('email', $request['email'])->first();

            if ($item) {


                $itemAccess = ProjectAccess::where('userId', $item->id)->first();

                if ($itemAccess) {
                    return back()->withErrors('Email already in access list');
                } else {
                    $insertItem = [
                        'projectId' => $validateData['projectId'],
                        'access' =>  $validateData['access'],
                        'userId' => $item->id,
                    ];
                    ProjectAccess::create($insertItem);
                }
            } else {

                DB::commit();
                return back()->withErrors('Email unavailable');
            }

            DB::commit();


            return back()->withErrors('Access Added');
        } catch (Throwable $ex) {
            DB::rollBack();
            return back()->withErrors('An error occurred: ' . $ex->getMessage());
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectAccessRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(ProjectAccess $projectAccess)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProjectAccess $projectAccess)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectAccessRequest $request, ProjectAccess $projectAccess)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProjectAccess $projectAccess)
    {
        //
    }
}
