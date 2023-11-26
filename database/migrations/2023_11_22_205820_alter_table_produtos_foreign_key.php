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

        if (Schema::hasColumn('produtos', 'categoria_id')) {
            Schema::table('produtos', function (Blueprint $table) {
                $table->dropColumn('categoria_id');
            });
        }

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {

    }
};
