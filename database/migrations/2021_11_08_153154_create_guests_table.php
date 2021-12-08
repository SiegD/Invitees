<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGuestsTable extends Migration
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
            $table->string('slug')->unique();
            $table->string('table_name');
            $table->integer('total_guest');
            $table->string('email');
            $table->string('phone_number');
            $table->boolean('RSVP')->default(0);
            $table->boolean('confirmation')->default(0);
            $table->timestamps();

            $table->foreign('event_id')->references('id')->on('events')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('guests');
    }
}
