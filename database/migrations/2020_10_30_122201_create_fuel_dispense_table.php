<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFuelDispenseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fuel_dispense', function (Blueprint $table) {
            $table->id();
            $table->foreignId('truck_id')->constrained('truck');
            $table->foreignId('fuel_tank_id')->constrained('fuel_tank');
            $table->decimal('litres', 15, 2);
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
        Schema::dropIfExists('fuel_dispense');
    }
}
