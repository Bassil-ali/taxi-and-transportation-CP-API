<?php

namespace App\Observers;

use App\Exceptions\ErrorMessageException;
use App\Models\admin;
use Illuminate\Support\Facades\Hash;

class AdminObserver
{
    /**
     * Handle the admin "creating" event.
     *
     * @param  \App\Models\admin  $admin
     * @return void
     */
    public function creating(admin $admin)
    {
        //
        $admin->password = Hash::make($admin->password);
    }
    /**
     * Handle the admin "created" event.
     *
     * @param  \App\Models\admin  $admin
     * @return void
     */
    public function created(admin $admin)
    {
        //
    }

    /**
     * Handle the admin "updated" event.
     *
     * @param  \App\Models\admin  $admin
     * @return void
     */
    public function updating(admin $admin)
    {
        //
        $admin->password = Hash::make($admin->password);

    }

    /**
     * Handle the admin "deleting" event.
     *
     * @param  \App\Models\admin  $admin
     * @return void
     */
    public function deleting(admin $admin)
    {
        //
        if($admin->id == 1){
            throw new  ErrorMessageException('UNAUTHORISED' , 400);
        }
    }


    /**
     * Handle the admin "deleted" event.
     *
     * @param  \App\Models\admin  $admin
     * @return void
     */
    public function deleted(admin $admin)
    {
        //
    }
    /**
     * Handle the admin "restored" event.
     *
     * @param  \App\Models\admin  $admin
     * @return void
     */
    public function restored(admin $admin)
    {
        //
    }

    /**
     * Handle the admin "force deleted" event.
     *
     * @param  \App\Models\admin  $admin
     * @return void
     */
    public function forceDeleted(admin $admin)
    {
        //
    }
}
