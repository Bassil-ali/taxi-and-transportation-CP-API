<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FinancialMovement extends Model
{
    use HasFactory , SoftDeletes;
    protected $guarded = [];
    const TYPES = [
        'pay_to_ad' => 1 ,
        'trip_dues' => 2,
        'deposit' => 3,
        'withdraw' => 4,
        'system_commission' => 5,
    ];


    public function admin (){
        return $this->belongsTo(Admin::class , 'admin_id' , 'id');
    }

    public function wallet(){
        return  $this->belongsTo(Wallet::class ,'wallet_id' , 'id');
    }

    public function ad(){
        return  $this->belongsTo(Ad::class ,'ad_id' , 'id');
    }

    public function trip(){
        return  $this->belongsTo(Ad::class ,'ad_id' , 'id');
    }

    public function scopeSearch($query , $request){

        $query->when($request->type , function($query , $type){
            // if(in_array($type  , self::TYPES)){

                $query->where('type', '=',$type);
            // }
        }) ;
    }

    public function scopeSort($query , $request){
        $query->orderBy('id', 'desc');
    }


    public function getTypeNameAttribute (){
        if($this->type == 1) {
            return __('cms.pay_to_ad');
        }elseif($this->type == 2){
            return __('cms.trip_dues');
        }elseif($this->type == 3){
            return __('cms.deposit');
        }elseif($this->type == 4){
            return __('cms.withdraw');
        }elseif($this->type == 5){
            return __('cms.system_commission');
        }

    }

}
