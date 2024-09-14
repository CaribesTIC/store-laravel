<?php

namespace Modules\Common\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Common\Entities\GeoLocation\DomicileType;

class DomicileTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DomicileType::create(['id' => 1, 'description' => 'CASA'      ]);
        DomicileType::create(['id' => 2, 'description' => 'EDIFICIO'  ]);        
        DomicileType::create(['id' => 3, 'description' => 'TOWNHOUSE' ]);
        DomicileType::create(['id' => 4, 'description' => 'RESIDENCIA']);
        DomicileType::create(['id' => 5, 'description' => 'CHALÉ'     ]);
        DomicileType::create(['id' => 6, 'description' => 'FINCA'     ]);
        DomicileType::create(['id' => 7, 'description' => 'PENSIÓN'   ]);
    }
}
