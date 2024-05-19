<?php

namespace App\Http\Controllers\api;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCityRequest;
use App\Http\Requests\UpdateCityRequest;
use App\Http\Resources\CityResource;
use App\Models\City;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use Illuminate\Support\Facades\Validator;

class CityController extends Controller
{

    public static function routeName(){
        return Str::snake("cities");
    }
    public function __construct(Request $request){
        parent::__construct($request);
        // $this->authorizeResource(City::class,Str::snake("City"));
    }
    public function index(Request $request)
    {
        return CityResource::collection(City::search($request)->sort($request)->paginate($this->pagination));
    }

}
