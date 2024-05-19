<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProposalAcceptedAd extends Model
{
    use HasFactory, SoftDeletes;

    use HasFactory;
    protected $guarded = [];
    public function scopeSearch($query , $request){
    }

    public function scopeSort($query , $request){
        $query->orderBy('id', 'desc');
    }

    public function proposal(){
        return  $this->belongsTo(Proposal::class ,'proposal_id' , 'id');
    }
    public function ad(){
        return  $this->belongsTo(Ad::class ,'ad_id' , 'id');
    }
}
