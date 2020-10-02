<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAllocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('allocations', function (Blueprint $table) {
            $table->id();
            $table->date('loading_date')->nullable();
            $table->date('dispatch_date')->nullable();
            $table->date('eta_site')->nullable();
            $table->string('route_code')->nullable();
            $table->string('trip_status')->nullable();
            $table->string('current_location')->nullable();
            $table->integer('manifest_no')->nullable();
            $table->integer('file_number')->nullable();
            $table->foreignId('company_id')->constrained('company');
            $table->foreignId('client_id')->constrained('clients');
            $table->foreignId('cargo_id')->constrained('cargo');
            $table->integer('cargo_weight')->nullable();
            $table->foreignId('destination_id')->constrained('location');
            $table->foreignId('truck_trailer_people_id')->constrained('truck_trailer_people');
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
        Schema::dropIfExists('allocations');
    }
}
