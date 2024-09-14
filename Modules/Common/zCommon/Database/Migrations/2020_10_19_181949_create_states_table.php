<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('pgsql_common')->dropIfExists('parishes');
        Schema::connection('pgsql_common')->dropIfExists('municipalities');
        Schema::connection('pgsql_common')->dropIfExists('cities');
        Schema::connection('pgsql_common')->dropIfExists('states');
        Schema::connection('pgsql_common')->create('states', function (Blueprint $table) {            
            $table->id();
            $table->string('description', 60)->unique();
            $table->string('latitud', 20);
            $table->string('longitud', 20);
            $table->string('egoogle', 30);            
            $table->string('coordinates', 30);
            $table->string('colindante', 50);
            $table->string('siex_estado', 4);
            $table->integer('geo_country_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::connection('pgsql_common')->dropIfExists('parishes');
        Schema::connection('pgsql_common')->dropIfExists('municipalities');
        Schema::connection('pgsql_common')->dropIfExists('cities');
        Schema::connection('pgsql_common')->dropIfExists('states');
    }
}
