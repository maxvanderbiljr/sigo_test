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
         Schema::create('cursos', function (Blueprint $table) {
            $table->id(); // Cria um BIGINT UNSIGNED AUTO_INCREMENT

            // Tipo de string para o nome do curso
            $table->string('nome');
            // Tipo de número inteiro para carga horária
            $table->integer('carga_horaria');

            // Chaves Estrangeiras (Relacionamentos)
            $table->foreignId('segmento_id')->constrained('segmentos');
            $table->foreignId('eixo_id')->constrained('eixos');
            $table->foreignId('modalidade_id')->constrained('modalidades');
            // $table->foreignId('unidade_curricular_id')->constrained('unidade_curriculars');
            $table->foreignId('tipo_acao_id')->constrained('tipo_acaos');
            
            // Tipos de Texto Longo
            $table->longText('descricao')->nullable();
            $table->text('requisitos')->nullable();
            $table->text('objetivo')->nullable();
            
            // Status e Timestamps
            $table->tinyInteger('ativo')->default(1);
            $table->timestamps(); // Cria created_at e updated_at
            $table->softDeletes(); // Cria deleted_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cursos');
    }
};
