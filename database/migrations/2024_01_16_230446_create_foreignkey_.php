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
        Schema::table('servicos', function (Blueprint $table) {
            $table->unsignedBigInteger('categoria_id')->nullable();


            $table->foreign('categoria_id')->references('id')->on('servico_categorias')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('servicos', function (Blueprint $table) {
            // Remover a chave estrangeira
            $table->dropForeign(['categoria_id']);
 
            // Remover a coluna 'forma_id'
            $table->dropColumn('categoria_id');
         });
    }
};
