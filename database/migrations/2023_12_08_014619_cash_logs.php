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
        Schema::create('cash_logs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->cascadeOnDelete();
            $table->foreignId('coupon_id')->nullable()->cascadeOnDelete();
            $table->bigInteger('amount');
            $table->dateTime('cash_time');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cash_logs');
    }
};
