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
        Schema::create('conta_entradas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('conta_id');
            $table->string('tipo', 255);
            $table->decimal('capital', 10, 2)->default(0);
            $table->text('detalhes')->nullable;
            $table->timestamps();

            $table->foreign('conta_id')->references('id')->on('contas')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('conta_entradas');
    }
};
