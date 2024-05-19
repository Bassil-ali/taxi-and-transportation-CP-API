<?php

namespace App\Http\Controllers\Dashboard\Admin\App;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Request\Admin\App\TransportType\TransportTypeRequest;
use App\Http\Request\Admin\App\TransportType\StatusRequest;
use App\Http\Request\Admin\App\TransportType\DeleteRequest;
use App\Services\DatatableServices;
use App\Models\TransportType;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;

class TransportTypeController extends Controller
{
    public function index(): View
    {
        if(!permissionAdmin('read-transport_types')) {
            return abort(403);
        }

        $datatables = (new DatatableServices())->header(
            [
                'route' => route('dashboard.admin.app.transport_types.data'),
                'checkbox' => [
                    'status' => route('dashboard.admin.app.transport_types.status'),
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

        return view('dashboard.admin.apps.transport_types.index', compact('datatables'));

    }//end of index

    public function data(): object
    {
        $permissions = [
            'status' => permissionAdmin('status-transport_types'),
            'update' => permissionAdmin('update-transport_types'),
            'delete' => permissionAdmin('delete-transport_types'),
        ];

        $transport_types = TransportType::query();

        return dataTables()->of($transport_types)
            ->addColumn('record_select', 'components.dashboard.admin.data-table.input.record-select')
            ->addColumn('created_at', fn (TransportType $transportType) => $transportType?->created_at?->format('Y-m-d'))
            ->editColumn('name', fn (TransportType $transportType) => $transportType->name)
            ->addColumn('actions', fn(TransportType $transportType) => adminAction(['edit', 'delete'], $permissions, $transportType, 'app.transport_types'))
            ->editColumn('status', fn(TransportType $transportType) => view('components.dashboard.admin.data-table.input.status')->with(['models' => $transportType, 'permissions' => $permissions]))
            ->rawColumns(['record_select', 'actions', 'status', 'name'])
            ->addIndexColumn()
            ->toJson();

    }//end of data

    public function create(): View
    {
        if(!permissionAdmin('create-transport_types')) {
            return abort(403);
        }

        return view('dashboard.admin.apps.transport_types.create');
        
    }//end of create

    //RedirectResponse
    public function store(TransportTypeRequest $request): RedirectResponse
    {
        TransportType::create(request()->all());

        session()->flash('success', __('admin.global.added_successfully'));
        return redirect()->route('dashboard.admin.app.transport_types.index');

    }//end of store

    public function edit(TransportType $transportType): View
    {
        if(!permissionAdmin('update-transport_types')) {
            return abort(403);
        }

        return view('dashboard.admin.apps.transport_types.edit', compact('transportType'));

    }//end of edit

    public function update(TransportTypeRequest $request, TransportType $transportType): RedirectResponse
    {
        $transportType->update(request()->all());

        session()->flash('success', __('admin.global.updated_successfully'));

        return redirect()->route('dashboard.admin.app.transport_types.index');
        
    }//end of update

    public function destroy(TransportType $transportType): Application | Response | ResponseFactory
    {
        $transportType->delete();

        session()->flash('success', __('admin.global.deleted_successfully'));
        return response(__('admin.global.deleted_successfully'));

    }//end of delete

    public function bulkDelete(DeleteRequest $request): Application | Response | ResponseFactory
    {
        TransportType::destroy(request()->ids ?? []);

        session()->flash('success', __('admin.global.deleted_successfully'));
        return response(__('admin.global.deleted_successfully'));

    }//end of bulkDelete

    public function status(StatusRequest $request): Application | Response | ResponseFactory
    {
        $transportType = TransportType::find($request->id);
        $transportType->update(['status' => !$transportType->status]);

        session()->flash('success', __('admin.global.updated_successfully'));
        return response(__('admin.global.updated_successfully'));
        
    }//end of status

}//end of controller