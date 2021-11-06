<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehicleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicle', function (Blueprint $table) {
            $table->id();
            $table->string('registration_number');
            $table->foreignId('vehicle_make_id')->nullable()->constrained('vehicle_make');
            $table->foreignId('vehicle_type_id')->constrained('vehicle_type');
            $table->integer('year_model')->nullable();
            $table->string('chassis_number')->nullable();
            $table->string('model_configuration')->nullable();
            $table->integer('engine_size')->nullable();
            $table->string('authorized_payload')->nullable();
            $table->float('length', 5, 2)->nullable();
            $table->float('width', 5, 2)->nullable();
            $table->float('height', 5, 2)->nullable();
            $table->foreignId('fuel_type_id')->constrained('fuel_type');
            $table->float('fuel_capacity', 5, 2)->nullable();
            $table->float('fuel_consumption', 5, 2)->nullable();
            $table->foreignId('vehicle_transmission_type_id')->constrained('vehicle_transmission_type');
            $table->foreignId('company_id')->constrained('company');
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
        Schema::dropIfExists('vehicle');
    }
}
