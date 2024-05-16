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
        Schema::create('onlineclasses', function (Blueprint $table) {
            $table->id();
             //adding course
             $table->bigInteger('course_id')->unsigned()->nullable(true);
             $table ->foreign('course_id')->references('id')->on('courses');

             //adding subject
             $table->bigInteger('subject_id')->unsigned()->nullable(true);
             $table ->foreign('subject_id')->references('id')->on('subjects');
             
             $table->string('online_class_url',1000)->nullable(true);
             $table->tinyInteger('inforce')->default('1');
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
        Schema::dropIfExists('onlineclasses');
    }
};
