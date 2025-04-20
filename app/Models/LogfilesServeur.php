<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class LogfilesServeur
 * 
 * @property int $logfile_id
 * @property int $serveur_id
 * 
 * @property Logfile $logfile
 * @property Serveur $serveur
 *
 * @package App\Models
 */
class LogfilesServeur extends Model
{
	protected $table = 'logfiles_serveurs';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'logfile_id' => 'int',
		'serveur_id' => 'int'
	];

	public function logfile()
	{
		return $this->belongsTo(Logfile::class);
	}

	public function serveur()
	{
		return $this->belongsTo(Serveur::class);
	}
}
