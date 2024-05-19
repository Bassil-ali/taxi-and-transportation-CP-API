<?php

namespace App\Http\Controllers\Dashboard\Admin\App\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Request\Admin\App\User\All\UserRequest;
use App\Http\Request\Admin\App\User\All\StatusRequest;
use App\Http\Request\Admin\App\User\All\DeleteRequest;
use App\Services\DatatableServices;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;

class AllController extends Controller
{
    public function index(): View
    {
        if(!permissionAdmin('read-users')) {
            return abort(403);
        }

        $datatables = (new DatatableServices())->header(
            [
                'route' => route('dashboard.admin.app.users.all.data'),
                'checkbox' => [
                    'status' => route('dashboard.admin.app.users.all.status'),
                ],
                'header'  => [
                    'admin.global.name',
                    'admin.global.email',
                    'admin.global.phone',
                    'admin.global.image',
                    'admin.global.type',
                    'admin.menu.city',
                    'admin.global.status',
                ],
                'columns' => [
                    'name'    => 'name',
                    'email'   => 'email',
                    'mobile'  => 'mobile',
                    'image'   => 'image',
                    'type'    => 'type',
                    'city'    => 'city',
                    'status'  => 'status',
                ]
            ]
        );

        return view('dashboard.admin.apps.users.all.index', compact('datatables'));

    }//end of index

    public function data(): object
    {
        $permissions = [
            'status' => permissionAdmin('status-users'),
            'update' => permissionAdmin('update-users'),
            'delete' => permissionAdmin('delete-users'),
        ];

        $users = User::query();

        return dataTables()->of($users)
            ->addColumn('record_select', 'components.dashboard.admin.data-table.input.record-select')
            ->addColumn('created_at', fn (User $user) => $user?->created_at?->format('Y-m-d'))
            ->editColumn('image', fn(User $user) => view('components.dashboard.admin.data-table.image')->with('models', $user))
            ->addColumn('city', fn (User $user) => $user->city?->name)
            ->editColumn('type', fn (User $user) => $user->typeName)
            ->addColumn('actions', fn(User $user) => adminAction(['edit', 'delete'], $permissions, $user, 'app.users.all'))
            ->editColumn('status', fn(User $user) => view('components.dashboard.admin.data-table.input.status')->with(['models' => $user, 'permissions' => $permissions]))
            ->rawColumns(['record_select', 'actions', 'status', 'name'])
            ->addIndexColumn()
            ->toJson();

    }//end of data

    public function create(): View
    {
        if(!permissionAdmin('create-users')) {
            return abort(403);
        }

        return view('dashboard.admin.apps.users.create');
        
    }//end of create

    //RedirectResponse
    public function store(UserRequest $request): RedirectResponse
    {
        User::create(request()->all());

        session()->flash('success', __('admin.global.added_successfully'));
        return redirect()->route('dashboard.admin.app.users.all.index');

    }//end of store

    public function edit(User $user): View
    {
        if(!permissionAdmin('update-users')) {
            return abort(403);
        }

        return view('dashboard.admin.apps.users.edit', compact('category'));

    }//end of edit

    public function update(UserRequest $request, User $user): RedirectResponse
    {
        $user->update(request()->all());

        session()->flash('success', __('admin.global.updated_successfully'));

        return redirect()->route('dashboard.admin.app.users.all.index');
        
    }//end of update

    public function show(User $all)
    {
        return view('dashboard.admin.apps.users.all.index', compact('all'));

    }//end of show

    public function destroy(User $all)
    {
        $all->delete();

        session()->flash('success', __('admin.global.deleted_successfully'));
        return response(__('admin.global.deleted_successfully'));

    }//end of delete

    public function bulkDelete(DeleteRequest $request): Application | Response | ResponseFactory
    {
        User::destroy(request()->ids ?? []);

        session()->flash('success', __('admin.global.deleted_successfully'));
        return response(__('admin.global.deleted_successfully'));

    }//end of bulkDelete

    public function status(StatusRequest $request): Application | Response | ResponseFactory
    {
        $user = User::find($request->id);
        $user?->update(['status' => !$user->status]);

        session()->flash('success', __('admin.global.updated_successfully'));
        return response(__('admin.global.updated_successfully'));
        
    }//end of status

}//end of controller