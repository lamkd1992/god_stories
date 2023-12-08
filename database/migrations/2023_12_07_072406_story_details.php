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
        Schema::create('story_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('story_id')->cascadeOnDelete();
            $table->integer('chapters');
            $table->string('title');
            $table->text('content');
            $table->string('translator');
            $table->timestamps();

            $table->index('chapters');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('story_details');
    }
};
