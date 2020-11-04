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
            $table->string('first_name');
            $table->string('middle_name');
            $table->string('last_name');
            $table->date('dob');
            $table->text('mobile');
            $table->date('start_date');
            $table->foreignId('company_id')->constrained('company');
            $table->foreignId('department_id')->constrained('department');
            $table->Biginteger('license_number');
            $table->string('passport');
            $table->date('license_issue_date');
            $table->foreignId('license_class_id')->constrained('license_class');
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