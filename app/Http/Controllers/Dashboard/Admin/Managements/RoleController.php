<?php

namespace App\Http\Controllers\Dashboard\Admin\Managements;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Request\Admin\Managements\Roles\RoleRequest;
use App\Http\Request\Admin\Managements\Roles\DeleteRequest;
use App\Services\DatatableServices;
use App\Models\Admin;
use App\Models\Role;
use App\Models\Permission;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;

class RoleController extends Controller
{
    public function index(): View
    {
        if(!permissionAdmin('read-roles')) {
            return abort(403);
        }

        $datatables = (new DatatableServices())->header(
            [
                'route' => route('dashboard.admin.management.roles.data'),
                'header'  => [
                    'admin.global.name',
                    'admin.global.admin',
                    'admin.menu.admins',
                ],
                'columns' => [
                    'name'    => 'name',
                    'admin'   => 'admin',
                    'admins'  => 'admins',
                ]
            ]
        );

        return view('dashboard.admin.managements.roles.index', compact('datatables'));

    }//end of index

    public function data(): object
    {
        $permissions = [
            'status' => permissionAdmin('status-roles'),
            'update' => permissionAdmin('update-roles'),
            'delete' => permissionAdmin('delete-roles'),
        ];

        $role = Role::roleNot('super_admin');

        return dataTables()->of($role)
            ->addColumn('record_select', 'components.dashboard.admin.data-table.input.record-select')
            ->addColumn('created_at', fn (Role $role) => $role?->created_at?->format('Y-m-d'))
            ->addColumn('admin', fn (Role $role) => $role?->admin?->name)
            ->addColumn('admins', fn (Role $role) => Admin::role($role->name)->count())
            ->addColumn('admins_count', fn (Role $role) => $role?->admins?->count())
            ->addColumn('actions', fn(Role $role) => adminAction(['edit', 'delete'], $permissions, $role, 'management.roles'))
            ->rawColumns(['record_select', 'actions'])
            ->addIndexColumn()
            ->toJson();

    }//end of data

    public function create(): View
    {
        if(!permissionAdmin('create-roles')) {
            return abort(403);
        }

        $permissions = collect(Permission::select('name', 'group_name')->get())->groupBy('group_name');

        return view('dashboard.admin.managements.roles.create', compact('permissions'));
        
    }//end of create

    //RedirectResponse
    public function store(RoleRequest $request): RedirectResponse
    {
        $validated = request()->except(['permissions', 'all']);

        $role = \Spatie\Permission\Models\Role::create($validated);
        $role->syncPermissions($request->permissions ?? []);

        session()->flash('success', __('admin.global.added_successfully'));
        return redirect()->route('dashboard.admin.management.roles.index');

    }//end of store

    public function edit(\Spatie\Permission\Models\Role $role): View
    {
        if(!permissionAdmin('update-roles')) {
            return abort(403);
        }
        
        $permissions = collect(Permission::select('name', 'group_name')->get())->groupBy('group_name');

        return view('dashboard.admin.managements.roles.edit', compact('role', 'permissions'));

    }//end of edit

    public function update(RoleRequest $request, \Spatie\Permission\Models\Role $role): RedirectResponse
    {
        $validated = request()->except(['permissions', 'all']);

        $role->update($validated);
        $role->syncPermissions($request->permissions ?? []);

        session()->flash('success', __('admin.global.updated_successfully'));
        return redirect()->route('dashboard.admin.management.roles.index');
        
    }//end of update

    public function destroy(Role $role): Application | Response | ResponseFactory
    {
        if($role?->admins?->count() <= 0) {

            return response(__('admin.global.deleted_successfully'));
        }

        $role->delete();

        session()->flash('success', __('admin.global.deleted_successfully'));
        return response(__('admin.global.deleted_successfully'));

    }//end of delete

    public function bulkDelete(DeleteRequest $request): Application | Response | ResponseFactory
    {
        $images = Role::where('default', 0)->find(request()->ids ?? [])->pluck('flag')->toArray();
        Storage::disk('public')->delete($images) ?? '';
        Role::where('default', 0)->destroy(request()->ids ?? []);

        session()->flash('success', __('admin.global.deleted_successfully'));
        return response(__('admin.global.deleted_successfully'));

    }//end of bulkDelete

}//end of controller