<?php

namespace App\Http\Request\Admin\App\Location\Region;

use Illuminate\Foundation\Http\FormRequest;
use CodeZero\UniqueTranslation\UniqueTranslationRule;
use Illuminate\Validation\Rule;

class RegionRequest extends FormRequest
{

    public function authorize(): bool
    {
        if (in_array(request()->method(), ['PUT', 'PATCH'])) {
            
            return permissionAdmin('update-regions');

        } else {

            return permissionAdmin('create-regions');

        }//end of if

    }//end of authorize

    public function rules(): array
    {
        $rules = [
            'status'  => ['nullable', 'in:1,0'],
            // 'city_id' => ['required','string','exists:regions,id'],
        ];

        if (in_array(request()->method(), ['PUT', 'PATCH'])) {
            
            $region = request()->route()->parameter('region');

            $rules['name.*']  = ['required','string','min:2','max:50', UniqueTranslationRule::for('regions', 'name')->ignore($region?->id)];

        } else {

            $rules['name.*'] = ['required','string','min:2','max:50', UniqueTranslationRule::for('regions', 'name')];

        } //end of if

        return $rules;

    }//end of rules

    public function attributes(): array
    {
        $rules = [];

        foreach(getLanguages() as $language) {

            $rules['name.' . $language->code] = trans('admin.global.by', ['name' => trans('admin.global.name'), 'lang' => $language->name]);
        }


        return $rules;

    }//end of attributes

    protected function prepareForValidation()
    {
        return request()->merge([
            'admin_id' => auth('admin')->id(),
            'city_id'  => (int) request('city_id'),
            'slug'     => str()->slug(request()->name[getLanguages('default')->code] ?? '', '-'),
            'status'   => request()->has('status'),
        ]);

    }//end of prepare for validation

}//end of class