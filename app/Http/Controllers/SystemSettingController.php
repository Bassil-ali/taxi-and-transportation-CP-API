<?php

namespace App\Http\Controllers;
use App\Http\Requests\StoreSystemSettingRequest;
use App\Http\Requests\UpdateSystemSettingRequest;
use App\Models\SystemSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\Response;


class SystemSettingController extends Controller
{


    public function __construct(Request $request){
        parent::__construct($request);
        // $this->authorizeResource(SystemSetting::class,Str::snake("SystemSetting"));
    }
    public function index(Request $request)
    {
        $this->authorize('Settings-Update');

        $SystemSettings = SystemSetting::search($request)->sort($request)->paginate(15);

        return response()->view('', compact('SystemSettings'));

    }


    public function edit(){
        $this->authorize('Settings-Update');

        $settings = SystemSetting::all();
         return response()->view('system_settings.edit', compact('settings'));

    }

    public function update(UpdateSystemSettingRequest $request)
    {
        $this->authorize('Settings-Update');

        SystemSetting::where('key' , 'commission')->update(['value' => $request->validated('commission') ]);
        SystemSetting::where('key' , 'currency')->update(['value' => $request->validated('currency') ]);

        return response()->json(['message' =>  'Updated Successfully' ],  Response::HTTP_OK );

    }


}
