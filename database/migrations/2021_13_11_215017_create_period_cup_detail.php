<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeriodCupDetail extends Migration
{
    public function up()
    {
        Schema::create('period_cup_detail', function (Blueprint $table) {
            $table->increments('id');
            $table->string('description')->default('');
            $table->integer('character_id')->unsigned()->default(1);
            $table->integer('school_id')->unsigned()->default(1);
            $table->integer('class_id')->unsigned()->default(1);
            $table->integer('period_id')->unsigned()->default(1);
            $table->integer('point')->default(0);
            $table->string('privacy')->default('Genel');
            $table->integer('status')->default(1);
            $table->timestamps();

            $table->foreign('character_id')->references('id')->on('character')->onDelete('cascade');
            $table->foreign('school_id')->references('id')->on('school')->onDelete('cascade');
            $table->foreign('class_id')->references('id')->on('school_class')->onDelete('cascade');
            $table->foreign('period_id')->references('id')->on('period_cup')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('period_cup_detail');
    }
}
