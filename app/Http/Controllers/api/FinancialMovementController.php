<?php

namespace App\Http\Controllers;
use App\Http\Requests\StoreFinancialMovementRequest;
use App\Http\Requests\UpdateFinancialMovementRequest;
use App\Http\Resources\FinancialMovementResource;
use App\Models\FinancialMovement;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use Illuminate\Support\Facades\Validator;

class FinancialMovementController extends Controller
{

    public static function routeName(){
        return Str::snake("FinancialMovement");
    }
    public function __construct(Request $request){
        parent::__construct($request);
        $this->authorizeResource(FinancialMovement::class,Str::snake("FinancialMovement"));
    }
    public function index(Request $request)
    {
        return FinancialMovementResource::collection(FinancialMovement::search($request)->sort($request)->paginate($this->pagination));
    }
    public function store(StoreFinancialMovementRequest $request)
    {
        $financialMovement = FinancialMovement::create($request->validated());

        return new FinancialMovementResource($financialMovement);
    }
    public function show(Request $request,FinancialMovement $financialMovement)
    {
        return new FinancialMovementResource($financialMovement);
    }
    public function update(UpdateFinancialMovementRequest $request, FinancialMovement $financialMovement)
    {
        $financialMovement->update($request->validated());

        return new FinancialMovementResource($financialMovement);
    }
    public function destroy(Request $request,FinancialMovement $financialMovement)
    {
        $financialMovement->delete();
        return new FinancialMovementResource($financialMovement);
    }
}
