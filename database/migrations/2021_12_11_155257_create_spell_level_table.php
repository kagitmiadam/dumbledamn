<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSpellLevelTable extends Migration
{
    public function up()
    {
        Schema::create('spell_level', function (Blueprint $table) {
            $table->increments('id');
            $table->string('level');
            $table->string('name');
            $table->integer('requirement_experience');
            $table->integer('status')->default(1);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('spell_level');
    }
}
