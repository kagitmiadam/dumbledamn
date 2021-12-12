<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCharacterInventoryTable extends Migration
{
    public function up()
    {
        Schema::create('character_inventory', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('character_id')->unsigned();
            $table->integer('item_id')->unsigned();
            $table->integer('count')->nullable();
            $table->integer('wear_status')->default(0);
            $table->integer('status')->default(1);
            $table->timestamps();

            $table->foreign('character_id')->references('id')->on('character')->onDelete('cascade');
            $table->foreign('item_id')->references('id')->on('item')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('character_inventory');
    }
}
