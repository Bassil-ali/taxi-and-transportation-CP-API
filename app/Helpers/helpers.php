<?php

use \Illuminate\Database\Eloquent\Collection;


if (!function_exists('permission_admin')) {
    function permissionAdmin($permission = '')
    {

        if (auth('admin')->check()) {
            return auth('admin')->user()->can($permission);
        }
        return false;

    }//en dof fun

}//end of exists

if (!function_exists('alertNoty')) {
    function alertNoty($type = 'success', $message = 'success')
    {
        if ($type == 'success') {

            $message = trans('admin.success');

        } elseif($type == 'error') {

            $message = trans('admin.error');

        } elseif($type == 'delete') {

            $message = trans('admin.delete');

        }elseif($type == 'create') {

            $message = trans('admin.create');

        } elseif($type == 'update') {

            $message = trans('admin.update');

        } elseif($type == 'status') {

            $message = trans('admin.status');

        } else {

            $message = trans($message);

        }//end of if

        return
                "new Noty({
                    theme: 'relax',
                    type: 'notification',
                    layout: 'topRight',
                    text: ' " . $message . " ',
                    timeout: 3000,
                    killer: true,
                }).show();
            ";

    }//en dof fun

}//end of exists

if (!function_exists('getLanguages')) {

    function getLanguages($default = false)
    {
        if($default) {
            return \App\Models\Language::where('default' , 1)->first();
        }
        return \App\Models\Language::all();

    }//en dof fun

}//end of exists

//////////////////////////////// Setting //////////////////////

 if(!function_exists('getSetting')) {
    
    function getSetting($key)
    {
        $setting = \App\Models\Setting::where('key', $key)->first();
        if($setting) {
            return $setting->value;
        } else {
            $setting = \App\Models\Setting::create(['key' => $key]);
            return '';
        }

    }//en dof fun

 }//end of getSetting

 if(!function_exists('saveSetting')) {
    
    function saveSetting($key, $value = '')
    {
        $setting = \App\Models\Setting::where('key', $key)->first();
        if(!$setting) {
            return $setting = \App\Models\Setting::create(['key' => $key, 'value' => $value]);
        }
        return $setting->update(['value' => $value]);

    }//en dof fun

 }//end of getSetting

 if(!function_exists('getImageSetting')) {
    
    function getImageSetting($key)
    {
        if (empty(getSetting($key))) {
            return asset('assets/images/default.png');    
        }

        return asset('storage/' . getSetting($key));

    }//en dof fun

 }//end of getImageSetting

 if(!function_exists('getTransSetting')) {
    
    function getTransSetting($key, $lang)
    {
        $setting = \App\Models\Setting::where('key', $key)->first();
        if($setting) {
            if(!empty(json_decode($setting->value, true)[$lang])) {
                return json_decode($setting->value, true)[$lang];
            } else {
                return json_decode($setting->value, true)[app()->getLocale()] ?? '';
            }
        } else {
            $setting = \App\Models\Setting::create(['key' => $key]);
            return '';
        }

    }//en dof fun

 }//end of getTransSetting

 if(!function_exists('saveTransSetting')) {
    
    function saveTransSetting($key, $value)
    {
        $setting = \App\Models\Setting::where('key', $key)->first();
        if(!$setting) {
            $setting = \App\Models\Setting::create(['key' => $key, 'value' => $value]);  
        } 
        $setting->update(['value' => $value]);

    }//en dof fun

 }//end of getTransSetting

 if(!function_exists('getMulteSetting')) {
    
    function getMulteSetting($key, $name, $index, $lang)
    {
        $setting = \App\Models\Setting::where('key', $key)->first();

        if($setting) {

            if(!empty(json_decode(getSetting($key), true)[$name][$index][$lang])) {

                return json_decode(getSetting($key), true)[$name][$index][$lang];

            } else {

                return false;
            }

        } else {

            $setting = \App\Models\Setting::create(['key' => $key]);

            return '';

        }//end of if

    }//en dof fun

 }//end of getMulteSetting

  if(!function_exists('getTagsSetting')) {
    
    function getTagsSetting($key, $lang)
    {
        $setting = \App\Models\Setting::where('key', $key)->first();

        if($setting) {

            if(!empty(json_decode(getSetting($key), true)[$lang])) {

                $items = json_decode(json_decode(getSetting($key), true)[$lang], true) ?? [];
                $tags  = [];

                foreach ($items as $key => $item) {

                    array_push($tags, $item['value']);

                }//end of foreach

                $tags = str_replace(['"', '[', ']'], '', json_encode(array_values($tags)));
                $tags = str_replace(',', ', ', $tags);

                return $tags;

            } else {

                return false;
                
            }//end of check $key setting

        } else {

            $setting = \App\Models\Setting::create(['key' => $key]);

            return '';

        }//end of if

    }//en dof fun

 }//end of getMulteSetting

if(!function_exists('adminAction')) {

     function adminAction($actionName, $permissions = [], $model = [], $nameRoute = '')
     {
        $actions = [
            'edit'  => [
                'route'       => route('dashboard.admin.' . $nameRoute . '.edit', $model->id) ?? '',
                'permissions' => $permissions['update'] ?? false,
            ],
            'delete'  => [
                'route'       => route('dashboard.admin.' . $nameRoute . '.destroy', $model->id) ?? '',
                'permissions' => $permissions['delete'] ?? false,
            ],
            'show'  => [
                'route'       => route('dashboard.admin.' . $nameRoute . '.show', $model->id) ?? '',
                'permissions' => $permissions['show'] ?? false,
            ]
        ];

        return view('components.dashboard.admin.data-table.btn.actions', compact('actions'));
             
     }//end of fun

 }//end of adminAction

 if(!function_exists('adminBadge')) {

    function adminBadge($value = '', $class = '')
    {
        return <<<HTML
                    <span class="badge badge-light-success">$value</span>
                HTML;

    }//end of fun

}//end of adminAction