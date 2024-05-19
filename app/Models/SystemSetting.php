<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SystemSetting extends Model
{
    use HasFactory , SoftDeletes;
    protected $guarded = [];

    protected $primaryKey = 'key';
    public    $incrementing = false;
    protected $keyType = 'string';



    public function scopeSort($query, $request)
    {
    }
    public function scopeSearch($query , $request){

    }
}
