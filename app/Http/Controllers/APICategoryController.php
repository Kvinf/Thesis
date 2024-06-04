<?php

namespace App\Http\Controllers;

use App\Models\APICategory;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAPICategoryRequest;
use App\Http\Requests\UpdateAPICategoryRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Exception;

class APICategoryController extends Controller
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
        try {
            $validateData = $request->validate([
                'projectId' => 'required',
                'categoryName' => 'required',
            ]);

            DB::beginTransaction();

            $item = APICategory::where(['projectId' => $validateData['projectId'], 'categoryName' => $validateData['categoryName']])->first();

            if ($item) {
                DB::rollBack();
                return back()->withErrors('Category already available');
            }

            $insertItem = ([
                'projectId' => $validateData['projectId'],
                'categoryName' => $validateData['categoryName'],
                'inserted_by' => Auth::id(),
            ]);

            $item = APICategory::create($insertItem);
            DB::commit();

            return back()->withErrors('Category Inserted');
        } catch (Exception $ex) {
            DB::rollBack();
            return redirect()->route('dashboard')->withErrors('An error occurred: ' . $ex->getMessage());
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAPICategoryRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(APICategory $aPICategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(APICategory $aPICategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAPICategoryRequest $request, APICategory $aPICategory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(APICategory $aPICategory)
    {
        //
    }
}
