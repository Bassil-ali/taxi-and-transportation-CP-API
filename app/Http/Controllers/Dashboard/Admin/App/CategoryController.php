<?php

namespace App\Http\Controllers\Dashboard\Admin\App;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Request\Admin\App\Category\CategoryRequest;
use App\Http\Request\Admin\App\Category\StatusRequest;
use App\Http\Request\Admin\App\Category\DeleteRequest;
use App\Services\DatatableServices;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;

class CategoryController extends Controller
{
    public function index(): View
    {
        if(!permissionAdmin('read-categories')) {
            return abort(403);
        }

        $datatables = (new DatatableServices())->header(
            [
                'route' => route('dashboard.admin.app.categories.data'),
                'checkbox' => [
                    'status' => route('dashboard.admin.app.categories.status'),
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

        return view('dashboard.admin.apps.categories.index', compact('datatables'));

    }//end of index

    public function data(): object
    {
        $permissions = [
            'status' => permissionAdmin('status-categories'),
            'update' => permissionAdmin('update-categories'),
            'delete' => permissionAdmin('delete-categories'),
        ];

        $categories = Category::query();

        return dataTables()->of($categories)
            ->addColumn('record_select', 'components.dashboard.admin.data-table.input.record-select')
            ->addColumn('created_at', fn (Category $category) => $category?->created_at?->format('Y-m-d'))
            ->editColumn('name', fn (Category $category) => $category->name)
            ->addColumn('actions', fn(Category $category) => adminAction(['edit', 'delete'], $permissions, $category, 'app.categories'))
            ->editColumn('status', fn(Category $category) => view('components.dashboard.admin.data-table.input.status')->with(['models' => $category, 'permissions' => $permissions]))
            ->rawColumns(['record_select', 'actions', 'status', 'name'])
            ->addIndexColumn()
            ->toJson();

    }//end of data

    public function create(): View
    {
        if(!permissionAdmin('create-categories')) {
            return abort(403);
        }

        return view('dashboard.admin.apps.categories.create');
        
    }//end of create

    //RedirectResponse
    public function store(CategoryRequest $request): RedirectResponse
    {
        Category::create(request()->all());

        session()->flash('success', __('admin.global.added_successfully'));
        return redirect()->route('dashboard.admin.app.categories.index');

    }//end of store

    public function edit(Category $category): View
    {
        if(!permissionAdmin('update-categories')) {
            return abort(403);
        }

        return view('dashboard.admin.apps.categories.edit', compact('category'));

    }//end of edit

    public function update(CategoryRequest $request, Category $category): RedirectResponse
    {
        $category->update(request()->all());

        session()->flash('success', __('admin.global.updated_successfully'));

        return redirect()->route('dashboard.admin.app.categories.index');
        
    }//end of update

    public function destroy(Category $category): Application | Response | ResponseFactory
    {
        $category->delete();

        session()->flash('success', __('admin.global.deleted_successfully'));
        return response(__('admin.global.deleted_successfully'));

    }//end of delete

    public function bulkDelete(DeleteRequest $request): Application | Response | ResponseFactory
    {
        Category::destroy(request()->ids ?? []);

        session()->flash('success', __('admin.global.deleted_successfully'));
        return response(__('admin.global.deleted_successfully'));

    }//end of bulkDelete

    public function status(StatusRequest $request): Application | Response | ResponseFactory
    {
        $category = Category::find($request->id);
        $category->update(['status' => !$category->status]);

        session()->flash('success', __('admin.global.updated_successfully'));
        return response(__('admin.global.updated_successfully'));
        
    }//end of status

}//end of controller