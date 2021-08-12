<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\ContactMailable;
use Illuminate\Support\Facades\Mail;

class SendEmailController extends Controller
{
    public function sendEmail($contact)
		{
			$bodyEmail = new ContactMailable($contact);
			$emails = config('emails');

			foreach ($emails as $emailTo) {
				Mail::to($emailTo)->send($bodyEmail);
			}
		}
}
