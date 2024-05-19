<?php

namespace App\Policies;

use App\Models\Ad;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;

class AdPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny($UserId)
    {
        //

        if (Auth::guard('admin')->check()) {

            $admin = auth()->user();
            return $admin->can('Ads-Show') ? true : false;
        }
        $user = auth()->user();
        return $user->type == 4 ? false : true;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Ad  $ad
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view($userId, Ad $ad)
    {


        if (Auth::guard('admin')->check()) {

            $admin = auth()->user();
            return $admin->can('Ads-Show') ? true : false;
        }
        $user = auth()->user();
        return $user->type == 4 ? false : true;



        //
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
            return $admin->can('Ads-Create') ? true : false;
        }
        $user = auth()->user();
        return $user->type == 1;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Ad  $ad
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update($userId, Ad $ad)
    {
        //

        if (Auth::guard('admin')->check()) {

            $admin = auth()->user();
            return $admin->can('Ads-Update') ? true : false;
        }
        $user = auth()->user();
        return $user->type == 1 && $ad->user_id == $user->id;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Ad  $ad
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete($userId, Ad $ad)
    {
        //

        if (Auth::guard('admin')->check()) {

            $admin = auth()->user();
            return $admin->can('Ads-Delete') ? true : false;
        }
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Ad  $ad
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Ad $ad)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Ad  $ad
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Ad $ad)
    {
        //
    }
}
