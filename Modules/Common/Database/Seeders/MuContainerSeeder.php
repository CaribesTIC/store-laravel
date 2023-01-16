<?php

use Illuminate\Database\Seeder;

class MuContainerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement("INSERT INTO public.mu_containers VALUES (22, 'CAJA(S)')");
        DB::statement("INSERT INTO public.mu_containers VALUES (1, 'PAQUETE(S)')");
        DB::statement("INSERT INTO public.mu_containers VALUES (2, 'BOLSA(S)')");
        DB::statement("INSERT INTO public.mu_containers VALUES (3, 'TUBO(S)')");
        DB::statement("INSERT INTO public.mu_containers VALUES (5, 'PAPELETA(S)')");
        DB::statement("INSERT INTO public.mu_containers VALUES (6, 'BULTO(S)')");
        DB::statement("INSERT INTO public.mu_containers VALUES (7, 'BARRIL(ES)')");
        DB::statement("INSERT INTO public.mu_containers VALUES (8, 'PIPETA(S)')");
        DB::statement("INSERT INTO public.mu_containers VALUES (9, 'PIPOTE(S)')");
        DB::statement("INSERT INTO public.mu_containers VALUES (10, 'FAJA(S)')");
        DB::statement("INSERT INTO public.mu_containers VALUES (11, 'BOTELLA(S)')");
        DB::statement("INSERT INTO public.mu_containers VALUES (14, 'POTE(S)')");
        DB::statement("INSERT INTO public.mu_containers VALUES (13, 'GABERA(S)')");
        DB::statement("INSERT INTO public.mu_containers VALUES (19, 'VASO(S)')");
        DB::statement("INSERT INTO public.mu_containers VALUES (18, 'BOMBONA(S)')");
        DB::statement("INSERT INTO public.mu_containers VALUES (16, 'TANQUE(S)')");
        DB::statement("INSERT INTO public.mu_containers VALUES (15, 'PIMPINA(S)')");
        DB::statement("INSERT INTO public.mu_containers VALUES (20, 'GALON(ES)')");
        DB::statement("INSERT INTO public.mu_containers VALUES (21, 'CUÑETE(S)')");
        DB::statement("INSERT INTO public.mu_containers VALUES (4, 'FRASCO(S)')");
        DB::statement("INSERT INTO public.mu_containers VALUES (12, 'LATA(S)')");
        DB::statement("INSERT INTO public.mu_containers VALUES (24, 'PAILA(S)')");
        DB::statement("INSERT INTO public.mu_containers VALUES (23, 'TAMBOR(ES)')");
        DB::statement("INSERT INTO public.mu_containers VALUES (25, 'BOBINA(S)')");
        DB::statement("INSERT INTO public.mu_containers VALUES (26, 'ROLLO(S)')");
        DB::statement("INSERT INTO public.mu_containers VALUES (27, 'PALETA(S) ')");
        DB::statement("INSERT INTO public.mu_containers VALUES (28, 'LÁMINA(S)')");
        DB::statement("INSERT INTO public.mu_containers VALUES (29, 'CARBOYA(S)')");
        DB::statement("INSERT INTO public.mu_containers VALUES (30, 'TOTEN(S)')");
        DB::statement("INSERT INTO public.mu_containers VALUES (31, 'CARTUCHO(S)')");
        DB::statement("INSERT INTO public.mu_containers VALUES (32, 'GRANEL')");
        DB::statement("INSERT INTO public.mu_containers VALUES (33, 'N/A')");
        DB::statement("INSERT INTO public.mu_containers VALUES (35, 'BLISTER(S)')");
        DB::statement("INSERT INTO public.mu_containers VALUES (36, 'PACA(S)')");
        DB::statement("INSERT INTO public.mu_containers VALUES (37, 'SACO(S)')");
        DB::statement(
            "UPDATE public.mu_containers
            SET created_at = now()::timestamp(0) without time zone,
                updated_at = now()::timestamp(0) without time zone"
        );
    }
}
