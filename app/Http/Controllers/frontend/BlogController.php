<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Blogs;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $Blogs = Blogs::get();
        return view('frontend.blog', ['blogs' => $Blogs]);
    }

    public function getBlogDetails($id){
        $Blogs = Blogs::where('id', $id)->first();
        return view('frontend.blog-details', ['blog' => $Blogs]);

    }



}
