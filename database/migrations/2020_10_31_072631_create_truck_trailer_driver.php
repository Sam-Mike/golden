<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTruckTrailerDriver extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('truck_trailer_driver', function (Blueprint $table) {
            $table->id();
            $table->foreignId('truck_id')->constrained('truck');
            $table->foreignId('trailer_id')->constrained('trailer');
            $table->foreignId('driver_id')->constrained('people');
            $table->string('status')->nullable();
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
        Schema::dropIfExists('truck_trailer_driver');
    }
}
