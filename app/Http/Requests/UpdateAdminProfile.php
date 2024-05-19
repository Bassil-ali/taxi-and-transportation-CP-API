<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAdminProfile extends FormRequest
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
            "email"=>'required|email|unique:admins,email,' . auth()->user()->id,
            "mobile"=>'required|numeric|unique:admins,mobile,' . auth()->user()->id,

        ];
    }
}
