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
            // Adiciona a coluna 'descricao'
            $table->longText('detalhes')->nullable();

            // Adiciona a coluna 'codigo_barras'
            $table->bigInteger('codigo_de_barras');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('produtos', function (Blueprint $table) {
            // Remove a coluna 'descricao' se existir
            $table->dropColumn('descricao');

            // Remove a coluna 'codigo_barras' se existir
            $table->dropColumn('codigo_barras');
        });
    }
};
