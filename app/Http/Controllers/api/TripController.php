<?php

namespace App\Http\Controllers\api;

use App\Helpers\Messages;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTripRequest;
use App\Http\Requests\UpdateTripRequest;
use App\Http\Resources\TripResource;
use App\Models\Trip;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Controllers\NotificationController;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class TripController extends Controller
{

    public static function routeName(){
        return Str::snake("trips");
    }
    public function __construct(Request $request){
        parent::__construct($request);
        // $this->authorizeResource(Trip::class,Str::snake("Trip"));
    }
    public function index(Request $request)
    {

        return(TripResource::collection(Trip::search($request)->sort($request)->paginate($this->pagination)))->additional(['status' => true]);
    }
    public function store(StoreTripRequest $request)
    {
        // $trip = Trip::create($request->validated());

        // return new TripResource($trip);
    }
    public function show(Request $request,Trip $trip)
    {

        return new TripResource($trip);
    }
    public function update(UpdateTripRequest $request, Trip $trip)
    {
        $trip->update($request->validated());

        return (new TripResource($trip))->additional(['status' => true]);
    }
    public function destroy(Request $request,Trip $trip)
    {
        // $trip->delete();
        // return new TripResource($trip);
    }


    public function UpdateStatus(Request $request,Trip $trip)
    {

        if($trip->status == 0 || $trip->status == 4 ){
            return response()->json([
                'status'  =>   false,
                'message' =>Messages::getMessage('UNAUTHORISED')
            ], Response::HTTP_UNAUTHORIZED);
        }
        $validator= $request->validate([
            'status' => 'required|in:0,2,3,4',
        ]);

        $trip->update(['status' => $request->input('status')]);
     // NotificationController::addNotification("تم تغير حالة الرحلة", $trip->customer_id,$trip->ad_id, 1,"CompanyDriver",[] );

    
        return (new TripResource($trip))->additional(['status' => true]);
    }


    public function UpdateCompanyDriver(Request $request,Trip $trip)
    {
        $auth_user = auth()->user('user-api');

        $request->validate([
            'employee_id' => 'required|exists:users,id',
        ]);

        $employee = User::find($request->input('employee_id'));
        if($trip->company_id == $auth_user->id && $employee->parent_id == $auth_user->id  && $employee->type == User::EMPLOYEE ){

            $trip->update(['driver_id' => $employee->id ]);
            
        NotificationController::addNotification("تم منحك رحلة جديد", $trip->driver_id,$trip->ad_id, 1,"CompanyDriver",[] );

            
            return response()->json(['status'   => true , 'message' =>Messages::getMessage('UPDATE_SUCCESS')]);
        }
        return response()->json([
            'status'  =>   false,
            'message' =>Messages::getMessage('UNAUTHORISED')
        ], Response::HTTP_UNAUTHORIZED);



        // $trip->update(['status' => $request->input('status')]);
        // return new TripResource($trip);
    }


}

