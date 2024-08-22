@extends('frontend.layouts.main')
@section('title', 'Blog')
@section('main-container')
<!-- Breadcrumb -->
<div class="breadcrumb-area" style="background: linear-gradient(rgba(0, 38, 153, 0.8) 100%, rgba(0, 38, 153, 0.8) 100%), url({{url('frontend/images/breadcrumb/blog.png')}});">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-info text-center">
                    <h1 class="text-white">Our Blogs</h1>
                    <p class="text-white "><a href="{{url('/')}}">Home</a><i class="far fa-chevron-double-right"></i> Blog</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb End -->
<!-- Blog  -->
<div class="blog-sidebar-area pt-120 pb-96">
    <div class="container">
        <div class="row">
			@foreach ($blogs as $blog)
            <div class="col-lg-6">
                <div class="blog-two-wrap">
                    <div class="blog-img overflow-hidden">
                        <img class="w-100" src="/backend/images/blog_posts/{{$blog->blog_image}}" alt="Image Not Found">
                    </div>
                    <div class="blog-info">
                        <div class="meta-wrap d-flex flex-wrap align-items-center">
                            <p><i class="far fa-user-circle"></i> {{ $blog->author }}</p>
                            <p><i class="fal fa-calendar-minus"></i> {{ $blog->updated_on }}</p>
                        </div>
                        <h2><a href="/blog-details/{{ $blog->id }}">{{ $blog->title }}</a></h2>
                        <p>
                            @if(strlen($blog->details) > 100)
                                {{ substr($blog->details, 0, 100) . '...' }}
                            @else
                                {{ $blog->details }}
                            @endif
                        </p>
                        <a class="d-inline-flex align-items-center blog-btn" href="/blog-details/{{ $blog->id }}">Read More <i class="fas fa-long-arrow-right"></i></a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<!-- Blog End -->
@endsection
