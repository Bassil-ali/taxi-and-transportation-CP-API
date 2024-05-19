<?php

namespace App\Http\Controllers\api;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAdRequest;
use App\Http\Requests\UpdateAdRequest;
use App\Http\Resources\AdResource;
use App\Models\Ad;
use App\Models\Category;
use App\Models\City;
use App\Models\SystemSetting;
use App\Models\TransportType;
use App\Models\Notification;
use App\Http\Controllers\NotificationController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class AdController extends Controller
{

    public static function routeName(){
        return Str::snake("ads");
    }
    public function __construct(Request $request){
        parent::__construct($request);
        // $this->authorizeResource(Ad::class,Str::snake("Ad"));
    }

    public function index(Request $request)
    {
        return AdResource::collection(Ad::search($request)->sort($request)->paginate($this->pagination));
    }
    public function store(StoreAdRequest $request)
    {
        $ad = Ad::create($request->validated());

        if($ad){
            if($ad->service_provider == "1"){
            $user = User::where('type',"3")->get();
            }
            if($ad->service_provider == "2"){
            $user = User::where('type',"2")->get();
            }
            $tokens = array();
            foreach ($user as $value) {
            array_push($tokens, $value->token_firebase);
             NotificationController::addNotification($request->title,$value->id,$ad->id, 2,"showAd",[] );
            }
            NotificationController::pushNotification($tokens,$request->title,$request->title);

            
            
            
                       
            return (new AdResource($ad))->additional(['status' => true]);

        }else{
            return response()->json(['status' => false] ,  Response::HTTP_BAD_REQUEST);
        }
    }
    public function show(Request $request,$id)
    {
        $ad = Ad::where('id' , '=' , $id)->with('proposals')->get();

        return (new AdResource($ad))->additional(['status' => true]);
    }

    public function update(UpdateAdRequest $request, Ad $ad)
    {
        $ad->update($request->validated());
        return (new AdResource($ad))->additional(['status' => true]);

    }
    public function destroy(Request $request,Ad $ad)
    {
        // $ad->delete();
        // return new AdResource($ad);
    }

    public function CreateAdView(){
        $cities         = City::where('status' , true)->get();
        $categories     = Category::where('status' , true)->get();
        $transport_types= TransportType::where('status' , true)->get();
        // $commession =    $commission = SystemSetting::find('commission')->value;
        $status = true ;
        return response()->json( compact('status' , 'cities' , 'categories' , 'transport_types'  ));
    }



}
