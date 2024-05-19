<?php

namespace App\Http\Controllers;

use App\Helpers\Messages;
use App\Http\Requests\StoreAdminRequest;
use App\Http\Requests\UpdateAdminRequest;
use App\Models\Admin;
use App\Models\FinancialMovement;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;
use Symfony\Component\HttpFoundation\Response;


class AdminController extends Controller
{

    public static function routeName()
    {
        return Str::snake("admins");
    }
    public function __construct(Request $request)
    {
        parent::__construct($request);
        $this->authorizeResource(Admin::class, Str::snake("Admin"));
    }
    public function index(Request $request)
    {
        $admins = Admin::search($request)->sort($request)->paginate(15);

        return response()->view('admins.index', compact('admins'));
    }

    public function create()
    {
        $roles = Role::all();

        return response()->view('admins.create', compact('roles'));
    }


    public function store(StoreAdminRequest $request)
    {
        $admin = Admin::create($request->except('role_id', 'password_confirmation'));
        $admin->assignRole($request->role_id);
        return response()->json(['message' => $admin ? 'Created Successfully' : 'Failed To Create'], $admin ? Response::HTTP_CREATED : Response::HTTP_BAD_REQUEST);
    }

    public function show(Request $request, Admin $admin)
    {
        return response()->view('', compact('admin'));
    }

    public function edit(Admin $admin)
    {

        $roles = Role::all();
        return response()->view('admins.edit', compact('admin', 'roles'));
    }

    public function update(UpdateAdminRequest $request, Admin $admin)
    {
        $admin->update($request->except('role_id' , 'password_confirmation'));
        $admin->syncRoles($request->role_id);

        return response()->json(['message' => $admin ? 'Updated Successfully' : 'Failed To Updated'], $admin ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST);
    }

    public function destroy(Request $request, Admin $admin)
    {

        if ($admin->financialMovements()->exists() || $admin->id == auth()->user()->id) {
            return response()->json(['title' => Messages::getMessage('FAILED'), 'message' =>   Messages::getMessage('DELETE_FAILED'), 'icon' => 'error'],  Response::HTTP_BAD_REQUEST);
        }

        $deleted = $admin->delete();

        if ($deleted) {
            return response()->json(['title' => 'Deleted!', 'message' => ' Deleted Successfully', 'icon' => 'success'], Response::HTTP_OK);
        } else {
            return response()->json(['title' => 'Failed!', 'message' => 'Delete Failed', 'icon' => 'error'],  Response::HTTP_BAD_REQUEST);
        }
    }


    public function financialMovements(Request $request, $admin_id)
    {

        $financial_movements = FinancialMovement::where('admin_id', $admin_id)->with('admin')->search($request)->sort($request)->paginate(15);

        return response()->view('financial_movement.index', compact('financial_movements'));
    }
}
