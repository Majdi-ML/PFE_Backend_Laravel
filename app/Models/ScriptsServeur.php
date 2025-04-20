<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ScriptsServeur
 * 
 * @property int $script_id
 * @property int $serveur_id
 * 
 * @property Script $script
 * @property Serveur $serveur
 *
 * @package App\Models
 */
class ScriptsServeur extends Model
{
	protected $table = 'scripts_serveurs';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'script_id' => 'int',
		'serveur_id' => 'int'
	];

	public function script()
	{
		return $this->belongsTo(Script::class);
	}

	public function serveur()
	{
		return $this->belongsTo(Serveur::class);
	}
}
