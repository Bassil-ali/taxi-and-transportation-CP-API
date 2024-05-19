<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\App;
use Spatie\Translatable\HasTranslations;
use App\Models\Scopes\StatusScope;
use App\Models\Scopes\OrderScope;

class City extends Model
{
    use HasFactory , SoftDeletes;
    use HasTranslations;
    
    protected $guarded = [];
    protected $appendes = ['name_lang'];
    protected $translatable = ['name'];

    public function scopeSearch(Builder $query)
    {
        $query->when(auth()->guard('user-api')->check(), fn ($query) => $query->where('status', 1));
        // $query->when(auth()->check(), fn ($query) => $query->where('status', 1));
    }

    public function scopeSort($query , $request)
    {
        $query->orderBy('id', 'desc');
    }

    public function getStatusNameAttribute ()
    {
        return $this->status ? __('cms.active') : __('cms.in_active') ;
    }

    public function getNameLangAttribute()
    {
        return  App::getLocale()  =='en'? $this->name_en : $this->name_ar  ;
    }

    public function users()
    {
        return $this->hasMany(User::class , 'city_id');

    }

    public function regions()
    {
        return $this->hasMany(Region::class , 'city_id');

    }

    public function from_ads()
    {
        return  $this->hasMany(Ad::class, 'from_city_id', 'id');
    }

    public function to_ads()
    {
        return  $this->belongsTo(Ad::class, 'to_city_id', 'id');
    }

    protected static function booted(): void
    {
        static::addGlobalScope(new OrderScope);

        if(!request()->is('*cities*')) {
            static::addGlobalScope(new StatusScope);
        }

    }//end of Global Scope

 }//end of model