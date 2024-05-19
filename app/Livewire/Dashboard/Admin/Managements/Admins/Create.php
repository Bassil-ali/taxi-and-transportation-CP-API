<?php

namespace App\Livewire\Dashboard\Admin\Managements\Admins;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Admin;
use App\Models\Role;

class Create extends Component
{
    use WithFileUploads;

    public $name     = '';
    public $email    = '';
    public $password = '';
    public $phone    = '';
    public $image    = '';
    public $status   = false;
    public $roles    = [];
    public $admin_id = '';

    public function save()
    {
        
        // $validated             = $this->validate();
        // $validated['admin_id'] = auth('admin')->id();
        // if ($this->image) {
            // $validated['image']    = $this->image?->store('admins', 'public');
        // }
        // $admin = Admin::create($validated);
        // $admin->assignRole($this->roles ?? []);
        // $this->js(alertNoty('status'));
        $this->js(alertNoty('success'));
 
        return redirect()->to(route('dashboard.admin.management.admins.index'));

    }//end of save

    public function rules(): array
    {
        $rules = [
            'name'       => ['required','string','unique:admins','min:2','max:30'],
            'email'      => ['required','string','unique:admins','min:2','max:30'],
            'phone'      => ['required','unique:admins','min:6','max:30'],
            'password'   => ['required','min:6','max:30'],
            'image'      => ['nullable', 'image'],
            'status'     => ['nullable'],
            'roles.*'    => ['nullable','exists:roles,name'],
        ];

        return $rules;

    }//end of rules

    public function render()
    {
        $breadcrumb = ['managements', 'admins'];

        $rolesItems = Role::whereNotIn('name', ['super_admin'])->pluck('name', 'name');

        return view('livewire.dashboard.admin.managements.admins.create', compact('breadcrumb', 'rolesItems'));

    }//end of render

}//end of class