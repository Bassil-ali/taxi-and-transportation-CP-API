<?php

namespace App\Http\Controllers;

use App\Helpers\Messages;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\Response;


class CategoryController extends Controller
{

    public static function routeName()
    {
        return Str::snake("categories");
    }
    public function __construct(Request $request)
    {
        parent::__construct($request);
        $this->authorizeResource(Category::class,Str::snake("Category"));
    }
    public function index(Request $request)
    {
        $categories = Category::search($request)->sort($request)->paginate(15);

        return response()->view('categories.index', compact('categories'));
    }

    public function create()
    {

        return response()->view('categories.create');
    }


    public function store(StoreCategoryRequest $request)
    {
        $category = Category::create($request->validated());

        return response()->json(['message' => $category ? 'Created Successfully' : 'Failed To Create'], $category ? Response::HTTP_CREATED : Response::HTTP_BAD_REQUEST);
    }

    public function show(Request $request, Category $category)
    {
        return response()->view('categories.edit', compact('category'));
    }

    public function edit(Category $category)
    {


        return response()->view('categories.edit', compact('category'));
    }

    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $category->update($request->validated());

        return response()->json(['message' => $category ? 'Updated Successfully' : 'Failed To Updated'], $category ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST);
    }

    public function destroy(Request $request, Category $category)
    {
        if ($category->ads()->exists()) {
            return response()->json(['title' => Messages::getMessage('FAILED'), 'message' =>   Messages::getMessage('DELETE_FAILED'), 'icon' => 'error'],  Response::HTTP_BAD_REQUEST);
        }



        $deleted = $category->delete();

        if ($deleted) {
            return response()->json(['title' => 'Deleted!', 'message' => ' Deleted Successfully', 'icon' => 'success'], Response::HTTP_OK);
        } else {
            return response()->json(['title' => 'Failed!', 'message' => 'Delete Failed', 'icon' => 'error'],  Response::HTTP_BAD_REQUEST);
        }
    }
}
