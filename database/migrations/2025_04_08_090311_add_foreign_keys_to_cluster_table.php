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
        Schema::table('cluster', function (Blueprint $table) {
            $table->foreign(['etat_id'], 'cluster_ibfk_1')->references(['id'])->on('etat')->onUpdate('restrict')->onDelete('restrict');
            $table->foreign(['demande_id'], 'cluster_ibfk_2')->references(['id'])->on('demandes')->onUpdate('restrict')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('cluster', function (Blueprint $table) {
            $table->dropForeign('cluster_ibfk_1');
            $table->dropForeign('cluster_ibfk_2');
        });
    }
};
