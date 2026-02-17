<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactnumbersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contactnumbers', function (Blueprint $table) {
            $table->unsignedInteger('patientid');
            $table->string('phonenumber')->nullable(false);
            $table->timestamps();
            $table->foreign('patientid')->references('patientid')->on('patients');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contactnumbers');
    }
}
