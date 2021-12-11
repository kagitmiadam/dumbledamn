<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSpellTable extends Migration
{
    public function up()
    {
        Schema::create('spell', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('description');
            $table->longText('how_to_learn')->nullable();
            $table->integer('required_school_grade_id')->unsigned()->default(1);
            $table->integer('attack_power')->nullable();
            $table->integer('defence_power')->nullable();
            $table->integer('spell_type_id')->unsigned()->default(1);
            $table->integer('status')->default(1);
            $table->timestamps();

            $table->foreign('required_school_grade_id')->references('id')->on('school_grade')->onDelete('cascade');
            $table->foreign('spell_type_id')->references('id')->on('spell_type')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('spell');
    }
}
