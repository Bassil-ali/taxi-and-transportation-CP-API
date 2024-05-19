<?php

namespace App\Http\Controllers;

use App\Helpers\Messages;
use App\Http\Requests\StoreProposalAcceptedAdRequest;
use App\Http\Requests\UpdateProposalAcceptedAdRequest;
use App\Models\Ad;
use App\Models\Proposal;
use App\Models\ProposalAcceptedAd;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Notification;
use Symfony\Component\HttpFoundation\Response;


class ProposalAcceptedAdController extends Controller
{

    public static function routeName()
    {
        return Str::kebab("ProposalAcceptedAds");
    }
    public function __construct(Request $request)
    {
        parent::__construct($request);
        // $this->authorizeResource(ProposalAcceptedAd::class, Str::snake("ProposalAcceptedAd"));
    }
    public function index(Request $request)
    {
        // $ProposalAcceptedAds = ProposalAcceptedAd::search($request)->sort($request)->paginate(15);

        // return response()->view('', compact('ProposalAcceptedAds'));
    }

    public function create()
    {

        // return response()->view('');
    }


    public function store(StoreProposalAcceptedAdRequest $request)
    {
        $this->authorize('Ads-Accept-Proposal');

        $ad         = Ad::find($request->validated('ad_id'));
        $proposal   = Proposal::find($request->validated('proposal_id'));
        if ($proposal->ad_id != $ad->id) {
            return response()->json([
                'message' => Messages::getMessage('PROPOSAL_AD_ERROR')
            ],  Response::HTTP_BAD_REQUEST);
        }
        if (auth()->guard('user-api')->check()) {

            if ($ad->user_id != auth()->user()->id) {
                return response()->json([
                    'status'  =>   false,
                ],  Response::HTTP_BAD_REQUEST);
            }
        }

        $proposalAcceptedAd = ProposalAcceptedAd::create($request->validated());
        $user = User::find($proposal->user_id) ;
        $notification = new Notification;
        $notification->title = "تم الموافقة على العرضك"; 
        $notification->user_id = $user->id;
        $notification->ads_id = $ad->id;
        $notification->save();
       
                    $data = json_encode([
"registration_ids" => [
$user->token_firebase
],
        //  "to"=> "/topics/all",
"notification" => [
    "body" => $request->title,
    "title" => $request->title,
      "android_channel_id"=>"app_notification"
],

 

     "data" => [
"page" =>"home",
]
]
);

//FCM API end-point
$url = 'https://fcm.googleapis.com/fcm/send';
//api_key in Firebase Console -> Project Settings -> CLOUD MESSAGING -> Server key
$server_key = 'AAAAYVf1F4U:APA91bHOx5zcsi68hko5dfsE7jlH_5LnDRio1ppxvy7V0PczTOsPjHqGmV1zbNYGY2FH7TmgY8ACKwkAsT81PuRIqiP6WYUFJTvEvTvMSC9nYt5wHp_KH4WuJK-I-h8DB_lE14BbZdIL';
//header with content_type api key
$headers = array(
'Content-Type:application/json',
'Authorization:key='.$server_key
);
//CURL request to route notification to FCM connection server (provided by Google)
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
$result = curl_exec($ch);
if ($result === FALSE) {
die('Oops! FCM Send Error: ' . curl_error($ch));
}
curl_close($ch);

        return response()->json(['message' => Messages::getMessage($proposalAcceptedAd ? 'CREATE_SUCCESS' : 'CREATE_FAILED')], $proposalAcceptedAd ? Response::HTTP_CREATED : Response::HTTP_BAD_REQUEST);
    }

    public function show(Request $request, ProposalAcceptedAd $proposalAcceptedAd)
    {
        // return response()->view('', compact('proposalAcceptedAd'));
    }

    public function edit(ProposalAcceptedAd $proposalAcceptedAd)
    {


        // return response()->view('', compact('proposalAcceptedAd'));
    }

    public function update(UpdateProposalAcceptedAdRequest $request, ProposalAcceptedAd $proposalAcceptedAd)
    {
        // $proposalAcceptedAd->update($request->validated());

        // return response()->json(['message' => $proposalAcceptedAd ? 'Updated Successfully' : 'Failed To Updated'], $proposalAcceptedAd ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST);
    }

    public function destroy(Request $request, ProposalAcceptedAd $proposalAcceptedAd)
    {
        // $deleted = $proposalAcceptedAd->delete();

        // if ($deleted) {
        //     return response()->json(['title' => 'Deleted!', 'message' => ' Deleted Successfully', 'icon' => 'success'], Response::HTTP_OK);
        // } else {
        //     return response()->json(['title' => 'Failed!', 'message' => 'Delete Failed', 'icon' => 'error'],  Response::HTTP_BAD_REQUEST);
        // }
    }
}
