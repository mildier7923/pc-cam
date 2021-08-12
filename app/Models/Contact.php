<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
	protected $fillable = [
		'user_id',
		'name',
		'last_name',
		'phone',
		'email',
		'message',
		'contact',
		'date'
	];


	public function user()
	{
			return $this->belongsTo(User::class);
	}
}
