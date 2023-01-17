<?php

namespace Modules\Product\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Modules\Product\Entities\Product;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
            'name' => 'MAIZ',
            'mark_id' => 2,
            'category_id' => 2,
            'measure_unit_type_id' => 2,
            'measure_unit_id' => 14,
            'measure_unit' => 'Kilogramo(s)',
            'photo' => ''
        ]);
        
        Product::create([
            'name' => 'TRIGO',
            'mark_id' => 3,
            'category_id' => 2,
            'measure_unit_type_id' => 2,
            'measure_unit_id' => 14,
            'measure_unit' => 'Kilogramo(s)',
            'photo' => ''
        ]);
        
        Product::create([
            'name' => 'LENTEJAS',
            'mark_id' => 4,
            'category_id' => 3,
            'measure_unit_type_id' => 2,
            'measure_unit_id' => 14,
            'measure_unit' => 'Kilogramo(s)',
            'photo' => ''
        ]);
        
        Product::create([
            'name' => 'NEGRAS',
            'mark_id' => 4,
            'category_id' => 4,
            'measure_unit_type_id' => 2,
            'measure_unit_id' => 14,
            'measure_unit' => 'Kilogramo(s)',
            'photo' => ''
        ]);
        
        Product::create([
            'name' => 'ROJAS',
            'mark_id' => 4,
            'category_id' => 4,
            'measure_unit_type_id' => 2,
            'measure_unit_id' => 14,
            'measure_unit' => 'Kilogramo(s)',
            'photo' => ''
        ]);
        
        Product::create([
            'name' => 'BLANCAS',
            'mark_id' => 4,
            'category_id' => 4,
            'measure_unit_type_id' => 2,
            'measure_unit_id' => 14,
            'measure_unit' => 'Kilogramo(s)',
            'photo' => ''
        ]);
    }
}

