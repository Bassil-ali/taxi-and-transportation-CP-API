<?php

namespace App\Http\Controllers;

use App\Helpers\Messages;
use App\Http\Requests\StoreCityRequest;
use App\Http\Requests\UpdateCityRequest;
use App\Models\City;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\Response;


class CityController extends Controller
{

    public static function routeName(){
        return Str::snake("cities");
    }
    public function __construct(Request $request){
        parent::__construct($request);
        $this->authorizeResource(City::class,Str::snake("City"));
    }
    public function index(Request $request)
    {
        $cities = City::search($request)->sort($request)->paginate(15);

        return response()->view('cities.index', compact('cities'));

    }

    public function create (){

         return view('cities.create');

    }


    public function store(StoreCityRequest $request)
    {
        $city = City::create($request->validated());

          return response()->json(['message' => $city ? 'Created Successfully' : 'Failed To Create'], $city ? Response::HTTP_CREATED : Response::HTTP_BAD_REQUEST);
    }

    public function show(Request $request,City $city)
    {
         return response()->view('', compact('city'));
    }

    public function edit(City $city){


         return response()->view('cities.edit', compact('city'));

    }

    public function update(UpdateCityRequest $request, City $city)
    {
        $city->update($request->validated());

         return response()->json(['message' => $city ? 'Updated Successfully' : 'Failed To Updated'], $city ?Response::HTTP_OK : Response::HTTP_BAD_REQUEST);
    }

    public function destroy(Request $request,City $city)
    {

        if ($city->users()->exists() ||$city->regions()->exists() ||$city->from_ads()->exists()  ||$city->to_ads()->exists()) {
            return response()->json(['title' => Messages::getMessage('FAILED'), 'message' =>   Messages::getMessage('DELETE_FAILED'), 'icon' => 'error'],  Response::HTTP_BAD_REQUEST);
        }


        $deleted = $city->delete();

        if ($deleted) {
            return response()->json(['title' => 'Deleted!', 'message' => ' Deleted Successfully', 'icon' => 'success'], Response::HTTP_OK);
        } else {
            return response()->json(['title' => 'Failed!', 'message' => 'Delete Failed', 'icon' => 'error'],  Response::HTTP_BAD_REQUEST);
        }
    }
}
