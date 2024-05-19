<?php

namespace App\Http\Controllers\Dashboard\Admin\Auth;

use App\Http\Request\Admin\Auth\ProfileRequest;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use App\Models\Admin;

class ProfileController extends Controller
{
    public function edit(): View
    {
        $admin = auth()->user();

        return view('dashboard.admin.auth.accounts.edit_profile', compact('admin'));

    }//end of edit page

    public function update(ProfileRequest $request, Admin $admin): RedirectResponse
    {
        $requestData = request()->except(['image']);

        if(request()->has('image')) {

            $admin->image ? Storage::disk('public')->delete($admin->image) : '';

            $requestData['image'] = request()->file('image')->store('admins', 'public');

        }

        session()->flash('success', __('admin.global.updated_successfully'));

        $admin->update($requestData);

        return redirect()->back();
        
    }//end of update

}//end of controller