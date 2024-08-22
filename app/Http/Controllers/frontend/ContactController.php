<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        return view('frontend.contact');
    }

    public function submitMessage(Request $request)
    {
        // dd($request);

        $request->validate(
            [
                'name' => 'required|min:3',
                'email' => 'required|email',
                'phone' => 'required|min:10',
                'subject' => 'required',
                'message' => 'required|min:20'
            ]
        );

        // $FullName = $request->name;
        // $Email = $request->email;
        // $Phone = $request->phone;
        // $Subject = $request->subject;
        // $Message = $request->message;

        $IP = $request->ip();
        $Status = 0;

        $contact = new Contact();
        $contact->fullname = $request->name;
        $contact->email = $request->email;
        $contact->phone = $request->phone;
        $contact->subject = $request->subject;
        $contact->message = $request->message;
        $contact->ip = $IP;
        $contact->status = $Status;
        $contact->save();
        return back()->withSuccess("Thanks for Contacting Us. We'll respond you ASAP!");
    }
}
