<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Collection;
use Laravel\Sanctum\HasApiTokens;
class User extends Authenticatable
{
	use HasFactory, Notifiable ,HasApiTokens;

	protected $table = 'user';
	public $timestamps = true;

	protected $fillable = [
		'username',
		'email',
		'password',
		'role_id',
		'support_id'
	];

	protected $hidden = [
		'password',
        'remember_token',
	];

	protected $casts = [
		'role_id' => 'int',
		'support_id' => 'int',
		'email_verified_at' => 'datetime',
		'password' => 'hashed',
	];

	public function role()
	{
		return $this->belongsTo(Role::class);
	}

	public function support()
	{
		return $this->belongsTo(Support::class);
	}

	public function demandes()
	{
		return $this->hasMany(Demande::class);
	}

	public function serviceplatfoms()
	{
		return $this->hasMany(Serviceplatfom::class);
	}
	public function isAdmin()
    {
        return $this->role_id === 2;
    }

    public function isDemandeur()
    {
        return $this->role_id === 1;
    }
}
