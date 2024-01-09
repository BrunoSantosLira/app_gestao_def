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
            $table->unsignedBigInteger('forma_id')->nullable();
            $table->foreign('forma_id')->references('id')->on('forma_pagamentos')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('contratos', function (Blueprint $table) {
           // Remover a chave estrangeira
           $table->dropForeign(['forma_id']);

           // Remover a coluna 'forma_id'
           $table->dropColumn('forma_id');
        });
    }
};
