<?php

namespace App\Http\Controllers\Permissions;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRoleRequest;
use App\Http\Requests\UpdateRoleRequest;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Str;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(Request $request)
    {
        parent::__construct($request);
        // $this->authorizeResource(Role::class,Str::snake("Role"));

    }

    public function index(Request $request)
    {
        //
        $this->authorize('Roles-Show');

        $roles = Role::withCount('permissions')->paginate($this->pagination);
        return response()->view('roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $this->authorize('Roles-Create');


        return response()->view('roles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRoleRequest $request)
    {
        //
        $this->authorize('Roles-Create');

        $role = Role::create($request->validated());

        return response()->json(['message' => $role ? 'Created Successfully' : ['Failed To Create']], $role ? Response::HTTP_CREATED : Response::HTTP_BAD_REQUEST);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        //
        $this->authorize('Roles-Permissions-Update');


        $permissions = Permission::all();
        $role_permissions = $role->permissions;
        foreach($permissions as $permession){
            foreach($role_permissions as $role_permission){
                if($permession->id == $role_permission->id){
                    $permession->setAttribute('assigned' , true);
                }
            }
        }

        return response()->view('roles.show' , compact('permissions' , 'role_permissions' , 'role'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        //
        $this->authorize('Roles-Update');


        return response()->view('roles.edit' , compact('role'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRoleRequest $request, Role $role)
    {
        //
        $this->authorize('Roles-Update');

        $role =  $role->update($request->validated());

        return response()->json(['message' => $role ? 'Created Successfully' : ['Failed To Create']], $role ? Response::HTTP_CREATED : Response::HTTP_BAD_REQUEST);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        //
        $this->authorize('Roles-Delete');


        $deleted = $role->delete();

        if ($deleted) {
            return response()->json(['title' => 'Deleted!', 'message' => ' Deleted Successfully', 'icon' => 'success'], Response::HTTP_OK);
        } else {
            return response()->json(['title' => 'Failed!', 'message' => 'Delete Failed', 'icon' => 'error'],  Response::HTTP_BAD_REQUEST);
        }
    }
}
