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
        Schema::table('clientes', function (Blueprint $table) {
           $table->string('logradouro',255);
           $table->integer('logradouroNumero');
           $table->string('complemento',255);
           $table->string('bairro',255);
           $table->string('cidade',255);
           $table->string('UF',2);
           $table->string('CEP',255);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('clientes', function (Blueprint $table) {
            $table->dropColumn('logradouro');
            $table->dropColumn('logradouroNumero');
            $table->dropColumn('complemento');
            $table->dropColumn('bairro');
            $table->dropColumn('cidade');
            $table->dropColumn('UF');
            $table->dropColumn('CEP');
        });
    }
};
