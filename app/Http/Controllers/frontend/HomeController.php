<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\frontend\FAQsModel;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $faqs = FAQsModel::take(3)->get();
        // $faqs = FAQsModel::latest()->take(3)->get();
        return view('frontend.index', ['faqs'=>$faqs]);
    }
}
