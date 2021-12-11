<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLocationTable extends Migration
{
    public function up()
    {
        Schema::create('location', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('description');
            $table->integer('location_type_id')->unsigned()->default(1);
            $table->string('permit')->default('Herkese Açık');
            $table->integer('password_strength')->nullable()->default(0);
            $table->string('password')->nullable()->default();
            $table->string('short_link')->nullable();
            $table->string('sub_location_status')->nullable();
            $table->string('location_affiliation')->nullable();
            $table->string('house_affiliation')->nullable();
            $table->string('image')->default('img/none.png');
            $table->string('icon')->default();
            $table->string('role_play_status')->default('Aktif');
            $table->integer('status')->default(1);
            $table->timestamps();

            $table->foreign('location_type_id')->references('id')->on('location_type')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('location');
    }
}
