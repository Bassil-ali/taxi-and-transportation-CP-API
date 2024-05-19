<?php

namespace App\Policies;

use App\Models\TransportType;
use App\Models\Admin;
use Illuminate\Auth\Access\HandlesAuthorization;

class TransportTypePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the admin can view any models.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(Admin $admin)
    {
        //
        return $admin->can('TransportTypes-Show') ? true : false ;

    }

    /**
     * Determine whether the admin can view the model.
     *
     * @param  \App\Models\Admin  $admin
     * @param  \App\Models\TransportType  $transportType
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(Admin $admin, TransportType $transportType)
    {
        //
        return $admin->can('TransportTypes-Show') ? true : false ;

    }

    /**
     * Determine whether the admin can create models.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(Admin $admin)
    {
        //
        return $admin->can('TransportTypes-Create') ? true : false ;

    }

    /**
     * Determine whether the admin can update the model.
     *
     * @param  \App\Models\Admin  $admin
     * @param  \App\Models\TransportType  $transportType
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(Admin $admin, TransportType $transportType)
    {
        //
        return $admin->can('TransportTypes-Update') ? true : false ;

    }

    /**
     * Determine whether the admin can delete the model.
     *
     * @param  \App\Models\Admin  $admin
     * @param  \App\Models\TransportType  $transportType
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(Admin $admin, TransportType $transportType)
    {
        //
        return $admin->can('TransportTypes-Delete') ? true : false ;

    }

    /**
     * Determine whether the admin can restore the model.
     *
     * @param  \App\Models\Admin  $admin
     * @param  \App\Models\TransportType  $transportType
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(Admin $admin, TransportType $transportType)
    {
        //
    }

    /**
     * Determine whether the admin can permanently delete the model.
     *
     * @param  \App\Models\Admin  $admin
     * @param  \App\Models\TransportType  $transportType
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(Admin $admin, TransportType $transportType)
    {
        //
    }
}
