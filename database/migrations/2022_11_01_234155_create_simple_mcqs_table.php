<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSimpleMcqsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('simple_mcqs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('question_type_id')->references('id')->on('question_types')->onDelete('cascade');
            $table->foreignId('question_level_id')->references('id')->on('question_levels')->onDelete('cascade');
            $table->foreignId('chapter_id')->references('id')->on('chapters')->onDelete('cascade');
            $table->string('question')->nullable(false)->unique();
            // $table->string('answer1', 50)->nullable(false)->unique();
            // $table->string('answer2', 50)->nullable(false)->unique();
            // $table->string('answer3', 50)->nullable(false)->unique();
            // $table->string('answer4', 50)->nullable(false)->unique();

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
        Schema::dropIfExists('simple_mcqs');
    }
}
