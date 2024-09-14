<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoryRemovePl extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //DB::connection('pgsql_product')->unprepared("DROP FUNCTION public.category_remove(integer);");
        DB::connection('pgsql_product')->unprepared("        
  CREATE OR REPLACE FUNCTION public.category_remove(i_id integer)
  RETURNS json AS
  \$BODY\$
  DECLARE
    o_return json;
    v_exist boolean;
  BEGIN
    o_return:=array_to_json(array['f', 'Error de ejecución; notifique al especialista del sistema']);
    SELECT CASE WHEN count(id)=0 THEN false ELSE true END INTO v_exist 
      FROM public.categories 
        WHERE parent_id = i_id;        
    IF v_exist='f' THEN
      DELETE FROM public.categories WHERE id=i_id;
      o_return:=array_to_json(array['t', 'El registro fué eliminado con éxito']);
    ELSE
      o_return:=array_to_json(array['f', 'Disculpe: Hay registro(s) asociado(s)']);
    END IF;
    RETURN o_return;
  END;
  \$BODY\$
  LANGUAGE plpgsql VOLATILE
    COST 100;
  ALTER FUNCTION public.category_remove(integer)
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
        //DB::connection('pgsql_product')->unprepared("DROP FUNCTION public.category_remove(integer);");
    }
}
