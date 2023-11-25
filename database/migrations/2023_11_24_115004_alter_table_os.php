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
        Schema::table('os', function (Blueprint $table) {
            // Remover a coluna servico_id
            if (Schema::hasColumn('os', 'servico_id')) {
                $table->dropForeign(['servico_id']);
                $table->dropColumn('servico_id');
            }

            // Remover a coluna produto_id
            if (Schema::hasColumn('os', 'produto_id')) {
                $table->dropForeign(['produto_id']);
                $table->dropColumn('produto_id');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
