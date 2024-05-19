<?php

namespace App\Http\Controllers\Dashboard\Admin\Managements;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Request\Admin\Managements\Language\LanguageRequest;
use App\Http\Request\Admin\Managements\Language\StatusRequest;
use App\Http\Request\Admin\Managements\Language\DeleteRequest;
use App\Enums\Admin\LanguageType;
use App\Services\DatatableServices;
use App\models\Language;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;

class LanguageController extends Controller
{
    public function index(): View
    {
        if(!permissionAdmin('read-languages')) {
            return abort(403);
        }

        $datatables = (new DatatableServices())->header(
            [
                'route' => route('dashboard.admin.management.languages.data'),
                'checkbox' => [
                    'status'  => route('dashboard.admin.management.languages.status'),
                    'default' => route('dashboard.admin.management.languages.default'),
                ],
                'header'  => [
                    'admin.global.name',
                    'admin.managements.languages.dir',
                    'admin.managements.languages.flag',
                    'admin.managements.languages.code',
                    'admin.global.default',
                    'admin.global.admin',
                    'admin.global.status',
                ],
                'columns' => [
                    'name'   => 'name',
                    'dir'    => 'dir',
                    'flag'   => 'flag',
                    'code'   => 'code',
                    'default'=> 'default',
                    'admin'  => 'admin',
                    'status' => 'status',
                ]
            ]
        );

        return view('dashboard.admin.managements.languages.index', compact('datatables'));

    }//end of index

    public function data(): object
    {
        $permissions = [
            'status' => permissionAdmin('status-languages'),
            'update' => permissionAdmin('update-languages'),
            'delete' => permissionAdmin('delete-languages'),
        ];

        $language = Language::query();

        return dataTables()->of($language)
            ->addColumn('record_select', 'components.dashboard.admin.data-table.input.record-select')
            ->addColumn('created_at', fn (Language $language) => $language?->created_at?->format('Y-m-d'))
            ->addColumn('admin', fn (Language $language) => $language?->admin?->name)
            ->editColumn('flag', fn(Language $language) => view('components.dashboard.admin.data-table.image')->with('models', $language))
            ->addColumn('actions', fn(Language $language) => adminAction(['edit', 'delete'], $permissions, $language, 'management.languages'))
            ->addColumn('status', fn(Language $language) => !$language->default ? view('components.dashboard.admin.data-table.input.status')->with(['models' => $language, 'permissions' => $permissions]) : '')
            ->addColumn('default', fn(Language $language) => view('dashboard.admin.managements.languages.data_tables.check_default')->with(['language' => $language]))
            ->rawColumns(['record_select', 'actions', 'status', 'default'])
            ->addIndexColumn()
            ->toJson();

    }//end of data

    public function create(): View
    {
        if(!permissionAdmin('create-languages')) {
            return abort(403);
        }

        $types = LanguageType::array();  

        return view('dashboard.admin.managements.languages.create', compact('types'));
        
    }//end of create

    //RedirectResponse
    public function store(LanguageRequest $request): RedirectResponse
    {
        $requestData = request()->except(['flag']);

        if(request()->file('flag')) {

            $requestData['flag'] = request()->file('flag')->store('languages', 'public');

        }

        Language::create($requestData);

        session()->flash('success', __('admin.global.added_successfully'));
        return redirect()->route('dashboard.admin.management.languages.index');

    }//end of store

    public function edit(Language $language): View
    {
        if(!permissionAdmin('update-languages')) {
            return abort(403);
        }
        
        $types = LanguageType::array();

        return view('dashboard.admin.managements.languages.edit', compact('language', 'types'));

    }//end of edit

    public function update(LanguageRequest $request, Language $language): RedirectResponse
    {
        $requestData = request()->except(['flag']);

        if(request()->has('flag')) {

            $language->flag ? Storage::disk('public')->delete($language->flag) : '';

            $requestData['flag'] = request()->file('flag')->store('languages', 'public');

        }

        $language->update($requestData);

        session()->flash('success', __('admin.global.updated_successfully'));
        return redirect()->route('dashboard.admin.management.languages.index');
        
    }//end of update

    public function destroy(Language $language): Application | Response | ResponseFactory
    {
        if(!$language->default) {

            $language->flag ? Storage::disk('public')->delete($language->flag) : '';
            $language->delete();
        }

        session()->flash('success', __('admin.global.deleted_successfully'));
        return response(__('admin.global.deleted_successfully'));

    }//end of delete

    public function bulkDelete(DeleteRequest $request)
    {
        $images = Language::where('default', 0)->find(request()->ids ?? [])->whereNotNull('flag')->pluck('flag')->toArray();
        count($images) > 0 ? Storage::disk('public')->delete($images) : '';
        Language::destroy(request()->ids ?? []);

        session()->flash('success', __('admin.global.deleted_successfully'));
        return response(__('admin.global.deleted_successfully'));

    }//end of bulkDelete

    public function status(StatusRequest $request): Application | Response | ResponseFactory
    {
        $language = Language::find($request->id);
        $language?->update(['status' => !$language->status]);

        session()->flash('success', __('admin.global.updated_successfully'));
        return response(__('admin.global.updated_successfully'));
        
    }//end of status

    public function changeDefault(StatusRequest $request): Application | Response | ResponseFactory
    {
        Language::each(fn ($language) => $language->update(['default' => 0]));
        Language::find($request->id)->update(['default' => 1, 'status' => 1]);

        session()->flash('success', __('admin.global.updated_successfully'));
        return response(__('admin.global.updated_successfully'));
        
    }//end of status

}//end of controller