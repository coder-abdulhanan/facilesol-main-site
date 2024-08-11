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

    public function submitPost(Request $request)
    {
        // print_r('Testing API');
        // dd($request->all());
            // $request->validate(
            //     [
            //         'title' => 'required|min:3',
            //         'details' => 'required|min:10',
            //         'author' => 'required|min:3',
            //         'date' => 'required',
            //         'author_image' => 'required|mimes:jpeg,jpg,png|max:10000',
            //         'blog_image' => 'required|mimes:jpeg,jpg,png|max:10000'
            //     ]
            //     );

            $BLOG_STATUS = 1;
            $blogs = new Blogs();
            $blogs->title = $request->title;
            $blogs->details = $request->details;
            $blogs->author = $request->author;
            $blogs->updated_on = $request->date;
            $blogs->author_image = $request->author_image;
            $blogs->blog_image = $request->blog_image;
            // $blogs->status = $BLOG_STATUS;
            $blogs->save();

            return response()->json([
                'message' => 'Post Submitted Successfully',
                'status' => '200'
            ]);
    }

    public function updateRecord(Request $request, $id)
    {
            // $request->validate(
            //     [

            //         'title' => 'required|min:3',
            //         'details' => 'required|min:10',
            //         'author' => 'required|min:3',
            //         'date' => 'required',
            //         'author_image' => 'nullable|mimes:jpeg,jpg,png|max:10000',
            //         'blog_image' => 'nullable|mimes:jpeg,jpg,png|max:10000'
            //     ]);
            $blog = Blogs::where('id', $id)->first();

            $blog->title = $request->title;
            $blog->details = $request->details;
            $blog->author = $request->author;
            $blog->updated_on = $request->date;
            $blog->blog_image = $request->blog_image;
            $blog->author_image = $request->author_image;
            $blog->save();

            return response()->json([
                'message' => 'Post Updated Successfully',
                'status' => '200'
            ]);
    }

    public function deleteRecord($id)
    {
            $blog = Blogs::where('id', $id)->first();
            $blog->delete();
            return response()->json([
                'message' => 'Post Deleted Successfully',
                'status' => '200'
            ]);
    }

}
