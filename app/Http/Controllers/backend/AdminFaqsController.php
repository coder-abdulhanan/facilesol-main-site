<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\backend\FAQs;
use Illuminate\Http\Request;

class AdminFaqsController extends Controller
{
    public function index()
    {
        if(session()->has('email')){
            return view('backend.faq', ['faqs'=>FAQs::get()]);
        } else {
            return redirect()->route('admin.login');
        }
    }


    public function addFAQ()
    {
        if(session()->has('email')){
            return view('backend.faq-add');
        } else {
            return redirect()->route('admin.login');
        }
    }


    public function submitFaqRecord(Request $request)
    {
        if(session()->has('email')){
            $request->validate(
                [
                    'question' => 'required',
                    'answer' => 'required'
                ]
                );
            $FAQ_STATUS = 1;
            $faqs = new FAQs();
            $faqs->question = $request->question;
            $faqs->answer = $request->answer;
            $faqs->status = $FAQ_STATUS;
            $faqs->save();
            return back()->withSuccess('FAQ Record Added Successfully');
        } else {
            return redirect()->route('admin.login');
        }
    }

    public function editFAQ($id)
    {
        // dd($id);
        if(session()->has('email')){
            $faqs = FAQs::where('id', $id)->first();
            return view('backend.faq-edit', ['faqs' => $faqs]);
        } else {
            return redirect()->route('admin.login');
        }
    }

    public function updateFAQ(Request $request, $id)
    {
        if(session()->has('email')){
            $request->validate(
                [
                    'question' => 'required',
                    'answer' => 'required'
                ]);
            $faqs = FAQs::where('id', $id)->first();
            $FAQ_STATUS = 1;
            $faqs->question = $request->question;
            $faqs->answer = $request->answer;
            $faqs->status = $FAQ_STATUS;
            $faqs->save();
            return back()->withSuccess('Member Record Updated Successfully');
        } else {
            return redirect()->route('admin.login');
        }
    }

    public function deleteFAQ($id)
    {
        if(session()->has('email')){
            $team = FAQs::where('id', $id)->first();
            $team->delete();
            return back()->withSuccess('Member Record Deleted Successfully');
        } else {
            return redirect()->route('admin.login');
        }
    }
}
