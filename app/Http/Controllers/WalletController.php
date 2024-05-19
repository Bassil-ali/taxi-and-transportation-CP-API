<?php

namespace App\Http\Controllers;
use App\Http\Requests\StoreWalletRequest;
use App\Http\Requests\UpdateWalletRequest;
use App\Http\Resources\WalletResource;
use App\Models\Wallet;
use Illuminate\Http\Request;
use App\Models\FinancialMovement;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class WalletController extends Controller
{

    public static function routeName(){
        return Str::snake("Wallet");
    }
    public function __construct(Request $request){
        parent::__construct($request);
        $this->authorizeResource(Wallet::class,Str::snake("Wallet"));
    }
    public function index(Request $request)
    {
        return WalletResource::collection(Wallet::search($request)->sort($request)->paginate($this->pagination));
    }
    public function store(StoreWalletRequest $request)
    {
        $wallet = Wallet::create($request->validated());
        if ($request->translations) {
            foreach ($request->translations as $translation)
                $wallet->setTranslation($translation['field'], $translation['locale'], $translation['value'])->save();
        }
        return new WalletResource($wallet);
    }
    public function show(Request $request,Wallet $wallet)
    {
        return new WalletResource($wallet);
    }
    public function update(UpdateWalletRequest $request, Wallet $wallet)
    {
        $wallet->update($request->validated());
          if ($request->translations) {
            foreach ($request->translations as $translation)
                $wallet->setTranslation($translation['field'], $translation['locale'], $translation['value'])->save();
        }
        return new WalletResource($wallet);
    }
    public function destroy(Request $request,Wallet $wallet)
    {
        $wallet->delete();
        return new WalletResource($wallet);
    }
    public function showUser(Request $request)
    {
        $wallet =  Wallet::where('user_id', $request->user()->id)->first();
        $financialMovements =  FinancialMovement::where('wallet_id', $wallet->id)->get();

        return response()->json([
            'wallet' => $wallet,
            'financialMovements' => $financialMovements
        ]);
    
    } 
    public function storeUser(Request $request)
    {
        $wallet =  Wallet::where('user_id', $request->user()->id)->first();

      
        $financialMovement = new FinancialMovement;
        $financialMovement->amount = $request->balance;
        $financialMovement->type = "3";
        $financialMovement->description = $request->description;
        $financialMovement->wallet_id  = $wallet->id;
        $financialMovement->payment_id = $request->payment_id;
        $financialMovement->impact	 = "+";
        $financialMovement->save();

        $wallet =  Wallet::where('user_id', $request->user()->id)->first();


      return response()->json([
        'wallet' => $wallet,
        'financialMovement' => $financialMovement
    ]);

    }
}
