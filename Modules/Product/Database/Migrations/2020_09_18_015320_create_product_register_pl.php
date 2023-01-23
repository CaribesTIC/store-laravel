<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductRegisterPl extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared("
CREATE OR REPLACE FUNCTION public.product_register(
    i_id integer,
    i_name character varying,
    i_category_id integer,
    i_mark_id integer,
    i_measure_unit_type_id integer,
    i_measure_unit_id integer,
    i_measure_unit character varying,
    i_user_id integer)
  RETURNS json AS
\$BODY\$
DECLARE
        v_existe boolean;
        v_id integer;
        o_return json;
BEGIN
        o_return:=array_to_json(array['']);
        IF i_id=0 THEN
                SELECT CASE WHEN count(id)=0 THEN false ELSE true END INTO v_existe FROM public.products
                        WHERE name=i_name;
                IF  v_existe='f' THEN
                        INSERT INTO public.products(
                                name,
                                mark_id,
                                category_id,
                                measure_unit_type_id,
                                measure_unit_id,
                                measure_unit,
                                created_at,
                                updated_at)
                        VALUES (
                                i_name,
                                i_mark_id,
                                i_category_id,
                                i_measure_unit_type_id,
                                i_measure_unit_id,
                                i_measure_unit,
                                now()::timestamp(0) without time zone,
                                now()::timestamp(0) without time zone
                                )
                                RETURNING id INTO v_id; 
                        o_return:= array_to_json(array['El registro fue agregado con éxito', v_id::character varying]);
                ELSE
                        o_return:= array_to_json(array['Disculpe: El registro está repetido']);
                END IF;
        ELSE
                UPDATE public.products SET
                        name                 = i_name,
                        mark_id              = i_mark_id,
                        category_id          = i_category_id,
                        measure_unit_type_id = i_measure_unit_type_id,
                        measure_unit_id      = i_measure_unit_id,
                        user_update_id       = i_user_id,
                        measure_unit         = i_measure_unit,
                        user_edit_id         = i_user_id,
                        editing              = true,
                        updated_at           = now()::timestamp(0) without time zone
                WHERE id=i_id;
                        o_return:= array_to_json(array['El registro fue actualizado con éxito']);
        END IF;
        RETURN o_return;
END;
\$BODY\$
  LANGUAGE plpgsql VOLATILE
  COST 100;
ALTER FUNCTION public.product_register(integer, character varying, integer, integer, integer, integer, character varying, integer)
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
        DB::unprepared(
            "DROP FUNCTION public.product_register(integer, character varying, integer, integer, integer, integer, character varying, integer);"
        );
    }
}
