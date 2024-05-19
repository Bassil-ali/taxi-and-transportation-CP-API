<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
            'type'       => 'required|integer|in:1,2,3,4',  // 1 = customer , 2 = driver , 3 = company 4 =Employee
            'parent_id'   => 'nullable|integer|exists:users,id|required_if:type,4',
            'name'       => 'required|string|min:3|max:45',
            'email'      => 'required|email|unique:users,email,'.$this->user->id,
            'mobile'     => 'required|numeric|unique:users,mobile,'.$this->user->id,
            'status'     => 'required|boolean',
            'city_id'        =>'required|exists:cities,id',
            'id_number'         => 'nullable|numeric|unique:users,id_number,'.$this->user->id,
            'password'   => 'nullable|string|min:6|max:20|confirmed',

            'vehicle_type'      => 'nullable|string|min:3|max:50',
            'vehicle_color'     => 'nullable|string|min:3|max:40',
            'plate_number'      => 'nullable|string',
            'seats_numbers'     => 'nullable|integer|min:1|max:200',
        ];
    }
}
