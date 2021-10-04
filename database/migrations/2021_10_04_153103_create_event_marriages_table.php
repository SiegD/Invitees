<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventMarriagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_marriages', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('event_id');
            $table->string('groom');
            $table->string('bride');
            $table->string('groom_father');
            $table->string('groom_mother');
            $table->string('bride_father');
            $table->string('bride_mother');
            $table->dateTime('ceremonial_date_time');
            $table->unsignedBigInteger('ceremonial_location_id');
            $table->timestamps();

            $table->foreign('event_id')->references('id')->on('events');
            $table->foreign('ceremonial_location_id')->references('id')->on('locations');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('event_marriages');
    }
}
