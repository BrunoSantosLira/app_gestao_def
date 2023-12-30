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
        Schema::create('campos_produtos', function (Blueprint $table) {
            $table->id();
            $table->text('detalhes');
            $table->unsignedBigInteger('checklist_id');
            $table->unsignedBigInteger('produto_id');


            $table->timestamps();
            $table->foreign('checklist_id')->references('id')->on('checklist_produtos')->onDelete('cascade');
            $table->foreign('produto_id')->references('id')->on('produtos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('campos_produtos', function (Blueprint $table) {
            $table->dropForeign(['checklist_id']);
            $table->dropForeign(['produto_id']);
        });
    
        Schema::dropIfExists('campos_produtos');
    }
};
