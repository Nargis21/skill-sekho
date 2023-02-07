<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactFormValidation;
use Illuminate\Http\Request;
use App\Mail\ContactForm;
use Mail;

class ContactController extends Controller
{
    public function contact(){
        return view('frontend.contact');
    }

    public function contactForm(ContactFormValidation $request){
        $name = $request->name;
        $email = $request->email;
        $number = $request->number;
        $message = $request->message;

        $info = ['name' => $name,'email' =>$email,'phone' =>$number,'message' =>$message];

        Mail::to('skill@sekho.com')->send(new ContactForm($info));

        $notifications = array(
            'message' => 'Form Submitted Successfully!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notifications);
    }
}
