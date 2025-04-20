<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Logfile
 * 
 * @property int $id
 * @property string|null $ref
 * @property int|null $etat_id
 * @property string|null $refComposant
 * @property string|null $rgSgSiCluster
 * @property string|null $logfile
 * @property string|null $localisation
 * @property string|null $description
 * @property string|null $formatLogfile
 * @property string|null $separateur
 * @property string|null $intervalleDePolling
 * @property int|null $monitoredBy_id
 * @property string|null $fourniEnAnnexe
 * @property string|null $refService
 * @property string|null $nomTemplate
 * @property string|null $logConditions
 * @property int|null $demande_id
 * 
 * @property Etat|null $etat
 * @property Monitoredby|null $monitoredby
 * @property Demande|null $demande
 * @property Collection|Serveur[] $serveurs
 * @property Collection|Logfilespattern[] $logfilespatterns
 *
 * @package App\Models
 */
class Logfile extends Model
{
	protected $table = 'logfiles';
	public $timestamps = false;

	protected $casts = [
		'etat_id' => 'int',
		'monitoredBy_id' => 'int',
		'demande_id' => 'int'
	];

	protected $fillable = [
		'ref',
		'etat_id',
		'refComposant',
		'rgSgSiCluster',
		'logfile',
		'localisation',
		'description',
		'formatLogfile',
		'separateur',
		'intervalleDePolling',
		'monitoredBy_id',
		'fourniEnAnnexe',
		'refService',
		'nomTemplate',
		'logConditions',
		'demande_id'
	];

	public function etat()
	{
		return $this->belongsTo(Etat::class);
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
		return $this->belongsToMany(Serveur::class, 'logfiles_serveurs');
	}

	public function logfilespatterns()
	{
		return $this->hasMany(Logfilespattern::class);
	}
}
