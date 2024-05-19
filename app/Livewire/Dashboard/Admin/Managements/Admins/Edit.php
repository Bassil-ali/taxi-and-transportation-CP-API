<?php

namespace App\Livewire\Dashboard\Admin\Managements\Admins;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Admin;
use App\Models\Role;
use Illuminate\Validation\Rule;

class Edit extends Component
{
    use WithFileUploads;

    public Admin $admin;

    public $name     = '';
    public $email    = '';
    public $password = '';
    public $phone    = '';
    public $image    = '';
    public $status   = false;
    public $roles    = '';
    public $admin_id = '';

    public function mount(Admin $admin)
    {
        $this->admin  = $admin;
        $this->name   = $admin->name;
        $this->email  = $admin->email;
        $this->phone  = $admin->phone;
        $this->status = $admin->status;

    }//end of mount

    public function update()
    {
        // dd($this->all());
        $validated = $this->validate();
        $this->admin->update($this->only(['name', 'email', 'phone', 'status']));
        if (!empty($validated['image'])) {
            $image = $this->image?->store('admins', 'public');
            $this->admin->update(['image' => $image]);
        }
        if (!empty($validated['roles'])) {
            $this->admin->assignRole($validated['roles']);
        }

        // session()->flash('success', 'updated successfully!');
        $this->js(alertNoty('success'));
 
        return redirect()->to(route('dashboard.admin.management.admins.index'));

    }//end of save

    public function rules(): array
    {
        $rules = [
            'name'       => ['required','string','min:2','max:30'],
            'email'      => ['required','string', 'min:2','max:30', Rule::unique('admins')->ignore($this->admin->id)],
            'phone'      => ['required','min:6','max:30', Rule::unique('admins')->ignore($this->admin->id)],
            'password'   => ['nullable','min:6','max:30'],
            'image'      => ['nullable'],
            'status'     => ['nullable'],
            'roles.*'    => ['nullable','exists:roles,name'],
        ];

        return $rules;

    }//end of rules

    public function render()
    {
        $breadcrumb = ['managements', 'admins'];
        $rolesItems = Role::whereNotIn('name', ['super_admin'])->pluck('name', 'name');
        $admin      = $this->admin;
        
        return view('livewire.dashboard.admin.managements.admins.edit', compact('breadcrumb', 'rolesItems', 'admin'));

    }//end of render

}//end of class