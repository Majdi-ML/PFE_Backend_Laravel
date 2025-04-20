<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Soclestandardomu
 * 
 * @property int $id
 * @property string|null $nom
 * 
 * @property Collection|Serveur[] $serveurs
 *
 * @package App\Models
 */
class Soclestandardomu extends Model
{
	protected $table = 'soclestandardomu';
	public $timestamps = false;

	protected $fillable = [
		'nom'
	];

	public function serveurs()
	{
		return $this->hasMany(Serveur::class, 'socleStandardOmu_id');
	}
}
