<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNepalyatraRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nepalyatra_rooms', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('hotel_id')->unsigned();
            $table->foreign('hotel_id')->references('id')->on('nepalyatra_homestayhotels');
            $table->enum('rtype',['s','d','t','qd','q','k','tw','dd','st']);
            $table->integer('rnumber');
            $table->integer('nrooms');
            $table->integer('nadults');
            $table->integer('nchildrens');
            $table->datetime('checkin');
            $table->datetime('checkount');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nepalyatra_rooms');
    }
}
