<?php

namespace App\Http\Controllers\api;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSystemSettingRequest;
use App\Http\Requests\UpdateSystemSettingRequest;
use App\Http\Resources\SystemSettingResource;
use App\Models\SystemSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use Illuminate\Support\Facades\Validator;

class SystemSettingController extends Controller
{

    public static function routeName(){
        return Str::kebab("SystemSettings");
    }
    public function __construct(Request $request){
        parent::__construct($request);
        // $this->authorizeResource(SystemSetting::class,Str::snake("SystemSetting"));
    }
    public function index(Request $request)
    {
        return SystemSettingResource::collection(SystemSetting::search($request)->sort($request)->get());
    }

}
