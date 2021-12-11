<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Carbon\Carbon;

class CreateCharacterSpellTable extends Migration
{
    public function up()
    {
        Schema::create('character_spell', function (Blueprint $table) {
            $currentDate = Carbon::now()->format('d-m-Y');
            $table->increments('id');
            $table->integer('character_id')->unsigned();
            $table->integer('spell_id')->unsigned();
            $table->integer('predisposition')->default(0);
            $table->integer('status')->nullable()->default(1);
            $table->string('learn_date')->default($currentDate);
            $table->integer('level_id')->unsigned()->default(1);
            $table->integer('experience_points')->default(0);
            $table->timestamps();

            $table->foreign('character_id')->references('id')->on('character')->onDelete('cascade');
            $table->foreign('level_id')->references('id')->on('spell_level')->onDelete('cascade');
            $table->foreign('spell_id')->references('id')->on('spell')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('character_spell');
    }
}
