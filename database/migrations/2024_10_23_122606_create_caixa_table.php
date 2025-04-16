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
        Schema::create('caixa', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('localizacao_id')->references('id')->on('localizacao')->onDelete('cascade');
            $table->string('nome',length:100);
            $table->string('resumo',length:500);
            $table->boolean('status')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('caixa');
    }
};
