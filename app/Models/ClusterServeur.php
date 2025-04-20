<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ClusterServeur
 * 
 * @property int $cluster_id
 * @property int $serveur_id
 * 
 * @property Cluster $cluster
 * @property Serveur $serveur
 *
 * @package App\Models
 */
class ClusterServeur extends Model
{
	protected $table = 'cluster_serveurs';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'cluster_id' => 'int',
		'serveur_id' => 'int'
	];

	public function cluster()
	{
		return $this->belongsTo(Cluster::class);
	}

	public function serveur()
	{
		return $this->belongsTo(Serveur::class);
	}
}
