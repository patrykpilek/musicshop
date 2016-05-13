<?php

namespace Musicshop\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Mail;
use Musicshop\Http\Requests;
use Musicshop\Http\Controllers\Controller;
use Musicshop\Http\Requests\ContactMeRequest;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact.index');
    }

    public function sendContactInfo(ContactMeRequest $request)
    {
        $data = $request->only('name', 'email');
        $data['messageLines'] = explode("\n", $request->get('message'));

        Mail::queue('emails.contact', $data, function ($message) use ($data) {
            $message->subject('Music Shop Contact Form: '.$data['name'])
                ->to(config('musicshop.contact_email'))
                ->replyTo($data['email']);
        });
        return back()->withSuccess("Thank you for your message. It has been sent.");
    }
}
