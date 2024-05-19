<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\App;
use Spatie\Translatable\HasTranslations;
use App\Models\Scopes\StatusScope;
use App\Models\Scopes\OrderScope;

class Category extends Model
{
    use HasFactory, SoftDeletes;
    use HasTranslations;

    protected $guarded      = [];
    protected $appendes     = ['name_lang'];
    protected $translatable = ['name'];

    public function scopeSearch($query , $request)
    {
        $query->when(auth()->guard('user-api')->check(), fn ($query) => $query->where('status', 1));

    }//end of fun

    public function scopeSort($query , $request)
    {
        $query->orderBy('id', 'desc');

    }//end of fun

    public function getStatusNameAttribute()
    {
        return $this->status ? __('cms.active') : __('cms.in_active') ;

    }//end of fun

    public function getNameLangAttribute ()
    {
        return app()->getLocale() == 'en' ? $this->name_en : $this->name_ar;

    }//end of fun

    public function ads()
    {
        return $this->hasMany(Ad::class, 'category_id', 'id');

    }//end of fun

    protected static function booted(): void
    {
        static::addGlobalScope(new OrderScope);

        if(!request()->is('*categories*')) {
            static::addGlobalScope(new StatusScope);
        }

    }//end of Global Scope

 }//end of model