<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRouteTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('pgsql_common')->dropIfExists('route_types');
        Schema::connection('pgsql_common')->create('route_types', function (Blueprint $table) {
            $table->id();
            $table->string('description', 50)->unique();               
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
        Schema::connection('pgsql_common')->dropIfExists('route_types');
    }
}
