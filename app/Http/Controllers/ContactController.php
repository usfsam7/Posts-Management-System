<?php

namespace App\Http\Controllers;
use App\Mail\LaravelMailer;
use Illuminate\Http\Request;
use Illuminate\Mail\Mailable;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function send(Request $request)
    {
       $data = $request->validate([
          'name' => ['required', 'string'],
          'email' => ['required','email'],
          'message' => ['required','string'],
       ]);

            Mail::to($data['email'])->send(new LaravelMailer($data));

            return back()->with('success', 'email sent successfully');

    }
}
