<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\App;
use Spatie\Translatable\HasTranslations;
use App\Models\Scopes\StatusScope;
use App\Models\Scopes\OrderScope;

class Region extends Model
{
    use HasFactory, SoftDeletes;
    use HasTranslations;

    protected $guarded  = [];
    protected $appendes = ['name_lang'];
    protected $translatable = ['name'];

    public function scopeSearch($query , $request)
    {
        $query->when(auth()->guard('user-api')->check() , function ($query) {
            $query->where('status', '=', 1);
        })->when( $request->city_id , function ($query , $city_id) {
            $query->where('city_id', '=', $city_id);
        });

    }//end of scopeSearch

    public function scopeSort($query , $request)
    {
        $query->orderBy('id', 'desc');
    }

    public function getStatusNameAttribute()
    {
        return $this->status ? __('cms.active') : __('cms.in_active');
    }
    
    public function getNameLangAttribute()
    {
        return App::getLocale()  =='en'? $this->name_en : $this->name_ar;
    }

    public function city()
    {
        return $this->belongsTo(City::class , 'city_id');
    }

    public function from_ads()
    {
        return $this->belongsTo(Ad::class, 'from_region_id', 'id');
    }

    public function to_ads()
    {
        return $this->belongsTo(Ad::class, 'to_region_id', 'id');
    }

    protected static function booted(): void
    {
        static::addGlobalScope(new OrderScope);

        if(!request()->is('*regions*')) {
            static::addGlobalScope(new StatusScope);
        }

    }//end of Global Scope

}//end of model