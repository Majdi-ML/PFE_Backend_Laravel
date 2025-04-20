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
        Schema::table('logfiles', function (Blueprint $table) {
            $table->foreign(['etat_id'], 'logfiles_ibfk_1')->references(['id'])->on('etat')->onUpdate('restrict')->onDelete('restrict');
            $table->foreign(['monitoredBy_id'], 'logfiles_ibfk_2')->references(['id'])->on('monitoredby')->onUpdate('restrict')->onDelete('restrict');
            $table->foreign(['demande_id'], 'logfiles_ibfk_3')->references(['id'])->on('demandes')->onUpdate('restrict')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('logfiles', function (Blueprint $table) {
            $table->dropForeign('logfiles_ibfk_1');
            $table->dropForeign('logfiles_ibfk_2');
            $table->dropForeign('logfiles_ibfk_3');
        });
    }
};
