<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTransportTypeRequest;
use App\Http\Requests\UpdateTransportTypeRequest;
use App\Http\Resources\TransportTypeResource;
use App\Models\TransportType;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class TransportTypeController extends Controller
{
    public static function routeName()
    {
        return str()->snake("transport-types");

    }//end of route name

    public function __construct(Request $request)
    {
        parent::__construct($request);
        // $this->authorizeResource(TransportType::class,Str::snake("TransportType"));
    }//end of __construct

    public function index(Request $request)
    {
        return TransportTypeResource::collection(TransportType::search($request)->paginate($this->pagination));

    }//end of index

}//end of controller