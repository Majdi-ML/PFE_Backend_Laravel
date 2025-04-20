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
        Schema::table('process_serveurs', function (Blueprint $table) {
            $table->foreign(['process_id'], 'process_serveurs_ibfk_1')->references(['id'])->on('process')->onUpdate('restrict')->onDelete('restrict');
            $table->foreign(['serveur_id'], 'process_serveurs_ibfk_2')->references(['id'])->on('serveurs')->onUpdate('restrict')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('process_serveurs', function (Blueprint $table) {
            $table->dropForeign('process_serveurs_ibfk_1');
            $table->dropForeign('process_serveurs_ibfk_2');
        });
    }
};
