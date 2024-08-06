@extends('backend.layouts.main')
@section('title', 'Edit Blog')
@section('main-container')
            @if ($message = Session::get('success'))
                <div class="alert alert-success alert-block p-4 border-left-success">
                    <strong>
                        {{$message}}
                    </strong>
                </div>
            @endif
            <div class="container-fluid">
                <br>
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <a href="{{ route('blog.show') }}"><button class="btn btn-primary">Blog List</button></a></a>
                    </div>
                    <div class="card-body">
                        <form method="post" action="/admin/blog-edit/{{$blog->id}}" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="form-floating mb-3">
                                <label for="title">Title</label>
                                <input class="form-control" id="title" type="text" placeholder="Enter Blog Title" name="title" value="{{old('title', $blog->title)}}">
                                @if ($errors->has('title'))
                                    <span class="text-danger">
                                        {{$errors->first('title')}}
                                    </span>
                                @endif
                            </div>
                            <div class="form-floating mb-3">
                                <label for="details">Details</label>
                                <input class="form-control" id="details" type="text" placeholder="Enter Blog Details" name="details" value="{{old('details', $blog->details)}}">
                                @if ($errors->has('details'))
                                    <span class="text-danger">
                                        {{$errors->first('details')}}
                                    </span>
                                @endif
                            </div>
                            <div class="form-floating mb-3">
                                <label for="author">Author</label>
                                <input class="form-control" id="author" type="text" placeholder="Enter Author Name" name="author" value="{{old('author', $blog->author)}}">
                                @if ($errors->has('author'))
                                    <span class="text-danger">
                                        {{$errors->first('author')}}
                                    </span>
                                @endif
                            </div>
                            <div class="form-floating mb-3">
                                <label for="date">Uploading Date</label>
                                <input class="form-control" id="date" type="date" placeholder="Enter Uploading Date" name="date" value="{{old('date', $blog->updated_on)}}">
                                @if ($errors->has('date'))
                                    <span class="text-danger">
                                        {{$errors->first('date')}}
                                    </span>
                                @endif
                            </div>

                            <div class="form-floating mb-3">
                                <label for="author_image">Author Image (Only Upload New Image if You Want.Otherwise, Do not Upload.)</label>
                                <input class="form-control" id="image" type="file" name="author_image" value="{{old('author_image', $blog->author_image)}}" style="padding-bottom:38px">
                                @if ($errors->has('author_image'))
                                    <span class="text-danger">
                                        {{$errors->first('author_image')}}
                                    </span>
                                @endif
                            </div>
                            <div class="mb-3">
                                <img src="/backend/images/blog_authors/{{$blog->author_image}}" alt="Image Not Found" style="height:100px; width:100px">
                            </div>
                            <div class="form-floating mb-3">
                                <label for="blog_image">Blog Image (Only Upload New Image if You Want.Otherwise, Do not Upload.)</label>
                                <input class="form-control" id="blog_image" type="file" name="blog_image" value="{{old('blog_image', $blog->blog_image)}}" style="padding-bottom:38px">
                                @if ($errors->has('blog_image'))
                                    <span class="text-danger">
                                        {{$errors->first('blog_image')}}
                                    </span>
                                @endif
                            </div>
                            <div class="mb-3">
                                <img src="/backend/images/blog_posts/{{$blog->blog_image}}" alt="Image Not Found" style="height:100px; width:100px">
                            </div>
                            <div class="mt-4 mb-0">
                                <div class="d-grid">
                                    <input class="btn btn-primary btn-block" type="submit" value="Update Blog" name="submit">
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
