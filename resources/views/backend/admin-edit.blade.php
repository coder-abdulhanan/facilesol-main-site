@extends('backend.layouts.main')
@section('title', 'Update Admin Record')
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
                        <a href="{{ route('admin.show') }}"><button class="btn btn-primary">Admins List</button></a></a>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.update', ['id'=> $admin->id])}}">
                            @csrf
                            @method('PUT')
                            <div class="form-floating mb-3">
                                <label for="first_name">First Name</label>
                                <input class="form-control" id="first_name" type="text" placeholder="Enter First Name" name="first_name" value="{{old('first_name', $admin->first_name)}}"/>
                                @if ($errors->has('first_name'))
                                    <span class="text-danger">
                                        {{$errors->first('first_name')}}
                                    </span>
                                @endif
                            </div>
                            <div class="form-floating mb-3">
                                <label for="last_name">Last Name</label>
                                <input class="form-control" id="last_name" type="text" placeholder="Enter Last Name" name="last_name" value="{{old('last_name', $admin->last_name)}}"/>
                                @if ($errors->has('last_name'))
                                    <span class="text-danger">
                                        {{$errors->first('last_name')}}
                                    </span>
                                @endif
                            </div>
                            <div class="form-floating mb-3">
                                <label for="contact">Contact Number</label>
                                <input class="form-control" id="contact" type="text" placeholder="Enter Contact Number" name="contact" value="{{old('contact', $admin->contact)}}"/>
                                @if ($errors->has('contact'))
                                    <span class="text-danger">
                                        {{$errors->first('contact')}}
                                    </span>
                                @endif
                            </div>
                            <div class="mt-4 mb-0">
                                <div class="d-grid">
                                    <input class="btn btn-primary btn-block" type="submit" value="Update Admin Record" name="submit">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
