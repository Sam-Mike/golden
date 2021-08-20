<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeopleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('people', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('employee_number');
            $table->string('first_name');
            $table->string('middle_name');
            $table->string('last_name');
            $table->date('dob');
            $table->string('mobile');
            $table->string('profile_picture')->nullable();
            $table->date('start_date');
            $table->foreignId('company_id')->constrained('company');
            $table->foreignId('department_role_id')->constrained('department_role');
            $table->Biginteger('nida_number')->nullable();
            $table->Biginteger('ss_number')->nullable();
            $table->Biginteger('tin_number')->nullable();
            $table->Biginteger('license_number')->nullable();
            $table->text('license_classes')->nullable();
            $table->date('license_issue_date')->nullable();
            $table->date('license_expiry_date')->nullable();
            $table->string('passport_number')->nullable();
            $table->date('passport_issue_date')->nullable();
            $table->date('passport_expiry_date')->nullable();
            $table->string('next_kin_name')->nullable();
            $table->string('next_kin_mobile')->nullable();
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
        Schema::dropIfExists('people');
    }
}
