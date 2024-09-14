<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('pgsql_common')->dropIfExists('cities');
        Schema::connection('pgsql_common')->create('cities', function (Blueprint $table) {
            $table->id();
            $table->string('description', 100);   
            $table->integer('state_id')->unsignedInteger();     
            $table->boolean('status')->default(true);
            $table->boolean('borr')->default(false);
            $table->string('cod_city', 2);
            $table->foreign('state_id')->references('id')->on('states');
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
        Schema::connection('pgsql_common')->dropIfExists('cities');
    }
}
