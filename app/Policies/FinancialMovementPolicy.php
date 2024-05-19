<?php

namespace App\Policies;

use App\Models\Admin;
use App\Models\FinancialMovement;
use Illuminate\Auth\Access\HandlesAuthorization;

class FinancialMovementPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(Admin $admin)
    {
        //
        return $admin->can('FincialMovement-Show') ? true : false ;

    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\Admin  $admin
     * @param  \App\Models\FinancialMovement  $financialMovement
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(Admin $admin, FinancialMovement $financialMovement)
    {
        //
        return $admin->can('FincialMovement-Show') ? true : false ;

    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(Admin $admin)
    {
        //
        return $admin->can('FincialMovement-Create') ? true : false ;

    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\Admin  $admin
     * @param  \App\Models\FinancialMovement  $financialMovement
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(Admin $admin, FinancialMovement $financialMovement)
    {
        //
        return false ;

    }



    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\Admin  $admin
     * @param  \App\Models\FinancialMovement  $financialMovement
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(Admin $admin, FinancialMovement $financialMovement)
    {
        //
        return false ;


    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\Admin  $admin
     * @param  \App\Models\FinancialMovement  $financialMovement
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(Admin $admin, FinancialMovement $financialMovement)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\Admin  $admin
     * @param  \App\Models\FinancialMovement  $financialMovement
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(Admin $admin, FinancialMovement $financialMovement)
    {
        //
    }
}
