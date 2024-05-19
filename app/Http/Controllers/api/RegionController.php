<?php

namespace App\Http\Controllers\api;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRegionRequest;
use App\Http\Requests\UpdateRegionRequest;
use App\Http\Resources\RegionResource;
use App\Models\Region;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use Illuminate\Support\Facades\Validator;

class RegionController extends Controller
{

    public static function routeName(){
        return Str::snake("regions");
    }
    public function __construct(Request $request){
        parent::__construct($request);
        // $this->authorizeResource(Region::class,Str::snake("Region"));
    }
    public function index(Request $request)
    {
        return RegionResource::collection(Region::search($request)->sort($request)->paginate($this->pagination));
    }

}
