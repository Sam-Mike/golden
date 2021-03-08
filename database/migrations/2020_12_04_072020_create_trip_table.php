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
            $table->foreignId('activity_status_id')->constrained('status');
            $table->foreignId('trip_class_id')->nullable()->constrained('trip_class');
            $table->date('dispatch_date')->nullable();
            $table->foreignId('dispatcher_id')->nullable()->constrained('people');
            $table->date('eta_site')->nullable();
            $table->string('route_code')->nullable();
            $table->string('current_location')->nullable();
            $table->integer('manifest_number')->nullable();
            $table->date('manifest_date')->nullable();
            $table->string('manifest_document')->nullable();
            $table->integer('file_number')->nullable();
            $table->integer('cargo_order_number')->nullable();
            $table->integer('cargo_weight')->nullable();
            $table->integer('cargo_quantity')->nullable();
            $table->integer('seal_number')->nullable();
            $table->integer('container_number')->nullable();
            $table->date('loading_date')->nullable();
            $table->foreignId('loading_location_id')->nullable()->constrained('location');
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
