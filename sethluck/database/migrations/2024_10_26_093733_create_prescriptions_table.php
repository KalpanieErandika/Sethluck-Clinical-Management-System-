<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrescriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prescriptions', function (Blueprint $table) {
            $table->increments('prescriptionid');
            $table->unsignedInteger('patientid');
            $table->timestamp('prescriptiondate')->nullable(false);
            $table->decimal('prescriptionvalue', 6, 2)->nullable(false);
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
        Schema::dropIfExists('prescriptions');
    }
}
