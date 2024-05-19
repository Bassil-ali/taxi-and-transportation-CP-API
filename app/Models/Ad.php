<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Scopes\StatusScope;
use App\Models\Scopes\OrderScope;

class Ad extends Model
{
    use HasFactory, SoftDeletes;
    
    protected $guarded = [];
    protected $with    = [];
    protected $hidden  = ['category', 'transport_type'];

    protected $casts = [
        'days' => 'array',
    ];

    protected $appends = ['status_name', 'category_name', 'transport_type_name', 'duration_name', 'system_commission', 'gender_name'];

    public function scopeSearch($query, $request)
    {
        $query->when(auth()->user()->type == 1 && $request->has('my_ads'), function ($query) {
            $query->where('user_id', '=', auth()->user()->id);
        })->when($request->id, function ($query, $id) {
            $query->where('id', '=', $id);
        })->when($request->status, function ($query, $status) {
            $query->where('status', '=', $status);
        })->when($request->category_id, function ($query, $category_id) {
            $query->where('category_id', '=', $category_id);
        })->when($request->from_city_id, function ($query, $from_city_id) {
            $query->where('from_city_id', '=', $from_city_id);
        })->when($request->from_region_id, function ($query, $from_region_id) {
            $query->where('from_region_id', '=', $from_region_id);
        })->when(auth()->user()->type == User::COMPANY, function ($query, $from_region_id) {
            // COMPANY
            $query->where('service_provider', '=', 1);
        })->when(auth()->user()->type == User::DRIVER, function ($query, $from_region_id) {
            // COMPANY
            $query->where('service_provider', '=', 2);
        });
    }

    public function scopeSort($query, $request)
    {
        $query->orderBy('id', 'desc');
    }

    public function proposals()
    {
        return  $this->hasMany(Proposal::class, 'ad_id', 'id');
    }

    public function proposalAcceptedAd()
    {
        return  $this->hasone(ProposalAcceptedAd::class, 'ad_id', 'id');
    }

    public function user()
    {
        return  $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function category()
    {
        return  $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function transport_type()
    {
        return  $this->belongsTo(TransportType::class, 'transport_type_id', 'id');
    }

    public function from_city()
    {
        return  $this->belongsTo(City::class, 'from_city_id', 'id');
    }
    public function to_city()
    {
        return  $this->belongsTo(City::class, 'to_city_id', 'id');
    }

    public function from_region()
    {
        return  $this->belongsTo(Region::class, 'from_region_id', 'id');
    }
    public function to_region()
    {
        return  $this->belongsTo(Region::class, 'to_region_id', 'id');
    }
    public function getCategoryNameAttribute()
    {
        return $this->category?->name_lang;
    }

    public function getTransportTypeNameAttribute()
    {
        return $this->transport_type?->name_lang;
    }

    public function getSystemCommissionAttribute()
    {
        return SystemSetting::find('commission')->value;
    }

    public function getDurationNameAttribute()
    {
        if ($this->duration == 1) {
            return __('cms.immediately');
        } elseif ($this->duration == 2) {
            return __('cms.weekly');
        } elseif ($this->duration == 3) {
            return __('cms.monthly');
        }

    }//end of get get duration

    public function getGenderNameAttribute()
    {
        if ($this->gender == 1) {
            return __('cms.male');
        } elseif ($this->gender == 2) {
            return __('cms.female');
        } elseif ($this->gender == 3) {
            return __('cms.both');
        }

    }//end of get get duration


    public function getCommunicationNameAttribute()
    {
        return $this->communication  == 1 ? __('cms.mobile') : __('cms.email');
    }
    public function getServiceProviderNameAttribute()
    {
        return $this->communication  == 1 ? __('cms.company') : __('cms.driver');
    }

    public function getDaysNameAttribute()
    {
        $string_days  = '';
        if (gettype($this->days) == 'array') {
            $days = ['monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday'];
            for ($i = 0; $i < 7; $i++) {
                in_array(($i + 1), $this->days)  ? $string_days .= __("cms.$days[$i]") . ' , '  : '';
            }
        }
        return  $string_days;

    }//end of get day name


    public function getStatusNameAttribute()
    {
        switch ($this->status) {
            case '1';
                return __('cms.active');
                break;
            case '2':
                return __('cms.finished');   //
                break;
            case '3':
                return __('cms.canceld'); //
                break;
        }

    }//end of get staus

    protected static function booted(): void
    {
        static::addGlobalScope(new OrderScope);

        if(!request()->is('*all*') || !request()->is('*ad*') || !request()->is('*ads*')) {
            static::addGlobalScope(new StatusScope);
        }

    }//end of Global Scope

}//end of model