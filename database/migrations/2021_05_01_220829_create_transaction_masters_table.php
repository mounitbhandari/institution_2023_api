<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionMastersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaction_masters', function (Blueprint $table) {
            $table->id();
            $table->string('transaction_number',20)->unique()->nullable(false);

            //Voucher Type
            $table->foreignId('voucher_type_id')->nullable(false)->references('id')->on('voucher_types')->onDelete('cascade');


            //StudentCourseRegistration reference
            $table->foreignId('student_course_registration_id')->nullable(true)->references('id')->on('student_course_registrations')->onDelete('cascade');

            //transaction_master_reference
            $table->foreignId('reference_transaction_master_id')->nullable(true)->references('id')->on('transaction_masters')->onDelete('cascade');


            $table->date('transaction_date')->nullable(false);
            $table->string('comment',255)->nullable(true);

            //user id
            $table->foreignId('user_id')->nullable(true)->references('id')->on('users')->onDelete('cascade');

            $table->integer('fees_year')->default(0);
            $table->integer('fees_month')->default(0);
            

             // create organisation Foreign Key
             $table->bigInteger('organisation_id')->unsigned()->default(1);
             $table ->foreign('organisation_id')->references('id')->on('organisations');
             
            $table->tinyInteger('inforce')->default('1');

            $table->tinyInteger('is_course_fees')->default('0');

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
        Schema::dropIfExists('transaction_masters');
    }
}
