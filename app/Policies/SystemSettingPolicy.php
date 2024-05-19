<?php

namespace App\Policies;

use App\Models\Admin;
use App\Models\SystemSetting;
use Illuminate\Auth\Access\HandlesAuthorization;

class SystemSettingPolicy
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
        return $admin->can('Settings-Update') ? true : false ;

    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\Admin  $admin
     * @param  \App\Models\SystemSetting  $systemSetting
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(Admin $admin, SystemSetting $systemSetting)
    {
        //
        return $admin->can('Settings-Update') ? true : false ;

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
     * @param  \App\Models\SystemSetting  $systemSetting
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(Admin $admin, SystemSetting $systemSetting)
    {
        //
        return $admin->can('Settings-Update') ? true : false ;

    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\Admin  $admin
     * @param  \App\Models\SystemSetting  $systemSetting
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(Admin $admin, SystemSetting $systemSetting)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\Admin  $admin
     * @param  \App\Models\SystemSetting  $systemSetting
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(Admin $admin, SystemSetting $systemSetting)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\Admin  $admin
     * @param  \App\Models\SystemSetting  $systemSetting
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(Admin $admin, SystemSetting $systemSetting)
    {
        //
    }
}
