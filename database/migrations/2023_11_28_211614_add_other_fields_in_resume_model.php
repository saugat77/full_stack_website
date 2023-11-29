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
        Schema::table('resume_models', function (Blueprint $table) {
            $table->string('marital_status')->nullable();
            $table->string('weight')->nullable();
            $table->string('height')->nullable();
            $table->string('gender')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('resume_models', function (Blueprint $table) {
            $table->dropColumn('marital_status');
            $table->dropColumn('weight');
            $table->dropColumn('height');
            $table->dropColumn('gender');
        });
    }
};
