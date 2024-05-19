<?php

namespace App\Http\Controllers\Dashboard\Admin\Setting;

use App\Services\DatatableServices;
use App\Http\Controllers\Controller;
use App\Http\Request\Admin\Settings\WebsitRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Contracts\View\View;
use App\Http\Request\Admin\Settings\ContactUs\StatusRequest;
use App\Http\Request\Admin\Settings\ContactUs\DeleteRequest;
use App\Models\ContactUs;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;

class ContactController extends Controller
{
    public function index(): View
    {
        if(!permissionAdmin('read-settings')) {
            return abort(403);
        }

        $datatables = (new DatatableServices())->header(
            [
                'route' => route('dashboard.admin.setting.contact.data'),
                'checkbox' => [
                    'status' => route('dashboard.admin.setting.contact.status'),
                ],
                'header'  => [
                    'admin.global.email',
                    'admin.global.title',
                    'admin.global.description',
                    'admin.global.admin',
                    'admin.global.read',
                ],
                'columns' => [
                    'email'       => 'email',
                    'title'       => 'title',
                    'description' => 'description',
                    'admin'        => 'admin',
                    'read'        => 'read',
                ]
            ]
        );

        return view('dashboard.admin.settings.contact_us.index', compact('datatables'));

    }//end of index

    public function data(): object
    {
        $permissions = [
            'status' => permissionAdmin('status-settings'),
            'delete' => permissionAdmin('delete-settings'),
        ];

        $contactUs = ContactUs::query();

        return dataTables()->of($contactUs)
            ->addColumn('record_select', 'components.dashboard.admin.data-table.input.record-select')
            ->addColumn('created_at', fn (ContactUs $contactUs) => $contactUs?->created_at?->format('Y-m-d'))
            ->addColumn('admin', fn (ContactUs $contactUs) => $contactUs?->admin?->name)
            ->editColumn('title', fn (ContactUs $contactUs) => $contactUs->title)
            ->editColumn('description', fn (ContactUs $contactUs) => $contactUs->description)
            ->addColumn('actions', function(ContactUs $contactUs) use($permissions) {

                $actions = [
                    'show'  => [
                        'route'       => route('dashboard.admin.setting.contact.show', $contactUs->id),
                        'permissions' => true,
                    ],
                    'delete'  => [
                        'route'       => route('dashboard.admin.setting.contact.destroy', $contactUs->id),
                        'permissions' => $permissions['delete'],
                    ]
                ];

                return view('components.dashboard.admin.data-table.btn.actions', compact('actions'));
            })
            ->addColumn('read', function(ContactUs $contactUs) use($permissions) {
                return view('components.dashboard.admin.data-table.input.status', compact('permissions'))->with('models', $contactUs);
            })
            ->rawColumns(['record_select', 'actions', 'status', 'name'])
            ->addIndexColumn()
            ->toJson();

    }//end of data

    public function show(ContactUs $contact)
    {
        return view('dashboard.admin.settings.contact_us.show', compact('contact'));

    }//end of show

    public function destroy(ContactUs $contactUs): Application | Response | ResponseFactory
    {
        $contactUs->delete();

        session()->flash('success', __('admin.global.deleted_successfully'));
        return response(__('admin.global.deleted_successfully'));

    }//end of delete

    public function bulkDelete(DeleteRequest $request): Application | Response | ResponseFactory
    {
        ContactUs::destroy(request()->ids ?? []);

        session()->flash('success', __('admin.global.deleted_successfully'));
        return response(__('admin.global.deleted_successfully'));

    }//end of bulkDelete

    public function status(StatusRequest $request): Application | Response | ResponseFactory
    {
        $contactUs = ContactUs::find($request->id);
        $contactUs->update(['status' => !$contactUs->status]);

        session()->flash('success', __('admin.global.updated_successfully'));
        return response(__('admin.global.updated_successfully'));
        
    }//end of status

}//end of controller