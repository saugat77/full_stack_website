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
            $table->string('full_name');
            $table->string('father_name');
            $table->string('ward');
            $table->string('district');
            $table->string('dob');
            $table->string('passport_number');
            $table->string('issued_at');
            $table->string('expiry_date');
            $table->string('worked_as');
            $table->string('years_of_experience');
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
