<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class UpdateAdminRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
            "name"=>'required|string|min:3|max:45',
            "email"=>'required|email|unique:admins,email,' . $this->admin->id,
            "mobile"=>'required|numeric|unique:admins,mobile,' . $this->admin->id,
            "password"=>'nullable|string|min:8|max:30|confirmed',

            "role_id"=>'required|integer|exists:roles,id',
            "status"=>'required|boolean',
        ];
    }
}
