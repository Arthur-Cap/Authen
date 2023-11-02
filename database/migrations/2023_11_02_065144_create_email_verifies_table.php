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
        Schema::create('email_verifies', function (Blueprint $table) {
            $table->id();
            $table->string('userId')->unique();
            $table->string('email')->nullable();
            $table->string('change_email_token')->nullable();
            $table->string('forgot_password_token')->nullable();
            $table->string('temp_password')->default(0)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('email_verifies');
    }
};
