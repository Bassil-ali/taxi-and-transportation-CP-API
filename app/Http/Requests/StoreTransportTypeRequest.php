<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTransportTypeRequest extends FormRequest
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
            "name_ar"=>'required|string|min:3|max:30|unique:transport_types',
            "name_en"=>'nullable|string|min:3|max:30|unique:transport_types',
            "status"=>'required|boolean',
        ];
    }
}
