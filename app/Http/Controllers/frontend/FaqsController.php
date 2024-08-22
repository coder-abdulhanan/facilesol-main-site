<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\FAQs;
use Illuminate\Http\Request;

class FaqsController extends Controller
{
    public function index()
    {
        return view('frontend.faqs', ['faqs'=>FAQs::paginate(6)]);
    }
}
