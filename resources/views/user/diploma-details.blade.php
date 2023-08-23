@extends('user.layouts.master-page')

@section('title','الكورسات')

@section('style')


@endsection


@section('content')
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
    <!-- Header  end -->
    <!-- Breadcrumb  start -->
    <section class="breadcrumb-wrap  br-bg-5 h-img-700">
        <div class="overlay op-6 bg-black"></div>
        <div class="container">
            <div class="row">
                <div class="col-xl-8 offset-xl-2 col-lg-10 offset-lg-1 col-md-10 offset-md-1">
                    <div class="breadcrumb-title">
                        <h2>{{trans('diplomas/diplomas.Diploma Details')}}</h2>
                        <ul class="breadcrumb-menu">
                            <li><a href="{{route('site.home')}}">{{trans('diplomas/diplomas.Home')}} </a></li>
                            <li><a href="{{route('diplomas')}}">{{trans('diplomas/diplomas.diplomas')}}</a></li>
                            <li>{{trans('diplomas/diplomas.Diploma Details')}}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Breadcrumb  end -->
    <!-- Instructor Details Section start -->
    <section class="instructor-details-wrap ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 offset-lg-0 col-md-8 offset-md-2 instructor-img">
                    <!-- <div class="instructor-img"> -->

                    @if($diploma->image != null)
                        <img src="{{URL::to('/') . '/Diploma/' . $diploma->title.'/'.$diploma->image}}" alt="Image">
                    @else
                        <img src="{{asset('end-user/assets/img/vecteezygraduation-certificateas0420_generated.jpg')}}"
                             alt="Image">
                @endif
                <!-- </div> -->
                </div>
                <div class="col-lg-8 col-md-12">
                    <ul class="nav nav-tabs course-tablist style2" role="tablist">
                        <li class="nav-item">
                            <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#tab_1" type="button"
                                    role="tab">{{trans('diplomas/diplomas.About')}}</button>
                        </li>
                        <li class="nav-item">
                            <button class="nav-link " data-bs-toggle="tab" data-bs-target="#tab_2" type="button"
                                    role="tab">{{trans('courses/courses.courses')}}</button>
                        </li>

                    </ul>
                    <div class="tab-content insructor-tab-content">
                        <div class="tab-pane fade show active" id="tab_1" role="tabpanel">
                            <h3 class="instructor-title">
                                {!!$diploma->title!!}
                            </h3>
                            <span></span>
                            <p>{!!$diploma->desc!!}</p>

                        </div>
                        <div class="tab-pane fade" id="tab_2" role="tabpanel">
                            @foreach ($courses as $course)


                                <h3 class="instructor-title">
                                    {{$course->title}}
                                </h3>
                            @endforeach


                        </div>
                        <div class="tab-pane fade" id="tab_3" role="tabpanel">
                            <h3 class="instructor-title">
                                Quick Contact
                            </h3>
                            <ul class="footer-contact-address">
                                <li><a href="tel:333435238769"> <i class="ri-phone-line"></i> +333 435 23 8769</a></li>
                                <li><i class="ri-mail-send-fill"></i> <a href="mailto:hellomichele@gmail.com">hellomichele@gmail.com</a>
                                </li>
                                <li><i class="ri-earth-fill"></i> <a
                                        href="https://www.ecour.com">www.michelehishito.me</a></li>
                                <li><i class="ri-map-pin-line"></i>
                                    <p>124 lakedown Street, Holnlu City, Florida, USA</p>
                                </li>
                            </ul>
                            <ul class="social-profile style2">
                                <li><a target="_blank" href="https://facebook.com"><i class="ri-facebook-fill"></i> </a>
                                </li>
                                <li><a target="_blank" href="https://twitter.com"> <i class="ri-twitter-fill"></i> </a>
                                </li>
                                <li><a target="_blank" href="https://linkedin.com"> <i class="ri-linkedin-fill"></i>
                                    </a></li>
                                <li><a target="_blank" href="https://instagram.com"> <i class="ri-instagram-line"></i>
                                    </a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection


@section('script')


@endsection

