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
            $table->string('claim_object');
            $table->string('claim_object_owner');
            $table->string('claim_document')->nullable();
            $table->string('incident_assess_agent')->nullable();
            $table->string('incident_assess_company')->nullable();
            $table->date('incident_assess_date')->nullable();
            $table->text('incident_assess_comment')->nullable();
            $table->text('incident_assess_document')->nullable();
            $table->date('discharge_voucher_date')->nullable();
            $table->string('discharge_voucher_document')->nullable();
            $table->text('discharge_voucher_comment')->nullable();
            $table->date('payment_date')->nullable();
            $table->string('payment_document')->nullable();
            $table->text('payment_comment')->nullable();
            $table->enum('claim_status', ['intimated', 'has_claim_document', 'assessed', 'has_discharge_voucher','paid', 'declined']);
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
