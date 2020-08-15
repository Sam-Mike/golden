<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFuelDespositTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fuel_desposit', function (Blueprint $table) {
            $table->id();
            $table->foreignId('fuel_supplier_id')->constrained('fuel_supplier');
            $table->foreignId('fuel_tank_id')->constrained('fuel_tank');
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
        Schema::dropIfExists('fuel_desposit');
    }
}
