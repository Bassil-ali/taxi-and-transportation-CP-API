<?php

namespace App\Observers;

use App\Exceptions\ErrorMessageException;
use App\Models\User;
use App\Models\Wallet;
use Illuminate\Support\Facades\Hash;

class UserObserver
{

    /**
     * Handle the admin "creating" event.
     *
     * @param  \App\Models\admin  $admin
     * @return void
     */
    public function creating(User $user)
    {
        //




    }

    /**
     * Handle the User "created" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function created(User $user)
    {
        //
        $verification_code = random_int('1000', '9999');
        $verification_code =  $user->update(['verification_code' => Hash::make($verification_code)]);

        Wallet::create(['name' => 'User' , 'type' => $user->type , 'balance' => 0 , 'currency' => 'SRA' , 'user_id' => $user->id , 'status' => 1  ]);

        // Mail::to($user)->send(new VerificationMail($auth_code));
    }

    /**
     * Handle the User "updated" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function updating(User $user)
    {
        



    }
    public function updated(User $user)
    {
        //
    }

    /**
     * Handle the User "deleted" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function deleted(User $user)
    {
        //
        // $user->wallet->delete();

    }

    /**
     * Handle the User "restored" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function restored(User $user)
    {
        //
    }

    /**
     * Handle the User "force deleted" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function forceDeleted(User $user)
    {
        //

    }
}