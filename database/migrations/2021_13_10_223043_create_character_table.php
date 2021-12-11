<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCharacterTable extends Migration
{
    public function up()
    {
        Schema::create('character', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->unique();
            $table->longText('description')->nullable();
            $table->integer('galleon')->default(250);
            $table->integer('sickle')->default(0);
            $table->integer('knut')->default(0);
            $table->integer('gender_id')->unsigned();
            $table->integer('school_id')->unsigned();
            $table->integer('school_class_id')->unsigned();
            
            $table->integer('preffered_core')->unsigned()->nullable();
            $table->integer('wand_id')->unsigned()->nullable();
            
            $table->string('status')->default("Asa Seçim");
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('gender_id')->references('id')->on('gender')->onDelete('cascade');
            $table->foreign('school_id')->references('id')->on('school')->onDelete('cascade');
            $table->foreign('school_class_id')->references('id')->on('school_class')->onDelete('cascade');

            $table->foreign('wand_id')->references('id')->on('item')->onDelete('cascade');
            $table->foreign('preffered_core')->references('id')->on('core')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('character');
    }
}
