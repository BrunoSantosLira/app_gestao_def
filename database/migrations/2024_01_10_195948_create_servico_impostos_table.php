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
        Schema::create('servico_impostos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('servico_id')->nullable();
            $table->string('nome',255);
            $table->decimal('aliquota', 10, 2);
            
            $table->timestamps();
            $table->foreign('servico_id')->references('id')->on('servicos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('servico_impostos');
    }
};
