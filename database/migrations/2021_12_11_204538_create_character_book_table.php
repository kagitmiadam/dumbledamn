<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCharacterBookTable extends Migration
{
    public function up()
    {
        Schema::create('character_book', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('character_id')->unsigned()->default(1);
            $table->integer('book_id')->unsigned()->default(1);
            $table->integer('status')->nullable();
            $table->timestamps();

            $table->foreign('character_id')->references('id')->on('character')->onDelete('cascade');
            $table->foreign('book_id')->references('id')->on('book')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('character_book');
    }
}
