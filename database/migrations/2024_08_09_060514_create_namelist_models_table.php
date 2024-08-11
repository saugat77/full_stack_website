<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Http\Controllers\NamelistController;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('namelist_models', function (Blueprint $table) {
            $table->id();
            $table->string('fullname');
            $table->string('passport_no');
            $table->string('dob')->nullable();
            $table->string('doe')->nullable();
            $table->string('status')->nullable();
            $table->string('ref')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('namelist_models');
    }
};
