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
        Schema::table('trapssnmp_serveurs', function (Blueprint $table) {
            $table->foreign(['trapsnmp_id'], 'trapssnmp_serveurs_ibfk_1')->references(['id'])->on('trapssnmp')->onUpdate('restrict')->onDelete('restrict');
            $table->foreign(['serveur_id'], 'trapssnmp_serveurs_ibfk_2')->references(['id'])->on('serveurs')->onUpdate('restrict')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('trapssnmp_serveurs', function (Blueprint $table) {
            $table->dropForeign('trapssnmp_serveurs_ibfk_1');
            $table->dropForeign('trapssnmp_serveurs_ibfk_2');
        });
    }
};
