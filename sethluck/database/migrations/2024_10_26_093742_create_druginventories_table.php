<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDruginventoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('druginventories', function (Blueprint $table) {
            $table->increments('drugid');
            $table->string('drugname', 50)->nullaable(false);
            $table->smallInteger('quantity')->nullable(false);
            $table->decimal('unitprice', 6, 2)->nullable(false);
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
        Schema::dropIfExists('druginventories');
    }
}
