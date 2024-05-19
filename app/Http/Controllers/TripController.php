<?php

namespace App\Http\Controllers;

use App\Helpers\Messages;
use App\Http\Requests\StoreTripRequest;
use App\Http\Requests\UpdateTripRequest;
use App\Models\City;
use App\Models\Region;
use App\Models\Trip;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\Response;


class TripController extends Controller
{

    public static function routeName(){
        return Str::snake("trips");
    }
    public function __construct(Request $request){
        parent::__construct($request);
        $this->authorizeResource(Trip::class,Str::snake("Trip"));
    }
    public function index(Request $request)
    {
        $trips = Trip::with(['customer','company','driver'])->search($request)->sort($request)->paginate(15);

        return response()->view('trips.index', compact('trips'));

    }

    public function create (){

        $cities = City::where('status' , 1)->get();
        $regions = Region::where('status' , 1)->get();
        $customers = User::where('type' , 1)->get(['id' , 'name']);

        $drivers = User::where('type' , 2)->get(['id' , 'name']);
        $companies = User::where('type' , 3)->get(['id' , 'name']);

         return response()->view('trips.create',compact( 'cities' , 'regions' , 'customers' ,'companies' , 'drivers'));

    }


    public function store(StoreTripRequest $request)
    {
        $trip = Trip::create($request->validated());

          return response()->json(['message' => $trip ? 'Created Successfully' : 'Failed To Create'], $trip ? Response::HTTP_CREATED : Response::HTTP_BAD_REQUEST);

    }

    public function show(Request $request,Trip $trip)
    {
         return response()->view('trips.show', compact('trip'));
    }

    public function edit(Trip $trip){
        $cities = City::where('status' , 1)->get();
        $regions = Region::where('status' , 1)->get();
        $customers = User::where('type' , 1)->get(['id' , 'name']);

        $drivers = User::where('type' , 2)->get(['id' , 'name']);
        $companies = User::where('type' , 3)->get(['id' , 'name']);

         return response()->view('trips.edit', compact('trip' , 'cities' , 'regions' , 'customers' , 'drivers' , 'companies'));

    }

    public function update(UpdateTripRequest $request, Trip $trip)
    {

        $trip->update($request->validated());

         return response()->json(['message' => $trip ? 'Updated Successfully' : 'Failed To Updated'], $trip ?Response::HTTP_OK : Response::HTTP_BAD_REQUEST);
    }

    public function destroy(Request $request,Trip $trip)
    {

        if( $trip->financialMovement()->exists() ){
            return response()->json(['title' => Messages::getMessage('FAILED'), 'message' =>   Messages::getMessage('DELETE_FAILED'), 'icon' => 'error'],  Response::HTTP_BAD_REQUEST);
        }


        $deleted = $trip->delete();

        if ($deleted) {
            return response()->json(['title' => 'Deleted!', 'message' => ' Deleted Successfully', 'icon' => 'success'], Response::HTTP_OK);
        } else {
            return response()->json(['title' => 'Failed!', 'message' => 'Delete Failed', 'icon' => 'error'],  Response::HTTP_BAD_REQUEST);
        }
    }
}
