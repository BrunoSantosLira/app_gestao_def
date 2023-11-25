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
        Schema::create('os_produtos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('os_id');
            $table->unsignedBigInteger('produto_id');
            $table->decimal('preco', 10, 2)->default(0);
            $table->integer('quantidade')->default(0);
            $table->timestamps();

            $table->foreign('os_id')->references('id')->on('os')->onDelete('cascade');
            $table->foreign('produto_id')->references('id')->on('produtos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('os_produtos');
    }
};
