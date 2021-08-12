<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use App\Http\Controllers\SendEmailController;

class ContactController extends Controller
{
    public function store(Request $request)
		{
			$sendEmailController = new SendEmailController();
			$contact = new Contact($request->all());
			$contact->save();
			$sendEmailController->sendEmail($contact);
			return response()->json(['saved' => true], 201);
		}

		public function getAll($status)
		{
			if ($status == 'true') $contacts = Contact::with('user')->where('contact', true)->get();
			else $contacts = Contact::with('user')->where('contact', false)->get();
			return response()->json($contacts, 200);
		}

		public function update(Contact $contact, Request $request)
		{
			$contactData = $request->all();
			$contactData['user_id'] = \Auth::user()->id;
			$contact->update($contactData);
			return response()->json([], 204);
		}

		public function delete(Contact $contact)
		{
			$contact->delete();
			return response()->json([], 204);
		}
}
