<?php

namespace App\Http\Controllers\Dashboard\Admin\App\Trip;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Request\Admin\App\Trip\Ad\TripRequest;
use App\Http\Request\Admin\App\Trip\Ad\StatusRequest;
use App\Http\Request\Admin\App\Trip\Ad\DeleteRequest;
use App\Services\DatatableServices;
use App\Models\Trip;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;

class AdController extends Controller
{
    public function index(): View
    {
        if(!permissionAdmin('read-trips')) {
            return abort(403);
        }

        $datatables = (new DatatableServices())->header(
            [
                'route' => route('dashboard.admin.app.trips.ads.data'),
                'header'  => [
                    'admin.menu.ads',
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
                    'ads'        => 'ads',
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

        return view('dashboard.admin.apps.trips.ads.index', compact('datatables'));

    }//end of index

    public function data(): object
    {
        $permissions = [
            'status' => permissionAdmin('status-trips'),
            'update' => permissionAdmin('update-trips'),
            'delete' => permissionAdmin('delete-trips'),
        ];

        $trips = Trip::getAds();

        return dataTables()->of($trips)
            ->addColumn('record_select', 'components.dashboard.admin.data-table.input.record-select')
            ->addColumn('created_at', fn (Trip $trip) => $trip?->created_at?->format('Y-m-d'))
            ->addColumn('ads', fn (Trip $trip) => $trip?->ads?->name)
            ->addColumn('from_city', fn (Trip $trip) => $trip?->fromCity?->name)
            ->addColumn('to_city', fn (Trip $trip) => $trip?->toCity?->name)
            ->addColumn('from_region', fn (Trip $trip) => $trip?->fromRegion?->name)
            ->addColumn('to_region', fn (Trip $trip) => $trip?->toRegion?->name)
            ->addColumn('actions', fn(Trip $trip) => adminAction(['edit', 'delete'], $permissions, $trip, 'app.trips.ads'))
            ->addColumn('status', fn(Trip $trip) => adminBadge($trip->statusName))
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
        Trip::create(request()->ads());

        session()->flash('success', __('admin.global.added_successfully'));
        return redirect()->route('dashboard.admin.app.trips.ads.index');

    }//end of store

    public function edit(Trip $trip): View
    {
        if(!permissionAdmin('update-trips')) {
            return abort(403);
        }

        return view('dashboard.admin.apps.trips.edit', compact('category'));

    }//end of edit

    public function update(TripRequest $request, Trip $trip): RedirectResponse
    {
        $trip->update(request()->ads());

        session()->flash('success', __('admin.global.updated_successfully'));

        return redirect()->route('dashboard.admin.app.trips.ads.index');
        
    }//end of update

    public function destroy(Trip $trip)
    {
        dd($trip);
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
        $trip?->update(['status' => !$trip->status]);

        session()->flash('success', __('admin.global.updated_successfully'));
        return response(__('admin.global.updated_successfully'));
        
    }//end of status

}//end of controller