<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMarksRegisterPl extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::connection('pgsql_product')->unprepared("DROP FUNCTION public.mark_register(integer, character varying, integer);");
        DB::connection('pgsql_product')->unprepared("
  CREATE OR REPLACE FUNCTION public.mark_register(
    i_id integer,
    i_name character varying,
    i_producer_id integer)
  RETURNS json AS
\$BODY\$
DECLARE
    v_exist boolean;
    v_id integer;
    o_return json;
BEGIN
        o_return:=array_to_json(array['']);
        IF i_id=0 THEN
                SELECT CASE WHEN count(id)=0 THEN false ELSE true END INTO v_exist FROM public.marks
                        WHERE name=i_name;
                IF  v_exist='f' THEN
                        INSERT INTO public.marks(
                                name,
                                producer_id,
                                created_at,
                                updated_at)
                        VALUES (
                                i_name,
                                i_producer_id,
                                now()::timestamp(0) without time zone,
                                now()::timestamp(0) without time zone
                                )
                         RETURNING id INTO v_id;        
                         o_return:= array_to_json(array['t', 'El registro fue agregado con éxito', v_id::character varying]);
                ELSE
                        o_return:= array_to_json(array['f', 'Disculpe: El registro está repetido']);
                END IF;
        ELSE
                UPDATE public.marks SET
                        name=i_name,
                        producer_id=i_producer_id,
                        updated_at=now()::timestamp(0) without time zone
                WHERE id=i_id;
                        o_return:= array_to_json(array['t', 'El registro fue actualizado con éxito']);
        END IF;
        RETURN o_return;
END;
\$BODY\$
  LANGUAGE plpgsql VOLATILE
  COST 100;
ALTER FUNCTION public.mark_register(integer, character varying, integer)
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
        DB::connection('pgsql_product')->unprepared("DROP FUNCTION public.mark_register(integer, character varying, integer);");
    }
}
