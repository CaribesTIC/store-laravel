<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParishesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('pgsql_common')->dropIfExists('parishes');
        Schema::connection('pgsql_common')->create('parishes', function (Blueprint $table) {
            $table->id();
            $table->integer('municipality_id')->unsignedInteger();            
            $table->string('description', 60);
            $table->string('latitud', 20);
            $table->string('longitud', 20);            
            $table->string('egoogle', 30)->nullable();
            $table->string('coordinates', 30)->nullable();
            $table->string('siex_parish', 4);           
            $table->foreign('municipality_id')->references('id')->on('municipalities');
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
    }
}
