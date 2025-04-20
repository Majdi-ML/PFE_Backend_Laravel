<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Support
 * 
 * @property int $id
 * @property string|null $support
 * 
 * @property Collection|Serviceplatfom[] $serviceplatfoms
 * @property Collection|User[] $users
 *
 * @package App\Models
 */
class Support extends Model
{
	protected $table = 'support';
	public $timestamps = false;

	protected $fillable = [
		'support'
	];

	public function serviceplatfoms()
	{
		return $this->hasMany(Serviceplatfom::class);
	}

	public function users()
	{
		return $this->hasMany(User::class);
	}
}
