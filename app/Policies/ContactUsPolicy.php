<?php

namespace App\Policies;

use App\Models\Admin;
use App\Models\ContactUs;
use Illuminate\Auth\Access\HandlesAuthorization;

class ContactUsPolicy
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
        return $admin->can('ContactUs-Show') ? true : false ;

    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\Admin  $admin
     * @param  \App\Models\ContactUs  $contactUs
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(Admin $admin, ContactUs $contact_u)
    {
        //
        return $admin->can('ContactUs-Show') ? true : false ;

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
        return false ;

    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\Admin  $admin
     * @param  \App\Models\ContactUs  $contactUs
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(Admin $admin, ContactUs $contact_u)
    {
        //
        return $admin->can('ContactUs-Update') ? true : false ;

    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\Admin  $admin
     * @param  \App\Models\ContactUs  $contactUs
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(Admin $admin, ContactUs $contact_u)
    {
        //
        return $admin->can('ContactUs-Delete') ? true : false ;

    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\Admin  $admin
     * @param  \App\Models\ContactUs  $contactUs
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(Admin $admin, ContactUs $contact_u)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\Admin  $admin
     * @param  \App\Models\ContactUs  $contactUs
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(Admin $admin, ContactUs $contact_u)
    {
        //
    }
}
