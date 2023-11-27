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
        Schema::create('entradas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('produto_id');
            $table->string('tipo', 255);
            $table->integer('quantidade')->default(0);
            $table->timestamps();

            $table->foreign('produto_id')->references('id')->on('produtos')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('entradas');
    }
};
