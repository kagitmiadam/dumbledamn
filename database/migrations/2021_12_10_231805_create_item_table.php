<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemTable extends Migration
{
    public function up()
    {
        Schema::create('item', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('short_name');
            $table->string('description');
            $table->string('type')->default('Normal');
            $table->string('relevance')->default('Başlangıç');
            $table->integer('wood_id')->unsigned()->nullable();
            $table->integer('core_id')->unsigned()->nullable();
            $table->integer('attack_power')->nullable();
            $table->integer('defence_power')->nullable();
            $table->integer('speed_power')->nullable();
            $table->integer('price');
            $table->float('discount')->default(0);
            $table->string('image')->default();
            $table->integer('based_count')->default(1000);
            $table->integer('status')->default(1);
            $table->timestamps();

            $table->foreign('wood_id')->references('id')->on('wood')->onDelete('cascade');
            $table->foreign('core_id')->references('id')->on('core')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('item');
    }
}
