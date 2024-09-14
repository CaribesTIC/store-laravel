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
        DB::connection('pgsql_common')->statement("INSERT INTO public.mu_measure_unit_types VALUES (1, 'Longitud')");
        DB::connection('pgsql_common')->statement("INSERT INTO public.mu_measure_unit_types VALUES (2, 'Masa')");
        DB::connection('pgsql_common')->statement("INSERT INTO public.mu_measure_unit_types VALUES (3, 'Capacidad')");
        DB::connection('pgsql_common')->statement("INSERT INTO public.mu_measure_unit_types VALUES (4, 'Superficie')");
        DB::connection('pgsql_common')->statement("INSERT INTO public.mu_measure_unit_types VALUES (5, 'Superficie Agrarias')");
        DB::connection('pgsql_common')->statement("INSERT INTO public.mu_measure_unit_types VALUES (6, 'Volumen')");
        DB::connection('pgsql_common')->statement("INSERT INTO public.mu_measure_unit_types VALUES (7, 'Cantidad')");       
        DB::connection('pgsql_common')->statement(
            "UPDATE public.mu_measure_unit_types
            SET created_at = now()::timestamp(0) without time zone,
                updated_at = now()::timestamp(0) without time zone"
        );
    }
}
