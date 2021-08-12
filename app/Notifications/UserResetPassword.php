<?php

namespace App\Notifications;

use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Auth\Notifications\ResetPassword;

class UserResetPassword extends ResetPassword
{
	public function toMail($notifiable)
	{
		return (new MailMessage())
			->view('email.user-password', [
				'token' => $this->token,
			])
			->subject('Recover password');
	}
}
