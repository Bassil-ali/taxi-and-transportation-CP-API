<?php

namespace App\Http\Controllers\api;

use App\Helpers\Messages;
use App\Http\Controllers\Controller;
use App\Http\Requests\CheckCodeRequest;
use App\Http\Requests\ForgetPasswordRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\ResetPasswordRequest;
use App\Http\Requests\UpdatePasswordRequest;
use App\Http\Requests\UpdateProfileRequest;
use App\Http\Requests\UserLoginRequest;
use App\Mail\ForgetPasswordMail;
use App\Mail\Verification;
use App\Mail\VerificationMail;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use Symfony\Component\HttpFoundation\Response;

class ApiAuthController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth:user-api' , 'CheckUserActivation'], ['except' => ['login', 'refresh', 'register', 'forgetPassword', 'checkResetCode', 'resetPassword', 'activation']]);
    }


   public function sendSms($phone,$code){
              $curl = curl_init();
               
             $text=  urlencode(" كود تفعيل حسابك في بيبا ترانس  : " . $code );

               
      curl_setopt_array($curl, array(
      CURLOPT_URL => "https://hiwhats.com/API/send?mobile=966543686986&password=Hh8@hicc0roffzvs&instanceid=19856&message=$text&numbers=$phone&json=1&type=1",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_POSTFIELDS => "",
  CURLOPT_HTTPHEADER => array(

     "Content-Type: application/json",
     "cache-control: no-cache"
  ),
));
$response = curl_exec($curl);
        $err = curl_error($curl);
        $cunt_SMS = json_decode($response, true);

       
       
       
    }


    public function register(RegisterRequest $request)
    {

        $data = $request->validated();
        $data['password'] = Hash::make($data['password']);
        $user = User::create($data);
       $user->token_firebase = $request->token_firebase;
       $user->save();
        if ($user) {
            $code = random_int('1000', '9999');
            $user->update(['verification_code' => Hash::make($code)]);
            $this->sendSms($user->mobile,$code);
            // Mail::to($user)->send(new VerificationMail($code));
        }

        $token = $user->createToken('User-Api');
        return response()->json([
            'status'  => $user  ? true : false,
            'message' =>  Messages::getMessage($user  ? 'REGISTERED_SUCCESSFULLY' : 'REGISTER_FAILED'),
            'token'   => $token->accessToken,
            'user'    => $user,
            'verification_code' => $code

        ], $user ? Response::HTTP_CREATED : Response::HTTP_BAD_REQUEST);
    }


    public function showUser(Request $request)
    {
        $user =  User::find($request->user_id);
      return $user;

    }


    /**
     * Get a Passport via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(UserLoginRequest $request)
    {


        $user  = User::where("email",  "=", $request->validated('email'))->first();
        if ($user) {

            if (Hash::check($request->validated('password'), $user->password)) {
                if (!$user->email_verified_at) {
                    return response()->json([
                        'status'  => false,
                        'message' => Messages::getMessage('NOT_VERIFIED')
                    ], Response::HTTP_FORBIDDEN);
                }

                $this->endUserSessions($user->id);
                $token = $user->createToken('User-Api');
                $user->token_firebase = $request->token_firebase;
$user->save();

                return $this->respondWithToken($user, $token, 'LOGGED_IN_SUCCESSFULLY');
            }
            // else {
            //     return response()->json([
            //         'status'  => false,
            //         'message' => Messages::getMessage('ERROR_CREDENTIALS')
            //     ], Response::HTTP_UNPROCESSABLE_ENTITY);
            // }
        }

        return response()->json([
            'status'  => false,
            'message' => Messages::getMessage('ERROR_CREDENTIALS')
        ], Response::HTTP_UNPROCESSABLE_ENTITY);
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout(Request $request)
    {

        $token = $request->user('user-api')->token();
        $user_id = $request->user('user-api')->id;

        $revoked = $token->revoke();
        $this->endUserSessions($user_id);

        return response()->json([
            'status'  => true,
            'message' => $revoked ? Messages::getMessage('LOGGED_OUT_SUCCESSFULLY') : Messages::getMessage('LOGGED_OUT_FAILED')
        ], $revoked ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST);
    }



    public function forgetPassword(ForgetPasswordRequest $request)
    {


        $user = User::where('email', '=', $request->validated('email'))->first();
        $auth_code = random_int('1000', '9999');
        $updated =  $user->update(['auth_code' => Hash::make($auth_code)]);
            $this->sendSms($user->mobile,$auth_code);

        // Mail::to($user)->send(new ForgetPasswordMail($auth_code));
        return response()->json(
            [
                'status'  => $updated ? true : false,
                'message' => Messages::getMessage($updated ? 'FORGET_PASSWORD_SUCCESS' : 'FORGET_PASSWORD_FAILED'),
                'code'    => $auth_code
            ],
            $updated ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST
        );
    }


    public function checkResetCode(CheckCodeRequest $request)
    {
        $user = User::where('email', '=', $request->validated('email'))->first();

        if (!$user->auth_code) {
            return response()->json([
                'status'  => false,
                'message' => Messages::getMessage('NO_PASSWORD_RESET_CODE')], Response::HTTP_BAD_REQUEST);
        }
        if (Hash::check($request->validated('code'), $user->auth_code)) {
            return response()->json(
                [
                    'status'  => true,
                    'message' => Messages::getMessage( 'PASSWORD_RESET_CODE_CORRECT'),
                ],
                Response::HTTP_OK
            );

        }
        return response()->json([
            'status'  => false,
            'message' => Messages::getMessage('PASSWORD_RESET_CODE_ERROR')
        ], Response::HTTP_BAD_REQUEST);
    }

    public function resetPassword(ResetPasswordRequest $request)
    {
        $user = User::where('email', '=', $request->validated('email'))->first();

        if (Hash::check($request->validated('code'), $user->auth_code)) {
            $updated =  $user->update([
                'password' => Hash::make($request->validated('password')),
                'auth_code' => null ,
                'email_verified_at' => now(),
                'verification_code' => null
            ]);
            return response()->json(
                [
                    'status'  => $updated ? true : false,
                    'message' => Messages::getMessage($updated ? 'RESET_PASSWORD_SUCCESS' : 'RESET_PASSWORD_FAILED'),
                ],
                $updated ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST
            );

        }
        return response()->json([
            'status'  =>  false,
            'message' => Messages::getMessage('NO_PASSWORD_RESET_CODE')
        ], Response::HTTP_BAD_REQUEST);
    }

    public function activation(CheckCodeRequest $request)
    {

        $user = User::where('email', '=', $request->validated('email'))->first();

        if (!$user->verification_code) {
            return response()->json([
                'status'  => false,
                'message' => Messages::getMessage('NO_VERIFIED_CODE')
            ], Response::HTTP_BAD_REQUEST);
        }
        if (Hash::check($request->validated('code'), $user->verification_code)) {
            $updated =  $user->update(['email_verified_at' => now(), 'verification_code' => null]);
            return response()->json(
                [
                    'status'  => $updated ? true : false,
                    'message' => Messages::getMessage($updated ? 'SUCCESS_AUTH' : 'FAILED_AUTH'),
                ],
                $updated ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST
            );
        }
        return response()->json([
            'status'  => false,
            'message' => Messages::getMessage('VERIFIED_CODE_ERROR')
        ], Response::HTTP_BAD_REQUEST);
    }


    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        $user = auth()->user();
        return response()->json([
            'status' => true,
            'user' => $user
            ]);
    }


    public function updateProfile(UpdateProfileRequest $request)
    {
        $user = auth()->user();

        $validatedData = $request->validated();
        if($request->hasfile('image'))
        {

                $old_image = $user->image ;

                $image = $request->file('image');
                $imageName = uniqid(). '_' . $user->id  . '.' . $image->getClientOriginalExtension();
                $request->file('image')->storeAs('/users' ,$imageName , ['disk' => 'public']);
                $validatedData['image'] = $imageName;
                if($old_image){
                    Storage::disk('public')->delete($old_image);
                };
                $updated = $user->save();

            // return response()->json([
            //     'status'  => $updated ? true : false,
            //     'profile_image'  => $user->profile_image,
            //     'message' => Messages::getMessage($updated ? 'UPDATE_SUCCESS': 'UPDATE_FAILED')
            // ], $updated ?Response::HTTP_OK : Response::HTTP_BAD_REQUEST);


        }


        $updated = $user->update($validatedData);
        return response()->json([
            'status'  => $updated ? true : false,
            'user'    => $user,
            'message' => Messages::getMessage($updated ? 'USER_UPDATED_SUCCESS': 'USER_UPDATED_FAILED')
        ], $updated ?Response::HTTP_OK : Response::HTTP_BAD_REQUEST);


    }

    public function updateProfileImage(Request $request)
    {
        $user = auth()->user();

        $this->validate($request, [
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        if($request->hasfile('image'))
        {
                $oldimage = $user->image ;

                $image = $request->file('image');
                $imageName = uniqid(). '_' . $user->id  . '.' . $image->getClientOriginalExtension();
                $request->file('image')->storeAs('/users' ,$imageName , ['disk' => 'public']);
                $user->image = $imageName;
                Storage::disk('public')->delete($oldimage);
                $updated = $user->save();

            return response()->json([
                'status'  => $updated ? true : false,
                'profile_image'  => $user->profile_image,
                'message' => Messages::getMessage($updated ? 'UPDATE_SUCCESS': 'UPDATE_FAILED')
            ], $updated ?Response::HTTP_OK : Response::HTTP_BAD_REQUEST);


        }

    }


    public function updatePassword(UpdatePasswordRequest $request)
    {

        $user = auth()->user();

        $data = $request->validated();

        if (Hash::check($data['current_password'], $user->password)) {

           $updated = $user->update(['password' => Hash::make($data['password'])]);

            return response()->json([
                'status'  => $updated ? true : false,
                'message' => Messages::getMessage($updated ? 'CHANGE_PASSWORD_SUCCESS': 'CHANGE_PASSWORD_FAILED')
            ], $updated ?Response::HTTP_OK : Response::HTTP_BAD_REQUEST);

            return response()->json(['message' => ['تم التعديل بنجاح']], 200);
        }

        return response()->json([
            'status'  => false,
            'message' => Messages::getMessage('CHANGE_CURRENT_PASSWORD_FAILED')
        ], Response::HTTP_BAD_REQUEST);;
    }




    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    // public function refresh()
    // {
    //     return $this->respondWithToken(auth()->refresh());
    // }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($user, $token, $message)
    {

        return response()->json([
            'status'  => true,
            'message' =>  Messages::getMessage($message),
            'token'   => $token->accessToken,
            'token_type' =>  'bearer',
            'user' => $user
        ]);
    }


    private function endUserSessions($userId)
    {
        return DB::table('oauth_access_tokens')
            ->where('user_id', '=', $userId)
            ->update([
                'revoked' => true
            ]);
    }
}
