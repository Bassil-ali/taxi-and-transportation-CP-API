<?php

namespace App\Http\Controllers\Dashboard\Admin\Managements;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Request\Admin\Managements\Admin\AdminRequest;
use App\Http\Request\Admin\Managements\Admin\StatusRequest;
use App\Http\Request\Admin\Managements\Admin\DeleteRequest;
use App\Services\DatatableServices;
use App\models\Admin;
use App\Models\Role;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;

class AdminController extends Controller
{
    public function index(): View
    {
        if(!permissionAdmin('read-admins')) {
            return abort(403);
        }

        $datatables = (new DatatableServices())->header(
            [
                'route' => route('dashboard.admin.management.admins.data'),
                'checkbox' => [
                    'status' => route('dashboard.admin.management.admins.status'),
                ],
                'header'  => [
                    'admin.global.name',
                    'admin.global.email',
                    'admin.global.image',
                    'admin.menu.roles',
                    'admin.global.status',
                ],
                'columns' => [
                    'name'   => 'name',
                    'email'  => 'email',
                    'image'  => 'image',
                    'roles'  => 'roles',
                    'status' => 'status',
                ]
            ]
        );

        return view('dashboard.admin.managements.admins.index', compact('datatables'));

    }//end of index

    public function data(): object
    {
        $permissions = [
            'status' => permissionAdmin('status-admins'),
            'update' => permissionAdmin('update-admins'),
            'delete' => permissionAdmin('delete-admins'),
        ];

        $admin = Admin::query();

        return dataTables()->of($admin)
            ->addColumn('record_select', 'components.dashboard.admin.data-table.input.record-select')
            ->addColumn('created_at', fn (Admin $admin) => $admin?->created_at?->format('Y-m-d'))
            ->editColumn('image', fn(Admin $admin) => view('components.dashboard.admin.data-table.image')->with('models', $admin))
            ->addColumn('roles', fn(Admin $admin) => view('dashboard.admin.managements.admins.data_tables.roles', compact('admin')))
            ->addColumn('actions', fn(Admin $admin) => adminAction(['edit', 'delete'], $permissions, $admin, 'management.admins'))
            ->addColumn('status', fn(Admin $admin) => !$admin->default ? view('components.dashboard.admin.data-table.input.status')->with(['models' => $admin, 'permissions' => $permissions]) : '')
            ->rawColumns(['record_select', 'actions', 'status', 'roles'])
            ->addIndexColumn()
            ->toJson();

    }//end of data

    public function create(): View
    {
        if(!permissionAdmin('create-admins')) {
            return abort(403);
        }

        $roles = Role::whereNotIn('name', ['super_admin'])->pluck('name', 'name');

        return view('dashboard.admin.managements.admins.create', compact('roles'));
        
    }//end of create

    //RedirectResponse
    public function store(AdminRequest $request): RedirectResponse
    {
        $requestData = request()->except(['image', 'roles', 'password_confirmation']);

        if(request()->file('image')) {

            $requestData['image'] = request()->file('image')->store('languages', 'public');

        }

        $admin = Admin::create($requestData);

        if(request()->has('roles')) {
            $admin->assignRole(request()->roles);
        }

        session()->flash('success', __('admin.global.added_successfully'));
        return redirect()->route('dashboard.admin.management.admins.index');

    }//end of store

    public function edit(Admin $admin): View
    {
        if(!permissionAdmin('update-admins')) {
            return abort(403);
        }
        
        $roles = Role::whereNotIn('name', ['super_admin'])->pluck('name', 'name');

        return view('dashboard.admin.managements.admins.edit', compact('admin', 'roles'));

    }//end of edit

    public function update(AdminRequest $request, Admin $admin): RedirectResponse
    {
        $requestData = request()->except(['image', 'roles', 'password']);

        if(request()->has('image')) {

            $admin->image ? Storage::disk('public')->delete($admin->image) : '';

            $requestData['image'] = request()->file('image')->store('admins', 'public');

        }

        $admin->update($requestData);

        if(request()->has('roles')) {

            $admin->assignRole(request()->roles);
        }

        session()->flash('success', __('admin.global.updated_successfully'));

        return redirect()->route('dashboard.admin.management.admins.index');
        
    }//end of update

    public function destroy(Admin $admin): Application | Response | ResponseFactory
    {
        $admin->image ? Storage::disk('public')->delete($admin->image) : '';
        $admin->delete();

        session()->flash('success', __('admin.global.deleted_successfully'));
        return response(__('admin.global.deleted_successfully'));

    }//end of delete

    public function bulkDelete(DeleteRequest $request): Application | Response | ResponseFactory
    {
        $images = Admin::find(request()->ids ?? [])->whereNotNull('image')->pluck('image')->toArray();
        count($images) > 0 ? Storage::disk('public')->delete($images) : '';
        Admin::destroy(request()->ids ?? []);

        session()->flash('success', __('admin.global.deleted_successfully'));
        return response(__('admin.global.deleted_successfully'));

    }//end of bulkDelete

    public function status(StatusRequest $request): Application | Response | ResponseFactory
    {
        $admin = Admin::find($request->id);
        $admin->update(['status' => !$admin->status]);

        session()->flash('success', __('admin.global.updated_successfully'));
        return response(__('admin.global.updated_successfully'));
        
    }//end of status

}//end of controller