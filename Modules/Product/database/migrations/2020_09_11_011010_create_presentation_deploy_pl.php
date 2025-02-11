<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePresentationDeployPl extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //DB::connection('pgsql_product')->unprepared("DROP FUNCTION public.presentation_deploy(integer);");
        DB::connection('pgsql_product')->unprepared("
CREATE OR REPLACE FUNCTION public.presentation_deploy(i_id integer)
  RETURNS character AS
\$BODY\$
DECLARE
        o_return character varying;
        v_arr json[];
        v_uni_med character varying;
        v_arr_union character varying[];
        v_n integer;
BEGIN
         o_return := '';
         SELECT (ARRAY(select json_array_elements(A.packing::json))), B.measure_unit  INTO v_arr, v_uni_med         
         FROM public.presentations A 
         INNER JOIN public.products B ON A.product_id = B.id
         WHERE A.id=i_id;         
         v_arr_union = ARRAY[' DE ', ' CON ']; 
         v_n = 1;        
         FOR i IN array_lower(v_arr, 1) .. array_upper(v_arr, 1) LOOP                  
                  IF  i = 1 THEN
                      o_return := v_arr[i]->'packing' || v_arr_union[v_n] || (v_arr[i]->'quantity'::text) || ' ' || v_uni_med;
                  ELSE
                      o_return := (v_arr[i]->'packing') || v_arr_union[v_n] || (v_arr[i]->'quantity') || ' ' || o_return;
                  END IF;
                  v_n = v_n + 1;
                  IF v_n = 3 THEN
                      v_n = 1;
                  END IF;
         END LOOP;
         
        RETURN (replace(o_return, '\"', ''));
END;
\$BODY\$
  LANGUAGE plpgsql VOLATILE
  COST 100;
ALTER FUNCTION public.presentation_deploy(integer)
  OWNER TO postgres;
");  

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //DB::connection('pgsql_product')->unprepared("DROP FUNCTION public.presentation_deploy(integer);");
    }
}

