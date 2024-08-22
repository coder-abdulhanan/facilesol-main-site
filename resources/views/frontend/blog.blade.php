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
            <div class="col-lg-6">
                <div class="blog-two-wrap">
                    <div class="blog-img overflow-hidden">
                        <img class="w-100" src="{{url('frontend/images/blog/blog-two-3.png')}}" alt="Image Not Found">
                    </div>
                    <div class="blog-info">
                        <div class="meta-wrap d-flex flex-wrap align-items-center">
                            <p><i class="far fa-user-circle"></i> By William Sony</p>
                            <p><i class="fal fa-calendar-minus"></i> Jan 20, 2023</p>
                        </div>
                        <h2><a href="blog-details.html">Relational vs non-relational databases, querying data and what product managers really need to know</a></h2>
                        <p>Welcome to part five of a series of articles covering the technical knowledge that every Product Manager ought to know. Today I’m going to be talking about...</p>
                        <a class="d-inline-flex align-items-center blog-btn" href="blog-details.html">Read More <i class="fas fa-long-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Blog End -->
@endsection
