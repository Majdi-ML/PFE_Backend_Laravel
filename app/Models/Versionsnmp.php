<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Versionsnmp
 * 
 * @property int $id
 * @property string|null $nom
 * 
 * @property Collection|Trapssnmp[] $trapssnmps
 *
 * @package App\Models
 */
class Versionsnmp extends Model
{
	protected $table = 'versionsnmp';
	public $timestamps = false;

	protected $fillable = [
		'nom'
	];

	public function trapssnmps()
	{
		return $this->hasMany(Trapssnmp::class, 'versionSnmp_id');
	}
}
