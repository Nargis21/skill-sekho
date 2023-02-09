<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactFormValidation;
use App\Http\Requests\ContactInfoValidation;
use Illuminate\Http\Request;
use App\Mail\ContactForm;
use App\Models\ContactInformation;
use Mail;

class ContactController extends Controller
{
    public function contact(){
        $contactInfo = ContactInformation::find(1);
        return view('frontend.contact',compact('contactInfo'));
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

    public function contactInfo(){
        $contactInfo = ContactInformation::find(1);
        return view('dashboard.home.contact_information', compact('contactInfo'));
    }

    public function updateContactInfo(ContactInfoValidation $request){
        ContactInformation::findOrFail(1)->update([
            'address' => $request->address,
            'email1' => $request->email1,
            'email2' => $request->email2,
            'phone1' => $request->phone1,
            'phone2' => $request->phone2,
            'bkash' => $request->bkash
        ]);

        $notifications = array(
            'message' => 'Contact Info Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notifications);
    }
}
