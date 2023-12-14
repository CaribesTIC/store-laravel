<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('pgsql_product')->dropIfExists('products');
        Schema::connection('pgsql_product')->create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('company_id')->default(1);
            $table->string('name',50);            
            $table->integer('category_id')->nullable()->unsigned();//unsignedInteger //(Laravel 7.x) ->nullable()->constrained();            
            $table->integer('mark_id')->nullable()->unsigned();//unsignedInteger //(Laravel 7.x) ->nullable()->constrained();
            $table->integer('measure_unit_type_id');
            $table->integer('measure_unit_id');
            $table->string('measure_unit', 30);
            //$table->string('photo')->default('');   
            $table->integer('user_insert_id')->default(1);
            $table->integer('user_update_id')->default(1);
            $table->integer('user_edit_id')->default(1);
            $table->boolean('editing')->default(true);
            $table->timestamps();
            $table->foreign('category_id')->references('id')->on('categories');
            $table->foreign('mark_id')->references('id')->on('marks');
            $table->unique(['company_id', 'name']);
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::connection('pgsql_product')->dropIfExists('products');
    }
}

