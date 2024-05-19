<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAdRequest;
use App\Http\Requests\UpdateAdRequest;
use App\Models\Ad;
use App\Models\Category;
use App\Models\City;
use App\Models\Proposal;
use App\Models\Region;
use App\Models\TransportType;
use App\Models\Trip;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\Response;


class AdController extends Controller
{

    public static function routeName()
    {
        return Str::kebab("ads");
    }
    public function __construct(Request $request)
    {
        parent::__construct($request);
        $this->authorizeResource(Ad::class, Str::snake("Ad"));
    }
    public function index(Request $request)
    {
        $ads = Ad::with(['category', 'user'])->search($request)->sort($request)->paginate(15);

        return response()->view('ads.index', compact('ads'));
    }

    public function create()
    {

        $cities = City::where('status', 1)->get();
        $regions = Region::where('status', 1)->get();
        $customers = User::where('type', 1)->get(['id', 'name']);
        $categories = Category::where('status', 1)->get();
        $transport_types = TransportType::where('status', 1)->get();
        return response()->view('ads.create', compact('cities', 'regions', 'customers', 'categories', 'transport_types'));
    }


    public function store(StoreAdRequest $request)
    {

        $ad = Ad::create($request->validated());

        return response()->json(['message' => $ad ? 'Created Successfully' : 'Failed To Create'], $ad ? Response::HTTP_CREATED : Response::HTTP_BAD_REQUEST);
    }

    public function show(Request $request, Ad $ad)
    {

        $ad = Ad::where('id', $ad->id)->with(['category', 'user', 'transport_type', 'from_city', 'to_city', 'from_region', 'to_region'])->first();
        $proposals = Proposal::where('ad_id', $ad->id)->with(['user'])->paginate(15);
        $trips = Trip::where('ad_id', $ad->id)->with('customer')->paginate(15);

        return response()->view('ads.show', compact('ad', 'proposals', 'trips'));
    }

    public function edit(Ad $ad)
    {

        $cities = City::where('status', 1)->get();
        $regions = Region::where('status', 1)->get();
        $customers = User::where('type', 1)->get(['id', 'name']);
        $categories = Category::where('status', 1)->get();
        $transport_types = TransportType::where('status', 1)->get();

        return response()->view('ads.edit', compact('ad', 'cities', 'regions', 'customers', 'categories', 'transport_types'));
    }

    public function update(UpdateAdRequest $request, Ad $ad)
    {

        $ad->update($request->validated());

        return response()->json(['message' => $ad ? 'Updated Successfully' : 'Failed To Updated'], $ad ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST);
    }

    public function destroy(Request $request, Ad $ad)
    {
        // $deleted = $ad->delete();

        // if ($deleted) {
        //     return response()->json(['title' => 'Deleted!', 'message' => ' Deleted Successfully', 'icon' => 'success'], Response::HTTP_OK);
        // } else {
        //     return response()->json(['title' => 'Failed!', 'message' => 'Delete Failed', 'icon' => 'error'],  Response::HTTP_BAD_REQUEST);
        // }
    }
}
