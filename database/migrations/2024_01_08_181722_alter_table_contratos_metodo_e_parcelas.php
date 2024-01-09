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
        Schema::table('contratos', function (Blueprint $table) {
            $table->dropColumn('metodo_de_pagemento');
            $table->dropColumn('quantidade_parcelas');
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('contratos', function (Blueprint $table) {
            $table->addColumn('metodo_de_pagemento', 'string');
            $table->addColumn('quantidade_parcelas', 'integer');
        });
    }
};
