<?php

namespace App\Http\Controllers;

use App\Helpers\Messages;
use App\Http\Requests\StoreRegionRequest;
use App\Http\Requests\UpdateRegionRequest;
use App\Models\City;
use App\Models\Region;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\Response;


class RegionController extends Controller
{

    public static function routeName()
    {
        return Str::snake("regions");
    }
    public function __construct(Request $request)
    {
        parent::__construct($request);
        $this->authorizeResource(Region::class,Str::snake("Region"));
    }
    public function index(Request $request)
    {
        $regions = Region::with(['city'])->search($request)->sort($request)->paginate(15);

        return response()->view('regions.index', compact('regions'));
    }

    public function create()
    {
        $cities = City::where('status', 1)->get();
        return response()->view('regions.create', compact('cities'));
    }


    public function store(StoreRegionRequest $request)
    {
        $region = Region::create($request->validated());

        return response()->json(['message' => $region ? 'Created Successfully' : 'Failed To Create'], $region ? Response::HTTP_CREATED : Response::HTTP_BAD_REQUEST);
    }

    public function show(Request $request, Region $region)
    {
        return response()->view('', compact('region'));
    }

    public function edit(Region $region)
    {
        $cities = City::where('status', 1)->get();

        return response()->view('regions.edit', compact('region', 'cities'));
    }

    public function update(UpdateRegionRequest $request, Region $region)
    {
        $region->update($request->validated());

        return response()->json(['message' => $region ? 'Updated Successfully' : 'Failed To Updated'], $region ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST);
    }

    public function destroy(Request $request, Region $region)
    {


        if ($region->from_ads()->exists()  || $region->to_ads()->exists()) {
            return response()->json(['title' => Messages::getMessage('FAILED'), 'message' =>   Messages::getMessage('DELETE_FAILED'), 'icon' => 'error'],  Response::HTTP_BAD_REQUEST);
        }



        $deleted = $region->delete();

        if ($deleted) {
            return response()->json(['title' => 'Deleted!', 'message' => ' Deleted Successfully', 'icon' => 'success'], Response::HTTP_OK);
        } else {
            return response()->json(['title' => 'Failed!', 'message' => 'Delete Failed', 'icon' => 'error'],  Response::HTTP_BAD_REQUEST);
        }
    }
}
