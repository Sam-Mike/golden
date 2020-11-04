<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAllocationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('allocation', function (Blueprint $table) {
            $table->id();
            $table->foreignId('client_id')->constrained('client');
            $table->foreignId('cargo_id')->constrained('cargo');
            $table->foreignId('destination_id')->constrained('location');
            $table->foreignId('truck_trailer_driver_id')->constrained('truck_trailer_driver');
            $table->date('loading_date')->nullable();
            $table->date('dispatch_date')->nullable();
            $table->date('eta_site')->nullable();
            $table->string('route_code')->nullable();
            $table->string('trip_status')->nullable();
            $table->string('current_location')->nullable();
            $table->integer('manifest_number')->nullable();
            $table->integer('file_number')->nullable();
            $table->integer('cargo_weight')->nullable();
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
        Schema::dropIfExists('allocation');
    }
}
