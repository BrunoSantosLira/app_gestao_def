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
        Schema::table('campos_produtos', function (Blueprint $table) {
            $table->decimal('valorTotal', 10, 2);
            $table->integer('quantidade');
            $table->decimal('preco', 8, 2);
            $table->decimal('desconto', 5, 2);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('campos_produtos', function (Blueprint $table) {
            $table->dropColumn('valorTotal');
            $table->dropColumn('quantidade');
            $table->dropColumn('preco');
            $table->dropColumn('desconto');
        });
    
    }
};
