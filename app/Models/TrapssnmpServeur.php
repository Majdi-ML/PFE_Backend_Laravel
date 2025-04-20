<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class TrapssnmpServeur
 * 
 * @property int $trapsnmp_id
 * @property int $serveur_id
 * 
 * @property Trapssnmp $trapssnmp
 * @property Serveur $serveur
 *
 * @package App\Models
 */
class TrapssnmpServeur extends Model
{
	protected $table = 'trapssnmp_serveurs';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'trapsnmp_id' => 'int',
		'serveur_id' => 'int'
	];

	public function trapssnmp()
	{
		return $this->belongsTo(Trapssnmp::class, 'trapsnmp_id');
	}

	public function serveur()
	{
		return $this->belongsTo(Serveur::class);
	}
}
