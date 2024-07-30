@extends('backend.layouts.main')
@section('title', 'Add Blog')
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
                        <a href="{{ route('blogs.show') }}"><button class="btn btn-primary">Blog List</button></a></a>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('blog.sumbit') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-floating mb-3">
                                <label for="title">Title</label>
                                <input class="form-control" id="title" type="text" placeholder="Enter Blog Title" name="title" value="{{old('title')}}">
                                @if ($errors->has('title'))
                                    <span class="text-danger">
                                        {{$errors->first('title')}}
                                    </span>
                                @endif
                            </div>
                            <div class="form-floating mb-3">
                                <label for="details">Details</label>
                                <textarea class="form-control" id="details" type="text" name="details" placeholder="Enter Blog Details" value="{{old('details')}}"></textarea>
                                @if ($errors->has('details'))
                                    <span class="text-danger">
                                        {{$errors->first('details')}}
                                    </span>
                                @endif
                            </div>
                            <div class="form-floating mb-3">
                                <label for="author">Author</label>
                                <input class="form-control" id="author" type="text" placeholder="Enter Blog Author" name="author" value="{{old('author')}}">
                                @if ($errors->has('author'))
                                    <span class="text-danger">
                                        {{$errors->first('author')}}
                                    </span>
                                @endif
                            </div>
                            <div class="form-floating mb-3">
                                <label for="date">Uploading Date</label>
                                <input class="form-control" id="date" type="date" placeholder="Enter Blog Uploading Date" name="date" value="{{old('date')}}">
                                @if ($errors->has('date'))
                                    <span class="text-danger">
                                        {{$errors->first('date')}}
                                    </span>
                                @endif
                            </div>
                            <div class="form-floating mb-3">
                                <label for="author_image">Author Image</label>
                                <input class="form-control" id="author_image" type="file" accept=".png, .jpg, .jpeg" name="author_image" value="{{old('author_image')}}" style="padding-bottom:38px">
                                @if ($errors->has('author_image'))
                                    <span class="text-danger">
                                        {{$errors->first('author_image')}}
                                    </span>
                                @endif
                            </div>
                            <div class="form-floating mb-3">
                                <label for="blog_image">Blog Image</label>
                                <input class="form-control" id="blog_image" type="file" accept=".png, .jpg, .jpeg" name="blog_image" value="{{old('blog_image')}}" style="padding-bottom:38px">
                                @if ($errors->has('blog_image'))
                                    <span class="text-danger">
                                        {{$errors->first('blog_image')}}
                                    </span>
                                @endif
                            </div>
                            <div class="mt-4 mb-0">
                                <div class="d-grid">
                                    <input class="btn btn-primary btn-block" type="submit" value="Add Blog" name="submit">
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
