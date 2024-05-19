<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Models\Admin;
use Spatie\Permission\PermissionRegistrar;

class PermissionsDemoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        Role::create([
            'name'       => 'admin',
            'guard_name' => 'admin',
            'admin_id'   => Admin::first()->id,
        ]);

        Admin::factory(50)->create();
        Admin::roleNot(['super_admin'])->each(fn($admin) => $admin->assignRole('admin'));

        $permissions = ['home', 'admins', 'roles','languages', 'users', 'trips', 'settings', 'cities', 'regions', 'categories', 'transport_types'];

        foreach ($permissions as $data) {

            if ($data == 'home') {
                
                $cruds = ['read'];

            } else {

                $cruds = ['create','read','update','delete','status'];
            }

            foreach ($cruds as $crud) {

                Permission::updateOrCreate(['guard_name' => 'admin', 'name' => $crud .'-' . $data, 'group_name' => $data]);

            }//end of each

        }//end of each

        $roleSuperAdmin = Role::where([
            'name'       => 'super_admin',
            'guard_name' => 'admin',
        ])->first();

        $roleSuperAdmin->givePermissionTo(Permission::all() ?? []);

    }//end of run

}//end of class