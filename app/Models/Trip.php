<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Models\Scopes\StatusScope;
use App\Models\Scopes\OrderScope;

class Trip extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [];
    protected $appends = ['status_name'];
    
    const STATUS = [
        'canceld'   => 0,
        'scheduled' => 1,
        'received'  => 2,
        'delivery_not_done' => 3,
        'done'       => 4,
    ];

    //ads
    public function scopeGetAds(Builder $query): Builder
    {
        return $query->whereNotNull('ad_id');

    }// end of scope ads

    //customer
    public function scopeGetCustomer(Builder $query): Builder
    {
        return $query->whereNotNull('customer_id');

    }// end of scope customers

    //company
    public function scopeGetCompany(Builder $query): Builder
    {
        return $query->whereNotNull('company_id');

    }// end of scope companys

    //driver
    public function scopeGetDriver(Builder $query): Builder
    {
        return $query->whereNotNull('driver_id');

    }// end of scope driver

    public function scopeSearch(Builder $query, $request): Builder
    {
        $query->when(auth()->user()->type == 1, function ($query) {
            $query->where('customer_id', '=', auth()->user()->id);
        })->when(auth()->user()->type == 2  || auth()->user()->type == 4, function ($query) {
            $query->where('driver_id', '=', auth()->user()->id);
        })->when(auth()->user()->type == 3, function ($query) {
            $query->where('company_id', '=', auth()->user()->id);
        })->when($request->status, function ($query, $status) {
            $query->where('status', '=', $status);
        })->when($request->date, function ($query, $date) {
            $query->where('date', '=', $date);
        })->when($request->id, function ($query, $id) {
            $query->where('id', '=', $id);
        });

    }// end of scope Search

    public function scopeSort($query , $request)
    {
        $query->orderBy('id', 'desc');

    }// end of scope sort

    public function getTimeAttribute(): Attribute
    {
        return Attribute::make(
                get: fn () => Carbon::createFromFormat('H:i:s', $this->go_time)->format('h:i'),
            );

    }//end of get getTime Attribute

    public function financialMovement(): BelongsTo
    {
        return $this->belongsTo(FinancialMovement::class, 'trip_id', 'id');

    }//end of financialMovement

    public function customer(): BelongsTo
    {
        return $this->belongsTo(User::class, 'customer_id', 'id');

    }//end of customer

    public function company(): BelongsTo
    {
        return $this->belongsTo(User::class, 'company_id', 'id');

    }//end of company

    public function driver(): BelongsTo
    {
        return $this->belongsTo(User::class, 'driver_id');

    }//end of driver

    public function ad(): BelongsTo
    {
        return $this->belongsTo(Ad::class, 'ad_id', 'id');

    }//end of ad

    public function fromCity(): BelongsTo
    {
        return $this->belongsTo(City::class, 'from_city_id');

    }//end of from city

    public function toCity(): BelongsTo
    {
        return $this->belongsTo(City::class, 'to_city_id');

    }//end of to city

    public function fromRegion(): BelongsTo
    {
        return $this->belongsTo(Region::class, 'from_region_id');

    }//end of to city

    public function toRegion(): BelongsTo
    {
        return $this->belongsTo(Region::class, 'to_region_id');

    }//end of to Regoion

    public function getStatusNameAttribute()
    {
        switch ($this->status) {

            case '0':
                return __('cms.canceld'); // //
                break;

            case '1';
                return __('cms.scheduled'); //
                break;

            case '2':
                return  __('cms.received'); //
                break;
            case '3':
                return __('delivery_not_done'); //
                break;
            case '4':
                return __('cms.done'); //
                break;

        }//switch

    }//end of getStatusName

    public function getStatusColorAttribute()
    {
        switch ($this->status) {

            case '0':
                return 'danger'; //canceld
                break;

            case '1';
                return 'success'; //scheduled
                break;

            case '2':
                return  'danger'; // received
                break;

            case '3':
                return 'danger';// delivery_not_done
                break;

            case '4':
                return 'success';// done
                break;

        }//switch

    }//end of getStatusName

    protected static function booted(): void
    {
        static::addGlobalScope(new OrderScope);

        if(!request()->is('*trips*')) {
            static::addGlobalScope(new StatusScope);
        }

    }//end of Global Scope

}//end of Models