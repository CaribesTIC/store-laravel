<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePresentationRemovePl extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //DB::connection('pgsql_product')->unprepared("DROP FUNCTION public.presentation_remove(integer);");
        DB::connection('pgsql_product')->unprepared("
CREATE OR REPLACE FUNCTION public.presentation_remove(i_id integer)
  RETURNS character AS
\$BODY\$
DECLARE
        o_return character;
BEGIN
        o_return:='Z';
        DELETE FROM public.presentations WHERE id=i_id;
        o_return:='B';
        RETURN o_return;
END;
\$BODY\$
  LANGUAGE plpgsql VOLATILE
  COST 100;
ALTER FUNCTION public.presentation_remove(integer)
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
        //DB::connection('pgsql_product')->unprepared("DROP FUNCTION public.presentation_remove(integer);");
    }
}
