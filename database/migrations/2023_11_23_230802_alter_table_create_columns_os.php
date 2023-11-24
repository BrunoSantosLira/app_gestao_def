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
        Schema::table('os', function (Blueprint $table) {
            $table->date('data_inicial')->nullable();
            $table->date('data_final')->nullable();
            $table->integer('dias_garantia')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('os', function (Blueprint $table) {
            $table->dropColumn('data_inicial');
            $table->dropColumn('data_final');
        });
    }
};
