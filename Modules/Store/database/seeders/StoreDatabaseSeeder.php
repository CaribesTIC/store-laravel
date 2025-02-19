<?php

namespace Modules\Store\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class StoreDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        // $this->call("MovementTableSeeder");
        $this->call([
            //OthersTableSeeder:class,
            SubWarehouseSeeder::class,
            MovementTableSeeder::class,
            MovementDetailTableSeeder::class,
            SupportTypesSeeder::class
        ]);
    }
}
