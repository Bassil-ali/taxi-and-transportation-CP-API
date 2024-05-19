<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTripRequest extends FormRequest
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
            'customer_id'=>'required|exists:users,id',

            'company_id'=>'nullable|exists:users,id',
            'driver_id'=>'nullable|exists:users,id',

            'price'       =>'required|numeric|min:1',

            'from_city_id'  =>'required|exists:cities,id',
            'from_region_id'=>'required|exists:regions,id',

            'to_city_id'    =>'required|exists:cities,id',
            'to_region_id'  =>'required|exists:regions,id',


            'go_time'       =>'nullable|date_format:H:i',
            'date'        => 'required|date',

            'status'        => 'required|in:0,1,2,3,4',

        ];
    }
}
