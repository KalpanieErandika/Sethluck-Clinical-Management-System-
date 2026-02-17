<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->increments('patientid');
            $table->string('username', 12)->unique()->nullable();
            $table->string('password', 12)->nullable();
            $table->string('fname', 20);
            $table->string('lname', 20);
            $table->string('street', 50);
            $table->string('area', 50)->nullable();
            $table->string('province', 30);
            $table->string('postalcode', 5);
            $table->timestamp('dob');
            $table->string('nicnumber', 12);
            $table->string('phonenumber', 10);
            $table->unsignedTinyInteger('gender');
            $table->string('emailaddress', 100)->unique()->nullable();
            $table->text('summary')->nullable();
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
        Schema::dropIfExists('patients');
    }
}
