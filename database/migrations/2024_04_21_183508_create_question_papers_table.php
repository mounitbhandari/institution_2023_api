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
        Schema::create('question_papers', function (Blueprint $table) {
            $table->id();
            $table->string('question_description',1000)->nullable(true);
            $table->string('file_url',1000)->nullable(true);
            $table->tinyInteger('inforce')->default('1');

             //adding course
             $table->bigInteger('course_id')->unsigned()->nullable(true);
             $table ->foreign('course_id')->references('id')->on('courses');

             //adding subject
             $table->bigInteger('subject_id')->unsigned()->nullable(true);
             $table ->foreign('subject_id')->references('id')->on('subjects');

             $table->string('uploaded_by',200)->nullable(true);

              //user id
            $table->foreignId('user_id')->nullable(true)->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('question_papers');
    }
};
