<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Wallet extends Model
{
    use HasFactory,SoftDeletes;
    protected $guarded = [];

    const TYPES = [
        'customer' => 1 ,
        'driver' => 2,
        'company' => 3,
        'employee' => 4,
        'system' => 5,
        'system_commission' => 6,
    ];




    public function user(){
        return  $this->belongsTo(User::class ,'user_id' , 'id');
    }

    public function from_movement(){
        return  $this->hasMany(FinancialMovement::class ,'from_wallet_id' , 'id');
    }

    public function to_movement(){
        return  $this->hasMany(Wallet::class ,'to_wallet_id' , 'id');
    }


    public function scopeSearch($query , $request){
    }

    public function scopeSort($query , $request){}


}
