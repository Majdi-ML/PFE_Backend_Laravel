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
            $table->unsignedBigInteger('verTechFirmware_id')->nullable()->change(); // déjà existante si tu l'avais dans le modèle
            $table->foreign('verTechFirmware_id')
                  ->references('id')
                  ->on('ver_tech_firmware')
                  ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('serveurs', function (Blueprint $table) {
            $table->dropForeign(['verTechFirmware_id']);
        });
    }
};
