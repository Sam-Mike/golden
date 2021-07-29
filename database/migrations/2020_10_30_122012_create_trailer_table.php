<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrailerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trailer', function (Blueprint $table) {
            $table->id();
            $table->integer('tl_number');
            $table->string('registration_number');
            $table->foreignId('trailer_make_id')->constrained('trailer_make');
            $table->integer('year_model')->nullable();
            $table->string('chassis_number')->nullable();
            $table->float('length', 5, 2)->nullable();
            $table->float('width', 5, 2)->nullable();
            $table->float('height', 5, 2)->nullable();
            $table->integer('maximum_weight')->nullable();
            $table->integer('maximum_pallet')->nullable();
            $table->foreignId('trailer_type_id')->constrained('trailer_type');
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
        Schema::dropIfExists('trailer');
    }
}
