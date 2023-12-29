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
        Schema::create('postamat_requests', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('status')->default(0);

            $table->index('postamat_id');
            $table->index('theme_id');
            $table->index('solution_id');
            $table->foreignId('postamat_id')->constrained('postamats');
            $table->foreignId('theme_id')->constrained('postamat_themes');
            $table->foreignId('solution_id')->nullable()->constrained('postamat_solutions');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('postamat_requests');
    }
};
