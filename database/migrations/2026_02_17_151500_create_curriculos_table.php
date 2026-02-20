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
       Schema::create('curriculos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('unidade_curricular_id')->constrained()->onDelete('restrict');
            $table->text('apresentacao');
            $table->text('qualificacao_profissional');
            $table->text('objetivo');
            $table->string('foto_perfil', 255)->nullable();
            $table->string('linkedin', 255)->nullable();
            $table->enum('status', ['ativo', 'inativo', 'pendente']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('curriculos');
    }
};