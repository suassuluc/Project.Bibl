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
        Schema::create('acervo', function (Blueprint $table) {
            $table->id();
            $table->string('nome_autor');
            $table->string('titulo');
            $table->string('Local_publicacao')->default(null);
            $table->string('editora');
            $table->integer('ano');
            $table->integer('numero_pag');
            $table->integer('volume');
            $table->integer('ISBN');
            $table->integer('ISSN');
            $table->integer('numero_reg');
            $table->integer('numero_cart');
            $table->foreignId('assunto')->nullable()->constrained('constante');
            $table->foreignId('idioma')->nullable()->constrained('constante');
            $table->string('tipo');
            $table->string('aquisicao');
            $table->string('destino')->nullable();
            $table->integer('CDD');
            $table->integer('CDU');
            $table->integer('exemplares');
            $table->string('arquivos')->nullable();
            $table->string('resenha', 500)->nullable();
            $table->foreignId('localizacao_id')->nullable()->constrained('localizacao')->nullOnDelete();
            $table->string('observacao', 500)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('acervo');
    }
};
