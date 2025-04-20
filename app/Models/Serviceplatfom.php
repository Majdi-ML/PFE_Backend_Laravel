<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Serviceplatfom
 * 
 * @property int $id
 * @property Carbon|null $date_creation
 * @property Carbon|null $last_update_at
 * @property int|null $user_id
 * @property int|null $support_id
 * 
 * @property User|null $user
 * @property Support|null $support
 * @property Collection|Demande[] $demandes
 *
 * @package App\Models
 */
class Serviceplatfom extends Model
{
	protected $table = 'serviceplatfom';
	
	protected $casts = [
		
		'user_id' => 'int',
		'support_id' => 'int'
	];

	protected $fillable = [
		'nom',
		'user_id',
		'support_id'
	];

	public function user()
	{
		return $this->belongsTo(User::class);
	}

	public function support()
	{
		return $this->belongsTo(Support::class);
	}

	public function demandes()
	{
		return $this->hasMany(Demande::class);
	}
}
