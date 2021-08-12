<?php

namespace App\Models;

use App\Models\Contact;
use App\Notifications\UserResetPassword;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable,  HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'last_name','phone', 'email', 'password'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function setPasswordAttribute($value)
	{
		$this->attributes['password'] = bcrypt($value);
	}


	// Enviar notificacion de correo.
	public function sendPasswordResetNotification($token)
	{
		$this->notify(new UserResetPassword($token.'~'.$this->email));
	}


	public function contacts()
	{
			return $this->hasMany(Contact::class);
	}
}
