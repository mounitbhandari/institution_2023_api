<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLedgersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ledgers', function (Blueprint $table) {
            $table->id();
            $table->string('episode_id', 20)->nullable(false)->unique();
            //$table->string('ledger_name')->unique()->nullable(false);
            $table->string('ledger_name')->nullable(false);
            $table->string('billing_name')->nullable(false);
            $table->foreignId('ledger_group_id')->nullable(false)->references('id')->on('ledger_groups')->onDelete('cascade');
            //for students
            $table->string('is_student')->default(0);
            $table->string('father_name')->nullable(true);
            $table->string('mother_name')->nullable(true);
            $table->string('guardian_name')->nullable(true);
            $table->string('relation_to_guardian')->nullable(true);
            $table->date('dob')->nullable(true);
            $table->enum('sex', array('M', 'F', 'O'))->default('O');
            $table->string('address')->nullable(true);
            $table->string('city',50)->nullable(true);
            $table->string('district',50)->nullable(true);
            $table->unsignedBigInteger('state_id');
            $table ->foreign('state_id')->references('id')->on('states')->onDelete('cascade');
            $table->string('pin',8)->nullable(true);
            $table->string('guardian_contact_number',15)->nullable(true);
            $table->string('whatsapp_number',15)->nullable(true);
            $table->string('email_id',255)->nullable(true);
            $table->string('qualification',50)->nullable(true);
            $table->date('entry_date')->nullable(true);

            //for Bank only
            $table->String('branch', 100)->nullable(true);
            $table->String('account_number', 30)->nullable(true);
            $table->String('ifsc', 20)->nullable(true);

            //for opening balance
            $table->foreignId('transaction_type_id')->default(1)->references('id')->on('transaction_types')->onDelete('cascade');
            $table->decimal('opening_balance')->default(0);

              //user id
            $table->foreignId('user_id')->nullable(true)->references('id')->on('users')->onDelete('cascade');

             // create organisation Foreign Key
             $table->bigInteger('organisation_id')->unsigned()->default(1);
             $table ->foreign('organisation_id')->references('id')->on('organisations');
             
              // create unique key
            $table->unique('ledger_name','organisation_id');
            $table->tinyInteger('inforce')->default('1');
            // For Teacher
            $table->string('is_teacher')->default(0);
             //Subject id
             $table->foreignId('subject_id')->nullable(true)->references('id')->on('subjects')->onDelete('cascade');
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
        Schema::dropIfExists('ledgers');
    }
}
