<?php

namespace App\Http\Request\Admin\Auth;

use Illuminate\Foundation\Http\FormRequest;
use App\Http\Rules\CheckCurrentPassword;

class PasswordAdmin extends FormRequest
{
    public function authorize(): bool
    {
        return true;

    }//end of authorize

    public function rules(): array
    {
        $rules = [
            'current_password'      => ['required', new CheckCurrentPassword,'string','min:2','max:255'],
            'new_password'          => ['required', 'string','min:2','max:255'],
            'password_confirmation' => ['required', 'same:new_password', 'string','min:2','max:255'],
        ];

        return $rules;

    }//end of rules

    public function attributes(): array
    {
        return [
            'current_password'      => trans('admin.auth.current_password'),
            'new_password'          => trans('admin.auth.new_password'),
            'password_confirmation' => trans('admin.auth.password_confirmation'),
        ];

    }//end of attributes

}//end of Request