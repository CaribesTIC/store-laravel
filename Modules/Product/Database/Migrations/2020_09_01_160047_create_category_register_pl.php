<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoryRegisterPl extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared("  
  CREATE OR REPLACE FUNCTION public.category_register(
    i_id integer,
    i_parent_id integer,
    i_name character varying)
  RETURNS json AS
  \$BODY\$
  DECLARE
    v_exist boolean;
    v_id integer;
    o_return json;
  BEGIN
    o_return:=array_to_json(array['']);
    IF i_id=0 THEN
      SELECT CASE WHEN count(id)=0 THEN false ELSE true END INTO v_exist
        FROM public.categories
          WHERE name=i_name AND parent_id = i_parent_id;
      IF v_exist='f' THEN
        INSERT INTO public.categories(
          name,
          parent_id,
          created_at,
          updated_at)
        VALUES (
          i_name,
          i_parent_id,
          now()::timestamp(0) without time zone,
          now()::timestamp(0) without time zone)
        RETURNING id INTO v_id;        
        o_return:= array_to_json(array['t', 'El registro fue agregado con éxito', v_id::character varying]);
      ELSE        
        o_return:= array_to_json(array['f', 'Disculpe: El registro está repetido']);
      END IF;
    ELSE
      UPDATE public.categories 
        SET
          name = i_name,
          parent_id=i_parent_id,
          updated_at=now()::timestamp(0) without time zone
        WHERE id=i_id;        
        o_return:= array_to_json(array['t', 'El registro fue actualizado con éxito']);
      END IF;
      RETURN o_return;
    END;
  \$BODY\$
  LANGUAGE plpgsql VOLATILE
    COST 100;
  ALTER FUNCTION public.category_register(integer, integer, character varying)
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
         DB::unprepared("DROP FUNCTION public.category_register(integer, integer, character varying);");
    }
}

