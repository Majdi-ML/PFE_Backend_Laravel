<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Logfilespattern
 * 
 * @property int $id
 * @property int|null $nRef
 * @property string|null $ref
 * @property int|null $etat_id
 * @property string|null $signification
 * @property string|null $identification
 * @property int|null $criticite_id
 * @property string|null $messageAlarme
 * @property string|null $instructions
 * @property string|null $performAction
 * @property string|null $acquittement
 * @property string|null $complementsInformations
 * @property string|null $refService
 * @property string|null $objet
 * @property int|null $logfile_id
 * @property int|null $demande_id
 * 
 * @property Etat|null $etat
 * @property Criticite|null $criticite
 * @property Logfile|null $logfile
 * @property Demande|null $demande
 *
 * @package App\Models
 */
class Logfilespattern extends Model
{
	protected $table = 'logfilespatterns';
	public $timestamps = false;

	protected $casts = [
		'nRef' => 'int',
		'etat_id' => 'int',
		'criticite_id' => 'int',
		'logfile_id' => 'int',
		'demande_id' => 'int'
	];

	protected $fillable = [
		'nRef',
		'ref',
		'etat_id',
		'signification',
		'identification',
		'criticite_id',
		'messageAlarme',
		'instructions',
		'performAction',
		'acquittement',
		'complementsInformations',
		'refService',
		'objet',
		'logfile_id',
		'demande_id'
	];

	public function etat()
	{
		return $this->belongsTo(Etat::class);
	}

	public function criticite()
	{
		return $this->belongsTo(Criticite::class);
	}

	public function logfile()
	{
		return $this->belongsTo(Logfile::class);
	}

	public function demande()
	{
		return $this->belongsTo(Demande::class);
	}
}
