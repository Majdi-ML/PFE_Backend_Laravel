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
        Schema::create('logfilespatterns', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('nRef')->nullable();
            $table->string('ref')->nullable();
            $table->integer('etat_id')->nullable()->index('etat_id');
            $table->text('signification')->nullable();
            $table->string('identification')->nullable();
            $table->integer('criticite_id')->nullable()->index('criticite_id');
            $table->text('messageAlarme')->nullable();
            $table->text('instructions')->nullable();
            $table->text('performAction')->nullable();
            $table->string('acquittement')->nullable();
            $table->text('complementsInformations')->nullable();
            $table->string('refService')->nullable();
            $table->string('objet')->nullable();
            $table->integer('logfile_id')->nullable()->index('logfile_id');
            $table->integer('demande_id')->nullable()->index('demande_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('logfilespatterns');
    }
};
