<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInternalusersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('internalusers', function (Blueprint $table) {
            $table->string('username', 30)->primary()->nullable(false);
            $table->string('password', 255)->nullable(false);
            $table->string('fname', 30)->nullable(false);
            $table->string('lname', 30)->nullable(false);
            $table->unsignedTinyInteger('usertype')->nullable(false);
            $table->timestamps();
            $table->foreign('usertype')->references('usertype')->on('usertypes');
        });

        DB::table('internalusers')->insert([
            ['username' => 'admin', 'password' => Hash::make('admin'), 'fname' => 'Administrator', 'lname' => 'User', 'usertype' => '1', 'created_at' => now(), 'updated_at' => now()]
        ]);
    }



    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('internalusers');
    }
}
