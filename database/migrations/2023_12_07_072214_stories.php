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
        Schema::create('stories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->tinyInteger('type')->default(0)->comment('0: organic\n1: paid');
            $table->string('avatar')->nullable();
            $table->string('description');
            $table->decimal('point', 2, 1)->default(0);
            $table->integer('votes')->default(0);
            $table->string('author');
            $table->tinyInteger('status')->default(0)->comment('0: inprogress\n1: done');
            $table->string('source')->nullable()->comment('Source get the story');
            $table->timestamps();
            $table->softDeletes();

            $table->index(['author', 'name', 'status']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stories');
    }
};
