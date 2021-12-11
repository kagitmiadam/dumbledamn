<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSchoolClassTable extends Migration
{
    public function up()
    {
        Schema::create('school_class', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('description');
            $table->integer('school_id')->unsigned()->default(1);
            $table->string('color')->nullable();
            $table->integer('based_count')->default(1000);
            $table->integer('period_cup_win')->default(0);
            $table->string('image')->default('img/none.png');
            $table->string('image_flat')->default('img/none.png');
            $table->integer('status')->default(1);
            $table->timestamps();

            $table->foreign('school_id')->references('id')->on('school')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('school_class');
    }
}
