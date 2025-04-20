<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Etat
 * 
 * @property int $id
 * @property string|null $nom
 * 
 * @property Collection|Cluster[] $clusters
 * @property Collection|Logfile[] $logfiles
 * @property Collection|Logfilespattern[] $logfilespatterns
 * @property Collection|Process[] $processes
 * @property Collection|Requetessql[] $requetessqls
 * @property Collection|Script[] $scripts
 * @property Collection|Serveur[] $serveurs
 * @property Collection|Trapssnmp[] $trapssnmps
 * @property Collection|Url[] $urls
 *
 * @package App\Models
 */
class Etat extends Model
{
	protected $table = 'etat';
	public $timestamps = false;

	protected $fillable = [
		'nom'
	];

	public function clusters()
	{
		return $this->hasMany(Cluster::class);
	}

	public function logfiles()
	{
		return $this->hasMany(Logfile::class);
	}

	public function logfilespatterns()
	{
		return $this->hasMany(Logfilespattern::class);
	}

	public function processes()
	{
		return $this->hasMany(Process::class);
	}

	public function requetessqls()
	{
		return $this->hasMany(Requetessql::class);
	}

	public function scripts()
	{
		return $this->hasMany(Script::class);
	}

	public function serveurs()
	{
		return $this->hasMany(Serveur::class);
	}

	public function trapssnmps()
	{
		return $this->hasMany(Trapssnmp::class);
	}

	public function urls()
	{
		return $this->hasMany(Url::class);
	}
}
