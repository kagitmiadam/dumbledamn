<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCharacterLessonTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('character_lesson', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('lesson_id')->unsigned()->default(1);
            $table->integer('character_id')->unsigned()->default(1);
            $table->string('note_status')->nullable();
            $table->string('note_status_short')->nullable();
            $table->integer('status')->default(1);
            $table->timestamps();

            $table->foreign('lesson_id')->references('id')->on('lesson')->onDelete('cascade');
            $table->foreign('character_id')->references('id')->on('character')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('character_lesson');
    }
}
