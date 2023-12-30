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
        Schema::table('checklist_produtos', function (Blueprint $table) {
            $table->decimal('valorTotal', 10, 2)->default(0);
            $table->string('status')->default('pendente');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('checklist_produtos', function (Blueprint $table) {
            $table->dropColumn('valorTotal');
            $table->dropColumn('status');
        });
    }
};
