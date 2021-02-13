<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSportEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sport_events', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->date('start_date');
            $table->integer('duration_in_days');
            $table->unsignedBigInteger('sport_id');
            $table->unsignedBigInteger('organizer_id');
            $table->timestamps();

            $table->foreign('sport_id')->references('id')->on('sports');
            $table->foreign('organizer_id')->references('id')->on('organizers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sport_events');
    }
}
