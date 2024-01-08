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
        Schema::create('forma_pagamentos', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('detalhes');
            $table->unsignedBigInteger('taxa_id')->nullable();

            $table->timestamps();
            $table->foreign('taxa_id')->references('id')->on('taxas')->onDelete('cascade');


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_forma_pagamentos');
    }
};
