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
        Schema::table('produtos', function (Blueprint $table) {
            $table->decimal('valorCompra', 10, 2)->default(0)->after('preco');
            $table->decimal('valorVenda', 10, 2)->default(0)->after('preco');
            $table->string('NCM',10);
            $table->string('codDistribuidor',255);
            $table->string('codPessoal',255);
            // Adicione quantas colunas forem necessárias
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('produtos', function (Blueprint $table) {
            $table->dropColumn('valorCompra');
            $table->dropColumn('valorVenda');
            $table->dropColumn('NCM');
            $table->dropColumn('codDistribuidor');
            $table->dropColumn('codPessoal');
            // Adicione comandos de remoção para as colunas adicionadas no método up
        });
    }
};
