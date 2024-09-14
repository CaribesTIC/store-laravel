<?php

namespace Modules\Product\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Modules\Product\Entities\Mark;

class MarksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Mark::create(['name' => 'N/A'     ]);
        Mark::create(['name' => 'JUANA'   ]);
        Mark::create(['name' => 'LA LUCHA']);
        Mark::create(['name' => 'PANTERA' ]);
        Mark::create(['name' => 'PAN'     ]);
    }

}

