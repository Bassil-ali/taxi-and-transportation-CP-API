<?php

namespace App\Policies;

use App\Models\User;
use App\Models\ProposalAcceptedAd;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;

class ProposalAcceptedAdPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $User
     * @param  \App\Models\ProposalAcceptedAd  $proposalAcceptedAd
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, ProposalAcceptedAd $proposalAcceptedAd)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $User
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create($id)
    {

        function get_guard()
        {
            if (Auth::guard('user-api')->check()) {
                return "user-api";
            } elseif (Auth::guard('admin')->check()) {
                return "admin";
            }
        }




        return  (get_guard() == 'user-api' &&      auth()->user()->type == 1 )  || get_guard() == 'admin';
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\ProposalAcceptedAd  $proposalAcceptedAd
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, ProposalAcceptedAd $proposalAcceptedAd)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\ProposalAcceptedAd  $proposalAcceptedAd
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, ProposalAcceptedAd $proposalAcceptedAd)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\ProposalAcceptedAd  $proposalAcceptedAd
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, ProposalAcceptedAd $proposalAcceptedAd)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\ProposalAcceptedAd  $proposalAcceptedAd
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, ProposalAcceptedAd $proposalAcceptedAd)
    {
        //
    }
}
