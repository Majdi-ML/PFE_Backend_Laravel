<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Serveur
 * 
 * @property int $id
 * @property string|null $ref
 * @property int|null $etat_id
 * @property int|null $platforme_id
 * @property string|null $hostname
 * @property string|null $fqdn
 * @property int|null $type_id
 * @property string|null $modele
 * @property int|null $os_id
 * @property int|null $verTechFirmware_id
 * @property string|null $cluster
 * @property string|null $ipSource
 * @property string|null $description
 * @property int|null $socleStandardOmu_id
 * @property string|null $complementsInformations
 * @property int|null $demande_id
 * 
 * @property Etat|null $etat
 * @property Platforme|null $platforme
 * @property Typeserveur|null $typeserveur
 * @property O|null $o
 * @property Soclestandardomu|null $soclestandardomu
 * @property Demande|null $demande
 * @property Collection|Cluster[] $clusters
 * @property Collection|Logfile[] $logfiles
 * @property Collection|Process[] $processes
 * @property Collection|Requetessql[] $requetessqls
 * @property Collection|Script[] $scripts
 * @property Collection|Trapssnmp[] $trapssnmps
 * @property Collection|Url[] $urls
 *
 * @package App\Models
 */
class Serveur extends Model
{
	protected $table = 'serveurs';
	public $timestamps = false;

	protected $casts = [
		'etat_id' => 'int',
		'platforme_id' => 'int',
		'type_id' => 'int',
		'os_id' => 'int',
		'verTechFirmware_id' => 'int',
		'socleStandardOmu_id' => 'int',
		'demande_id' => 'int'
	];

	protected $fillable = [
		'ref',
		'etat_id',
		'platforme_id',
		'hostname',
		'fqdn',
		'type_id',
		'modele',
		'os_id',
		'verTechFirmware_id',
		'cluster',
		'ipSource',
		'description',
		'socleStandardOmu_id',
		'complementsInformations',
		'demande_id'
	];

	public function etat()
	{
		return $this->belongsTo(Etat::class);
	}

	public function platforme()
	{
		return $this->belongsTo(Platforme::class);
	}

	public function typeserveur()
	{
		return $this->belongsTo(Typeserveur::class, 'type_id');
	}

	public function os()
	{
		return $this->belongsTo(OS::class, 'os_id');
	}

	public function soclestandardomu()
	{
		return $this->belongsTo(Soclestandardomu::class, 'socleStandardOmu_id');
	}

	public function demande()
	{
		return $this->belongsTo(Demande::class);
	}

	public function clusters()
	{
		return $this->belongsToMany(Cluster::class, 'cluster_serveurs');
	}

	public function logfiles()
	{
		return $this->belongsToMany(Logfile::class, 'logfiles_serveurs');
	}

	public function processes()
	{
		return $this->belongsToMany(Process::class, 'process_serveurs');
	}

	public function requetessqls()
	{
		return $this->belongsToMany(Requetessql::class, 'requetessql_serveurs');
	}

	public function scripts()
	{
		return $this->belongsToMany(Script::class, 'scripts_serveurs');
	}

	public function trapssnmps()
	{
		return $this->belongsToMany(Trapssnmp::class, 'trapssnmp_serveurs', 'serveur_id', 'trapsnmp_id');
	}

	public function urls()
	{
		return $this->belongsToMany(Url::class, 'url_serveurs');
	}
}
