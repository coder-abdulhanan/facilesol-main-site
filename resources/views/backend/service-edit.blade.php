@extends('backend.layouts.main')
@section('title', 'Edit Project')
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
                        <form method="post" action="/admin/service-edit/{{$service->id}}" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="form-floating mb-3">
                                <label for="title">Title</label>
                                <input class="form-control" id="title" type="text" placeholder="Enter Service Title" name="title" value="{{old('title', $service->title)}}">
                                @if ($errors->has('title'))
                                    <span class="text-danger">
                                        {{$errors->first('title')}}
                                    </span>
                                @endif
                            </div>
                            <div class="form-floating mb-3">
                                <label for="details">Details</label>
                                <input class="form-control" id="details" type="text" placeholder="Enter Service Details" name="details" value="{{old('details', $service->details)}}">
                                @if ($errors->has('details'))
                                    <span class="text-danger">
                                        {{$errors->first('details')}}
                                    </span>
                                @endif
                            </div>

                            <div class="form-floating mb-3">
                                <label for="image">Thumbnail (Only Upload New Image if You Want. Otherwise, Do not Upload.)</label>
                                <input class="form-control" id="image" type="file" name="image" value="{{old('image', $service->thumbnail)}}" style="padding-bottom:38px">
                                @if ($errors->has('image'))
                                    <span class="text-danger">
                                        {{$errors->first('image')}}
                                    </span>
                                @endif
                            </div>
                            <div class="mb-3">
                                <img src="/backend/images/services/{{$service->thumbnail}}" alt="Image Not Found" style="height:100px; width:100px; border:2px solid #3e3aa2">
                            </div>
                            <div class="mt-4 mb-0">
                                <div class="d-grid">
                                    <input class="btn btn-primary btn-block" type="submit" value="Update Service" name="submit">
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
