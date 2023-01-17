<?php

namespace Modules\Product\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Modules\Product\Entities\Presentation;

class PresentationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Presentation::create([
            'product_id' => 1,
            'packing' => '[{"packing": "PAQUETE(S)", "quantity": 1}, {"packing": "PACA(S)", "quantity": 24}]',
            'bar_cod' => 'A1A1A1A1',
            'int_cod' => '1A1A1A1A',
            'price' => 100.2,
            'sale_type' => true
        ]);

        Presentation::create([
            'product_id' => 2,
            'packing' => '[{"packing": "PAQUETE(S)", "quantity": 1}, {"packing": "PACA(S)", "quantity": 24}]',
            'bar_cod' => 'B2B2B2B2',
            'int_cod' => '2B2B2B2B',
            'price' => 300.5,
            'sale_type' => true
        ]);

        Presentation::create([
            'product_id' => 3,
            'packing' => '[{"packing": "PAQUETE(S)", "quantity": 1}, {"packing": "SACO(S)", "quantity": 12}]',
            'bar_cod' => 'C3C3C3C3',
            'int_cod' => '3C3C3C3C',
            'price' => 0.5,
            'sale_type' => true
        ]);

        Presentation::create([
            'product_id' => 3,
            'packing' => '[{"packing": "BULTO(S)", "quantity": 4}, {"packing": "CARTUCHO(S)", "quantity": 54}, {"packing": "BOTELLA(S)", "quantity": 44}, {"packing": "BOMBONA(S)", "quantity": 44}, {"packing": "PAQUETE(S)", "quantity": 0.5}, {"packing": "SACO(S)", "quantity": 24}]',
            'bar_cod' => 'D4D4D4D4',
            'int_cod' => 'D4D4D4D4',
            'price' => 1400.7,
            'sale_type' => true
        ]);

        Presentation::create([
            'product_id' => 3,
            'packing' => '[{"packing": "PAQUETE(S)", "quantity": 0.25}, {"packing": "SACO(S)", "quantity": 48}]',
            'bar_cod' => 'E5E5E5E5',
            'int_cod' => '5E5E5E5E',
            'price' => 150,
            'sale_type' => true
        ]);

        Presentation::create([
            'product_id' => 4,
            'packing' => '[{"packing": "PAQUETE(S)", "quantity": 1}, {"packing": "BULTO(S)", "quantity": 12}]',
            'bar_cod' => '5K5KI5K5K',
            'int_cod' => 'K5K5K5K5',
            'price' => 5,
            'sale_type' => true
        ]);

        Presentation::create([
            'product_id' => 5,
            'packing' => '[{"packing": "PAQUETE(S)", "quantity": 1}, {"packing": "BULTO(S)", "quantity": 12}]',
            'bar_cod' => 'K3K3K3K3',
            'int_cod' => '3K3K3K3K',
            'sale_type' => true
        ]);

        Presentation::create([
            'product_id' => 5,
            'packing' => '[{"packing": "PAQUETE(S)", "quantity": 0.5}, {"packing": "BULTO(S)", "quantity": 24}]',
            'bar_cod' => 'O0O0O0O0',
            'int_cod' => '0O0O0O0O',
            'sale_type' => true
        ]);

        Presentation::create([
            'product_id' => 4,
            'packing' => '[{"packing": "PAPELETA(S)", "quantity": 0.5}, {"packing": "BULTO(S)", "quantity": 24}]',
            'bar_cod' => 'K1K1K1K1',
            'int_cod' => '1K1K1K1K',
            'sale_type' => true
        ]);

        Presentation::create([
            'product_id' => 6,
            'packing' => '[{"packing": "BULTO(S)", "quantity": 1}, {"packing": "PAQUETE(S)", "quantity": 1}, {"packing": "BULTO(S)", "quantity": 12}]',
            'bar_cod' => 'Q3Q3Q3Q3',
            'int_cod' => '3Q3Q3Q3Q',
            'sale_type' => true
        ]);

        Presentation::create([
            'product_id' => 6,
            'packing' => '[{"packing": "PAQUETE(S)", "quantity": 0.5}, {"packing": "BULTO(S)", "quantity": 24}]',
            'bar_cod' => 'B8B8B8B8',
            'int_cod' => '8B8B8B8B',
            'sale_type' => true
        ]);

        Presentation::create([
            'product_id' => 2,
            'packing' => '[{"packing": "PAQUETE(S)", "quantity": 0.5}, {"packing": "PACA(S)", "quantity": 48}]',
            'bar_cod' => 'H1H1H1H1',
            'int_cod' => '1H1H1H1H',
            'sale_type' => true
        ]);

    }

}
