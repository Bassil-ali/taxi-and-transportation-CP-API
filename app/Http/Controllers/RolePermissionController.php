<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Symfony\Component\HttpFoundation\Response;

class RolePermissionController extends Controller
{


    public function __construct(Request $request)
    {
        parent::__construct($request);
    }




    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $role
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        //

        $this->authorize('Roles-Permissions-Update');

        $validated = $request->validate([
            'permission_id' => 'required|integer|exists:permissions,id',
        ]);
        $permission = Permission::find($request->input('permission_id'));
        if($role->hasPermissionTo($permission)){
            $role->revokePermissionTo($permission);
            return response()->json(['message' => 'Revoked Successfully'] , Response::HTTP_OK );
        }else{
            $role->givePermissionTo($permission);
            return response()->json(['message' => 'Assignd Successfully'] , Response::HTTP_OK );


        }
    }


}
