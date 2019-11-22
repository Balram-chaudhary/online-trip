<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNepalyatraHomestayhotelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nepalyatra_homestayhotels', function (Blueprint $table) {
            $table->increments('id');
            $table->string('hname');
            $table->longText('description');
            $table->string('area');
            $table->string('city');
            $table->string('country');
            $table->string('cperson');
            $table->string('phone_mobile');
            $table->string('email');
            $table->integer('rating');
            $table->string('image');
            $table->string('amenitiesnservices');
            $table->enum('type',['s','h']);
            $table->ipAddress('visitor');
            $table->macAddress('device');
            $table->integer('created_by');
            $table->integer('updated_by');
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
        Schema::dropIfExists('nepalyatra_homestayhotels');
    }
}
