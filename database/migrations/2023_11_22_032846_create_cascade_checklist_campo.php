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
        Schema::table('campos', function (Blueprint $table) {
            // Remover a chave estrangeira se existir
            $table->dropForeign(['checklist_id']);

            // Adicionar a nova chave estrangeira
            $table->foreign('checklist_id')
                ->references('id')
                ->on('checklists')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('campos', function (Blueprint $table) {
            // Para reverter a migração, podemos simplesmente remover a restrição da chave estrangeira
            $table->dropForeign(['checklist_id']);
        });
    }
};
