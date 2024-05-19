<?php

namespace App\Http\Controllers;

use App\Helpers\Messages;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Ad;
use App\Models\City;
use App\Models\FinancialMovement;
use App\Models\Proposal;
use App\Models\Trip;
use App\Models\User;
use App\Models\Wallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\Response;


class UserController extends Controller
{

    public static function routeName()
    {
        return Str::kebab("users");
    }
    public function __construct(Request $request)
    {
        parent::__construct($request);
        $this->authorizeResource(User::class, Str::snake("User"));
    }
    public function index(Request $request)
    {
        $users = User::with('wallet')->search($request)->sort($request)->paginate($this->pagination);

        return response()->view('users.index', compact('users'));
    }

    public function create()
    {
        $cities = City::where('status', 1)->get();
        
        $companies = User::where('type', 3)->get(['id', 'name']);
        return response()->view('users.create', compact('cities', 'companies'));
    }


    public function store(StoreUserRequest $request)
    {



        $data = $request->validated();
        $data['password'] = Hash::make($data['password']);
        $user = User::create($data);

        return response()->json(['message' => $user ? 'Created Successfully' : 'Failed To Create'], $user ? Response::HTTP_CREATED : Response::HTTP_BAD_REQUEST);
    }

    public function show(Request $request, User $user)
    {
        $wallet = Wallet::where('user_id', $user->id)->first();
        $employee_count = 0;

        $ads = null;
        $proposals = null;
        $financial_movements = null;
        $trips = Trip::where('customer_id', $user->id)->orwhere('company_id', $user->id)->orwhere('driver_id', $user->id)->paginate($this->pagination); // ->with(['customer','company','driver'])

        if ($user->type != 4) {
            $financial_movements = FinancialMovement::where('wallet_id', $user->wallet->id)->paginate($this->pagination);
        }

        if ($user->type == 3) {
            $employee_count = User::where('parent_id', $user->id)->count();
        }
        if ($user->type == 1) {
            $ads = Ad::where('user_id', $user->id)->paginate($this->pagination);
        }
        if ($user->type == 2 || $user->type == 3) {

            $proposals = Proposal::where('user_id', $user->id)->paginate($this->pagination);
        }



        return response()->view('users.show', compact('user', 'employee_count', 'ads', 'proposals', 'trips', 'wallet', 'financial_movements'));
    }

    public function edit(User $user)
    {
        $companies = User::where('type', 3)->get(['id', 'name']);
        $cities = City::where('status', 1)->get();
        return response()->view('users.edit', compact('user', 'cities', 'companies'));
    }

    public function update(UpdateUserRequest $request, User $user)
    {

        $data = $request->validated();
        if ($data['password']) {
            $data['password'] = Hash::make($data['password']);
        }

        $user->update($data);

        return response()->json(['message' => $user ? 'Updated Successfully' : 'Failed To Updated'], $user ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST);
    }

    public function destroy(Request $request, User $user)
    {



        if ($user->financialMovements()->exists() || $user->ads()->exists() || $user->trips()->exists() || $user->proposals()->exists()) {
            return response()->json(['title' => Messages::getMessage('FAILED'), 'message' =>   Messages::getMessage('DELETE_FAILED'), 'icon' => 'error'],  Response::HTTP_BAD_REQUEST);
        }

        $deleted = $user->delete();

        if ($deleted) {
            return response()->json(['title' =>  Messages::getMessage('SUCCESS'), 'message' =>   Messages::getMessage('DELETE_SUCCESS'), 'icon' => 'success'], Response::HTTP_OK);
        } else {
            return response()->json(['title' => Messages::getMessage('FAILED'), 'message' =>   Messages::getMessage('DELETE_FAILED'), 'icon' => 'error'],  Response::HTTP_BAD_REQUEST);
        }
    }

    public function toggleStatus(Request $request, User $user)
    {

        $updated = $user->update(['status' => ($user->status  ? 0 : 1)]);

        if ($updated) {
            return response()->json(['title' =>  Messages::getMessage('SUCCESS'), 'message' =>   Messages::getMessage('UPDATE_SUCCESS'), 'icon' => 'success'], Response::HTTP_OK);
        } else {
            return response()->json(['title' => Messages::getMessage('FAILED'), 'message' =>   Messages::getMessage('UPDATE_FAILED'), 'icon' => 'error'],  Response::HTTP_BAD_REQUEST);
        }
    }

    public function financialMovements(Request $request, $user_id)
    {
        $wallet = Wallet::where('user_id', $user_id)->first();
        $financial_movements = FinancialMovement::where('wallet_id', $wallet->id)->with('admin')->search($request)->sort($request)->paginate(15);

        return response()->view('financial_movement.index', compact('financial_movements'));
    }
}