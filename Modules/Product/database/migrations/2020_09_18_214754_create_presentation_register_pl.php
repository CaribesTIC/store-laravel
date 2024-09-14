<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePresentationRegisterPl extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
          //DB::connection('pgsql_product')->unprepared("DROP FUNCTION public.presentation_register(integer, integer, jsonb, character varying, character varying, integer, integer, double precision, boolean, boolean, integer);");
             
        DB::connection('pgsql_product')->unprepared("        
CREATE OR REPLACE FUNCTION public.presentation_register(
    i_id integer,
    i_product_id integer,    
    i_packing jsonb,
    i_bar_cod character varying,
    i_int_cod character varying,
    i_stock_min integer,
    i_stock_max integer,
    i_price float,
    i_sale_type boolean,
    i_status boolean,    
    i_user_id integer)
    RETURNS character varying AS
    \$BODY\$
    DECLARE
        v_exist boolean;
        o_return character varying;
    BEGIN
        o_return:='';
        IF i_id=0 THEN
            INSERT INTO public.presentations(
                product_id,                
                packing,
                bar_cod,
                int_cod,                
                stock_min,
                stock_max,
                price,
                sale_type,
                status,              
                user_insert_id,
                user_update_id,
                created_at,
                updated_at
            ) VALUES (
                i_product_id,                
                i_packing,
                i_bar_cod,
                i_int_cod,
                i_stock_min,
                i_stock_max,
                i_price,
                i_sale_type,
                i_status, 
                i_user_id,
                i_user_id,
                now()::timestamp(0) without time zone,
                now()::timestamp(0) without time zone
            );
            o_return:= 'El registro fue agregado con éxito';
        ELSE
            UPDATE public.presentations SET
                product_id=i_product_id,                
                packing=i_packing,
                bar_cod=i_bar_cod,
                int_cod=i_int_cod,
                stock_min=i_stock_min,
                stock_max=i_stock_max,
                price=i_price,
                sale_type=i_sale_type,
                status=i_status,
                user_update_id=i_user_id,
                updated_at=now()::timestamp(0) without time zone
            WHERE id=i_id;
                o_return:= 'El registro fue actualizado con éxito';
            END IF;
            RETURN o_return;
        END;
    \$BODY\$
    LANGUAGE plpgsql VOLATILE 
        COST 100;
    ALTER FUNCTION public.presentation_register(integer, integer, jsonb, character varying, character varying, integer, integer, double precision, boolean, boolean, integer)
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
      //DB::connection('pgsql_product')->unprepared("DROP FUNCTION public.presentation_register(integer, integer, jsonb, character varying, character varying, integer, integer, double precision, boolean, boolean, integer);");
    }
}
