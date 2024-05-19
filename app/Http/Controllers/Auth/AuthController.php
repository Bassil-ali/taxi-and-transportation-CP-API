<?php

namespace App\Http\Controllers\Auth;

use App\Helpers\Messages;
use App\Http\Controllers\Controller;
use App\Http\Requests\AdminLoginRequest;
use App\Http\Requests\UpdateAdminPassword;
use App\Http\Requests\UpdateAdminProfile;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //
    public function showLogin()
    {
        return response()->view('auth.login');

    }//end of showLogin

    function login(AdminLoginRequest $request)
    {
        $credentials = ['email' => $request->validated('email'), 'password' => $request->validated('password')];

        if (auth()->guard('admin')->attempt($credentials)) {
            
            session()->flash('success', __('admin.global.login_successfully'));

            return response()->json([
                'message' => 'Logged in successfully'
            ], Response::HTTP_OK);

        } else {

            return response()->json([
                'message' => "Error credentials, check and try again"
            ], Response::HTTP_BAD_REQUEST);

        }//check auth

    }//end of login store


    public function editProfile()
    {
        $user = auth()->user();

        return response()->view('auth.edit-profile', compact('user'));

    }//end of edit page

    public function updateProfile(UpdateAdminProfile $request)
    {
        $user = auth()->user();
        $updated = $user->update($request->validated());

        if ($updated) {

            return response()->json(['title' =>  Messages::getMessage('SUCCESS') , 'message' =>   Messages::getMessage('UPDATE_SUCCESS'), 'icon' => 'success'], Response::HTTP_OK);

        } else {

            return response()->json(['title' => Messages::getMessage('FAILED') , 'message' =>   Messages::getMessage('UPDATE_FAILED'), 'icon' => 'error'],  Response::HTTP_BAD_REQUEST);

        }//end of if

    }//end of update Profile


    public function editPassword()
    {
        $user = auth()->user();

        return response()->view('auth.edit-password', compact('user'));

    }//end pf edit password


    public function updatePassword(UpdateAdminPassword $request)
    {
        $user = auth()->user();

        if(Hash::check($request->validated(['current_password']) , $user->password)){
            
            $user->update([
                'password' => bcrypt($request->validated(['password'])) 
            ]);

            return response()->json(['message' => ['تم التعديل بنجاح']] , 200);

        }//end of chack password and update

        return response()->json([
            'message' => ["فشل التعديل , يرجى التحقق من كلمة المرور الحالية"]
        ], Response::HTTP_BAD_REQUEST);


    }//end of update password

    public function logout(Request $request)
    {
        auth()->guard('admin')->logout();
        $request->session()->invalidate();

        return redirect()->route('login-view');

    }//end if logout

}//end of controller