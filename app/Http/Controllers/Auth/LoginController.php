<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    

    use AuthenticatesUsers;

    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


		public function index()
		{
			return view('dashboard.auth.login');
		}


		protected function sendFailedLoginResponse(Request $request)
		{
			throw ValidationException::withMessages([
				'credentials' => [trans('auth.failed')],
			]);
		}
}
