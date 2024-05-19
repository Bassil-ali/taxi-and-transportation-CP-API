<?php

namespace App\Livewire\Dashboard\Admin\Managements\Admins;

use Livewire\WithPagination;
use Livewire\Component;
use App\Models\Admin;
use App\Models\Role;

class Index extends Component
{
    use WithPagination;

    public $search = '';

    public function delete(Admin $admin)
    {
        $this->js(alertNoty('delete'));

        $admin->delete();

    }//end of delete

    public function status(Admin $admin)
    {
        $admin?->update(['status' => !$admin->status]);
        
        $this->js(alertNoty('status'));

    }//end of status

    public function render()
    {
        $admins     = Admin::search($this->search)->paginate(5);
        $breadcrumb = ['managements', 'admins'];
        $rolesItems = Role::whereNotIn('name', ['super_admin'])->pluck('name', 'name');

        return view('livewire.dashboard.admin.managements.admins.index', compact('admins', 'breadcrumb', 'rolesItems'));

    }//end of render

}//end of class