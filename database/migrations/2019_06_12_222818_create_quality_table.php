<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQualityTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quality', function (Blueprint $table) {
            $table->increments('id');
            $table->string('description');
            $table->string('item');
            $table->unsignedInteger('articles_id'); 
            $table->foreign('articles_id')->references('id')->on('articles');            
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
        Schema::dropIfExists('quality');
    }
}
