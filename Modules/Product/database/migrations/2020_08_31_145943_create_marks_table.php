<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMarksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('pgsql_product')->dropIfExists('presentations');
        Schema::connection('pgsql_product')->dropIfExists('products');
        Schema::connection('pgsql_product')->dropIfExists('marks');
        Schema::connection('pgsql_product')->create('marks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('company_id')->default(1);
            $table->string('name', 50);
            $table->unique(['company_id', 'name']);
            $table->integer('producer_id')->default(1);
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
        Schema::connection('pgsql_product')->dropIfExists('presentations');
        Schema::connection('pgsql_product')->dropIfExists('products');
        Schema::connection('pgsql_product')->dropIfExists('marks');        
    }
}
