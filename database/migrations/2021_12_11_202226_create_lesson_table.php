<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLessonTable extends Migration
{
    public function up()
    {
        Schema::create('lesson', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('description');
            $table->integer('school_grade_id')->unsigned()->default(1);
            $table->integer('location_id')->unsigned()->default(1);
            $table->integer('status')->default(1);
            $table->string('image')->nullable();
            $table->timestamps();

            $table->foreign('school_grade_id')->references('id')->on('school_grade')->onDelete('cascade');
            $table->foreign('location_id')->references('id')->on('location')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('lesson');
    }
}
