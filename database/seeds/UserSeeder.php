<?php

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::table('users')->insert([
			'name' => 'Director Comercial',
			'last_name' => 'Lagobo',
			'phone' => '123456789',
			'email' => 'directorcomercial@lagobo.com',
			'password' => bcrypt('123456789'),
			'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
			'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
		]);
		DB::table('users')->insert([
			'name' => 'Usuario Prueba',
			'last_name' => 'Lagobo',
			'phone' => '123456789',
			'email' => 'prueba@lagobo.com',
			'password' => bcrypt('123456789'),
			'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
			'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
		]);
	}
}
