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

class CustomerController extends Controller
{
    public function index(): View
    {
        if(!permissionAdmin('read-users')) {
            return abort(403);
        }

        $datatables = (new DatatableServices())->header(
            [
                'route' => route('dashboard.admin.app.users.customers.data'),
                'checkbox' => [
                    'status' => route('dashboard.admin.app.users.customers.status'),
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

        return view('dashboard.admin.apps.users.customers.index', compact('datatables'));

    }//end of index

    public function data(): object
    {
        $permissions = [
            'status' => permissionAdmin('status-users'),
            'update' => permissionAdmin('update-users'),
            'delete' => permissionAdmin('delete-users'),
        ];

        $customers = User::getCustomer();

        return dataTables()->of($customers)
            ->addColumn('record_select', 'components.dashboard.admin.data-table.input.record-select')
            ->addColumn('created_at', fn (User $customer) => $customer?->created_at?->format('Y-m-d'))
            ->editColumn('image', fn(User $customer) => view('components.dashboard.admin.data-table.image')->with('models', $customer))
            ->addColumn('city', fn (User $customer) => $customer->city?->name)
            ->editColumn('type', fn (User $customer) => $customer->typeName)
            ->addColumn('actions', fn(User $customer) => adminAction(['edit', 'delete'], $permissions, $customer, 'app.users.customers'))
            ->editColumn('status', fn(User $customer) => view('components.dashboard.admin.data-table.input.status')->with(['models' => $customer, 'permissions' => $permissions]))
            ->rawColumns(['record_select', 'actions', 'status', 'name'])
            ->addIndexColumn()
            ->toJson();

    }//end of data

    public function create(): View
    {
        if(!permissionAdmin('create-users')) {
            return abort(403);
        }

        return view('dashboard.admin.apps.users.customers.create');
        
    }//end of create

    //RedirectResponse
    public function store(UserRequest $request): RedirectResponse
    {
        User::create(request()->customers());

        session()->flash('success', __('admin.global.added_successfully'));
        return redirect()->route('dashboard.admin.app.users.customers.index');

    }//end of store

    public function show(User $customer): View
    {

        $datatables = (new DatatableServices())->header(
            [
                'route' => route('dashboard.admin.app.users.customers.dataTrip', ['customer' => $customer]),
                'header'  => [
                    'admin.menu.customers',
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
                    'customer'   => 'customer',
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

        return view('dashboard.admin.apps.users.customers.show', compact('customer', 'types', 'datatables'));

    }//end of show

    public function dataTrip(User $customer): object
    {
        $permissions = [
            'status' => 'status-trips',
            'update' => 'update-trips',
            'delete' => 'delete-trips',
        ];

        $trips = $customer->trips;

        return dataTables()->of($trips)
            ->addColumn('record_select', 'components.dashboard.admin.data-table.input.record-select')
            ->addColumn('created_at', fn (Trip $trip) => $trip?->created_at?->format('Y-m-d'))
            ->addColumn('customer', fn (Trip $trip) => $trip?->customer?->name)
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

    public function edit(User $customer): View
    {
        if(!permissionAdmin('update-users')) {
            return abort(403);
        }

        return view('dashboard.admin.apps.users.customers.edit', compact('category'));

    }//end of edit

    public function update(UserRequest $request, User $customer): RedirectResponse
    {
        $customer->update(request()->all());

        session()->flash('success', __('admin.global.updated_successfully'));

        return redirect()->route('dashboard.admin.app.users.customers.index');
        
    }//end of update

    public function destroy(User $customer): Application | Response | ResponseFactory
    {
        $customer->delete();

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
        $customer = User::find($request->id);
        $customer?->update(['status' => !$customer->status]);

        session()->flash('success', __('admin.global.updated_successfully'));
        return response(__('admin.global.updated_successfully'));
        
    }//end of status

}//end of controller