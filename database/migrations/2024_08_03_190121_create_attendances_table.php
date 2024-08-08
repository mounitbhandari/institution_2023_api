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
        Schema::create('attendances', function (Blueprint $table) {
            $table->id();
             //adding student reference
             $table->foreignId('ledger_id')->nullable(false)->references('id')->on('ledgers')->onDelete('cascade');
             //adding course
             $table->foreignId('course_id')->nullable(false)->references('id')->on('courses')->onDelete('cascade');
             $table->string('section',2)->nullable(true);
             //Present or Absent
             $table->tinyInteger('present')->default('1');
 
              // create organisation Foreign Key
              $table->bigInteger('organisation_id')->unsigned()->default(1);
              $table ->foreign('organisation_id')->references('id')->on('organisations');
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
        Schema::dropIfExists('attendances');
    }
};
