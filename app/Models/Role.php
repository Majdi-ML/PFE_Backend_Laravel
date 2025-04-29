<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Role
 * 
 * @property int $id
 * @property string|null $role
 * 
 * @property Collection|User[] $users
 *
 * @package App\Models
 */
class Role extends Model
{
	protected $table = 'role';
	public $timestamps = false;

	protected $fillable = [
		'role'
	];
	const DEMANDEUR = 1; // pour mathematicians
    const ADMIN = 2;     // pour scientists
    const DEFAULT = 1; 
	public function users()
	{
		return $this->hasMany(User::class);
	}
}
