<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoiceitemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoiceitems', function (Blueprint $table) {
            $table->unsignedInteger('invoicenumber');
            $table->string('description')->nullable(false);
            $table->decimal('unitprice', 6, 2)->nullable(false);
            $table->unsignedTinyInteger('numberofunits')->nullable(false);
            $table->timestamps();
            $table->foreign('invoicenumber')->references('invoicenumber')->on('invoices');            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('invoiceitems');
    }
}
