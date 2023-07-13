<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourseFeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_fees', function (Blueprint $table) {
            $table->id();
            $table->foreignId('course_id')->nullable(false)->references('id')->on('courses')->onDelete('cascade');
            $table->integer('fees_year')->default(0);
            $table->integer('fees_month')->default(0);
            $table->double('fees_amount')->default(0);
            $table->enum('inforce', array(0, 1))->default(1);
             // create organisation Foreign Key
             $table->bigInteger('organisation_id')->unsigned()->default(1);
             $table ->foreign('organisation_id')->references('id')->on('organisations');

                 // create unique key
           $table->unique('course_id','fees_year','fees_month','organisation_id');
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
        Schema::dropIfExists('course_fees');
    }
}
