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
        Schema::create('trapssnmp', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('ref')->nullable();
            $table->integer('etat_id')->nullable()->index('etat_id');
            $table->string('refComposant')->nullable();
            $table->text('signification')->nullable();
            $table->integer('versionSnmp_id')->nullable()->index('versionsnmp_id');
            $table->string('oid')->nullable();
            $table->string('specificTrap')->nullable();
            $table->text('variableBinding')->nullable();
            $table->integer('criticite_id')->nullable()->index('criticite_id');
            $table->text('messageAlarme')->nullable();
            $table->text('instructions')->nullable();
            $table->string('acquittement')->nullable();
            $table->string('mibAssocie')->nullable();
            $table->string('objet')->nullable();
            $table->text('compelementInformation')->nullable();
            $table->integer('demande_id')->nullable()->index('demande_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trapssnmp');
    }
};
