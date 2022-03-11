<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function sendEmail(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required | email',
            'subject' => 'required',
            'message' => 'required'
        ]);

        if($this->isOnline()){
            $mail_data = [
                'recipient' => 'davidzaw1111@gmail.com',
                'email' => $request->email,
                'name' => $request->name,
                'subject' => $request->subject,
                'body' => $request->message
            ];

            Mail::send('email-template', $mail_data, function($message) use ($mail_data){
                $message->to($mail_data['recipient'])
                        ->from($mail_data['email'], $mail_data['name'])
                        ->subject($mail_data['subject']);
            });

            return redirect('/#contact')->with('success', "Email sent successfully. We'll be get in touch with you asap.");

        }else{
            return redirect()->back()->withInput()->with('error', 'Check your internet connection!');
        }


    }

    public function isOnline($site = "https://youtube.com/")
    {
        if(@fopen($site, "r")){
            return true;
        }else{
            return false;
        }
    }
}
