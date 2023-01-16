<?php

namespace Modules\Common\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MuMeasureUnitTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement("INSERT INTO public.mu_measure_unit_types VALUES (1, 'Longitud')");
        DB::statement("INSERT INTO public.mu_measure_unit_types VALUES (2, 'Masa')");
        DB::statement("INSERT INTO public.mu_measure_unit_types VALUES (3, 'Capacidad')");
        DB::statement("INSERT INTO public.mu_measure_unit_types VALUES (4, 'Superficie')");
        DB::statement("INSERT INTO public.mu_measure_unit_types VALUES (5, 'Superficie Agrarias')");
        DB::statement("INSERT INTO public.mu_measure_unit_types VALUES (6, 'Volumen')");
        DB::statement("INSERT INTO public.mu_measure_unit_types VALUES (7, 'Cantidad')");       
        DB::statement(
            "UPDATE public.mu_measure_unit_types
            SET created_at = now()::timestamp(0) without time zone,
                updated_at = now()::timestamp(0) without time zone"
        );
    }
}
