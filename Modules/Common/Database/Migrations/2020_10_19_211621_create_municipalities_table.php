<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMunicipalitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('pgsql_common')->dropIfExists('municipalities');
        Schema::connection('pgsql_common')->create('municipalities', function (Blueprint $table) {
            $table->id();          
            $table->integer('state_id')->unsignedInteger();                        
            $table->string('description', 60);
            $table->string('longitud', 20);
            $table->string('latitud', 20);
            $table->string('egoogle', 30)->nullable();
            $table->string('coordinates', 30)->nullable();
            $table->string('siex_municipality', 4);
            $table->integer('city_id');
            $table->timestamps();
            $table->foreign('state_id')->references('id')->on('states');    
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::connection('pgsql_common')->dropIfExists('municipalities');
    }
}
