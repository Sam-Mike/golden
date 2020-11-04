<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSparePartTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('spare_part', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->decimal('value', 15, 2);
            $table->integer('stock');
            $table->integer('purchases');
            $table->decimal('purchase_value', 15, 2);
            $table->integer('issued');
            $table->decimal('issued_value', 15, 2);
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
        Schema::dropIfExists('spare_part');
    }
}
