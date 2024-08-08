<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\backend\Blogs;
use Illuminate\Http\Request;

class ApiBlogController extends Controller
{
    public function index(){
        // print_r('Hello World');
        return response()->json(['posts'=>Blogs::get()]);
    }

    public function showSinglePost($id){

        $blog = Blogs::where('id', $id)->first();

        return response()->json(['post'=>$blog]);

    }

}
