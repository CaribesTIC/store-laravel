<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePresentationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('pgsql_product')->dropIfExists('presentations');
        Schema::connection('pgsql_product')->create('presentations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('company_id')->default(1);
            $table->integer('product_id')->nullable()->unsigned();//unsignedInteger //(Laravel 7.x) ->nullable()->constrained();                        
            $table->jsonb('packing');            
            $table->string('bar_cod', 15);
            //$table->string('int_cod', 15);            
            $table->float('price')->default(100);
            //$table->integer('stock_min')->default(5);
            //$table->integer('stock_max')->default(5);
            //$table->boolean('sale_type')->default(true);        
            $table->boolean('status')->default(true);
            $table->string('photo_path')->default('');                                
            $table->integer('user_insert_id')->default(1);
            $table->integer('user_update_id')->default(1);           
            $table->timestamps();
            $table->foreign('product_id')->references('id')->on('products');
            $table->unique(['company_id', 'product_id', 'packing']);
            //$table->unique(['company_id', 'int_cod']);
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
        Schema::connection('pgsql_product')->dropIfExists('presentations');
    }
}
