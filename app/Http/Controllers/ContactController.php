<?php

namespace App\Http\Controllers;
use App\Mail\LaravelMailer;
use Illuminate\Http\Request;
use Illuminate\Mail\Mailable;
use Illuminate\Support\Facades\Mail;
use PhpParser\Node\Stmt\TryCatch;

class ContactController extends Controller
{
    public function send(Request $request)
    {
        try {

            $data = $request->validate([
                'name' => ['required', 'string'],
                'email' => ['required', 'email'],
                'message' => ['required', 'string'],
            ]);


            // Mail::to($data['email'])->send(new LaravelMailer($data));

            Mail::to(auth()->user()->email)->send(new LaravelMailer($data));

            return back()->with('success', 'email sent successfully');
        } catch (\Exception $e) {
            return back()->withErrors('failed to send email');
        }

    }
}
