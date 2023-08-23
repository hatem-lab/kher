@extends('user.layouts.master-page')

@section('title','معلومات عن الموقع ')

@section('style')


@endsection


@section('content')

    <body>
    <!--Preloader starts-->
    <div class="preloader js-preloader">
        <img src="{{asset('assets/img/brand/logo-1.png')}}" alt="">
    </div>
    <!--Preloader ends-->

    <!-- Theme Switcher Start -->
    <div class="switch-theme-mode">


        <label id="switch" class="switch">
            <input type="checkbox" onchange="toggleTheme()" id="slider">

        </label>
    </div>
    <!-- Theme Switcher End -->

    <!-- page wrapper Start -->
    <div class="page-wrapper">
        <!-- Header  Start -->

        <div class="contact-popup">
            <div class="contact-popup-title">
                <button type="button" class="close-popup"><i class="ri-close-fill"></i></button>
            </div>
            <div class="contact-popup-wrap">
                <div class="comp-info">
                    <div class="comp-logo">
                        <a href="{{route('site.home')}}">
                            <img class="logo-light" src="assets/img/logo.png" alt="Image">
                            <img class="logo-dark" src="assets/img/logo-white.png" alt="Image">
                        </a>
                    </div>
                    <p class="comp-desc">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                        incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                        ullamco laboris nisi ut aliquip</p>
                    <ul class="footer-contact-address">
                        <li><a href="tel:999762236473"> <i class="ri-phone-line"></i> +999 762 23 6473</a></li>
                        <li><i class="ri-mail-send-fill"></i> <a href="mailto:info@ecour.com">info@ecour.com</a></li>
                        <li><i class="ri-earth-fill"></i> <a href="https://www.ecour.com">www.ecour.com</a></li>
                        <li>
                            <i class="ri-map-pin-fill"></i> 24th North Lane, Hill Town, New York
                        </li>
                    </ul>
                </div>
                <div class="comp-map">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3151.8385385572983!2d144.95358331584498!3d-37.81725074201705!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ad65d4dd5a05d97%3A0x3e64f855a564844d!2s121%20King%20St%2C%20Melbourne%20VIC%203000%2C%20Australia!5e0!3m2!1sen!2sbd!4v1612419490850!5m2!1sen!2sbd"></iframe>
                </div>
                <div class="share-on text-center">
                    <ul class="social-profile style2">
                        <li><a target="_blank" href="https://facebook.com"><i class="ri-facebook-fill"></i> </a></li>
                        <li><a target="_blank" href="https://twitter.com"> <i class="ri-twitter-fill"></i> </a></li>
                        <li><a target="_blank" href="https://linkedin.com"> <i class="ri-linkedin-fill"></i> </a></li>
                        <li><a target="_blank" href="https://instagram.com"> <i class="ri-instagram-line"></i> </a></li>
                    </ul>
                </div>
            </div>
        </div>
        <section class="breadcrumb-wrap  br-bg-blog h-img-700">
            <div class="overlay op-6 bg-black"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="breadcrumb-title">
                            <h2>حول الموقع</h2>
                            <ul class="breadcrumb-menu">
                                <li><a href="{{route('site.home')}}">{{trans('Blog/Blog.Home')}}</a></li>
                                <li>حول الموقع</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <br>
        <br>

        <h2 class="text-header-title">حول أكاديمية خير التعليمية</h2>
        @isset($settings->about_desc)

        <div class="promo-content  text-center d-flex penefit_div">
                <div class="div-cont-left">

                    <h2 class="text-header">معلومات حول الموقع</h2>
                    <p class="text-white p-header"><b>{!! $settings->about_desc !!}</b></p>
                </div>
                <div class="w-1000px img-div-about">
                    <img  src="{{asset('assets/img/about.png')}} "/>
                </div>

            </div>
        @endisset
        @isset($settings->goals)

            <div class="promo-content  text-center d-flex penefit_div">
                <div class="w-1000px img-div-about">
                    <img  src="{{asset('assets/img/penefit.jpg')}} "/>
                </div>
                <div class="div-cont-right">

                    <h2 class="text-header">أهداف الموقع</h2>
                    <p class="text-white p-header"><b>{!! $settings->goals !!}</b></p>
                </div>

            </div>
        @endisset




@endsection

@section('script')


@endsection


