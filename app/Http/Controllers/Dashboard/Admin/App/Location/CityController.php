<?php

namespace App\Http\Controllers\Dashboard\Admin\App\Location;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Request\Admin\App\Location\City\CityRequest;
use App\Http\Request\Admin\App\Location\City\StatusRequest;
use App\Http\Request\Admin\App\Location\City\DeleteRequest;
use App\Services\DatatableServices;
use App\Models\City;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;

class CityController extends Controller
{
    public function index(): View
    {
        if(!permissionAdmin('read-cities')) {
            return abort(403);
        }

        $datatables = (new DatatableServices())->header(
            [
                'route' => route('dashboard.admin.app.locations.cities.data'),
                'checkbox' => [
                    'status' => route('dashboard.admin.app.locations.cities.status'),
                ],
                'header'  => [
                    'admin.global.name',
                    'admin.global.status',
                ],
                'columns' => [
                    'name'   => 'name',
                    'status' => 'status',
                ]
            ]
        );

        return view('dashboard.admin.apps.locations.cities.index', compact('datatables'));

    }//end of index

    public function data(): object
    {
        $permissions = [
            'status' => permissionAdmin('status-cities'),
            'update' => permissionAdmin('update-cities'),
            'delete' => permissionAdmin('delete-cities'),
        ];

        $cities = City::query();

        return dataTables()->of($cities)
            ->addColumn('record_select', 'components.dashboard.admin.data-table.input.record-select')
            ->addColumn('created_at', fn (City $city) => $city?->created_at?->format('Y-m-d'))
            ->editColumn('name', fn (City $city) => $city->name)
            ->addColumn('actions', function(City $city) use($permissions) {

                $actions = [
                    'edit'  => [
                        'route'       => route('dashboard.admin.app.locations.cities.edit', $city->id),
                        'permissions' => $permissions['update'],
                    ],
                    'delete'  => [
                        'route'       => route('dashboard.admin.app.locations.cities.destroy', $city->id),
                        'permissions' => $permissions['delete'],
                    ]
                ];

                return view('components.dashboard.admin.data-table.btn.actions', compact('actions'));
            })
            ->addColumn('status', fn(City $city) => view('components.dashboard.admin.data-table.input.status')->with(['models' => $city, 'permissions' => $permissions]))
            ->rawColumns(['record_select', 'actions', 'status', 'name'])
            ->addIndexColumn()
            ->toJson();

    }//end of data

    public function create(): View
    {
        if(!permissionAdmin('create-cities')) {
            return abort(403);
        }

        return view('dashboard.admin.apps.locations.cities.create');
        
    }//end of create

    //RedirectResponse
    public function store(CityRequest $request): RedirectResponse
    {
        City::create(request()->all());

        session()->flash('success', __('admin.global.added_successfully'));
        return redirect()->route('dashboard.admin.app.locations.cities.index');

    }//end of store

    public function edit(City $city): View
    {
        if(!permissionAdmin('update-cities')) {
            return abort(403);
        }

        return view('dashboard.admin.apps.locations.cities.edit', compact('city'));

    }//end of edit

    public function update(CityRequest $request, City $city): RedirectResponse
    {
        $city->update(request()->all());

        session()->flash('success', __('admin.global.updated_successfully'));

        return redirect()->route('dashboard.admin.app.locations.cities.index');
        
    }//end of update

    public function destroy(City $city): Application | Response | ResponseFactory
    {
        $city->delete();

        session()->flash('success', __('admin.global.deleted_successfully'));
        return response(__('admin.global.deleted_successfully'));

    }//end of delete

    public function bulkDelete(DeleteRequest $request): Application | Response | ResponseFactory
    {
        City::destroy(request()->ids ?? []);

        session()->flash('success', __('admin.global.deleted_successfully'));
        return response(__('admin.global.deleted_successfully'));

    }//end of bulkDelete

    public function status(StatusRequest $request): Application | Response | ResponseFactory
    {
        $city = City::find($request->id);
        $city->update(['status' => !$city->status]);

        session()->flash('success', __('admin.global.updated_successfully'));
        return response(__('admin.global.updated_successfully'));
        
    }//end of status

}//end of controller