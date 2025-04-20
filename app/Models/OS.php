<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class OS
 * 
 * @property int $id
 * @property string|null $nom
 * 
 * @property Collection|Serveur[] $serveurs
 *
 * @package App\Models
 */
class OS extends Model
{
	protected $table = 'os';
	public $timestamps = false;

	protected $fillable = [
		'nom'
	];

	public function serveurs()
	{
		return $this->hasMany(Serveur::class, 'os_id');
	}
}
