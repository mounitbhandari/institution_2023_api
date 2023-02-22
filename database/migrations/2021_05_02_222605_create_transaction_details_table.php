<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaction_details', function (Blueprint $table) {
            $table->id();

            //transaction master reference
            $table->foreignId('transaction_master_id')->references('id')->on('transaction_masters')->onDelete('cascade');

            //ledger reference
            $table->foreignId('ledger_id')->references('id')->on('ledgers')->onDelete('cascade');

            //transaction types
            $table->foreignId('transaction_type_id')->references('id')->on('transaction_types')->onDelete('cascade');

            $table->double('amount')->default(0);

            $table->tinyInteger('inforce')->default('1');
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
        Schema::dropIfExists('transaction_details');
    }
}
