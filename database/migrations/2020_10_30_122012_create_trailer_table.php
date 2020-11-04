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
            $table->foreignId('trailer_type_id')->constrained('trailer_type');
            $table->foreignId('company_id')->constrained('company');
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
