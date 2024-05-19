<?php

namespace App\Http\Controllers\Dashboard\Admin\Auth;

use App\Helpers\Messages;
use App\Http\Controllers\Controller;
use App\Http\Request\Admin\Auth\PasswordAdmin;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class PasswordController extends Controller
{
    public function edit(): View
    {
        return view('dashboard.admin.auth.accounts.edit_password');

    }//end pf edit password


    public function update(PasswordAdmin $request): RedirectResponse
    {
        $admin = auth()->user();

        $admin->update([
            'password' => request('new_password') 
        ]);

        session()->flash('success', __('admin.global.updated_successfully'));

        return redirect()->back();

    }//end of update password

}//end of controller