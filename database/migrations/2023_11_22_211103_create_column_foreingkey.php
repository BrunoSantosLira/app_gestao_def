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
            // Remover a chave estrangeira se existir
            if (Schema::hasColumn('produtos', 'categoria_id')) {
                Schema::table('produtos', function (Blueprint $table) {
                    $table->dropForeign(['categoria_id']);
                });
            }
            // Adicionar a nova chave estrangeira
            $table->unsignedBigInteger('categoria_id');
            $table->foreign('categoria_id')
                ->references('id')
                ->on('categorias')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {

    }
};
