<?php

namespace App\Http\Controllers\api;

use App\Exceptions\ErrorMessageException;
use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Resources\EmployeeResource;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class EmployeeController extends Controller
{

    public static function routeName(){
        return Str::snake("employee");
    }
    public function __construct(Request $request){
        parent::__construct($request);
        // $this->authorizeResource(User::class,"user");
    }
    public function index(Request $request)
    {
        return EmployeeResource::collection(User::search($request)->sort($request)->paginate($this->pagination));
    }
    public function store(StoreEmployeeRequest $request)
    {

        if(auth()->user('user-api')->type != 3){
            throw new ErrorMessageException('UNAUTHORISED' , 403);
        }



        $data =$request->validated() ;
        $data['password'] = Hash::make($data['password']);
        $data ['type'] = 4 ;
        $data ['parent_id'] = auth()->user()->id;
        $user = User::create($data);
        if($user){
            return (new UserResource($user))->additional(['status' => true]);

        }else{
            return response()->json(['status' => false] ,  Response::HTTP_BAD_REQUEST);
        }
    }
    public function show(Request $request,User $employee)
    {

            return new UserResource($employee);

    }
    public function update(UpdateEmployeeRequest $request, User $employee)
    {

        if(auth()->guard('user-api')->check()){
            if(($employee->type == 4 && $employee->parent_id !=  auth()->user('user-api')->id) ){
                throw new ErrorMessageException('UNAUTHORISED' , 403);
            }
        }


        if(auth()->user('user-api')->type != 3 ||  auth()->user('user-api')->id !=$employee->parent_id){
            throw new ErrorMessageException('UNAUTHORISED' , 403);
        }

        $employee->update($request->validated());
        return (new UserResource($employee))->additional(['status' => true]);
    }
    public function destroy(Request $request,User $employee)
    {

       $deleted =  $employee->delete();
        if($deleted){
            return (new UserResource($employee))->additional(['status' => true]);
        }else{
            return response()->json(['status' => false] ,  Response::HTTP_BAD_REQUEST);
        }
    }
}