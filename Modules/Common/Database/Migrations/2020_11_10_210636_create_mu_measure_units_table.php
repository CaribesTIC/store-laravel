<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMuMeasureUnitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mu_measure_units', function (Blueprint $table) {
            $table->id();
            $table->integer('mu_measure_unit_types_id')->unsignedInteger();
            $table->string('description');
            $table->string('abbreviate');
            $table->string('comment');
            $table->timestamps();
            $table->foreign('mu_measure_unit_types_id')->references('id')->on('mu_measure_unit_types');
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
        Schema::dropIfExists('mu_measure_units');
    }
}
