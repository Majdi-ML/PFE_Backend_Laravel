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
        Schema::table('process', function (Blueprint $table) {
            $table->foreign(['etat_id'], 'process_ibfk_1')->references(['id'])->on('etat')->onUpdate('restrict')->onDelete('restrict');
            $table->foreign(['criticite_id'], 'process_ibfk_2')->references(['id'])->on('criticite')->onUpdate('restrict')->onDelete('restrict');
            $table->foreign(['monitoredBy_id'], 'process_ibfk_3')->references(['id'])->on('monitoredby')->onUpdate('restrict')->onDelete('restrict');
            $table->foreign(['demande_id'], 'process_ibfk_4')->references(['id'])->on('demandes')->onUpdate('restrict')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('process', function (Blueprint $table) {
            $table->dropForeign('process_ibfk_1');
            $table->dropForeign('process_ibfk_2');
            $table->dropForeign('process_ibfk_3');
            $table->dropForeign('process_ibfk_4');
        });
    }
};
