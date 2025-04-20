<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Cluster
 * 
 * @property int $id
 * @property string|null $ref
 * @property int|null $etat_id
 * @property string|null $nomDuRessourceGroupPackageServiceGuard
 * @property string|null $adresseIp
 * @property string|null $listeDesServeursConcernes
 * @property string|null $logicielCluster
 * @property string|null $version
 * @property string|null $mode
 * @property string|null $serveurActif
 * @property string|null $complementsInformations
 * @property int|null $demande_id
 * 
 * @property Etat|null $etat
 * @property Demande|null $demande
 * @property Collection|Serveur[] $serveurs
 *
 * @package App\Models
 */
class Cluster extends Model
{
	protected $table = 'cluster';
	public $timestamps = false;

	protected $casts = [
		'etat_id' => 'int',
		'demande_id' => 'int'
	];

	protected $fillable = [
		'ref',
		'etat_id',
		'nomDuRessourceGroupPackageServiceGuard',
		'adresseIp',
		'listeDesServeursConcernes',
		'logicielCluster',
		'version',
		'mode',
		'serveurActif',
		'complementsInformations',
		'demande_id'
	];

	public function etat()
	{
		return $this->belongsTo(Etat::class);
	}

	public function demande()
	{
		return $this->belongsTo(Demande::class);
	}

	public function serveurs()
	{
		return $this->belongsToMany(Serveur::class, 'cluster_serveurs');
	}
}
