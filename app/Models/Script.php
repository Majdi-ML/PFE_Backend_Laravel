<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Script
 * 
 * @property int $id
 * @property string|null $ref
 * @property int|null $etat_id
 * @property string|null $refComposant
 * @property string|null $rgSgSiCluster
 * @property string|null $script
 * @property string|null $codeErreur
 * @property int|null $criticite_id
 * @property string|null $description
 * @property string|null $instructions
 * @property int|null $monitoredBy_id
 * @property string|null $refService
 * @property int|null $demande_id
 * 
 * @property Etat|null $etat
 * @property Criticite|null $criticite
 * @property Monitoredby|null $monitoredby
 * @property Demande|null $demande
 * @property Collection|Serveur[] $serveurs
 *
 * @package App\Models
 */
class Script extends Model
{
	protected $table = 'scripts';
	public $timestamps = false;

	protected $casts = [
		'etat_id' => 'int',
		'criticite_id' => 'int',
		'monitoredBy_id' => 'int',
		'demande_id' => 'int'
	];

	protected $fillable = [
		'ref',
		'etat_id',
		'refComposant',
		'rgSgSiCluster',
		'script',
		'codeErreur',
		'criticite_id',
		'description',
		'instructions',
		'monitoredBy_id',
		'refService',
		'demande_id'
	];

	public function etat()
	{
		return $this->belongsTo(Etat::class);
	}

	public function criticite()
	{
		return $this->belongsTo(Criticite::class);
	}

	public function monitoredby()
	{
		return $this->belongsTo(Monitoredby::class, 'monitoredBy_id');
	}

	public function demande()
	{
		return $this->belongsTo(Demande::class);
	}

	public function serveurs()
	{
		return $this->belongsToMany(Serveur::class, 'scripts_serveurs');
	}
}
