<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAdminRequest extends FormRequest
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
            "email"=>'required|email|unique:admins',
            "mobile"=>'required|numeric|unique:admins',
            "password"=>'required|string|min:8|max:30|confirmed',
            "role_id"=>'required|integer|exists:roles,id',
            "status"=>'required|boolean',
        ];
    }
}
