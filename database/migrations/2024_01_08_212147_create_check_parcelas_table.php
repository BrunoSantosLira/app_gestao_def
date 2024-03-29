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
        Schema::create('check_parcelas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('checklist_id');
            $table->decimal('valor', 10, 2);
            $table->date('data_vencimento');
            $table->string('status_pagamento');
            // Adicione outros campos conforme necessário
            $table->timestamps();
            $table->foreign('checklist_id')->references('id')->on('checklist_produtos')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('check_parcelas');
    }
};
