@extends('user.layouts.master-page')

@section('title',trans('tests/tests.test_details'))

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
    <!-- Breadcrumb start -->
    <section class="breadcrumb-wrap bg-f br-bg-7 h-img-700">
        <div class="overlay op-6 bg-black"></div>
        <div class="container">
            <div class="row">
                <div class="col-xl-8 offset-xl-2 col-lg-10 offset-lg-1 col-md-10 offset-md-1">
                    <div class="breadcrumb-title">
                        <h2>{{trans('tests/tests.Test Details')}}</h2>
                        <ul class="breadcrumb-menu">
                            <li><a href="{{route('site.home')}}">{{trans('tests/tests.Home')}} </a></li>
                            <li><a href="{{route('student_tests')}}">{{trans('tests/tests.Tests')}} </a></li>
                            <li>{{$test->title}}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb  end -->
    <!-- Course Details Section start -->
    <section class="course-details-wrap ptb-100">
        <div class="container">
            <div class="row gx-5">
                <div class="col-lg-8">
                    <div class="course-details">
                        <div class="course-details-img">
                            <img src="{{asset('end-user/assets/img/test_.png')}}" alt="Image">
                        </div>
                        <ul class="course-details-meta">
                            <li><i class="las la-clock"></i>{{trans('tests/tests.Date')}}
                                : {{\Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $test->date)->format('d-m-Y')}}</li>
                            <li><i class="las la-graduation-cap"></i>{{trans('tests/tests.Time')}}
                                : {{\Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $test->date)->format('H:i')}}</li>
                            <li><i class="lar la-calendar"></i>{{trans('tests/tests.Duration')}}
                                : {{$test->duration}}{{trans('tests/tests.minutes')}} </li>
                        </ul>
                        <ul class="nav nav-tabs course-tablist" role="tablist">
                            <li class="nav-item">
                                <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#tab_1"
                                        type="button" role="tab">{{trans('tests/tests.Description')}}</button>
                            </li>

                        </ul>
                        <div class="tab-content course-tab-content">
                            <div class="tab-pane fade show active" id="tab_1" role="tabpanel">
                                <h5 class="mt-0">{{$test->title}}</h5>
                                <p>{!! $test->desc !!}</p>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="course-details-widget sidebar-box">
                        <ul>
                            <li>
                                <p><i class="las la-user-graduate"></i>{{trans('tests/tests.Diploma')}}</p>
                                <p>{{$test->course->diploma->title}}</p>
                            </li>
                            <li>
                                <p><i class="las la-file-alt"></i>{{trans('tests/tests.Course')}}</p>
                                <p>{{$test->course->title}}</p>
                            </li>
                            <li>
                                <p><i class="las la-clock"></i>{{trans('tests/tests.Date')}}</p>
                                <p>{{\Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $test->date)->format('d-m-Y')}}</p>
                            </li>
                            <li>
                                <p><i class="las la-question-circle"></i>{{trans('tests/tests.Time')}}</p>
                                <p>{{\Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $test->date)->format('H:i')}}</p>
                            </li>
                            <li>
                                <p><i class="las la-check-square"></i>{{trans('tests/tests.Duration')}}</p>
                                <p>{{$test->duration}}</p>
                            </li>
                            <li>
                                <p><i class="las la-check-square"></i>{{trans('tests/tests.weight')}}</p>
                                <p>{{$test->weight}}</p>
                            </li>
                        </ul>
                    </div>
                    <div class="course-enroll-widget sidebar-box">

                        @if($test->done_status_code == 1)
                            <div class="single-course-price">
                                {{trans('tests/tests.you_mark')}}: {{$test->total_mark}}
                            </div>
                        @elseif($test->done_status_code == 3)
                            <a href="{{route('student.test.questions', $test->id)}}"
                               class="v3">{{trans('tests/tests.apply_now')}}</a>
                        @elseif($test->done_status_code == 2)
                            <span class="single-course-price">{{trans('tests/tests.up_coming')}}</span>
                        @else
                            <span class="single-course-price">{{trans('tests/tests.you_miss')}}</span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Course Details Section end -->

@endsection

@section('script')


@endsection


