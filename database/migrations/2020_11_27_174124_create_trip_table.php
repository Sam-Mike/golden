<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTripTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trip', function (Blueprint $table) {
            $table->id();
            $table->foreignId('client_id')->constrained('client');
            $table->foreignId('cargo_id')->constrained('cargo');
            $table->foreignId('destination_id')->constrained('location');
            $table->foreignId('allocation_id')->constrained('allocation');
            $table->foreignId('trip_status_id')->constrained('status')->nullable();
            $table->date('loading_date')->nullable();
            $table->date('dispatch_date')->nullable();
            $table->date('eta_site')->nullable();
            $table->string('route_code')->nullable();
            $table->string('current_location')->nullable();
            $table->integer('manifest_number')->nullable();
            $table->integer('file_number')->nullable();
            $table->integer('cargo_weight')->nullable();
            $table->foreignId('activity_status_id')->constrained('status');
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
        Schema::dropIfExists('trip');
    }
}
