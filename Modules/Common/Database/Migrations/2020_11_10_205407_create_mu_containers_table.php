<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMuContainersTable extends Migration
{
    // protected $connection = 'pgsql_common';
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {   // https://github.com/nWidart/laravel-modules/issues/1520
        Schema::connection('pgsql_common')->dropIfExists('mu_containers');
        Schema::connection('pgsql_common')->create('mu_containers', function (Blueprint $table) {
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
        Schema::connection('pgsql_common')->dropIfExists('mu_containers');
    }
}
