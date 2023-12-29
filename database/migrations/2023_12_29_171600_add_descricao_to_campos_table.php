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
            $table->text('detalhes')->nullable()->after('nome'); // Substitua 'coluna_existente' pelo nome de uma coluna existente à qual você deseja adicionar a nova coluna.

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('campos', function (Blueprint $table) {
            $table->dropColumn('detalhes');
        });
    }
};
