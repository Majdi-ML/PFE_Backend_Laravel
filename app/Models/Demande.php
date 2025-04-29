<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Demande
 * 
 * @property int $id
 * @property Carbon|null $date_creation
 * @property Carbon|null $last_update_at
 * @property int|null $status_id
 * @property int|null $user_id
 * @property int|null $serviceplatfom_id
 * 
 * @property Status|null $status
 * @property User|null $user
 * @property Serviceplatfom|null $serviceplatfom
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
class Demande extends Model
{
	protected $table = 'demandes';
	public $timestamps = true;

	protected $casts = [
		
		'status_id' => 'int',
		'user_id' => 'int',
		'serviceplatfom_id' => 'int'
	];

	protected $fillable = [
		'description', 
		'status_id',
		'user_id',
		'serviceplatfom_id',
    	'ref'
	];

	public function status()
	{
		return $this->belongsTo(Status::class);
	}

	public function user()
	{
		return $this->belongsTo(User::class);
	}

	public function serviceplatfom()
	{
		return $this->belongsTo(Serviceplatfom::class);
	}

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
