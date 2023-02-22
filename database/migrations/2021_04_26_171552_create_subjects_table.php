<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subjects', function (Blueprint $table) {
            $table->id();
            $table->string('subject_code', 20)->nullable(false)->unique();
            $table->string('subject_short_name', 50)->nullable(false);
            $table->string('subject_full_name', 50)->nullable(false);
            $table->integer('subject_duration')->default(0);

            $table->bigInteger('duration_type_id')->unsigned()->default(1);
            $table->foreign('duration_type_id')->references('id')->on('duration_types')->onDelete('cascade');

            $table->string('subject_description', 255)->nullable(true);

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
        Schema::dropIfExists('subjects');
    }
}
