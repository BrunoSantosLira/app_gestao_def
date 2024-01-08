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
        Schema::table('forma_pagamentos', function (Blueprint $table) {
            $table->integer('qtd_parcelas')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('forma_pagamentos', function (Blueprint $table) {
            $table->dropColumn('qtd_parcelas');
        });
    }
};
