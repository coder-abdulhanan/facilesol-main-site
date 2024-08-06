<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\backend\Blogs;
use Illuminate\Http\Request;

class AdminBlogController extends Controller
{

    public function index()
    {
        if(session()->has('email')){
            return view('backend.blogs', ['blog'=>Blogs::get()]);
        } else {
            return redirect()->route('admin.login');
        }
    }

    public function addBlog()
    {
        if(session()->has('email')){
            return view('backend.blog-add');
        } else {
            return redirect()->route('admin.login');
        }
    }

    public function submitRecord(Request $request)
    {
        // dd($request->all());
        if(session()->has('email')){
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
        } else {
            return redirect()->route('admin.login');
        }
    }

    public function editRecord($id)
    {
        // dd($id);
        if(session()->has('email')){
            $blog = Blogs::where('id', $id)->first();
            return view('backend.blog-edit', ['blog' => $blog]);
        } else {
            return redirect()->route('admin.login');
        }
    }

    public function updateRecord(Request $request, $id)
    {
        if(session()->has('email')){
            $request->validate(
                [

                    'title' => 'required|min:3',
                    'details' => 'required|min:10',
                    'author' => 'required|min:3',
                    'date' => 'required',
                    'author_image' => 'nullable|mimes:jpeg,jpg,png|max:10000',
                    'blog_image' => 'nullable|mimes:jpeg,jpg,png|max:10000'
                ]);
            $blog = Blogs::where('id', $id)->first();
            if(isset($request->author_image))
            {
                $AuthorImageName = 'fs_blog_author_' . time() . '.' . $request->author_image->extension();
                $request->author_image->move(public_path('backend/images/blog_authors'), $AuthorImageName);
                $blog->author_image = $AuthorImageName;
            }
            if(isset($request->blog_image))
            {
                $BlogImageName = 'fs_blog_post_' . time() . '.' . $request->blog_image->extension();
                $request->blog_image->move(public_path('backend/images/blog_posts'), $BlogImageName);
                $blog->blog_image = $BlogImageName;
            }
            $blog->title = $request->title;
            $blog->details = $request->details;
            $blog->author = $request->author;
            $blog->updated_on = $request->date;
            $blog->save();
            return back()->withSuccess('Blog Post Updated Successfully');
        } else {
            return redirect()->route('admin.login');
        }
    }

    public function deleteRecord($id)
    {
        if(session()->has('email')){
            $blog = Blogs::where('id', $id)->first();
            $blog->delete();
            return back()->withSuccess('Blog Post Deleted Successfully');
        } else {
            return redirect()->route('admin.login');
        }
    }
}
