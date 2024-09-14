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
            //OthersTableSeeder:class,
            StatesTableSeeder::class,
            MunicipalitiesTableSeeder::class,
            ParishesTableSeeder::class,
            CitiesTableSeeder::class,
            ZoneTypesTableSeeder::class,
            RouteTypesTableSeeder::class,
            DomicileTypesTableSeeder::class,
            MuContainerSeeder::class,
            MuMeasureUnitTypeSeeder::class,
            MuMeasureUnitSeeder::class
        ]);
    }
}
