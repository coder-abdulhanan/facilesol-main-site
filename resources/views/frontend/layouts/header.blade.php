<!--
************************************************************************************************
                        Facile Solutions (UK)
                        Development Date : 14-11-2017
                        Page Updated On : 06-08-2024
************************************************************************************************
-->
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>@yield('title') | {{ config('app.name') }} - IT Services Provider & Consulting Organization</title>
    <meta name="description" content="Facile Solutions UK provides enterprise-level software solutions and services using cutting-edge technology for digital transformation.">
    <meta name="keywords" content="Facile Solutions, FacileSol, Facile EPOS, Facile Solutions UK, Facile Solutions IT Services, FacileSol Consulting, acile Solutions Enterprise Software UK, Software Development UK, Facile EPOS Systems, Facile Solutions Digital Transformation, FacileSol Technology Consulting, Facile Solutions Software Development, Facile EPOS Software, FacileSol IT Solutions, Facile Solutions UK Consulting">
    <meta name="author" content="Facile Solutions UK">
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://www.facilesol.co.uk/">
    <meta property="og:title" content="Facile Solutions UK | IT Services Provider & Consulting Organization">
    <meta property="og:description" content="Facile Solutions UK offers enterprise-level software solutions and IT consulting services using the latest technology.">
    <meta property="og:image" content="{{ url('frontend/images/open-graph.jpg') }}">
    <link rel="canonical" href="https://www.facilesol.co.uk/">
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="https://www.facilesol.co.uk/">
    <meta property="twitter:title" content="Facile Solutions UK | IT Services Provider & Consulting Organization">
    <meta property="twitter:description" content="Facile Solutions UK offers enterprise-level software solutions and IT consulting services using the latest technology.">
    <meta property="twitter:image" content="{{ url('frontend/images/open-graph.jpg') }}">
    <link rel="canonical" href="https://www.facilesol.co.uk/">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ url('frontend/images/favicon/apple-touch-icon.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ url('frontend/images/favicon/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ url('frontend/images/favicon/favicon-16x16.png')}}">
    <link rel="manifest" href="{{ url('frontend/images/favicon/site.webmanifest')}}">
    <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#073792">
    <meta name="msapplication-TileColor" content="#073792">
    <meta name="theme-color" content="#073792">
    <link rel="stylesheet" href="{{ url('frontend/css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ url('frontend/css/nice-select.css') }}">
    <link rel="stylesheet" href="{{ url('frontend/css/swiper-bundle.min.css') }}">
    <link rel="stylesheet" href="{{ url('frontend/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ url('frontend/css/odometer.css') }}">
    <link rel="stylesheet" href="{{ url('frontend/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ url('frontend/css/style.css') }}">
    <link rel="stylesheet" href="{{ url('frontend/css/responsive.css') }}">
</head>
<body>
    <div class="preloader">
        <div class="spinner-wrap">
            <div class="preloader-logo">
                <img src="{{ url('frontend/images/logo.svg') }}" alt="No Image Available" class="img-fluid">
            </div>
            <div class="spinner"></div>
        </div>
    </div>
    <a href="#" id="scroll-top" class="back-to-top-btn"><i class="far fa-long-arrow-up"></i></a>
    <header>
        <div class="menu-address-area position-relative">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <ul class="menu-address-wrap">
                            <li><i class="fas fa-map-marker-alt"></i>S24ND Sheffield, UK</li>
                            <li><i class="fas fa-envelope"></i> <a href="mailto:info@facilesol.co.uk">info@facilesol.co.uk</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-6 ">
                        <ul class="menu-address-wrap menu-address-wrap-two text-lg-end">
                            <li><i class="fas fa-clock"></i> Office Hours: 11:00 AM – 07:00 PM</li>
                            <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
                            <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <nav>
            <div class="header-menu-area for-top-address">
                <div class="container">
                    <div class="row align-items-center gy-2">
                        <div class="col-xxl-2 col-xl-2 col-lg-2 col-sm-6 col-6 ">
                            <div class="logo text-left">
                                <a href="{{url('/')}}"><img src="{{ url('frontend/images/logo.svg') }}"
                                        alt="No Image Available"></a>
                            </div>
                        </div>
                        <div class="col-xxl-10 col-xl-10 col-lg-10 col-sm-6 col-6">
                            <a href="javascript:void(0)" class="hidden-lg hamburger">
                                <span class="h-top"></span>
                                <span class="h-middle"></span>
                                <span class="h-bottom"></span>
                            </a>
                            <nav class="main-nav justify-content-between">
                                <div class="logo mobile-ham-logo d-lg-none d-block text-left">
                                    <a href="{{url('/')}}"><img src="{{ url('frontend/images/logo.svg') }}"
                                            alt="No Image Available"></a>
                                </div>
                                <ul>
                                    <li><a href="{{url('/')}}">Home</a></li>
                                    <li><a href="{{url('/about')}}">About</a></li>
                                    <li><a href="{{url('/services')}}">Services</a></li>
                                    <li><a href="{{url('/projects')}}">Projects</a></li>
                                    <li class="has-child-menu">
                                        <a href="javascript:void(0)">Resources</a>
                                        <i class="fl flaticon-plus">+</i>
                                        <ul class="sub-menu">
                                            <li><a href="#">Resources</a></li>
                                            <li><a href="{{url('/faqs')}}">FAQs</a></li>
                                            <li><a href="#">Terms and Conditions</a></li>
                                            <li><a href="#">Cookie Policy</a></li>
                                            <li><a href="#">Terms of Use</a></li>
                                            <li><a href="#">Privacy Policy</a></li>
                                            <li><a href="#">#GetOnline</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="{{url('/team')}}">Team</a></li>
                                </ul>
                                <div class="menu-btn-wrap d-flex align-items-lg-center flex-shrink-0">
                                    <a class="common-btn white-bg" href="{{url('/contact')}}">Contact Sales</a>
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </header>
