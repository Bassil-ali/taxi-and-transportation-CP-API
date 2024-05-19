<?php

namespace App\Http\Controllers\Dashboard\Admin\App\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Request\Admin\App\User\Employee\UserRequest;
use App\Http\Request\Admin\App\User\Employee\StatusRequest;
use App\Http\Request\Admin\App\User\Employee\DeleteRequest;
use App\Services\DatatableServices;
use App\Models\User;
use App\Models\Trip;
use App\Enums\Admin\UserType;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;

class EmployeeController extends Controller
{
    public function index(): View
    {
        if(!permissionAdmin('read-users')) {
            return abort(403);
        }

        $datatables = (new DatatableServices())->header(
            [
                'route' => route('dashboard.admin.app.users.employees.data'),
                'checkbox' => [
                    'status' => route('dashboard.admin.app.users.employees.status'),
                ],
                'header'  => [
                    'admin.global.name',
                    'admin.global.email',
                    'admin.global.phone',
                    'admin.global.image',
                    'admin.menu.city',
                    'admin.global.status',
                ],
                'columns' => [
                    'name'    => 'name',
                    'email'   => 'email',
                    'mobile'  => 'mobile',
                    'image'   => 'image',
                    'city'    => 'city',
                    'status'  => 'status',
                ]
            ]
        );

        return view('dashboard.admin.apps.users.employees.index', compact('datatables'));

    }//end of index

    public function data(): object
    {
        $permissions = [
            'status' => permissionAdmin('status-users'),
            'update' => permissionAdmin('update-users'),
            'delete' => permissionAdmin('delete-users'),
        ];

        $employees = User::getEmployee();

        return dataTables()->of($employees)
            ->addColumn('record_select', 'components.dashboard.admin.data-table.input.record-select')
            ->addColumn('created_at', fn (User $employee) => $employee?->created_at?->format('Y-m-d'))
            ->editColumn('image', fn(User $employee) => view('components.dashboard.admin.data-table.image')->with('models', $employee))
            ->addColumn('city', fn (User $employee) => $employee->city?->name)
            ->editColumn('type', fn (User $employee) => $employee->typeName)
            ->addColumn('actions', fn(User $employee) => adminAction(['edit', 'delete'], $permissions, $employee, 'app.users.employees'))
            ->editColumn('status', fn(User $employee) => view('components.dashboard.admin.data-table.input.status')->with(['models' => $employee, 'permissions' => $permissions]))
            ->rawColumns(['record_select', 'actions', 'status', 'name'])
            ->addIndexColumn()
            ->toJson();

    }//end of data

    public function create(): View
    {
        if(!permissionAdmin('create-users')) {
            return abort(403);
        }

        return view('dashboard.admin.apps.users.employees.create');
        
    }//end of create

    //RedirectResponse
    public function store(UserRequest $request): RedirectResponse
    {
        User::create(request()->all());

        session()->flash('success', __('admin.global.added_successfully'));
        return redirect()->route('dashboard.admin.app.users.employees.index');

    }//end of store

    

    public function show(User $employee): View
    {
        $types = UserType::array();

        return view('dashboard.admin.apps.users.employees.show', compact('employee', 'types'));

    }//end of show

    public function edit(User $employee): View
    {
        if(!permissionAdmin('update-users')) {
            return abort(403);
        }

        return view('dashboard.admin.apps.users.employees.edit', compact('employee'));

    }//end of edit

    public function update(UserRequest $request, User $employee): RedirectResponse
    {
        $employee->update(request()->all());

        session()->flash('success', __('admin.global.updated_successfully'));

        return redirect()->route('dashboard.admin.app.users.employees.index');
        
    }//end of update

    public function destroy(User $employee): Application | Response | ResponseFactory
    {
        $employee->delete();

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
        $employee = User::find($request->id);
        $employee?->update(['status' => !$employee->status]);

        session()->flash('success', __('admin.global.updated_successfully'));
        return response(__('admin.global.updated_successfully'));
        
    }//end of status

}//end of controller