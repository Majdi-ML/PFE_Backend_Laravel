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
        Schema::create('url_serveurs', function (Blueprint $table) {
            $table->integer('url_id');
            $table->integer('serveur_id')->index('serveur_id');

            $table->primary(['url_id', 'serveur_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('url_serveurs');
    }
};
