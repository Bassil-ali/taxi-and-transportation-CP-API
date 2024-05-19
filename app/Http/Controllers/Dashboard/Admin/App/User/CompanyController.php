<?php

namespace App\Http\Controllers\Dashboard\Admin\App\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Request\Admin\App\User\All\UserRequest;
use App\Http\Request\Admin\App\User\All\StatusRequest;
use App\Http\Request\Admin\App\User\All\DeleteRequest;
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

class CompanyController extends Controller
{
    public function index(): View
    {
        if(!permissionAdmin('read-users')) {
            return abort(403);
        }

        $datatables = (new DatatableServices())->header(
            [
                'route' => route('dashboard.admin.app.users.companys.data'),
                'checkbox' => [
                    'status' => route('dashboard.admin.app.users.companys.status'),
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

        return view('dashboard.admin.apps.users.companys.index', compact('datatables'));

    }//end of index

    public function data(): object
    {
        $permissions = [
            'status' => permissionAdmin('status-users'),
            'update' => permissionAdmin('update-users'),
            'delete' => permissionAdmin('delete-users'),
        ];

        $companys = User::getCompany();

        return dataTables()->of($companys)
            ->addColumn('record_select', 'components.dashboard.admin.data-table.input.record-select')
            ->addColumn('created_at', fn (User $company) => $company?->created_at?->format('Y-m-d'))
            ->editColumn('image', fn(User $company) => view('components.dashboard.admin.data-table.image')->with('models', $company))
            ->addColumn('city', fn (User $company) => $company->city?->name)
            ->editColumn('type', fn (User $company) => $company->typeName)
            ->addColumn('actions', fn(User $company) => adminAction(['edit', 'delete'], $permissions, $company, 'app.users.companys'))
            ->editColumn('status', fn(User $company) => view('components.dashboard.admin.data-table.input.status')->with(['models' => $company, 'permissions' => $permissions]))
            ->rawColumns(['record_select', 'actions', 'status', 'name'])
            ->addIndexColumn()
            ->toJson();

    }//end of data

    public function create(): View
    {
        if(!permissionAdmin('create-users')) {
            return abort(403);
        }

        return view('dashboard.admin.apps.users.companys.create');
        
    }//end of create

    //RedirectResponse
    public function store(UserRequest $request): RedirectResponse
    {
        User::create(request()->all());

        session()->flash('success', __('admin.global.added_successfully'));
        return redirect()->route('dashboard.admin.app.users.companys.index');

    }//end of store

    public function show(User $company): View
    {

        $datatables = (new DatatableServices())->header(
            [
                'route' => route('dashboard.admin.app.users.companys.dataTrip', ['company' => $company]),
                'header'  => [
                    'admin.menu.company',
                    'admin.global.price',
                    'admin.apps.trips.dues',
                    'admin.apps.trips.date',
                    'admin.apps.trips.go_time',
                    'admin.apps.trips.from_city',
                    'admin.apps.trips.to_city',
                    'admin.apps.trips.from_region',
                    'admin.apps.trips.to_region',
                    'admin.global.status',
                ],
                'columns' => [
                    'company'     => 'company',
                    'price'      => 'price',
                    'dues'       => 'dues',
                    'date'       => 'date',
                    'go_time'    => 'go_time',
                    'from_city'  => 'from_city',
                    'to_city'    => 'to_city',
                    'from_region'=> 'from_region',
                    'to_region'  => 'to_region',
                    'status'     => 'status',
                ]
            ]
        );

        $types = UserType::array();

        return view('dashboard.admin.apps.users.companys.show', compact('company', 'types', 'datatables'));

    }//end of show

    public function dataTrip(User $company): object
    {
        $permissions = [
            'status' => 'status-trips',
            'update' => 'update-trips',
            'delete' => 'delete-trips',
        ];

        $trips = $company->trips;

        return dataTables()->of($trips)
            ->addColumn('record_select', 'components.dashboard.admin.data-table.input.record-select')
            ->addColumn('created_at', fn (Trip $trip) => $trip?->created_at?->format('Y-m-d'))
            ->addColumn('company', fn (Trip $trip) => $trip?->company?->name)
            ->addColumn('from_city', fn (Trip $trip) => $trip?->fromCity?->name)
            ->addColumn('to_city', fn (Trip $trip) => $trip?->toCity?->name)
            ->addColumn('from_region', fn (Trip $trip) => $trip?->fromRegion?->name)
            ->addColumn('to_region', fn (Trip $trip) => $trip?->toRegion?->name)
            ->addColumn('actions', function(Trip $trip) use($permissions) {

                $actions = [
                    'delete'  => [
                        'route'       => route('dashboard.admin.app.trips.all.destroy', $trip->id),
                        'permissions' => $permissions['delete'],
                    ],
                    'show'  => [
                        'route'       => route('dashboard.admin.app.trips.all.show', $trip->id),
                        'permissions' => $permissions['delete'],
                    ]
                ];

                return view('components.dashboard.admin.data-table.btn.actions', compact('actions'));
            })
            ->addColumn('status', function(Trip $trip) {
                return <<<HTML
                            <span class="badge badge-light-success">$trip->StatusName</span>
                        HTML;
            })
            ->rawColumns(['record_select', 'actions', 'status', 'name'])
            ->addIndexColumn()
            ->toJson();

    }//end of show

    public function edit(User $company): View
    {
        if(!permissionAdmin('update-users')) {
            return abort(403);
        }

        return view('dashboard.admin.apps.users.companys.edit', compact('company'));

    }//end of edit

    public function update(UserRequest $request, User $company): RedirectResponse
    {
        $company->update(request()->all());

        session()->flash('success', __('admin.global.updated_successfully'));

        return redirect()->route('dashboard.admin.app.users.companys.index');
        
    }//end of update

    public function destroy(User $company): Application | Response | ResponseFactory
    {
        $company->delete();

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
        $company = User::find($request->id);
        $company?->update(['status' => !$company->status]);

        session()->flash('success', __('admin.global.updated_successfully'));
        return response(__('admin.global.updated_successfully'));
        
    }//end of status

}//end of controller