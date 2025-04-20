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
        Schema::create('serveurs', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('ref')->nullable();
            $table->integer('etat_id')->nullable()->index('etat_id');
            $table->integer('platforme_id')->nullable()->index('platforme_id');
            $table->string('hostname')->nullable();
            $table->string('fqdn')->nullable();
            $table->integer('type_id')->nullable()->index('type_id');
            $table->string('modele')->nullable();
            $table->integer('os_id')->nullable()->index('os_id');
            $table->integer('verTechFirmware_id')->nullable();
            $table->string('cluster')->nullable();
            $table->string('ipSource')->nullable();
            $table->text('description')->nullable();
            $table->integer('socleStandardOmu_id')->nullable()->index('soclestandardomu_id');
            $table->text('complementsInformations')->nullable();
            $table->integer('demande_id')->nullable()->index('demande_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('serveurs');
    }
};
