<?php

namespace App\Policies;

use App\Models\Admin;
use App\Models\Trip;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;

class TripPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny($userId)
    {
        //

        if (Auth::guard('admin')->check()) {

            $admin = auth()->user();
            return $admin->can('Trips-Show') ? true : false;
        }
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Trip  $trip
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view($userId, Trip $trip)
    {
        //

        if (Auth::guard('admin')->check()) {

            $admin = auth()->user();
            return $admin->can('Trips-Show') ? true : false;
        }
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create($userId)
    {
        //


        if (Auth::guard('admin')->check()) {

            $admin = auth()->user();
            return $admin->can('Trips-Create') ? true : false;
        }
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Trip  $trip
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update($userId, Trip $trip)
    {
        //

        if (Auth::guard('user-api')->check()) {
            $user = auth()->user();
            return ($user->type    == 1 && $trip->customer_id  == $user->id)
                ||      (($user->type   == 2 || $user->type == 4)   && $trip->driver_id == $user->id)
                ||      ($user->type    == 3 && $trip->company_id   == $user->id);
        } elseif (Auth::guard('admin')->check()) {
            $admin = auth()->user();
            return $admin->can('Trips-Update') ? true : false;
        }
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Trip  $trip
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete($userId, Trip $trip)
    {
        //
        if (Auth::guard('admin')->check()) {
            $admin = auth()->user();
            return $admin->can('Trips-Delete') ? true : false;
        }
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Trip  $trip
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Trip $trip)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Trip  $trip
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Trip $trip)
    {
        //
    }
}
