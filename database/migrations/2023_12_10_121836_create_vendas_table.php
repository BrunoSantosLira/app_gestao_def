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
        Schema::create('vendas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('os_id')->nullable();
            $table->unsignedBigInteger('contrato_id')->nullable();
            $table->decimal('valor', 10, 2);
            $table->string('tipo',255);
            // Adicione outras colunas conforme necessário
            $table->timestamps();
    
            $table->foreign('os_id')->references('id')->on('os');
            $table->foreign('contrato_id')->references('id')->on('contratos');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vendas');
    }
};
