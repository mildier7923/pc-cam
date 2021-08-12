<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    public function __construct()
	{
		$this->middleware('guest');
	}

    public function index($token = null)
		{
			if (isset($token)) {
				$arrayData = explode("~", $token);

				if (count($arrayData) == 2) {
					return view('dashboard.auth.reset-password')->with(
							['token' => $arrayData[0], 'email' => $arrayData[1]]
					);					
				}
			}
			return redirect('/');
		}


		protected function setUserPassword($user, $password)
    {
        $user->password = $password;
    }

    protected $redirectTo = RouteServiceProvider::HOME;
}
