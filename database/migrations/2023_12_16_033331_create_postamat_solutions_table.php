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
        Schema::create('postamat_solutions', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->timestamps();

            $table->softDeletes();

            $table->index('defective_id');
            $table->foreignId('defective_id')
                  ->constrained('defective_postamats')
                  ->cascadeOnDelete()
                  ->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('postamat_solutions');
    }
};
