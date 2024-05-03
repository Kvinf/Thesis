<?php

namespace App\Http\Controllers;

use App\Models\MsUser;
use App\Models\otpUser;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMsUserRequest;
use App\Http\Requests\UpdateMsUserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


use Illuminate\Support\Facades\Mail;
use App\Mail\SendOtpMail;
use Exception;

use function Laravel\Prompts\error;

class MsUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function login(Request $request)
    {

        try {
            $validateData = $request->validate([
                'email' => 'required|email',
                'password' => 'required|min:6',
            ]);

            $credentials = $request->only('email', 'password');

            if (Auth::attempt($credentials)) {
               
                $user = Auth::user();
                Session::put('foo', 'bar');
                session()->save(); 

                error_log(Session::get('foo'));
                if (!$user->verified) {
                    return redirect('/');;
                } else {
                    return redirect('/signup');
                }
            } else {
                error_log("Invalid credentials attempt for email: {$validateData['email']}");
                return redirect()->route('login')->withErrors('Invalid credentials.');
            }
        } catch (\Exception $ex) {
            error_log($ex->getMessage());
            return redirect()->route('login')->withErrors('An error occurred: ' . $ex->getMessage());
        }
    }

    public function verify(Request $request)
    {
        DB::beginTransaction();

        try {
            $validatedData = $request->validate([
                'otp' => 'required|min:6|numeric',
            ]);

            $userId = session('user_id');
            $otp = $validatedData['otp'];

            $otpRecord = otpUser::where('userId', $userId)
                ->where('otp', $otp)
                ->first();

            if (!$otpRecord) {
                throw new Exception("Invalid OTP or User ID.");
            }

            $otpRecord->delete();

            MsUser::where('userId', $userId)->update(['verified' => '1']);

            DB::commit();

            return redirect()->route('signup');
        } catch (Exception $ex) {
            DB::rollback();
            error_log($ex->getMessage());

            return redirect()->route('signup')->withErrors('An error occurred: ' . $ex->getMessage());
        }
    }

    public function create(Request $request)
    {
        DB::beginTransaction(); // Start the transaction

        try {
            $validatedData = $request->validate([
                'email' => 'required|email|unique:ms_users,email',
                'password' => 'required|min:6',
                'username' => 'required'
            ]);

            $otp = rand(100000, 999999);

            $validatedData['password'] = bcrypt($validatedData['password']);
            $validatedData['verified'] = false;

            $user = MsUser::create($validatedData);

            otpUser::create([
                'userId' => $user->id,
                'otp' => $otp
            ]);

            Mail::to($validatedData['email'])->send(new SendOtpMail($otp));

            Auth::user($user);

            DB::commit();

            return redirect()->route('signup');
        } catch (Exception $ex) {
            DB::rollback();
            error_log($ex->getMessage());

            return redirect()->route('signup')->withErrors('An error occurred: ' . $ex->getMessage());
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
