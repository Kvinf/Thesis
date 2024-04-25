<?php

namespace App\Http\Controllers;

use App\Models\MsUser;
use App\Models\otpUser;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMsUserRequest;
use App\Http\Requests\UpdateMsUserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendOtpMail;
use Exception;

class MsUserController extends Controller
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
    {   try 
        {
            $validatedData = $request->validate([
                'email' => 'required|email|unique:ms_users,email',
                'password' => 'required|min:6',
                'username' => 'required'
            ]);
            
            $otp = rand(100000, 999999);

            $validatedData['password'] = bcrypt($validatedData['password']);

            error_log($validatedData['email']);

            Mail::to($validatedData['email'])->send(new SendOtpMail($otp));
            
            return redirect()->route('signup'); 
        }
        catch (Exception $ex) {
            error_log($ex);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMsUserRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(MsUser $msUser)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MsUser $msUser)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMsUserRequest $request, MsUser $msUser)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MsUser $msUser)
    {
        //
    }
}
