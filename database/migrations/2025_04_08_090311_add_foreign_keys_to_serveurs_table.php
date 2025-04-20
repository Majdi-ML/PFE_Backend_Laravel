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
        Schema::table('serveurs', function (Blueprint $table) {
            $table->foreign(['etat_id'], 'serveurs_ibfk_1')->references(['id'])->on('etat')->onUpdate('restrict')->onDelete('restrict');
            $table->foreign(['platforme_id'], 'serveurs_ibfk_2')->references(['id'])->on('platforme')->onUpdate('restrict')->onDelete('restrict');
            $table->foreign(['type_id'], 'serveurs_ibfk_3')->references(['id'])->on('typeserveur')->onUpdate('restrict')->onDelete('restrict');
            $table->foreign(['os_id'], 'serveurs_ibfk_4')->references(['id'])->on('os')->onUpdate('restrict')->onDelete('restrict');
            $table->foreign(['socleStandardOmu_id'], 'serveurs_ibfk_5')->references(['id'])->on('soclestandardomu')->onUpdate('restrict')->onDelete('restrict');
            $table->foreign(['demande_id'], 'serveurs_ibfk_6')->references(['id'])->on('demandes')->onUpdate('restrict')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('serveurs', function (Blueprint $table) {
            $table->dropForeign('serveurs_ibfk_1');
            $table->dropForeign('serveurs_ibfk_2');
            $table->dropForeign('serveurs_ibfk_3');
            $table->dropForeign('serveurs_ibfk_4');
            $table->dropForeign('serveurs_ibfk_5');
            $table->dropForeign('serveurs_ibfk_6');
        });
    }
};
