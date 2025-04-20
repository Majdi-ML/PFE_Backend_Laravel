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
        Schema::create('cluster_serveurs', function (Blueprint $table) {
            $table->integer('cluster_id');
            $table->integer('serveur_id')->index('serveur_id');

            $table->primary(['cluster_id', 'serveur_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cluster_serveurs');
    }
};
