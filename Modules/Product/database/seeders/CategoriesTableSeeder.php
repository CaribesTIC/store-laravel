<?php

namespace Modules\Product\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Modules\Product\Entities\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create(['name' => 'ALIMENTO'         , 'parent_id' => 0, 'final' => false]);
        Category::create(['name' => 'HARINA'           , 'parent_id' => 1, 'final' => true ]);
        Category::create(['name' => 'GRANOS'           , 'parent_id' => 1, 'final' => true ]);
        Category::create(['name' => 'CARAOTAS'         , 'parent_id' => 3, 'final' => true ]);
        Category::create(['name' => 'HIGIENE DEL HOGAR', 'parent_id' => 0, 'final' => true ]);
        Category::create(['name' => 'DETERGENTE'       , 'parent_id' => 5, 'final' => true ]);
        Category::create(['name' => 'ASEO PERSONAL'    , 'parent_id' => 0, 'final' => true ]);
        Category::create(['name' => 'JABONES'          , 'parent_id' => 7, 'final' => true ]);
        Category::create(['name' => 'AVENA'            , 'parent_id' => 8, 'final' => true ]);
    }
}

