<?php

namespace Modules\Common\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Common\Entities\GeoLocation\RouteType;

class RouteTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        RouteType::create(['id' =>  1, 'description' => 'CARRETERA' ]);
        RouteType::create(['id' =>  2, 'description' => 'CALLE'     ]);
        RouteType::create(['id' =>  3, 'description' => 'AVENIDA'   ]);
        RouteType::create(['id' =>  4, 'description' => 'AUTOPISTAS']);        
        RouteType::create(['id' =>  5, 'description' => 'CAÑADA'    ]);
        RouteType::create(['id' =>  6, 'description' => 'CARRIL'    ]);
        RouteType::create(['id' =>  7, 'description' => 'PISTA'     ]);
        RouteType::create(['id' =>  8, 'description' => 'RUTA'      ]);
        RouteType::create(['id' =>  9, 'description' => 'TRAYECTO'  ]);
        RouteType::create(['id' => 10, 'description' => 'PASEO'     ]);
        RouteType::create(['id' => 11, 'description' => 'CAMINO'    ]);
        RouteType::create(['id' => 12, 'description' => 'SENDA'     ]);
        RouteType::create(['id' => 13, 'description' => 'BOULEVAR'  ]);
        RouteType::create(['id' => 14, 'description' => 'CALZADA'   ]);
        RouteType::create(['id' => 15, 'description' => 'CONDUCTO'  ]);
        RouteType::create(['id' => 16, 'description' => 'VÍA'       ]);
        RouteType::create(['id' => 17, 'description' => 'ENTRADA'   ]);
        RouteType::create(['id' => 18, 'description' => 'TRONCAL'   ]);
        RouteType::create(['id' => 19, 'description' => 'ESQUINAS'  ]);
    }
}
