<?php

namespace App\Http\Controllers\api;

use App\Helpers\Messages;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProposalAcceptedAdRequest;
use App\Http\Requests\UpdateProposalAcceptedAdRequest;
use App\Http\Resources\ProposalAcceptedAdResource;
use App\Models\Ad;
use App\Models\Proposal;
use App\Models\ProposalAcceptedAd;
use App\Models\User;
use App\Models\Notification;
use App\Http\Controllers\NotificationController;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class ProposalAcceptedAdController extends Controller
{

    public static function routeName(){
        return Str::kebab("ProposalAcceptedAds");
    }
    public function __construct(Request $request){
        parent::__construct($request);
        // $this->authorizeResource(ProposalAcceptedAd::class,Str::snake("ProposalAcceptedAd"));
    }
    public function index(Request $request)
    {
        return ProposalAcceptedAdResource::collection(ProposalAcceptedAd::search($request)->sort($request)->paginate($this->pagination));
    }
    public function store(StoreProposalAcceptedAdRequest $request)
    {
        $ad         = Ad::find( $request->validated('ad_id')) ;
        $proposal   = Proposal::find($request->validated('proposal_id')) ;
        if($proposal->ad_id != $ad->id ){
            return response()->json([
                'status'  =>   false,
                'message' => Messages::getMessage('PROPOSAL_AD_ERROR')
            ],  Response::HTTP_BAD_REQUEST);
        }
        if($ad->user_id != auth()->user()->id){
            return response()->json([
                'status'  =>   false,
                'message' => Messages::getMessage('ACCEPET_AD_ERROR')
            ],  Response::HTTP_BAD_REQUEST);
        }

        $proposalAcceptedAd = ProposalAcceptedAd::create($request->validated());
        NotificationController::addNotification("تم الموافقة على عرضك لإعلان "." : " .$proposal->details, $proposal->user_id,$proposal->ad_id, 1,"ProposalAcceptedAd",[] );
        try {

            $user = User::find($proposal->user_id) ;
           $tokens = array();
           array_push($tokens, $user->token_firebase);

     NotificationController::pushNotification($tokens,"تم الموافقة على عرضك لإعلان "." : " .$proposal->details,"تم الموافقة على عرضك لإعلان "." : " .$proposal->details);

} catch (\Exception $e) {

}
 
     
     
        return (new ProposalAcceptedAdResource($proposalAcceptedAd))->additional(['status' => true]);

    }
    public function show(Request $request,ProposalAcceptedAd $proposalAcceptedAd)
    {
        return new ProposalAcceptedAdResource($proposalAcceptedAd);
    }
    public function update(UpdateProposalAcceptedAdRequest $request, ProposalAcceptedAd $proposalAcceptedAd)
    {
        $proposalAcceptedAd->update($request->validated());

        return new ProposalAcceptedAdResource($proposalAcceptedAd);
    }
        
    public function destroy(Request $request,ProposalAcceptedAd $proposalAcceptedAd)
    {
        $proposalAcceptedAd->delete();
        return new ProposalAcceptedAdResource($proposalAcceptedAd);
    }
}
