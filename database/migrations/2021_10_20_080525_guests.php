<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Guests extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guests', function (Blueprint $table) {
            $table->Id();
            $table->unsignedBigInteger('event_id');
            $table->string('name');
            $table->string('table_name');
            $table->integer('total_guest');
            $table->string('email');
            $table->string('phone_number');
            $table->boolean('confirmation');
            $table->string('qrcode');
            $table->timestamps();

            $table->foreign('event_id')->references('id')->on('events');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
