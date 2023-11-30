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
        Schema::create('contratos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cliente_id');

            $table->string('nome', 255);
            $table->string('responsável', 255);
            $table->longText('corpo');
            $table->date('data_inicio')->nullable();
            $table->date('data_fim')->nullable();
            $table->string('metodo_de_pagemento', 255);
            $table->integer('quantidade_parcelas')->default(0);


            $table->decimal('valorTotal', 10, 2)->default(0);
            $table->timestamps();

            $table->foreign('cliente_id')->references('id')->on('clientes')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contratos');
    }
};
