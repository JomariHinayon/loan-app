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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('loan_id')->nullable();
            $table->foreign('loan_id')->references('id')->on('loan')->onDelete('cascade');
            $table->integer('amount_paid');
            $table->integer('month_paid');
            $table->string('phone_number');
            $table->string('payment_method');
            $table->string('pay_date');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
