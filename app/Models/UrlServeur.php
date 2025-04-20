<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class UrlServeur
 * 
 * @property int $url_id
 * @property int $serveur_id
 * 
 * @property Url $url
 * @property Serveur $serveur
 *
 * @package App\Models
 */
class UrlServeur extends Model
{
	protected $table = 'url_serveurs';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'url_id' => 'int',
		'serveur_id' => 'int'
	];

	public function url()
	{
		return $this->belongsTo(Url::class);
	}

	public function serveur()
	{
		return $this->belongsTo(Serveur::class);
	}
}
