@extends('backend.layouts.main')
@section('title', 'Services')
@section('main-container')
<div class="container-fluid"><br>
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary"><a href="{{url('/admin')}}">Main Menu</a> | Projects List</h6>
                        <a href="{{route('service.add')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm float-right"><i
                        class="fas fa-plus fa-sm text-white-50"></i>Add Service</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th>Details</th>
                                    <th>Category</th>
                                    <th>Thumbnail</th>
                                    <th>Status</th>
                                    <th width="160px">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($service as $service)
                                <tr>
                                    <td>{{ $service->id }}</td>
                                    <td>{{ $service->title }}</td>
                                    <td>
                                        @if(strlen($service->details) > 100)
                                            {{ substr($service->details, 0, 100) . '...' }}
                                        @else
                                            {{ $service->details }}
                                        @endif
                                    </td>
                                    <td>{{ $service->category_name }}</td>
                                    <td>
                                        <img src="/backend/images/services/{{$service->thumbnail}}" class="rounded-circle border border-primary" width="50px" height="50px" alt="Image Not Found">
                                    </td>
                                    <td>
                                        @if($service->status == 1)
                                            <a href="">
                                                <span class="badge badge-success p-2">Active</span>
                                            </a>
                                        @else
                                        <a href="">
                                            <span class="badge badge-danger p-2">Disabled</span>
                                        </a>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="#">
                                            <a href="/admin/service-edit/{{ $service->id }}" class="btn btn-success btn-circle btn-sm">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                        </a>
                                        <form method="post" class="d-inline" action="/admin/service-delete/{{ $service->id }}">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-danger btn-circle btn-sm" onClick="return confirm('Are you sure you want to Delete Record')"; title="Delete Record"><i class="fas fa-trash"></i></button>

                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
