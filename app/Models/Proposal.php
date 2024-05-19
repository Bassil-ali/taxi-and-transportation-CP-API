<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Proposal extends Model
{
    use HasFactory , SoftDeletes;
    protected $guarded = [];
    protected $with = ['user'];

    public function scopeSearch($query , $request){

            $query->when($request->ad_id , function($query , $ad_id){
                $query->where('ad_id', '=',$ad_id);


            })->when( auth()->guard('user-api')->check() && (auth()->user()->type  == 3 || auth()->user()->type  == 2), function($query){
                    $query->where('user_id', '=' , auth()->user()->id);

            });

    }

    public function scopeSort($query , $request){
        $query->orderBy('id', 'desc');
    }


    public function user(){
        return  $this->belongsTo(User::class ,'user_id' , 'id');
    }

    public function proposalAcceptedAd(){
        return  $this->hasone(ProposalAcceptedAd::class ,'proposal_id' , 'id');
    }
    public function ad(){
        return  $this->belongsTo(Ad::class ,'ad_id' , 'id');
    }

    public function accepted_ad(){
        return  $this->hasOne(ProposalAcceptedAd::class ,'proposal_id' , 'id');
    }

}
