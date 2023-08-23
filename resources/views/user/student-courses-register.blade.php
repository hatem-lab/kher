@extends('user.layouts.master-page')

@section('title','طلبات التسجيل بالكورسات')

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
                    <a href="{{route('site.home')}}"> <img src="assets/img/logo.png" alt="Image"></a>
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
    <section class="breadcrumb-wrap br-bg-4 h-img-700">
        <div class="overlay op-6 bg-black"></div>
        <div class="container">
            <div class="row">
                <div class="col-xl-8 offset-xl-2 col-lg-10 offset-lg-1 col-md-10 offset-md-1">
                    <div class="breadcrumb-title">
                        <h2>{{trans('enduser/Header/Header.COURSES')}}</h2>
                        <ul class="breadcrumb-menu">
                            <li><a href="{{route('site.home')}}">{{trans('courses/courses.Home')}}</a></li>
                            <li>{{trans('courses/courses.courses')}}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb  end -->

    <!-- Team Section Start -->
    <section class="team-wrap pt-100 pb-70">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title style1 text-center mb-40">
                        <h2>{{trans('enduser/Header/Header.COURSES')}}</h2>
                        <!-- <h2>Our Team Member</h2> -->
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($courses as $course)


                    <div class="col-lg-2 col-md-3 col-12">
                        <div class="team-member m-r-34">
                            <div class="team-member-img">
                                @if($course->image != null)
                                    <a href="{{route('coursedetails',$course->course->id)}}"><img
                                            src="{{URL::to('/') . '/Course/' . $course->title.'/'.$course->image}}"
                                            alt="Image"></a>
                                @else
                                    <a href="{{route('coursedetails',$course->course->id)}}"><img
                                            src="{{asset('end-user/assets/img/How-to-Create-an-Online-Course.webp')}}"
                                            alt="Image"></a>
                                    <!-- <ul class="social-profile style1">
                                        <li><a target="_blank" href="https://facebook.com"><i class="ri-facebook-fill"></i> </a></li>
                                        <li><a target="_blank" href="https://linkedin.com"> <i class="ri-linkedin-fill"></i> </a></li>
                                        <li><a target="_blank" href="https://twitter.com"> <i class="ri-twitter-fill"></i> </a></li>
                                    </ul> -->
                                @endif
                            </div>
                            <div class="team-member-info">
                                <h4><a href="{{route('coursedetails',$course->course->id)}}">{!!$course->title!!}</a>
                                </h4>
                                <div class=" showcourse team-member-info" style="overflow:hidden">
                                    <div id="basic-desc">
                                        {!!$course->course->desc!!}
                                    </div>
                                </div>
                                <div class="toggleHolder p-b-1">
                                    <button
                                        class=" descShow toggler-3  btn-toggle">{{trans('enduser/Home/Home.Show More')}}</button>
                                    <button
                                        class="toggler-4 btn-toggle-close">{{trans('enduser/Home/Home.Show Less')}}</button>
                                </div>
                            </div>

                        </div>
                    </div>
                @endforeach


            </div>
        </div>
    </section>
    <!-- Team Section end -->
@endsection

@section('script')


@endsection



