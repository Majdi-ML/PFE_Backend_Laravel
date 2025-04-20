<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Criticite
 * 
 * @property int $id
 * @property string|null $nom
 * 
 * @property Collection|Logfilespattern[] $logfilespatterns
 * @property Collection|Process[] $processes
 * @property Collection|Requetessql[] $requetessqls
 * @property Collection|Script[] $scripts
 * @property Collection|Trapssnmp[] $trapssnmps
 * @property Collection|Url[] $urls
 *
 * @package App\Models
 */
class Criticite extends Model
{
	protected $table = 'criticite';
	public $timestamps = false;

	protected $fillable = [
		'nom'
	];

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

	public function trapssnmps()
	{
		return $this->hasMany(Trapssnmp::class);
	}

	public function urls()
	{
		return $this->hasMany(Url::class);
	}
}
