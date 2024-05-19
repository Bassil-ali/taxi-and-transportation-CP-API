<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProfileRequest extends FormRequest
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
            'email'             => 'required|email|unique:users,email,'.$this->user()->id,
            'mobile'            => 'required|numeric|unique:users,mobile,'.$this->user()->id,
            'id_number'         => 'sometimes|numeric|unique:users,id_number,'.$this->user()->id,
            'vehicle_type'      => 'sometimes|string|min:3|max:50|',
            'vehicle_color'     => 'sometimes|string|min:3|max:40|',
            'plate_number'      => 'sometimes|string',
            'seats_numbers'     => 'sometimes|integer|min:1|max:200',
            'city_id'        =>'required|exists:cities,id',
            'image'             => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048'


            // 'seates_numbers'    => 'nullable|numeric|',Rule::requiredIf(auth()->user()->type == 4),
        ];
    }
}
