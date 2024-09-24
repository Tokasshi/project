<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\Message;


class ContactController extends Controller
{
    public function contactForm()
    {
        return view('contact' ,['pageTitle' => 'Contact Us']);
    }

    
    public function sendEmail(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        // Save the message in the database
        Message::create($request->only('name', 'email', 'subject', 'message'));

        // Prepare email data
        $data = $request->except('_token');

        // Send the email
        Mail::to('hello@example.com')->send(new ContactMail($data));

        return redirect()->route('contactForm');
    }
    
}
