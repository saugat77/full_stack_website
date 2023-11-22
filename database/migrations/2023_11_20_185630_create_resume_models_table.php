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
        Schema::create('resume_models', function (Blueprint $table) {
            $table->id();
            $table->text('pp_size_image')->nullable();
            $table->string('full_name')->nullable();
            $table->string('father_name')->nullable();
            $table->string('ward')->nullable();
            $table->string('district')->nullable();
            $table->string('dob')->nullable();
            $table->string('passport_number')->nullable();
            $table->string('issued_at')->nullable();
            $table->string('expiry_date')->nullable();
            $table->string('worked_as')->nullable();
            $table->string('years_of_experience')->nullable();
            $table->string('worked_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('resume_models');
    }
};
