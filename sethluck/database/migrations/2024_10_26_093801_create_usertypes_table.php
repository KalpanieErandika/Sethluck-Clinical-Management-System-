<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsertypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usertypes', function (Blueprint $table) {
            $table->unsignedTinyInteger('usertype')->primary()->nullable(false);
            $table->string('usertypename', 30)->nullable(false);
            $table->timestamps();
        });

        DB::table('usertypes')->insert([
            ['usertype' => '1', 'usertypename' => 'admin', 'created_at' => now(), 'updated_at' => now()],
            ['usertype' => '2', 'usertypename' => 'doctor', 'created_at' => now(), 'updated_at' => now()],
            ['usertype' => '3', 'usertypename' => 'nurse', 'created_at' => now(), 'updated_at' => now() ],
            ['usertype' => '4', 'usertypename' => 'pharmacist', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usertypes');
    }
}
