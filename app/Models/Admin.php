<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;
use App\Models\Scopes\StatusScope;
use App\Models\Scopes\OrderScope;

class Admin extends Authenticatable
{
    use HasFactory;
    use HasRoles;

    protected $fillable = ['name', 'email', 'phone', 'password', 'status', 'image'];
    protected $hidden   = ['password', 'remember_token'];

    ///// scope
    public function scopeSort($query , $request)
    {
        return $query->orderBy('id', 'desc');

    }//end of fun

    public function scopeRoleNot(Builder $query, $rolesName = []): Builder
    {
        return $query->when($rolesName, fn ($query) => $query->whereHas('roles', fn ($query) => $query->whereNotIn('name', $rolesName)));

    }// end of scope Role

    public function scopeSearch(Builder $query, $search): Builder
    {
        return $query->when($search, fn ($query) => $query->where('name' , 'like', "%$search%")->orWhere('email', 'like', "%$search%")->orWhere('status', 'like', "%$search%"));

    }//end of fun scope

    ///// Attribute
    public function getStatusNameAttribute()
    {
        return $this->status ? __('cms.active') : __('cms.in_active') ;

    }//end of fun

    protected function imagePath(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->image != 'default.png' ? asset('storage/' . $this->image) : asset('assets/images/default.png'),
        );

    }//end of get ImagePath Attribute

    ///// other
    public function financialMovements()
    {
        return  $this->hasMany(FinancialMovement::class);

    }//end of fun

    protected static function booted(): void
    {
        static::addGlobalScope(new OrderScope);

        if(!request()->is('*admins*')) {
            static::addGlobalScope(new StatusScope);
        }

    }//end of Global Scope

}//end pf model