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
        Schema::create('posterminal_solutions', function (Blueprint $table) {
            $table->id();
            // $table->unsignedBigInteger('theme_id');
            $table->string('title', 50);
            $table->index('theme_id');
            $table->foreignId('theme_id')
                  ->constrained('posterminal_themes')
                  ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posterminal_solutions');
    }
};
