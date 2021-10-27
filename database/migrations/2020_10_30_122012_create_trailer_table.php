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
            $table->string('tl_number')->nullable();
            $table->string('registration_number');
            $table->foreignId('trailer_make_id')->constrained('trailer_make');
            $table->year('year_model')->nullable();
            $table->string('chassis_number')->nullable();
            $table->double('length', 5, 2)->nullable();
            $table->double('width', 5, 2)->nullable();
            $table->double('height', 5, 2)->nullable();
            $table->double('maximum_weight', 5, 2)->nullable();
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
