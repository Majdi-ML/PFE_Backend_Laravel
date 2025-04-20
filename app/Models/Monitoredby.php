<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Monitoredby
 * 
 * @property int $id
 * @property string|null $nom
 * 
 * @property Collection|Logfile[] $logfiles
 * @property Collection|Process[] $processes
 * @property Collection|Requetessql[] $requetessqls
 * @property Collection|Script[] $scripts
 * @property Collection|Url[] $urls
 *
 * @package App\Models
 */
class Monitoredby extends Model
{
	protected $table = 'monitoredby';
	public $timestamps = false;

	protected $fillable = [
		'nom'
	];

	public function logfiles()
	{
		return $this->hasMany(Logfile::class, 'monitoredBy_id');
	}

	public function processes()
	{
		return $this->hasMany(Process::class, 'monitoredBy_id');
	}

	public function requetessqls()
	{
		return $this->hasMany(Requetessql::class, 'monitoredBy_id');
	}

	public function scripts()
	{
		return $this->hasMany(Script::class, 'monitoredBy_id');
	}

	public function urls()
	{
		return $this->hasMany(Url::class, 'monitoredBy_id');
	}
}
