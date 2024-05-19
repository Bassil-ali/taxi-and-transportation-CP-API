<?php

namespace App\Http\Controllers;
use App\Models\Notification;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Requests\StoreNotificationRequest;
use App\Http\Requests\UpdateNotificationRequest;


class NotificationController extends Controller
{

    public static function routeName(){
        return Str::snake("Notification");
    }
    public function __construct(Request $request){
        parent::__construct($request);
        $this->authorizeResource(Notification::class,Str::snake("Notification"));
    }
    public function index(Request $request)
    {
        $Notifications = Notification::search($request)->sort($request)->paginate(15);

        return response()->view('', compact('Notifications'));

    }

    public function create (){

         return response()->view('');

    }


    public function store(StoreNotificationRequest $request)
    {
        $notification = Notification::create($request->validated());

          return response()->json(['message' => $notification ? 'Created Successfully' : 'Failed To Create'], $notification ? Response::HTTP_CREATED : Response::HTTP_BAD_REQUEST);
    }

    public function showNot(Request $request)
    {
                    $notification = Notification::where('user_id',$request->user()->id)->with('ad')->get();

         return $notification;
    }

    public function edit(Notification $notification){


         return response()->view('', compact('notification'));

    }

    public function update(UpdateNotificationRequest $request, Notification $notification)
    {
        $notification->update($request->validated());

         return response()->json(['message' => $notification ? 'Updated Successfully' : 'Failed To Updated'], $notification ?Response::HTTP_OK : Response::HTTP_BAD_REQUEST);
    }

    public function destroy(Request $request,Notification $notification)
    {
        $deleted = $notification->delete();

        if ($deleted) {
            return response()->json(['title' => 'Deleted!', 'message' => ' Deleted Successfully', 'icon' => 'success'], Response::HTTP_OK);
        } else {
            return response()->json(['title' => 'Failed!', 'message' => 'Delete Failed', 'icon' => 'error'],  Response::HTTP_BAD_REQUEST);
        }
    }
    
         public static function addNotification($title = "",$userId="0",$adId="0",$userNmper=0,$page="",$tokens =[] )
    {
        $user = User::find($userId) ;
        $notification = new Notification;
        $notification->title =$title;
        $notification->user_id = $userId;
        $notification->ads_id = $adId;
        $notification->page = $page;
        $notification->save();
        
        
        
        // if($userNmper == 1){
        //      $tokens = array();
        //     array_push($tokens, $user->token_firebase);
        //     $this->pushNotification($tokens,$title,$title); 
        // }
        
        
    }
       
    
      
    
             public static function pushNotification($tokens,$title,$body)
    {
      
   $data = json_encode([
  "registration_ids" => $tokens,
    //  "to"=> "/topics/all",
    "notification" => [
     "body" => $body,
      "title" => $title,
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
    
    }    
    
 
    
}
