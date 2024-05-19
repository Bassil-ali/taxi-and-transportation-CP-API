<?php

namespace App\Http\Controllers\api;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProposalRequest;
use App\Http\Requests\UpdateProposalRequest;
use App\Http\Resources\ProposalResource;
use App\Models\Proposal;
use App\Models\Notification;
use App\Models\User;
use App\Models\Ad;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Controllers\NotificationController;

use Illuminate\Support\Facades\Validator;

class ProposalController extends Controller
{

    public static function routeName(){
        return Str::snake("proposals");
    }
    public function __construct(Request $request){
        // parent::__construct($request);
        $this->authorizeResource(Proposal::class,Str::snake("Proposal"));
    }
    public function index(Request $request)
    {
        return ProposalResource::collection(Proposal::search($request)->sort($request)->with(['ad'])->paginate($this->pagination));
    }
    public function store(StoreProposalRequest $request)
    {
        $proposal = Proposal::create($request->validated());
        $ad  = Ad::find( $request->validated('ad_id')) ;
try {

   $user = User::find($ad->user_id) ;
       NotificationController::addNotification("تم إضافة عرض سعر على إعلانك"." : ". $ad->title,$user->id,$ad->id, 1,"proposal" ,[] );
      $tokens = array();
      array_push($tokens, $user->token_firebase);
      NotificationController::pushNotification($tokens,"تم إضافة عرض سعر على إعلانك"." : ". $ad->title,"تم إضافة عرض سعر على إعلانك"." : ". $ad->title);

} catch (\Exception $e) {

    
}
       

        return (new ProposalResource($proposal))->additional(['status' => true]);
    }
    public function show(Request $request,Proposal $proposal)
    {
        return new ProposalResource($proposal);
    }
    public function update(UpdateProposalRequest $request, Proposal $proposal)
    {
        $proposal->update($request->validated());
        return (new ProposalResource($proposal))->additional(['status' => true]);
    }
    public function destroy(Request $request,Proposal $proposal)
    {
        $proposal->delete();
        return new ProposalResource($proposal);
    }
}
