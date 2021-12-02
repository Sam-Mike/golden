<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExpenseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expense', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->foreignId('expense_subcategory_id')->constrained('expense_subcategory');
            $table->double('amount_tzs', 10, 2);
            $table->double('amount_usd', 10, 2);
            $table->foreignId('currency_id')->constrained('currency');
            $table->double('exchange_rate', 10, 2);
            $table->text('description');
            $table->foreignId('vehicle_id')->nullable()->constrained('vehicle');
            $table->foreignId('person_id')->nullable()->constrained('people');
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
        Schema::dropIfExists('expense');
    }
}
