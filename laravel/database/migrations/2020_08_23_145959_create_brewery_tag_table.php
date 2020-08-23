<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBreweryTagTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('brewery_tag', function (Blueprint $table) {
            $table->bigIncrements('id');
             //==========ここから追加==========
             $table->bigInteger('brewery_id');
             $table->foreign('brewery_id')
                 ->references('id')
                 ->on('breweries')
                 ->onDelete('cascade');
             $table->bigInteger('tag_id');
             $table->foreign('tag_id')
                 ->references('id')
                 ->on('tags')
                 ->onDelete('cascade');
             //==========ここまで追加==========
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
        Schema::dropIfExists('brewery_tag');
    }
}