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
        Schema::create('demandes', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('status_id')->nullable()->index('status_id');
            $table->integer('user_id')->nullable()->index('user_id');
            $table->integer('serviceplatfom_id')->nullable()->index('serviceplatfom_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('demandes');
    }
};
