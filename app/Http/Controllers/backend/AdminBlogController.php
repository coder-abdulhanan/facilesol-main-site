<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\backend\Blogs;
use Illuminate\Http\Request;

class AdminBlogController extends Controller
{

    public function index()
    {
        return view('backend.blogs', ['blog'=>Blogs::get()]);
    }

    public function addBlog()
    {
        return view('backend.blog-add');
    }

    public function submitRecord(Request $request)
    {
        // dd($request->all());

        $request->validate(
            [
                'title' => 'required|min:3',
                'details' => 'required|min:10',
                'author' => 'required|min:3',
                'date' => 'required',
                'author_image' => 'required|mimes:jpeg,jpg,png|max:10000',
                'blog_image' => 'required|mimes:jpeg,jpg,png|max:10000'
            ]
            );
        $AuthorImageName = 'fs_blog_author_' . time() . '.' . $request->author_image->extension();
        $request->author_image->move(public_path('backend/images/blog_authors'), $AuthorImageName);
        // dd($AuthorImageName);

        $BlogImageName = 'fs_blog_post_' . time() . '.' . $request->blog_image->extension();
        $request->blog_image->move(public_path('backend/images/blog_posts'), $BlogImageName);
        // dd($BlogImageName);
        $BLOG_STATUS = 1;
        $blogs = new Blogs();
        $blogs->title = $request->title;
        $blogs->details = $request->details;
        $blogs->author = $request->author;
        $blogs->updated_on = $request->date;
        $blogs->author_image = $AuthorImageName;
        $blogs->blog_image = $BlogImageName;
        $blogs->status = $BLOG_STATUS;
        $blogs->save();
        return back()->withSuccess('Blog Record Added Successfully');
    }

    public function deleteRecord($id)
    {
        $blog = Blogs::where('id', $id)->first();
        $blog->delete();
        return back()->withSuccess('Blog Post Deleted Successfully');
    }
}
