<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('applications', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('first_name');
            $table->string('middle_name');
            $table->string('last_name');
            $table->string('gender');
            $table->string('phone_number');
            $table->date('birthday');
            $table->string('loan_number')->unique()->nullable();
            $table->integer('loan_amount');
            $table->integer('months_to_pay');
            $table->text('loan_purpose');
            $table->integer('interest_amount');
            $table->integer('minimum_payment');
            $table->integer('full_payment');
            $table->dateTime('first_payment_date')->nullable();
            $table->string('loan_status');
            $table->string('valid_id1');
            $table->string('valid_id2');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applications');
    }
};
