<?php

namespace Database\Seeders;

use App\Models\Wallet;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WalletSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Wallet::create(['name' => 'System' , 'type' =>  Wallet::TYPES['system'] ,               'balance' => 0 , 'currency' => 'SRA' , 'status' => 1  ]);
        Wallet::create(['name' => 'System commission' , 'type' =>  Wallet::TYPES['system_commission'] ,    'balance' => 0 , 'currency' => 'SRA' , 'status' => 1  ]);

    }
}
