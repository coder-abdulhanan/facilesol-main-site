@extends('backend.layouts.main')
@section('title', 'Add Project')
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
                        <a href="{{url('/admin/services')}}"><button class="btn btn-primary">Services List</button></a></a>
                    </div>
                    <div class="card-body">
                        <form method="post" action="/admin/service-add" enctype="multipart/form-data">
                            @csrf
                            <div class="form-floating mb-3">
                                <label for="title">Title</label>
                                <input class="form-control" id="title" type="text" placeholder="Enter Service Title" name="title" value="{{old('title')}}">
                                @if ($errors->has('title'))
                                    <span class="text-danger">
                                        {{$errors->first('title')}}
                                    </span>
                                @endif
                            </div>
                            <div class="form-floating mb-3">
                                <label for="details">Details</label>
                                <textarea class="form-control" id="details" type="text" name="details" placeholder="Enter Service Details" value="{{old('details')}}"></textarea>
                                @if ($errors->has('details'))
                                    <span class="text-danger">
                                        {{$errors->first('details')}}
                                    </span>
                                @endif
                            </div>
                            <div class="form-floating mb-3">
                                <label for="category">Category</label>
                                <select class="form-control" id="category" name="category" value="{{old('category')}}">
                                    <option value="0">--Select Category--</option>
                                    @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->title }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('category'))
                                    <span class="text-danger">
                                        {{$errors->first('category')}}
                                    </span>
                                @endif
                            </div>
                            <div class="form-floating mb-3">
                                <label for="image">Image</label>
                                <input class="form-control" id="image" type="file" accept=".png, .jpg, .jpeg, .svg" name="image" value="{{old('image')}}" style="padding-bottom:38px">
                                @if ($errors->has('image'))
                                    <span class="text-danger">
                                        {{$errors->first('image')}}
                                    </span>
                                @endif
                            </div>
                            <div class="mt-4 mb-0">
                                <div class="d-grid">
                                    <input class="btn btn-primary btn-block" type="submit" value="Add Project" name="submit">
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
