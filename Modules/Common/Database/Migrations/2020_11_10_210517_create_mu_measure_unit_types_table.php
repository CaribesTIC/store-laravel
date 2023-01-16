<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMuMeasureUnitTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('pgsql_common')->dropIfExists('mu_measure_units');
        Schema::connection('pgsql_common')->dropIfExists('mu_measure_unit_types');
        Schema::connection('pgsql_common')->create('mu_measure_unit_types', function (Blueprint $table) {
            $table->id();
            $table->string('description');
            $table->timestamps();
            $table->unique('description');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::connection('pgsql_common')->dropIfExists('mu_measure_units');
        Schema::connection('pgsql_common')->dropIfExists('mu_measure_unit_types');
    }
}
