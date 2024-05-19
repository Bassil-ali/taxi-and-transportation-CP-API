<?php

namespace App\Http\Controllers\api;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{

    public static function routeName(){
        return Str::snake("categories");
    }
    public function __construct(Request $request){
        parent::__construct($request);
        // $this->authorizeResource(Category::class,Str::snake("Category"));
    }
    public function index(Request $request)
    {

        return CategoryResource::collection(Category::search($request)->sort($request)->paginate($this->pagination));
    }

}
