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
        Schema::create('process_serveurs', function (Blueprint $table) {
            $table->integer('process_id');
            $table->integer('serveur_id')->index('serveur_id');

            $table->primary(['process_id', 'serveur_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('process_serveurs');
    }
};
