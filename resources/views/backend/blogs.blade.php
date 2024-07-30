@extends('backend.layouts.main')
@section('title', 'Blogs')
@section('main-container')
            <div class="container-fluid"><br>
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary"><a href="{{ route('admin.home') }}">Main Menu</a> | Blogs List</h6>
                        <a href="{{ route('blog.add')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm float-right"><i
                        class="fas fa-plus fa-sm text-white-50"></i>Add New Blog</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th>Details</th>
                                    <th>Author</th>
                                    <th>Blog Date</th>
                                    <th>Blog Thumbnail</th>
                                    <th>Author Thumbnail</th>
                                    <th>Status</th>
                                    <th width="160px">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($blog as $blog)
                                <tr>
                                    <td>{{ $blog->id }}</td>
                                    <td>{{ $blog->title }}</td>
                                    <td>{{ $blog->details }}</td>
                                    <td>{{ $blog->author }}</td>
                                    <td>{{ $blog->updated_on }}</td>
                                    <td>
                                        <img src="/backend/images/blog_posts/{{$blog->blog_image}}" class="rounded border border-primary" width="100px" height="100px" alt="Image Not Found">
                                    </td>
                                    <td>
                                        <img src="/backend/images/blog_authors/{{$blog->author_image}}" class="rounded-circle border border-primary" width="50px" height="50px" alt="Image Not Found">
                                    </td>
                                    <td>
                                        @if($blog->status == 1)
                                            <a href="">
                                                <span class="badge badge-success p-2">Active</span>
                                            </a>
                                        @else
                                        <a href="">
                                            <span class="badge badge-secondary p-2">Disabled</span>
                                        </a>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="#">
                                            <a href="/admin/blog-edit/{{ $blog->id }}" class="btn btn-success btn-circle btn-sm">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                        </a>
                                        <form method="post" class="d-inline" action="/admin/blog-delete/{{ $blog->id }}">
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
