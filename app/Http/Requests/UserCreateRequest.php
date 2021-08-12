<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserCreateRequest extends FormRequest
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
			'email' => 'bail|required|string|unique:users,email',
			'password' => 'bail|required|string|between:8,100',
		];

	}
}
