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
        Schema::create('unidade_curriculars', function (Blueprint $table) {
            $table->id();
            $table->foreignId('unidade_operativa_id')->constrained()->onDelete('cascade');
            $table->string('codigo', 20)->unique();
            $table->string('nome', 300);
            $table->text('descricao')->nullable();
            $table->integer('carga_horaria')->nullable();
            $table->text('competencias')->nullable();
            $table->text('habilidades')->nullable();
            $table->text('atitudes_valores')->nullable();
            $table->text('recursos_necessarios')->nullable();
            $table->text('bibliografia')->nullable();
            $table->boolean('status')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('unidade_curriculars');
    }
};
