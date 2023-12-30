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
        Schema::create('cardomat_requests', function (Blueprint $table) {
            $table->id();
            $table->integer('status')->default(0);
            $table->unsignedBigInteger('cardomat_id');
            $table->unsignedBigInteger('theme_id');
            $table->unsignedBigInteger('solution_id')->nullable();
            $table->timestamps();
            $table->foreign('cardomat_id')->references('id')->on('cards');
            $table->foreign('theme_id')->references('id')->on('cardomat_themes');
            $table->foreign('solution_id')->references('id')->on('cardomat_solutions')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cardomat_requests');
    }
};
