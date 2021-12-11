<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoreTable extends Migration
{
    public function up()
    {
        Schema::create('core', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('description');
            $table->string('core_description');
            $table->string('short_name');
            $table->string('core_name');
            $table->integer('attack_power')->nullable();
            $table->integer('defence_power')->nullable();
            $table->integer('speed_power')->nullable();
            $table->integer('price');
            $table->integer('discount')->default(0);
            $table->string('type');
            $table->integer('status')->default(1);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('core');
    }
}
