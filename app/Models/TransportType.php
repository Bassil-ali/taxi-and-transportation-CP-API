<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\Translatable\HasTranslations;
use App\Models\Scopes\StatusScope;
use App\Models\Scopes\OrderScope;

class TransportType extends Model
{
    use HasFactory, SoftDeletes;
    use HasTranslations;

    protected $guarded      = [];
    protected $appendes     = ['name_lang', 'status_lang'];
    protected $translatable = ['name'];

    public function scopeSearch(Builder $query , $request): Builder
    {
        return $query->when($search, fn ($query) => $query->where('name_ar' , 'like', "%$search%")->orWhere('name_en', 'like', "%$search%")->orWhere('status', 'like', "%$search%"));

    }//end of scope search

    public function scopeSort(Builder $query , $request): Builder
    {
        return $query->orderBy('id', 'desc');

    }//end of scope sort

    public function statusLang(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->status ? __('cms.active') : __('cms.in_active'),
        );

    }//end of Attribute status

    public function nameLang(): Attribute
    {
        return Attribute::make(
            get: fn () => app()->getLocale() == 'en' ? $this->name_en : $this->name_ar,
        );

    }//end of Attribute name lang

    public function ads(): HasMany
    {
        return  $this->hasMany(Ad::class, 'transport_type_id', 'id');

    }//end of hasMany ads

    protected static function booted(): void
    {
        static::addGlobalScope(new OrderScope);

        if(!request()->is('*transport_types*')) {
            static::addGlobalScope(new StatusScope);
        }

    }//end of Global Scope

}//end of model