<?php

namespace Modules\Store\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SupportTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $this->call([]);
        DB::statement("INSERT INTO public.support_types(name) VALUES ('ORDEN DE COMPRA')");
        DB::statement("INSERT INTO public.support_types(name) VALUES ('FACTURA')");
    }
}
