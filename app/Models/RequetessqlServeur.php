<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class RequetessqlServeur
 * 
 * @property int $requetessql_id
 * @property int $serveur_id
 * 
 * @property Requetessql $requetessql
 * @property Serveur $serveur
 *
 * @package App\Models
 */
class RequetessqlServeur extends Model
{
	protected $table = 'requetessql_serveurs';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'requetessql_id' => 'int',
		'serveur_id' => 'int'
	];

	public function requetessql()
	{
		return $this->belongsTo(Requetessql::class);
	}

	public function serveur()
	{
		return $this->belongsTo(Serveur::class);
	}
}
