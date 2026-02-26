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
        Schema::create('unidade_operativas', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 200);
            $table->string('sigla', 20);
            $table->string('cnpj', 20);
            $table->string('endereco', 300);
            $table->string('cidade', 100);
            $table->string('estado', 100);
            $table->string('cep', 9);
            $table->string('telefone', 20);
            $table->string('email', 200);
            $table->string('responsavel', 200);
            $table->boolean('status')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('unidade_operativas');
    }
};
