<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'type'       => 'required|integer|in:1,2,3',  // 1 = customer , 2 = driver , 3 = company
            'name'       => 'required|string|min:3|max:45',
            'email'      => 'required|email|unique:users,email',
            'mobile'     => 'required|numeric|unique:users,mobile',
            'seats_numbers'    => 'sometimes|integer|min:1|max:200',
            'password'   => 'required|string|min:6|max:20|confirmed',
            // 'id_number'  => 'nullable|numeric|unique:users,id_number',

        ];
    }
}
