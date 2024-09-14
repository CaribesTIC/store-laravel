<?php

namespace Modules\Common\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Common\Entities\GeoLocation\ZoneType;

class ZoneTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {        
        ZoneType::create(['id' => 1,  'description' => 'SECTOR'      ]);
        ZoneType::create(['id' => 2,  'description' => 'CASERIO'     ]);
        ZoneType::create(['id' => 3,  'description' => 'POBLADO'     ]);
        ZoneType::create(['id' => 4,  'description' => 'ZONA'        ]);
        ZoneType::create(['id' => 5,  'description' => 'PARCELA'     ]);
        ZoneType::create(['id' => 6,  'description' => 'TRAMO'       ]);
        ZoneType::create(['id' => 7,  'description' => 'SECCIÓN'     ]);
        ZoneType::create(['id' => 8,  'description' => 'URBANISMO'   ]);
        ZoneType::create(['id' => 9,  'description' => 'DESARROLLO'  ]);
        ZoneType::create(['id' => 10, 'description' => 'COMARCA'     ]);
        ZoneType::create(['id' => 11, 'description' => 'CONDADO'     ]);
        ZoneType::create(['id' => 12, 'description' => 'REGIÓN'      ]);
        ZoneType::create(['id' => 13, 'description' => 'PUEBLO'      ]);
        ZoneType::create(['id' => 14, 'description' => 'VILLA'       ]);
        ZoneType::create(['id' => 15, 'description' => 'CONJUNTO'    ]);
        ZoneType::create(['id' => 16, 'description' => 'URBANIZACIÓN']);
        ZoneType::create(['id' => 17, 'description' => 'ÁREA'        ]);
        ZoneType::create(['id' => 18, 'description' => 'ALDEA'       ]);
    }
}
