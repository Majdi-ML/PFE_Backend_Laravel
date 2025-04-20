<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VerTechFirmware extends Model
{
    protected $table = 'ver_tech_firmware'; // si tu veux que le nom corresponde à ta migration

    public $timestamps = false; // car ta table n'a pas de timestamps

    protected $fillable = ['nom'];

    /**
     * Relation avec les serveurs (un firmware peut être lié à plusieurs serveurs).
     */
    public function serveurs(): HasMany
    {
        return $this->hasMany(Serveur::class, 'verTechFirmware_id');
    }
}
