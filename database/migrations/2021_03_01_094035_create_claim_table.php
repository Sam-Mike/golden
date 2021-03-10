<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClaimTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('claim', function (Blueprint $table) {
            $table->id();
            $table->foreignId('claim_type_id')->constrained('claim_type');
            $table->string('claim_subject');
            $table->string('claim_document')->nullable();
            $table->enum('claim_document_status', ['empty', 'filled']);
            $table->string('incident_assessor_name')->nullable();
            $table->string('incident_assessor_company')->nullable();
            $table->date('incident_assess_date')->nullable();
            $table->text('incident_assess_comment')->nullable();
            $table->text('incident_assess_document')->nullable();
            $table->enum('assess_status', ['empty', 'filled']);
            $table->string('discharge_voucher')->nullable();
            $table->text('discharge_voucher_comment')->nullable();
            $table->enum('discharge_voucher_status', ['empty', 'filled']);
            $table->string('payment_document')->nullable();
            $table->text('payment_comment')->nullable();
            $table->enum('payment_status', ['empty', 'filled']);
            $table->enum('claim_status', ['declined', 'completed']);
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
        Schema::dropIfExists('claim');
    }
}