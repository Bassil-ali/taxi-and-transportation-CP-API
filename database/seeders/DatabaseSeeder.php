<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            WalletSeeder::class,
            SystemSettingSeeder::class,
            CitySeeder::class,
            CategorySeeder::class,
            RegionSeeder::class,
            AdminSeeder::class,
            PermissionsDemoSeeder::class,
            RoleSeeder::class,
            LanguageSeeder::class,
            SettingSeeder::class,
            TransportTypeSeeder::class,
            UserSeeder::class,
            ContactUsSeeder::class,
            TripSeeder::class,
        ]);//call

    }//end of run

}//end of class