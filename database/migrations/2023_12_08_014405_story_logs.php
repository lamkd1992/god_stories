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
        Schema::create('story_logs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('story_id')->cascadeOnDelete();
            $table->foreignId('story_detail_id')->cascadeOnDelete();
            $table->tinyInteger('is_purchased')->default(0)->comment('0: unpaid\n1: paid');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('story_logs');
    }
};
