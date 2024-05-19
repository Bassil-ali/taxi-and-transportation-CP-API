<?php

namespace App\Http\Controllers;
use App\Http\Requests\StoreFinancialMovementRequest;
use App\Http\Requests\UpdateFinancialMovementRequest;
use App\Models\FinancialMovement;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\Response;


class FinancialMovementController extends Controller
{

    public static function routeName(){
        return Str::snake("FinancialMovements");
    }
    public function __construct(Request $request){
        parent::__construct($request);
        $this->authorizeResource(FinancialMovement::class,Str::snake("FinancialMovement"));
    }
    public function index(Request $request)
    {
        $financial_movements = FinancialMovement::with('admin')->search($request)->sort($request)->paginate(15);

        return response()->view('financial_movement.index', compact('financial_movements'));

    }

    public function create (){

         return response()->view('');

    }


    public function store(StoreFinancialMovementRequest $request)
    {

        $data = $request->validated() ;

        $data['impact'] =  $data['type'] == FinancialMovement::TYPES['deposit'] ? '+' : '-' ;
        $data['admin_id'] = auth()->user()->id ;
        $financialMovement = FinancialMovement::create($data);

          return response()->json(['message' => $financialMovement ? 'Created Successfully' : 'Failed To Create'], $financialMovement ? Response::HTTP_CREATED : Response::HTTP_BAD_REQUEST);
    }

    public function show(Request $request,FinancialMovement $financialMovement)
    {
         return response()->view('', compact('financialMovement'));
    }

    public function edit(FinancialMovement $financialMovement){


         return response()->view('', compact('financialMovement'));

    }

    public function update(UpdateFinancialMovementRequest $request, FinancialMovement $financialMovement)
    {
        $financialMovement->update($request->validated());

         return response()->json(['message' => $financialMovement ? 'Updated Successfully' : 'Failed To Updated'], $financialMovement ?Response::HTTP_OK : Response::HTTP_BAD_REQUEST);
    }

    public function destroy(Request $request,FinancialMovement $financialMovement)
    {
        // $deleted = $financialMovement->delete();

        // if ($deleted) {
        //     return response()->json(['title' => 'Deleted!', 'message' => ' Deleted Successfully', 'icon' => 'success'], Response::HTTP_OK);
        // } else {
        //     return response()->json(['title' => 'Failed!', 'message' => 'Delete Failed', 'icon' => 'error'],  Response::HTTP_BAD_REQUEST);
        // }
    }


    // public function paymentAndDeposit(Request $request)
    // {
    //     $financial_movements = FinancialMovement::search($request)->sort($request)->paginate(15);

    //     return response()->view('financial_movement.payment_and_deposit', compact('financial_movements'));

    // }

}
