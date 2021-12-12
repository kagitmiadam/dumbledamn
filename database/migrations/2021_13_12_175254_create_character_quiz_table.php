<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCharacterQuizTable extends Migration
{
    public function up()
    {
        Schema::create('character_quiz', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('character_id')->unsigned()->default(1);
            $table->integer('lesson_id')->unsigned()->default(1);
            $table->integer('period_id')->unsigned()->default(1);
            $table->integer('point')->default(0);
            $table->integer('status')->nullable();
            $table->timestamps();

            $table->foreign('character_id')->references('id')->on('character')->onDelete('cascade');
            $table->foreign('lesson_id')->references('id')->on('lesson')->onDelete('cascade');
            $table->foreign('period_id')->references('id')->on('period_cup')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('character_quiz');
    }
}
