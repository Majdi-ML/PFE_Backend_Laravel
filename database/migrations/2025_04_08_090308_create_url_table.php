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
        Schema::create('url', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('ref')->nullable();
            $table->integer('etat_id')->nullable()->index('etat_id');
            $table->string('refComposant')->nullable();
            $table->string('rgSgSiCluster')->nullable();
            $table->string('url')->nullable();
            $table->text('performAction')->nullable();
            $table->integer('criticite_id')->nullable()->index('criticite_id');
            $table->text('messageAlarme')->nullable();
            $table->text('instructions')->nullable();
            $table->string('intervalleDePolling')->nullable();
            $table->string('refService')->nullable();
            $table->string('objet')->nullable();
            $table->integer('monitoredBy_id')->nullable()->index('monitoredby_id');
            $table->string('nomTemplate')->nullable();
            $table->integer('demande_id')->nullable()->index('demande_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('url');
    }
};
