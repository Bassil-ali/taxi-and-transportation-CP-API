<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Storage;
use Laravel\Passport\HasApiTokens;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Models\Scopes\StatusScope;
use App\Models\Scopes\OrderScope;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable,SoftDeletes;

    protected $guarded    = [];
    protected $appends    = ['type_name', 'profile_image', 'status_name'];
    protected $with       = ['city', 'parent'];
    protected $hidden     = ['password', 'auth_code', 'verification_code', 'image', 'remember_token'];
    protected $attributes = ['status' => 1];

    const CUSTOMER = 1;
    const DRIVER   = 2;
    const COMPANY  = 3;
    const EMPLOYEE = 4;

    public function scopeSearch(Builder $query , $request): Builder
    {
        $query->when( $request->type , function ($query , $type) {
            if($type != -1) {
                $query->where('type' , '=' , $type);
            }
        })->when($request->parent_id , function ($query , $parent_id) {
            $query->where('parent_id' , '=' , $parent_id);
        })->when(auth()->user('user-api')->type == 3 , function ($query) {
            $query->where('parent_id', '=', auth()->user('user-api')->id)->where('type' , '=' , 4);
        })->when($request->employee_id , function ($query , $employee_id) {
            $query->where('type' , '=' , 4)->where('id', '=', $employee_id)->where('parent_id' ,'='  ,auth('user-api')->user()->id);
        });

    }// end of scope search

    public function scopeSort(Builder $query): Builder
    {
        return $query->orderBy('id', 'desc');

    }// end of scope sort

    public function scopeGetCustomer(Builder $query): Builder
    {
        return $query->where('type', 1);

    }// end of scope get customer

    public function scopeGetDriver(Builder $query): Builder
    {
        return $query->where('type', 2);

    }// end of scope get driver

    public function scopeGetCompany(Builder $query): Builder
    {
        return $query->where('type', 3);

    }// end of scope get company

    public function scopeGetEmployee(Builder $query): Builder
    {
        return $query->where('type', 4);

    }// end of scope get Employe

    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class, 'city_id');

    }//end of city

    public function parent(): BelongsTo
    {
        return $this->belongsTo(self::class, 'parent_id');

    }//end of parent

    public function employees(): HasMany
    {
        return $this->hasMany(self::class, 'parent_id');

    }//end of employees

    public function proposals(): HasMany
    {
        return  $this->hasMany(Proposal::class ,'user_id' , 'id');

    }//end of proposals

    public function wallet(): HasOne
    {
        return  $this->hasOne(Wallet::class ,'user_id' , 'id');

    }//end of wallet

    public function getProfileImageAttribute()
    {
        return $this->image ? Storage::url('users/'.$this->image) :  null;

    }//end of get getProfileImage Attribute

    public function getTypeNameAttribute()
    {
        if($this->type == 1) {

            return __('cms.user');

        } elseif ($this->type == 2) {
            
            return __('cms.driver');

        } elseif ($this->type == 3) {

            return __('cms.company') ;

        } elseif ($this->type == 4){

            return __('cms.employee') ;

        }//cheack type

    }//end of get getProfileImage Attribute


    public function statusName(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->status ? __('cms.active') : __('cms.in_active'),
        );

    }//end of status name

    public function trips(): HasMany
    {
        return $this->hasMany(Trip::class , 'customer_id');

    }//end of driver

    public function ads(): HasMany
    {
        return $this->hasMany(Ad::class , 'user_id' , 'id');

    }//end of driver

    public function financialMovements()
    {
        return $this->hasManyThrough(FinancialMovement::class , Wallet::class);

    }//end of driver

    protected function imagePath(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->image ? asset('storage/' . $this->image) : asset('assets/images/default.png'),
        );

    }//end of get ImagePath Attribute

    protected static function booted(): void
    {
        static::addGlobalScope(new OrderScope);

        if(!request()->is('*users*')) {
            static::addGlobalScope(new StatusScope);
        }

    }//end of Global Scope

}//end of model