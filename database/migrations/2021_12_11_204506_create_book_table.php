<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookTable extends Migration
{
    public function up()
    {
        Schema::create('book', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('description');
            $table->integer('price');
            $table->float('discount')->default(0);
            $table->integer('lesson_id')->unsigned()->default(1);
            $table->integer('based_count')->default(100);
            $table->integer('status')->default(1);
            $table->string('image')->nullable();
            $table->timestamps();

            $table->foreign('lesson_id')->references('id')->on('lesson')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('book');
    }
}
