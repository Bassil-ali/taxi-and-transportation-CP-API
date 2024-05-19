<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEmployeeRequest extends FormRequest
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
            'name'              => 'required|string|min:3|max:45',
            'email'             => 'required|email|unique:users,email,'.$this->employee->id,
            'mobile'            => 'required|numeric|unique:users,mobile,'.$this->employee->id,
            'id_number'         => 'nullable|numeric|unique:users,id_number',
            'vehicle_type'      => 'nullable|string|min:3|max:50',
            'vehicle_color'     => 'nullable|string|min:3|max:40',
            'plate_number'       => 'nullable|numeric',
            'city_id'             =>'required|exists:cities,id',
        ];
    }
}
