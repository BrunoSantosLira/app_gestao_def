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
        Schema::table('impostos', function (Blueprint $table) {
            $table->unsignedBigInteger('produto_id')->nullable();
            $table->foreign('produto_id')->references('id')->on('produtos')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('impostos', function (Blueprint $table) {
            // Remover a chave estrangeira
            $table->dropForeign(['produto_id']);
 
            // Remover a coluna 'forma_id'
            $table->dropColumn('produto_id');
         });
    }
};
