<?php

namespace App\Http\Controllers\Dashboard\Admin\App\Trip;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Request\Admin\App\Trip\Driver\TripRequest;
use App\Http\Request\Admin\App\Trip\Driver\StatusRequest;
use App\Http\Request\Admin\App\Trip\Driver\DeleteRequest;
use App\Services\DatatableServices;
use App\Models\Trip;
use Illuminate\Support\Facdriveres\Storage;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;

class DriverController extends Controller
{
    public function index(): View
    {
        if(!permissionAdmin('read-trips')) {
            return abort(403);
        }

        $datatables = (new DatatableServices())->header(
            [
                'route' => route('dashboard.admin.app.trips.drivers.data'),
                'header'  => [
                    'admin.menu.drivers',
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
                    'driver'     => 'driver',
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

        return view('dashboard.admin.apps.trips.drivers.index', compact('datatables'));

    }//end of index

    public function data(): object
    {
        $permissions = [
            'status' => permissionAdmin('status-trips'),
            'delete' => permissionAdmin('delete-trips'),
            'show'   => permissionAdmin('read-trips'),
        ];

        $trips = Trip::getDriver();

        return dataTables()->of($trips)
            ->addColumn('record_select', 'components.dashboard.admin.data-table.input.record-select')
            ->addColumn('created_at', fn (Trip $trip) => $trip?->created_at?->format('Y-m-d'))
            ->addColumn('driver', fn (Trip $trip) => $trip?->driver?->name)
            ->addColumn('from_city', fn (Trip $trip) => $trip?->fromCity?->name)
            ->addColumn('to_city', fn (Trip $trip) => $trip?->toCity?->name)
            ->addColumn('from_region', fn (Trip $trip) => $trip?->fromRegion?->name)
            ->addColumn('to_region', fn (Trip $trip) => $trip?->toRegion?->name)
            ->addColumn('actions', fn(Trip $trip) => adminAction([], $permissions, $trip, 'app.trips.drivers'))
            ->addColumn('status', function(Trip $trip) {
                return <<<HTML
                            <span class="badge badge-light-success">$trip->StatusName</span>
                        HTML;
            })
            ->rawColumns(['record_select', 'actions', 'status', 'name'])
            ->addIndexColumn()
            ->toJson();

    }//end of data

    public function create(): View
    {
        if(!permissionAdmin('create-trips')) {
            return abort(403);
        }

        return view('dashboard.admin.apps.trips.create');
        
    }//end of create

    //RedirectResponse
    public function store(TripRequest $request): RedirectResponse
    {
        Trip::create(request()->drivers());

        session()->flash('success', __('admin.global.driverded_successfully'));
        return redirect()->route('dashboard.admin.app.trips.drivers.index');

    }//end of store

    public function edit(Trip $trip): View
    {
        if(!permissionAdmin('update-trips')) {
            return abort(403);
        }

        return view('dashboard.admin.apps.trips.edit', compact('category'));

    }//end of edit

    public function show($trip)
    {
        $trip = Trip::findOrFail($trip);

        return view('dashboard.admin.apps.trips.drivers.show', compact('trip'));

    }//end of show

    public function update(TripRequest $request, Trip $trip): RedirectResponse
    {
        $trip->update(request()->drivers());

        session()->flash('success', __('admin.global.updated_successfully'));

        return redirect()->route('dashboard.admin.app.trips.drivers.index');
        
    }//end of update

    public function destroy(Trip $trip): Application | Response | ResponseFactory
    {
        $trip->delete();

        session()->flash('success', __('admin.global.deleted_successfully'));
        return response(__('admin.global.deleted_successfully'));

    }//end of delete

    public function bulkDelete(DeleteRequest $request): Application | Response | ResponseFactory
    {
        Trip::destroy(request()->ids ?? []);

        session()->flash('success', __('admin.global.deleted_successfully'));
        return response(__('admin.global.deleted_successfully'));

    }//end of bulkDelete

    public function status(StatusRequest $request): Application | Response | ResponseFactory
    {
        $trip = Trip::find($request->id);
        // $trip?->update(['status' => !$trip->status]);

        session()->flash('success', __('admin.global.updated_successfully'));
        return response(__('admin.global.updated_successfully'));
        
    }//end of status

}//end of controller