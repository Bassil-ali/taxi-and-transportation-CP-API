<?php

namespace Database\Seeders;

use App\Models\SystemSetting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SystemSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        SystemSetting::create(['key' => 'commission' , 'value' => 15 ]);
        SystemSetting::create(['key' => 'currency'   , 'value' => 'SAR' ]);

    }
}
