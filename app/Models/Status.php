<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Status
 * 
 * @property int $id
 * @property string|null $nom
 * 
 * @property Collection|Demande[] $demandes
 *
 * @package App\Models
 */
class Status extends Model
{
	protected $table = 'status';
	public $timestamps = false;

	protected $fillable = [
		'nom'
	];

	public function demandes()
	{
		return $this->hasMany(Demande::class);
	}
}
