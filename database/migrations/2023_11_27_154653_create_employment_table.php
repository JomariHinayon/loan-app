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
        Schema::create('employment', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('employment_type');
            $table->string('work_nature');
            $table->string('company_name');
            $table->string('company_phone');
            $table->string('months_working');
            $table->string('salary_day');
            $table->string('monthly_income');
            $table->unsignedBigInteger('application_id')->nullable();
            $table->foreign('application_id')->references('id')->on('applications')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employment');
    }
};
