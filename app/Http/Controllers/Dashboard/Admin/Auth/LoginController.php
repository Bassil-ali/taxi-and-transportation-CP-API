<?php

namespace App\Http\Controllers\Dashboard\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminLoginRequest;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class LoginController extends Controller
{
    //
    public function showLogin(): View
    {
        return view('auth.login');

    }//end of showLogin

    function login(AdminLoginRequest $request)
    {
        $credentials = ['email' => $request->validated('email'), 'password' => $request->validated('password')];

        if (auth()->guard('admin')->attempt($credentials)) {
            
            return response()->json([
                'message' => 'Logged in successfully'
            ], Response::HTTP_OK);

        } else {

            return response()->json([
                'message' => "Error credentials, check and try again"
            ], Response::HTTP_BAD_REQUEST);

        }//check auth

    }//end of login store

    public function logout(Request $request): RedirectResponse
    {
        auth('admin')->logout();

        return redirect()->route('dashboard.admin.login.index');

    }//end if logout

}//end of controller