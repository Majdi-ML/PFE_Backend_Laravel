<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ProcessServeur
 * 
 * @property int $process_id
 * @property int $serveur_id
 * 
 * @property Process $process
 * @property Serveur $serveur
 *
 * @package App\Models
 */
class ProcessServeur extends Model
{
	protected $table = 'process_serveurs';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'process_id' => 'int',
		'serveur_id' => 'int'
	];

	public function process()
	{
		return $this->belongsTo(Process::class);
	}

	public function serveur()
	{
		return $this->belongsTo(Serveur::class);
	}
}
