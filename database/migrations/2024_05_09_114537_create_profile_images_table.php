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
        Schema::create('profile_images', function (Blueprint $table) {
            $table->id();
            //adding student reference
            $table->foreignId('ledger_id')->nullable(false)->references('id')->on('ledgers')->onDelete('cascade');
             // create organisation Foreign Key
             $table->bigInteger('organisation_id')->unsigned()->default(1);
             $table ->foreign('organisation_id')->references('id')->on('organisations');
             $table->string('image_url',1000)->nullable(true);
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
        Schema::dropIfExists('profile_images');
    }
};
