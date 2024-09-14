<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticleDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('article_details', function (Blueprint $table) {
            $table->id();
            $table->integer('article_id');//bigInteger
            $table->integer('presentation_id');
            $table->integer('quantity')->default(1);            
            $table->integer('status')->default(1);                                  
            $table->integer('user_insert_id')->default(1);
            $table->integer('user_update_id')->default(1);
            $table->unique(['article_id', 'presentation_id']);
            $table->foreign('article_id')
                ->references('id')
                ->on('articles')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->softDeletes();
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
        Schema::dropIfExists('article_details');
    }
}
