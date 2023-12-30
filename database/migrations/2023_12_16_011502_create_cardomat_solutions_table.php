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
        Schema::create('cardomat_solutions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('theme_id');
            $table->foreign('theme_id')->references('id')->on('cardomat_themes')->onDelete('cascade');
            $table->string('title', 50);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cardomat_solutions');
    }
};
