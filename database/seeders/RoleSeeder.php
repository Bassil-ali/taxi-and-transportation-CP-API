<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use App\Models\Admin;

class RoleSeeder extends Seeder
{
    public function run()
    {
        $roles = [
            [
                'name'       => 'admin one',
                'guard_name' => 'admin',
                'admin_id'   => Admin::first()->id
            ],
            [
                'name'       => 'admin row',
                'guard_name' => 'admin',
                'admin_id'   => Admin::first()->id
            ],
            [
                'name'       => 'admin three',
                'guard_name' => 'admin',
                'admin_id'   => Admin::first()->id
            ],
        ];
        
        Role::insert($roles);

    }//end of run 

}//end of class