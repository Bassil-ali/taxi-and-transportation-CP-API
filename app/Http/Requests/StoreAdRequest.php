<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAdRequest extends FormRequest
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
        // dd($this->go_time);
        return [
            //
            "title"  => 'required|string|min:3|max:70',
            'category_id' => 'required|exists:categories,id',
            'user_id'           => 'sometimes|exists:users,id',

            'from_city_id'  => 'required|exists:cities,id',
            'from_region_id' => 'required|exists:regions,id',
            'from_lat'      => 'nullable|between:-90,90',
            'from_long'     => 'nullable|between:-180,180',

            'to_city_id'    => 'required|exists:cities,id',
            'to_region_id'  => 'required|exists:regions,id',
            'to_lat'        => 'nullable|between:-90,90',
            'to_long'       => 'nullable|between:-180,180',

            'people_number' => 'required|integer|min:1|max:200',
            'go_time'       => 'required|date_format:H:i',
            'return_time'   => 'nullable|date_format:H:i',

            'duration'          => 'required|integer|in:1,2,3', //1-immediately   2-weekly   3-monthly
            'communication'     => 'required|integer|in:1,2',   // 1-mobile  2-email
            'service_provider'  => 'required|integer|in:1,2',   // 1-Company  2-Driver
            'gender'            => 'required|integer|in:1,2,3',   // 1-Male  2-Female 3-both

            'distance'    => 'required|numeric',
            'estimated_time'      => 'required|integer',  


            'price'       => 'nullable|numeric|min:1',
            'notes'       => 'nullable|string|min:3|max:250',

            'transport_type_id' => 'required|exists:transport_types,id',
            'start_date'        => 'required|date',
            "days"              => 'nullable|json',

        ];
    }
}
