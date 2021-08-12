<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
{
	public function authorize()
	{
		return true;
	}

	public function rules()
	{
		return [
			'name' => 'bail|required|string',
			'last_name' => 'bail|required|string',
			'phone' => 'bail|required|numeric',
			'email' => 'bail|required|string|unique:users,email,'.	$this->id,
			'password' => 'bail|between:8,100',
		];

	}
}
