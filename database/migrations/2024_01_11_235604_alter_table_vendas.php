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
        Schema::table('vendas', function (Blueprint $table) {
            // Remover as chaves estrangeiras existentes
            $table->dropForeign(['os_id']);
            $table->dropForeign(['contrato_id']);
    
            // Adicionar as chaves estrangeiras com um nome exclusivo
            $table->foreign('os_id', 'fk_vendas_os_id')->references('id')->on('os')->onDelete('cascade');
            $table->foreign('contrato_id', 'fk_vendas_contrato_id')->references('id')->on('contratos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('vendas', function (Blueprint $table) {
            // Remover as chaves estrangeiras criadas no método up
            $table->dropForeign('fk_vendas_os_id');
            $table->dropForeign('fk_vendas_contrato_id');
    
            // Adicionar as chaves estrangeiras de volta com o nome original
            $table->foreign('os_id')->references('id')->on('os')->onDelete('cascade');
            $table->foreign('contrato_id')->references('id')->on('contratos')->onDelete('cascade');
        });
    }
};
