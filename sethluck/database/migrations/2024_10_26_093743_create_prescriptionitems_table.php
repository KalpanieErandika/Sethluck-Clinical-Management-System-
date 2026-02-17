<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrescriptionitemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prescriptionitems', function (Blueprint $table) {
            $table->string('prescriptionitemid', 8)->primary();
            $table->unsignedInteger('prescriptionid');
            $table->unsignedInteger('drugid');
            $table->unsignedTinyInteger('dosagefrequency')->nullable(false);
            $table->unsignedTinyInteger('noofdays')->nullable(false);
            $table->decimal('unitprice', 6, 2)->nullable(false);
            $table->timestamps();
            $table->foreign('prescriptionid')->references('prescriptionid')->on('prescriptions');
            $table->foreign('drugid')->references('drugid')->on('druginventories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('prescriptionitems');
    }
}
