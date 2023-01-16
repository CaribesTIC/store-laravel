<?php

namespace Modules\Common\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class CommonDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->call([
            MuContainerSeeder::class,
            MuMeasureUnitTypeSeeder::class,
            MuMeasureUnitSeeder::class
        ]);
        
        //$this->call("MuContainerSeeder");
        //$this->call("MuMeasureUnitTypeSeeder");
        //$this->call("MuMeasureUnitSeeder");
        // $this->call("OthersTableSeeder");
    }
}

