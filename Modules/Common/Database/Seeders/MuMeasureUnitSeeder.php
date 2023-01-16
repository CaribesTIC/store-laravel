<?php

namespace Modules\Common\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MuMeasureUnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {        
        DB::statement("INSERT INTO public.mu_measure_units VALUES (1, 1, 'Kilómetro(s)', 'km', '1000 m')");
        DB::statement("INSERT INTO public.mu_measure_units VALUES (2, 1, 'Hectómetro(s)', 'hm', '100 m')");
        DB::statement("INSERT INTO public.mu_measure_units VALUES (3, 1, 'Decámetro(s)', 'dam', '10 m')");
        DB::statement("INSERT INTO public.mu_measure_units VALUES (4, 1, 'Metro(s)', 'm', '1 m')");
        DB::statement("INSERT INTO public.mu_measure_units VALUES (5, 1, 'Decímetro(s)', 'dm', '0.1 m')");
        DB::statement("INSERT INTO public.mu_measure_units VALUES (6, 1, 'Centímetro(s)', 'cm', '0.01 m')");
        DB::statement("INSERT INTO public.mu_measure_units VALUES (7, 1, 'Milímetro(s)', 'mm', '0.001 m')");
        DB::statement("INSERT INTO public.mu_measure_units VALUES (8, 1, 'Pulgada(s)', 'pul', '1 pul')");
        DB::statement("INSERT INTO public.mu_measure_units VALUES (9, 1, 'Pie(s)', 'pie', '12 pulgadas = 30.48 cm.')");
        DB::statement("INSERT INTO public.mu_measure_units VALUES (10, 1, 'Yarda(s)', 'yar', 'Yarda = 3 pies = 91.44 cm.')");
        DB::statement("INSERT INTO public.mu_measure_units VALUES (11, 1, 'Braza(s)', 'bz', 'Braza = dos yardas = 1. 829 m.')");
        DB::statement("INSERT INTO public.mu_measure_units VALUES (12, 1, 'Milla(s) Terrestre', 'mllt', 'Milla terrestre = 880 brazas = 1.609 kilómetros.')");
        DB::statement("INSERT INTO public.mu_measure_units VALUES (13, 1, 'Milla(s) Náutica', 'mlln', 'Milla náutica = 1.853 m.')");
        DB::statement("INSERT INTO public.mu_measure_units VALUES (14, 2, 'Kilogramo(s)', 'kg', '1000 g')");
        DB::statement("INSERT INTO public.mu_measure_units VALUES (15, 2, 'Hectogramo(s)', 'hg', '100 g')");
        DB::statement("INSERT INTO public.mu_measure_units VALUES (16, 2, 'Decagramo(s)', 'dag', '10 g')");
        DB::statement("INSERT INTO public.mu_measure_units VALUES (17, 2, 'Gramo(s)', 'g', '1 g')");
        DB::statement("INSERT INTO public.mu_measure_units VALUES (18, 2, 'Decigramo(s)', 'dg', '0.1 g')");
        DB::statement("INSERT INTO public.mu_measure_units VALUES (19, 2, 'Centigramo(s)', 'cg', '0.01 g')");
        DB::statement("INSERT INTO public.mu_measure_units VALUES (20, 2, 'Miligramo(s)', 'mg', '0.001 g')");
        DB::statement("INSERT INTO public.mu_measure_units VALUES (21, 2, 'Tonelada(s) Métrica', 't', '1 t = 1000 kg')");
        DB::statement("INSERT INTO public.mu_measure_units VALUES (22, 2, 'Quintal Métrico', 'qm', '1 q = 100 kg')");
        DB::statement("INSERT INTO public.mu_measure_units VALUES (23, 3, 'Kilolitro(s)', 'kl', '1000 l')");
        DB::statement("INSERT INTO public.mu_measure_units VALUES (24, 3, 'Hectolitro(s)', 'hl', '100 l')");
        DB::statement("INSERT INTO public.mu_measure_units VALUES (25, 3, 'Decalitro(s)', 'dal', '10 l')");
        DB::statement("INSERT INTO public.mu_measure_units VALUES (26, 3, 'Litro(s)', 'l', '1 l')");
        DB::statement("INSERT INTO public.mu_measure_units VALUES (27, 3, 'Decilitro(s)', 'dl', '0.1 l')");
        DB::statement("INSERT INTO public.mu_measure_units VALUES (28, 3, 'Centilitro(s)', 'cl', '0.01 l')");
        DB::statement("INSERT INTO public.mu_measure_units VALUES (29, 3, 'Mililitro(s)', 'ml', '0.001 l')");
        DB::statement("INSERT INTO public.mu_measure_units VALUES (30, 3, 'Barril', 'b', '159 l')");
        DB::statement("INSERT INTO public.mu_measure_units VALUES (31, 4, 'Kilómetro(s) Cuadrado', 'km2', '1 000 000 m2')");
        DB::statement("INSERT INTO public.mu_measure_units VALUES (32, 4, 'Hectómetro(s) Cuadrado', 'hm2', '10 000 m2')");
        DB::statement("INSERT INTO public.mu_measure_units VALUES (33, 4, 'Decámetro(s) Cuadrado', 'dam2', '100 m2')");
        DB::statement("INSERT INTO public.mu_measure_units VALUES (34, 4, 'Metro(s) Cuadrado', 'm2', '1 m2')");
        DB::statement("INSERT INTO public.mu_measure_units VALUES (35, 4, 'Decímetro(s) Cuadrado', 'dm2', '0.01 m2')");
        DB::statement("INSERT INTO public.mu_measure_units VALUES (36, 4, 'Centímetro(s) Cuadrado', 'cm2', '0.0001 m2')");
        DB::statement("INSERT INTO public.mu_measure_units VALUES (37, 4, 'Milímetro(s) Cuadrado', 'mm2', '0.000001 m2')");
        DB::statement("INSERT INTO public.mu_measure_units VALUES (38, 5, 'Hectárea', 'h', '1 Ha = 1 Hm2 = 10 000 m2')");
        DB::statement("INSERT INTO public.mu_measure_units VALUES (39, 5, 'Área', 'a', '1 a = 1 dam2 = 100 m2')");
        DB::statement("INSERT INTO public.mu_measure_units VALUES (40, 5, 'Centiárea', 'ca', '1 ca = 1 m2')");
        DB::statement("INSERT INTO public.mu_measure_units VALUES (41, 6, 'Kilómetro(s) Cúbico', 'km3', '1 000 000 000 m3')");
        DB::statement("INSERT INTO public.mu_measure_units VALUES (42, 6, 'Hectómetro(s) Cúbico', 'hm3', '1 000 000m3')");
        DB::statement("INSERT INTO public.mu_measure_units VALUES (43, 6, 'Decámetro(s) Cúbico', 'dam3', '1 000 m3')");
        DB::statement("INSERT INTO public.mu_measure_units VALUES (44, 6, 'Metro(s) Cúbico', 'm3', '1 m3')");
        DB::statement("INSERT INTO public.mu_measure_units VALUES (45, 6, 'Decímetro(s) Cúbico', 'dm3', '0.001 m3')");
        DB::statement("INSERT INTO public.mu_measure_units VALUES (46, 6, 'Centímetro(s) Cúbico', 'cm3', '0.000001 m3')");
        DB::statement("INSERT INTO public.mu_measure_units VALUES (47, 6, 'Milímetro(s) Cúbico', 'mm3', '0.000000001 m3')");
        DB::statement("INSERT INTO public.mu_measure_units VALUES (48, 7, 'Unidades', 'Unid', '1')");
        DB::statement(
            "UPDATE public.mu_measure_units
            SET created_at = now()::timestamp(0) without time zone,
                updated_at = now()::timestamp(0) without time zone"
        );
    }
}

