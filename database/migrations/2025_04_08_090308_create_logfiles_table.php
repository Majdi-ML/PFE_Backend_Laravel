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
        Schema::create('logfiles', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('ref')->nullable();
            $table->integer('etat_id')->nullable()->index('etat_id');
            $table->string('refComposant')->nullable();
            $table->string('rgSgSiCluster')->nullable();
            $table->string('logfile')->nullable();
            $table->string('localisation')->nullable();
            $table->text('description')->nullable();
            $table->string('formatLogfile')->nullable();
            $table->string('separateur')->nullable();
            $table->string('intervalleDePolling')->nullable();
            $table->integer('monitoredBy_id')->nullable()->index('monitoredby_id');
            $table->string('fourniEnAnnexe')->nullable();
            $table->string('refService')->nullable();
            $table->string('nomTemplate')->nullable();
            $table->text('logConditions')->nullable();
            $table->integer('demande_id')->nullable()->index('demande_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('logfiles');
    }
};
