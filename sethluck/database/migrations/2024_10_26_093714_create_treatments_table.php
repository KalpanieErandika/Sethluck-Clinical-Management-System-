<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTreatmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('treatments', function (Blueprint $table) {
            $table->increments('treatmentid');
            $table->unsignedInteger('patientid');
            $table->timestamp('treatmentdate')->nullable(false);
            $table->tinyInteger('treatmenttype')->nullable(false);
            $table->text('description')->nullable(false);
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
        Schema::dropIfExists('treatments');
    }
}
