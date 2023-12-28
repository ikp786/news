<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAdminRequest;
use App\Http\Requests\UpdateAdminRequest;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function loginView()
    {
        if (auth()->user()) {
            return redirect(route('admin.dashboard'));
        }
        return view('backend.auth.login');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function login(StoreAdminRequest $request)
    {
        try {
            $credentials = $request->only('email', 'password');
            // $credentials['role_id'] = 1;
            if (Auth::attempt($credentials)) {
                return response()->json(['status' => 200, 'message' => 'Successfully login!']);
            } else {
                return response()->json(['status' => 500, 'message' => 'Account not found. Please check your Username/Email address and try again.']);
            }
        } catch (\Exception $exception) {
            createLog('admin login post : exception');
            createLog($exception);
            return response()->json(['status' => 500, 'message' => 'Oops...Something went wrong! Please contact to support team']);
        }
    }

    function logout()
    {
        try {
            Auth::logout();
            return response()->json(['status' => 200, 'message' => 'Successfully logout!']);
        } catch (\Exception $exception) {
            createLog('admin logout : exception');
            createLog($exception);
            return response()->json(['status' => 500, 'message' => 'Oops...Something went wrong! Please contact to support team']);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAdminRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAdminRequest $request, Admin $admin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Admin $admin)
    {
        //
    }
}
