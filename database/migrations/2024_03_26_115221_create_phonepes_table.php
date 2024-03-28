<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('phonepes', function (Blueprint $table) {
            $table->id();
            $table->string('code',1000)->nullable(true);
            $table->string('merchantId',1000)->nullable(true);
            $table->string('merchantTransactionId',1000)->nullable(true);
            $table->string('transactionId',1000)->nullable(true);
            $table->double('amount')->default(0);
            $table->string('cardType',1000)->nullable(true);
            $table->string('pgTransactionId',1000)->nullable(true);
            $table->string('arn',1000)->nullable(true);
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
        Schema::dropIfExists('phonepes');
    }
};
