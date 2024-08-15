@extends('frontend.layouts.main')
@section('title', 'Contact')
@section('main-container')
    <!-- Breadcrumb -->
    <div class="breadcrumb-area"
        style="background: linear-gradient(rgba(0, 38, 153, 0.8) 100%, rgba(0, 38, 153, 0.8) 100%), url({{ url('frontend/images/breadcrumb/contact.png') }});">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-info text-center">
                        <h1 class="text-white">Contact Us</h1>
                        <p class="text-white "><a href="{{ url('/') }}">Home</a><i
                                class="far fa-chevron-double-right"></i> Contact Us</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->
    <!-- Contact Wrap -->
    <div class="contact-info-area pt-120 pb-120 position-relative">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-xl-4 col-lg-5">
                    <div class="contact-page-info-wrap">
                        <div class="section-title">
                            <span class="text-white">Contact us</span>
                            <h2 class="text-white">Contact our skilled IT staff to know more</h2>
                        </div>
                        <div class="address-box address-box-style-two d-flex align-items-center mt-5">
                            <i class=" fas fa-phone-alt"></i>
                            <div class="address-info">
                                <p class="color-low-white">Call for a consultation now!</p>
                                <h2 class="text-white"><a href="tel:1232460888">(123) 246-0888</a></h2>
                            </div>
                        </div>
                        <div class="address-box address-box-style-two mt-5 d-flex align-items-center">
                            <i class="fas fa-envelope"></i>
                            <div class="address-info">
                                <p class="color-low-white">Write to us</p>
                                <h2 class="text-white"><a href="mailto:example@gmail.com">example@gmail.com</a></h2>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-7 mobt-60">
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success alert-block p-4 border-left-success">
                            <strong>
                                {{ $message }}
                            </strong>
                        </div>
                    @endif
                    <form action="{{ url('/contact') }}" method="post" class="site-form site-form-style-two p-0 position-relative">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6">
                                <label>Your name <i class="fas fa-asterisk"></i></label>
                                <input type="text" name="name" required>
                                @if ($errors->has('name'))
                                    <span class="text-danger">
                                        {{ $errors->first('name') }}
                                    </span>
                                @endif
                            </div>
                            <div class="col-lg-6">
                                <label>Email address <i class="fas fa-asterisk"></i></label>
                                <input type="email" name="email" required>
                                @if ($errors->has('email'))
                                    <span class="text-danger">
                                        {{ $errors->first('email') }}
                                    </span>
                                @endif
                            </div>
                            <div class="col-lg-6">
                                <label>Phone number <i class="fas fa-asterisk"></i></label>
                                <input type="tel" name="phone" required>
                                @if ($errors->has('phone'))
                                    <span class="text-danger">
                                        {{ $errors->first('phone') }}
                                    </span>
                                @endif
                            </div>
                            <div class="col-lg-6">
                                <label>Subject <i class="fas fa-asterisk"></i></label>
                                <input type="text" name="subject" required>
                                @if ($errors->has('subject'))
                                    <span class="text-danger">
                                        {{ $errors->first('subject') }}
                                    </span>
                                @endif
                            </div>
                            <div class="col-xl-12 col-lg-12 col-sm-12 col-12">
                                <label>Write your message</label>
                                <textarea name="message" cols="30" rows="4" required></textarea>
                                @if ($errors->has('message'))
                                    <span class="text-danger">
                                        {{ $errors->first('message') }}
                                    </span>
                                @endif
                            </div>
                            <div class="form-btn-wrap">
                                <button type="submit" name="submit"
                                    class="common-btn white-blue border-0 d-inline-block">Send Message</button>
                            </div>
                            <p class="form-message"></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
    <div class="map-wrap map-wrap-two">
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3322.024957607128!2d72.88339327576203!3d33.630594874640224!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x38df9521a8bb8b1d%3A0xcaef5f87a8b7c608!2sFacile%20Solutions!5e0!3m2!1sen!2s!4v1706763634044!5m2!1sen!2s"
            style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
    <!-- Contact Wrap End -->
@endsection
