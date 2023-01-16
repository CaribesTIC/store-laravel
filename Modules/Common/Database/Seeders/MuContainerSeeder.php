<?php

namespace Modules\Common\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MuContainerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::connection('pgsql_common')->statement("INSERT INTO public.mu_containers VALUES (22, 'CAJA(S)')");
        DB::connection('pgsql_common')->statement("INSERT INTO public.mu_containers VALUES (1, 'PAQUETE(S)')");
        DB::connection('pgsql_common')->statement("INSERT INTO public.mu_containers VALUES (2, 'BOLSA(S)')");
        DB::connection('pgsql_common')->statement("INSERT INTO public.mu_containers VALUES (3, 'TUBO(S)')");
        DB::connection('pgsql_common')->statement("INSERT INTO public.mu_containers VALUES (5, 'PAPELETA(S)')");
        DB::connection('pgsql_common')->statement("INSERT INTO public.mu_containers VALUES (6, 'BULTO(S)')");
        DB::connection('pgsql_common')->statement("INSERT INTO public.mu_containers VALUES (7, 'BARRIL(ES)')");
        DB::connection('pgsql_common')->statement("INSERT INTO public.mu_containers VALUES (8, 'PIPETA(S)')");
        DB::connection('pgsql_common')->statement("INSERT INTO public.mu_containers VALUES (9, 'PIPOTE(S)')");
        DB::connection('pgsql_common')->statement("INSERT INTO public.mu_containers VALUES (10, 'FAJA(S)')");
        DB::connection('pgsql_common')->statement("INSERT INTO public.mu_containers VALUES (11, 'BOTELLA(S)')");
        DB::connection('pgsql_common')->statement("INSERT INTO public.mu_containers VALUES (14, 'POTE(S)')");
        DB::connection('pgsql_common')->statement("INSERT INTO public.mu_containers VALUES (13, 'GABERA(S)')");
        DB::connection('pgsql_common')->statement("INSERT INTO public.mu_containers VALUES (19, 'VASO(S)')");
        DB::connection('pgsql_common')->statement("INSERT INTO public.mu_containers VALUES (18, 'BOMBONA(S)')");
        DB::connection('pgsql_common')->statement("INSERT INTO public.mu_containers VALUES (16, 'TANQUE(S)')");
        DB::connection('pgsql_common')->statement("INSERT INTO public.mu_containers VALUES (15, 'PIMPINA(S)')");
        DB::connection('pgsql_common')->statement("INSERT INTO public.mu_containers VALUES (20, 'GALON(ES)')");
        DB::connection('pgsql_common')->statement("INSERT INTO public.mu_containers VALUES (21, 'CUÑETE(S)')");
        DB::connection('pgsql_common')->statement("INSERT INTO public.mu_containers VALUES (4, 'FRASCO(S)')");
        DB::connection('pgsql_common')->statement("INSERT INTO public.mu_containers VALUES (12, 'LATA(S)')");
        DB::connection('pgsql_common')->statement("INSERT INTO public.mu_containers VALUES (24, 'PAILA(S)')");
        DB::connection('pgsql_common')->statement("INSERT INTO public.mu_containers VALUES (23, 'TAMBOR(ES)')");
        DB::connection('pgsql_common')->statement("INSERT INTO public.mu_containers VALUES (25, 'BOBINA(S)')");
        DB::connection('pgsql_common')->statement("INSERT INTO public.mu_containers VALUES (26, 'ROLLO(S)')");
        DB::connection('pgsql_common')->statement("INSERT INTO public.mu_containers VALUES (27, 'PALETA(S) ')");
        DB::connection('pgsql_common')->statement("INSERT INTO public.mu_containers VALUES (28, 'LÁMINA(S)')");
        DB::connection('pgsql_common')->statement("INSERT INTO public.mu_containers VALUES (29, 'CARBOYA(S)')");
        DB::connection('pgsql_common')->statement("INSERT INTO public.mu_containers VALUES (30, 'TOTEN(S)')");
        DB::connection('pgsql_common')->statement("INSERT INTO public.mu_containers VALUES (31, 'CARTUCHO(S)')");
        DB::connection('pgsql_common')->statement("INSERT INTO public.mu_containers VALUES (32, 'GRANEL')");
        DB::connection('pgsql_common')->statement("INSERT INTO public.mu_containers VALUES (33, 'N/A')");
        DB::connection('pgsql_common')->statement("INSERT INTO public.mu_containers VALUES (35, 'BLISTER(S)')");
        DB::connection('pgsql_common')->statement("INSERT INTO public.mu_containers VALUES (36, 'PACA(S)')");
        DB::connection('pgsql_common')->statement("INSERT INTO public.mu_containers VALUES (37, 'SACO(S)')");
        DB::connection('pgsql_common')->statement(
            "UPDATE public.mu_containers
            SET created_at = now()::timestamp(0) without time zone,
                updated_at = now()::timestamp(0) without time zone"
        );
    }
}
