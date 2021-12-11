<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeriodCupTable extends Migration
{
    public function up()
    {
        Schema::create('period_cup', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('description');
            $table->string('year');
            $table->integer('period');
            $table->integer('reward');
            $table->integer('school_id')->unsigned()->default(1);
            $table->integer('class_id_1')->unsigned()->default(1);
            $table->integer('point_1')->default(0);
            $table->integer('class_id_2')->unsigned()->default(1);
            $table->integer('point_2')->default(0);
            $table->integer('class_id_3')->unsigned()->default(1);
            $table->integer('point_3')->default(0);
            $table->integer('class_id_4')->unsigned()->default(1);
            $table->integer('point_4')->default(0);
            $table->dateTime('start_date')->nullable();
            $table->dateTime('end_date')->nullable();
            $table->integer('status')->default(1);
            $table->timestamps();

            $table->foreign('school_id')->references('id')->on('school')->onDelete('cascade');
            $table->foreign('class_id_1')->references('id')->on('school_class')->onDelete('cascade');
            $table->foreign('class_id_2')->references('id')->on('school_class')->onDelete('cascade');
            $table->foreign('class_id_3')->references('id')->on('school_class')->onDelete('cascade');
            $table->foreign('class_id_4')->references('id')->on('school_class')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('period_cup');
    }
}
