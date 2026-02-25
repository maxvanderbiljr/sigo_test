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
        Schema::create('curriculo_unidade_curricular', function (Blueprint $table) {
            $table->id();
            $table->foreignId('curriculo_id')
                  ->constrained('curriculos')
                  ->onDelete('cascade');
            $table->foreignId('unidade_curricular_id')
                  ->constrained('unidade_curriculars')
                  ->onDelete('cascade');

            // Garante que o mesmo par não se repita
            $table->unique(['curriculo_id', 'unidade_curricular_id'], 'cu_uc_unique');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('curriculo_unidade_curricular');
    }
};
