<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Scopes\StatusScope;
use App\Models\Scopes\OrderScope;

class ContactUs extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded  = [];
    protected $appendes = ['status_name'];

    public function admin()
    {
        return $this->belongsTo(Admin::class , 'admin_id' , 'id');

    }//end of belongsTo admin

    public function getStatusNameAttribute ()
    {
        if($this->status == 0) {

            return __('cms.new');

        } elseif ($this->status == 1) {

            return __('cms.completed');

        }//end of if

    }//end of getStatus

    protected static function booted(): void
    {
        static::addGlobalScope(new OrderScope);

        if(!request()->is('*contact*')) {
            static::addGlobalScope(new StatusScope);
        }

    }//end of Global Scope

}//end of model