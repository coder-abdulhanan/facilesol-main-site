<!-- Breadcrumb -->
@extends('frontend.layouts.main')
@section('title', 'Blog Details')
@section('main-container')
<div class="breadcrumb-area" style="background: linear-gradient(rgba(0, 38, 153, 0.8) 100%, rgba(0, 38, 153, 0.8) 100%), url({{url('frontend/images/breadcrumb/blog-details.png')}});">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="breadcrumb-info text-center">
                    <h1 class="text-white">Blog Details</h1>
                    <p class="text-white "><a href="{{url('/')}}">Home</a><i class="far fa-chevron-double-right"></i> Details</p>
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
            <div class="col-lg-12">
                <div class="blog-two-wrap design-two overflow-hidden">
                    <img class="w-100" src="assets/images/blog/blog-two-1.png" alt="">
                    <div class="blog-info">
                        <div class="details-content">
                            <div class="details-quote">
                                <p class="text-white">
                                    {{$blog->title}}
                                </p>
                            </div>
                            <br>
                            <div class="blog-img overflow-hidden">
                                <img class="w-100" src="/backend/images/blog_posts/{{$blog->blog_image}}" alt="Image Not Found">
                            </div>
                            <br>
                            <p style="text-align: justify;">
                                {{$blog->details}}
                            </p>
                            <br>
                        </div>
                        <div class="meta-wrap d-flex flex-wrap align-items-center">
                            <p><i class="far fa-user-circle"></i> {{$blog->author}}</p>
                            <p><i class="fal fa-calendar-minus"></i> {{$blog->updated_on}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Blog End -->
@endsection
