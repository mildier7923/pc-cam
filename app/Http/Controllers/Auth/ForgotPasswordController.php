<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
use App\Models\User;

class ForgotPasswordController extends Controller
{
    
    use SendsPasswordResetEmails;

    public function __construct()
		{
			$this->middleware('guest');
		}

    public function index()
		{
			return view('dashboard.auth.forgot-password');
		}


		protected function sendResetLinkResponse(Request $request,	$response) 
		{
			return redirect('/login')->with('success', trans($response));
		}

		protected function credentials(Request $request)
		{
			if ($user = User::where('email', $request->email)->first()) {
				return ['email' => $user->email];
			}
			return ['email' => null];
		}




    

}
