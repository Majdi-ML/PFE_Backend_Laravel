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
        Schema::create('cluster', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('ref')->nullable();
            $table->integer('etat_id')->nullable()->index('etat_id');
            $table->string('nomDuRessourceGroupPackageServiceGuard')->nullable();
            $table->string('adresseIp')->nullable();
            $table->text('listeDesServeursConcernes')->nullable();
            $table->string('logicielCluster')->nullable();
            $table->string('version')->nullable();
            $table->string('mode')->nullable();
            $table->string('serveurActif')->nullable();
            $table->text('complementsInformations')->nullable();
            $table->integer('demande_id')->nullable()->index('demande_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cluster');
    }
};
