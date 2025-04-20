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
        Schema::table('demandes', function (Blueprint $table) {
            $table->foreign(['status_id'], 'demandes_ibfk_1')->references(['id'])->on('status')->onUpdate('restrict')->onDelete('restrict');
            $table->foreign(['user_id'], 'demandes_ibfk_2')->references(['id'])->on('user')->onUpdate('restrict')->onDelete('restrict');
            $table->foreign(['serviceplatfom_id'], 'demandes_ibfk_3')->references(['id'])->on('serviceplatfom')->onUpdate('restrict')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('demandes', function (Blueprint $table) {
            $table->dropForeign('demandes_ibfk_1');
            $table->dropForeign('demandes_ibfk_2');
            $table->dropForeign('demandes_ibfk_3');
        });
    }
};
