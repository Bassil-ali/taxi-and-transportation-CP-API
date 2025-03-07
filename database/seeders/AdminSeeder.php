<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use App\Models\Admin;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        $admin = Admin::create([
            'name'      => 'name',
            'email'     => 'admin@app.com',
            'password'  => 'password',
            'status'    => 1,
        ]);

        $roleSuperAdmin = Role::create([
            'name'       => 'super_admin',
            'guard_name' => 'admin',
            'admin_id'   => Admin::first()->id
        ]);

        $admin->assignRole('super_admin');

    }//end of run

}//end of class