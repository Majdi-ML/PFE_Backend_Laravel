<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Trapssnmp
 * 
 * @property int $id
 * @property string|null $ref
 * @property int|null $etat_id
 * @property string|null $refComposant
 * @property string|null $signification
 * @property int|null $versionSnmp_id
 * @property string|null $oid
 * @property string|null $specificTrap
 * @property string|null $variableBinding
 * @property int|null $criticite_id
 * @property string|null $messageAlarme
 * @property string|null $instructions
 * @property string|null $acquittement
 * @property string|null $mibAssocie
 * @property string|null $objet
 * @property string|null $compelementInformation
 * @property int|null $demande_id
 * 
 * @property Etat|null $etat
 * @property Versionsnmp|null $versionsnmp
 * @property Criticite|null $criticite
 * @property Demande|null $demande
 * @property Collection|Serveur[] $serveurs
 *
 * @package App\Models
 */
class Trapssnmp extends Model
{
	protected $table = 'trapssnmp';
	public $timestamps = false;

	protected $casts = [
		'etat_id' => 'int',
		'versionSnmp_id' => 'int',
		'criticite_id' => 'int',
		'demande_id' => 'int'
	];

	protected $fillable = [
		'ref',
		'etat_id',
		'refComposant',
		'signification',
		'versionSnmp_id',
		'oid',
		'specificTrap',
		'variableBinding',
		'criticite_id',
		'messageAlarme',
		'instructions',
		'acquittement',
		'mibAssocie',
		'objet',
		'compelementInformation',
		'demande_id'
	];

	public function etat()
	{
		return $this->belongsTo(Etat::class);
	}

	public function versionsnmp()
	{
		return $this->belongsTo(Versionsnmp::class, 'versionSnmp_id');
	}

	public function criticite()
	{
		return $this->belongsTo(Criticite::class);
	}

	public function demande()
	{
		return $this->belongsTo(Demande::class);
	}

	public function serveurs()
	{
		return $this->belongsToMany(Serveur::class, 'trapssnmp_serveurs', 'trapsnmp_id');
	}
}
