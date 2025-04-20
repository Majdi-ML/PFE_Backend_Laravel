<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Process
 * 
 * @property int $id
 * @property string|null $ref
 * @property int|null $etat_id
 * @property string|null $refComposant
 * @property string|null $process
 * @property int|null $criticite_id
 * @property string|null $messageAlarme
 * @property string|null $intervalleDePolling
 * @property string|null $objet
 * @property string|null $nomTemplate
 * @property int|null $monitoredBy_id
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
class Process extends Model
{
	protected $table = 'process';
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
		'process',
		'criticite_id',
		'messageAlarme',
		'intervalleDePolling',
		'objet',
		'nomTemplate',
		'monitoredBy_id',
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
		return $this->belongsToMany(Serveur::class, 'process_serveurs');
	}
}
