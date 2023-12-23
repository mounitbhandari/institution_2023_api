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
        Schema::create('marksheets', function (Blueprint $table) {
            $table->id();
             //adding student reference
             $table->foreignId('ledger_id')->nullable(false)->references('id')->on('ledgers')->onDelete('cascade');
             //adding course
             $table->foreignId('course_id')->nullable(false)->references('id')->on('courses')->onDelete('cascade');
             //adding Subject
             $table->foreignId('subject_id')->nullable(false)->references('id')->on('subjects')->onDelete('cascade');
             //total Marks
            $table->double('total_marks', 15, 2)->default(0);
              //total Marks
            $table->double('obtain_marks', 15, 2)->default(0);
            //adding Exam
            $table->foreignId('exam_id')->nullable(false)->references('id')->on('exams')->onDelete('cascade');

            //adding Exam Category
            $table->foreignId('exam_categories_id')->nullable(false)->references('id')->on('exam_categories')->onDelete('cascade');
            
            //adding Exam Category
            $table->foreignId('session_id')->nullable(false)->references('id')->on('sessions')->onDelete('cascade');
              
            $table->enum('inforce', array(0, 1))->default(1);

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
        Schema::dropIfExists('marksheets');
    }
};
