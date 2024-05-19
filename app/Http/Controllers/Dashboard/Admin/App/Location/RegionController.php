<?php

namespace App\Http\Controllers\Dashboard\Admin\App\Location;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Request\Admin\App\Location\Region\RegionRequest;
use App\Http\Request\Admin\App\Location\Region\StatusRequest;
use App\Http\Request\Admin\App\Location\Region\DeleteRequest;
use App\Services\DatatableServices;
use App\Models\Region;
use App\Models\City;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;

class RegionController extends Controller
{
    public function index(): View
    {
        if(!permissionAdmin('read-regions')) {
            return abort(403);
        }

        $datatables = (new DatatableServices())->header(
            [
                'route' => route('dashboard.admin.app.locations.regions.data'),
                'checkbox' => [
                    'status' => route('dashboard.admin.app.locations.regions.status'),
                ],
                'header'  => [
                    'admin.global.name',
                    'admin.menu.city',
                    'admin.global.status',
                ],
                'columns' => [
                    'name'   => 'name',
                    'city'   => 'city',
                    'status' => 'status',
                ]
            ]
        );

        return view('dashboard.admin.apps.locations.regions.index', compact('datatables'));

    }//end of index

    public function data(): object
    {
        $permissions = [
            'status' => permissionAdmin('status-regions'),
            'update' => permissionAdmin('update-regions'),
            'delete' => permissionAdmin('delete-regions'),
        ];

        $regions = Region::query();

        return dataTables()->of($regions)
            ->addColumn('record_select', 'components.dashboard.admin.data-table.input.record-select')
            ->addColumn('created_at', fn (Region $region) => $region?->created_at?->format('Y-m-d'))
            ->editColumn('name', fn (Region $region) => $region->name)
            ->addColumn('city', fn (Region $region) => $region->city?->name)
            ->addColumn('actions', function(Region $region) use($permissions) {

                $actions = [
                    'edit'  => [
                        'route'       => route('dashboard.admin.app.locations.regions.edit', $region->id),
                        'permissions' => $permissions['update'],
                    ],
                    'delete'  => [
                        'route'       => route('dashboard.admin.app.locations.regions.destroy', $region->id),
                        'permissions' => $permissions['delete'],
                    ]
                ];

                return view('components.dashboard.admin.data-table.btn.actions', compact('actions'));
            })
            ->addColumn('status', fn(Region $region) => view('components.dashboard.admin.data-table.input.status')->with(['models' => $region, 'permissions' => $permissions]))
            ->rawColumns(['record_select', 'actions', 'status', 'name'])
            ->addIndexColumn()
            ->toJson();

    }//end of data

    public function create()
    {
        if(!permissionAdmin('create-regions')) {
            return abort(403);
        }

        $cities = City::pluck('name', 'id');

        return view('dashboard.admin.apps.locations.regions.create', compact('cities'));
        
    }//end of create

    //RedirectResponse
    public function store(RegionRequest $request): RedirectResponse
    {
        Region::create(request()->all());

        session()->flash('success', __('admin.global.added_successfully'));
        return redirect()->route('dashboard.admin.app.locations.regions.index');

    }//end of store

    public function edit(Region $region): View
    {
        if(!permissionAdmin('update-regions')) {
            return abort(403);
        }

        $cities = City::pluck('name', 'id');

        return view('dashboard.admin.apps.locations.regions.edit', compact('region', 'cities'));

    }//end of edit

    public function update(RegionRequest $request, Region $region): RedirectResponse
    {
        $region->update(request()->all());

        session()->flash('success', __('admin.global.updated_successfully'));

        return redirect()->route('dashboard.admin.app.locations.regions.index');
        
    }//end of update

    public function destroy(Region $region): Application | Response | ResponseFactory
    {
        $region->delete();

        session()->flash('success', __('admin.global.deleted_successfully'));
        return response(__('admin.global.deleted_successfully'));

    }//end of delete

    public function bulkDelete(DeleteRequest $request): Application | Response | ResponseFactory
    {
        Region::destroy(request()->ids ?? []);

        session()->flash('success', __('admin.global.deleted_successfully'));
        return response(__('admin.global.deleted_successfully'));

    }//end of bulkDelete

    public function status(StatusRequest $request): Application | Response | ResponseFactory
    {
        $region = Region::find($request->id);
        $region->update(['status' => !$region->status]);

        session()->flash('success', __('admin.global.updated_successfully'));
        return response(__('admin.global.updated_successfully'));
        
    }//end of status

}//end of controller