@extends('user.layouts.master-page')

@section('title','الرئيسية')

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
                        <img class="logo-light" src="{{asset('assets/img/brand/logo-1.png')}}" alt="Image">
                        <img class="logo-dark" src="{{asset('assets/img/brand/logo-1.png')}}" alt="Image">
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

    <!-- //////////////////////////////////////////////////////////////////// -->
    <div id="slider">

        <div class="slides">
            <div class="prom-title-flex">

                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="promo-content  promo-custom promo-tit">
                        <h2 class="text-center titlprom">{{trans('enduser/Home/Home.Khair educational academy')}}</h2>
                        <div>
                            <span class="span-1"> * تمكين</span>
                            <label class="span-1"> * بناء</label>
                            <span class="span-1"> * قيم</span>
                        </div>
                    </div>
                    @if(!auth('student')->user() && !auth('user')->user())
                        <div class=buttn-wig>
                            <a href="{{route('site.getRegister')}}"> <button class=" button button-wiggle3 "><span>انضم الآن</span></button></a>
                        </div>
                    @endif
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="promo-img-wrap">
                        <div class="promo-img  promo-bg-1">
                            @if($video)
                                <a class="video-play circle style1" href="{{URL::asset($video)}}"> <i
                                        class="ri-play-fill"></i> </a>
                            @else
                                <a class="video-play circle style1" href="https://www.youtube.com/watch?v=xHegpKx61eE"> <i
                                        class="ri-play-fill"></i> </a>
                            @endif
                        </div>
                    </div>

                </div>

            </div>
            <div class="overlay"></div>

        </div>

        <div class="slides ">
            @if(!auth('student')->user() && !auth('user')->user())
                <div class=reg>
                    <a href="{{route('site.getRegister')}}"><button class=" button button-wiggle1 button-pulse"><span>انضم الآن</span></button></a>
                </div>
            @endif
            <img src="{{URL::asset($settingImage[0]->path)}}" width="100%" class=""/>

            <div class="content-slider">
                <div class="sb-description">
                    <h3 id="myText">{{$settingImage[0]->caption}}</h3>
                </div>
                <div class="row justify-content-evenly">


                            <span class="col-lg-4 col-md-4 col-sm-12 neons">
                                تمكين
                            </span>
                    <span class="col-lg-4 col-md-4 col-sm-12 dis1">
                                بناء
                            </span>
                    <span class="col-lg-4 col-md-4 col-sm-12 dis1">
                                قيم
                            </span>
                </div>
            </div>
            <!-- <div class="overlay"></div> -->

        </div>


        <div class="slides ">
            @if(!auth('student')->user())
                <div class=reg>
                    <a href="{{route('site.getRegister')}}"><button class=" button button-wiggle1 button-pulse"><span>انضم الآن</span></button></a>
                </div>
            @endif
            <img src="{{URL::asset($settingImage[1]->path)}}" width="100%"/>
            <div class="content-slider">
                <div class="sb-description">
                    <h3 id="myText">{{$settingImage[1]->caption}}</h3>
                </div>
                <div class="row justify-content-evenly">


        <span class="col-lg-4 col-md-4 dis1">
            تمكين
        </span>
                    <span class="col-lg-4 col-md-4 neons">
            بناء
        </span>
                    <span class="col-lg-4 col-md-4 dis1">
            قيم
        </span>
                </div>
            </div>
            <!-- <div class="overlay"></div> -->
        </div>

        <div class="slides">
            @if(!auth('student')->user())
                <div class=reg>
                    <a href="{{route('site.getRegister')}}"><button class=" button button-wiggle1 button-pulse"><span>انضم الآن</span></button></a>
                </div>
            @endif
            <img src="{{URL::asset($settingImage[2]->path)}}" width="100%"/>
            <div class="content-slider">
                <div class="sb-description">
                    <h3 id="myText">{{$settingImage[2]->caption}}</h3>
                </div>
                <div class="row justify-content-evenly">

            <span class="col-lg-4 col-md-4 dis1">
                تمكين
            </span>
                    <span class="col-lg-4 col-md-4 dis1">
                بناء
            </span>
                    <span class="col-lg-4 col-md-4 neons">
                قيم
            </span>
                </div>
            </div>
            <!-- <div class="overlay"></div> -->
        </div>

        <div id="dot">
            <span class="dot"></span>
            <span class="dot"></span>
            <span class="dot"></span>
            <span class="dot"></span>

        </div>
    </div>
    </div>

    <div id="1" class=" mt-200">
        <div class="section-title style1 text-center mb-34 mt-80">

            <h2>{{trans('enduser/Home/Home.About Acadimic')}}<h2>
        </div>


        <div class="all-button-tabs">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-3 col-md-6 col-sm-6 col-6 d-flex justify-content-center align-items-center">
                        <div class="card my-5 h-200px">
                            <img src="end-user/assets/img/2.jpg" class="card-img-top" alt="...">
                            <h5 class="card-title1 text-light">
                                {{trans('enduser/Home/Home.About Acadimic')}}
                            </h5>
                            <a id="tabs-1" class="btnn btn-light"
                               onclick="myFunction()">{{trans('enduser/Home/Home.Show More')}}</a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-6 d-flex justify-content-center align-items-center"
                         id="tabs-2">
                        <div class="card my-5 h-200px">
                            <img src="end-user/assets/img/3.jpg" class="card-img-top" alt="...">
                            <h5 class="card-title1 text-light">
                                {{trans('enduser/Home/Home.messages Akadimic')}}
                            </h5>
                            <a id="tabs-2" class="btnn btn-light">{{trans('enduser/Home/Home.Show More')}}</a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-6 d-flex justify-content-center align-items-center"
                         id="tabs-4">
                        <div class="card my-5 h-200px">
                            <img src="end-user/assets/img/5.jpg" alt="..." class="card-img-top">
                            <h5 class="card-title1 text-light">
                                {{trans('enduser/Home/Home.Benefits Acadimic')}}
                            </h5>
                            <a id="tabs-4" class="btnn btn-light">{{trans('enduser/Home/Home.Show More')}}</a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-6 d-flex justify-content-center align-items-center"
                         id="tabs-3">
                        <div class="card my-5 h-200px">
                            <img src="end-user/assets/img/diploma_l3ifd1.jpg" alt="..." class="card-img-top">
                            <h5 class="card-title1 text-light">
                                {{trans('enduser/Home/Home.objective Akadimic')}}
                            </h5>
                            <a id="tabs-3" class="btnn btn-light">{{trans('enduser/Home/Home.Show More')}}</a>
                        </div>
                    </div>

                </div>
            </div>
            </section>
        </div>

        <!-- //////////////////////////////////////////////////////// -->
        <div class="content-tabs">
            <div class="container">

                <div class=" tabs-content-1 text-center" id="tabs-content-1" style='display: none'>

                    <h5 class="text-center fs-30"
                        style="color: #1d70b7">{{trans('enduser/Home/Home.Khair educational academy')}}</h5>
                    <div class="row mb-20">

                        <div class="col-md-11 col-sm-11"><span
                                class="m-b-10 fs-20">{{trans('enduser/Home/Home.text-1')}}</span></div>
                    </div>
                    <div class="row mb-20">

                        <div class="col-md-11"><span class="m-b-10 fs-20">{{trans('enduser/Home/Home.text-13')}}</span>
                        </div>
                    </div>
                    <div class="row">

                        <div class="col-md-11"><span class="m-b-10 fs-20">{{trans('enduser/Home/Home.text-14')}}</span>
                        </div>
                    </div>
                </div>


                <div class=" tabs-content-2 text-center" id="tabs-content-2" style='display: none'>
                    <h5 class="text-center fs-30"
                        style="color: #1d70b7">{{trans('enduser/Home/Home.messages Akadimic')}}</h5>
                    <div class="row mb-20">

                        <div class="col-md-11 "><span class="fs-20">{{trans('enduser/Home/Home.text-2')}}</span></div>
                    </div>
                    <div class="row mb-20">

                        <div class="col-md-11"><span class="m-b-10 fs-20">{{trans('enduser/Home/Home.text-17')}}</span>
                        </div>
                    </div>
                </div>

                <div class=" tabs-content-3  mb-50 text-center" id="tabs-content-3" style='display: none'>
                    <h5 class="text-center fs-30"
                        style="color: #1d70b7">{{trans('enduser/Home/Home.objective Akadimic')}}</h5>
                    <div class="row mb-20">

                        <div class="col-md-11"><span class="fs-20">{{trans('enduser/Home/Home.text-3')}}</span></div>
                    </div>
                    <div class="row mb-20">

                        <div class="col-md-11"><span class="m-b-10 fs-20">{{trans('enduser/Home/Home.text-4')}}</span>
                        </div>
                    </div>
                    <div class="row mb-20">

                        <div class="col-md-11"><span class="m-b-10 fs-20">{{trans('enduser/Home/Home.text-5')}}</span>
                        </div>
                    </div>

                </div>
                <div class="tabs-content-4  mb-50 text-center" id="tabs-content-4" style='display: none'>
                    <h5 class="text-center fs-30"
                        style="color: #1d70b7">{{trans('enduser/Home/Home.vision Akadimic')}}</h5>
                    <div class="row mb-10">
                        <div class="col-md-11"><span
                                class="m-b-10 fs-20 text-center">{{trans('enduser/Home/Home.text-6')}}</span></div>
                    </div>
                </div>


            </div>
        </div>
    </div>


    <!-- //////////////////////////////////////////////////////// -->

    </div>

    </div>

    <!--- ============================================================ -->

    <!-- <div class="start-new"> -->

                <div class="section-title style1 text-center mb-34 d-flex justify-content-center algin-item-center">

                    <h2>{{trans('enduser/Home/Home.Our Popular Online Courses')}}</h2>
                </div>

        <!-- <div class="body2"> -->
            <section class="container">
                <div class="row card-row">
                    @foreach($courses as $course)
                    <div class="col-lg-2 col-md-4 col-12 card cardd">
                    <div class="course-img">
                                    @if($course->image != null)
                                        <img src="{{URL::to('/') . '/Course/' . $course->title.'/'.$course->image}}"
                                            alt="">
                                    @else
                                        <img class="img-fluid" src="{{asset('end-user/assets/img/Learn-Quran-For-Kids.png')}}"
                                            alt="">
                                    @endif
                                </div>
                                <div class="content-title">
                                    <h2 class="title-caedd"><a
                                            href="{{ route('coursedetails', $course->id) }}">{{$course->title}}</a></h2>
                                     <div class="copy-div">
                                         <p class="copy">{!! \Illuminate\Support\Str::limit($course->desc, 200) !!} ...</p>
                                     </div>
                                    <a href="{{ route('coursedetails', $course->id) }}">
                                        <button class="btn btn-cour">{{ trans('courses/courses.read_more') }}</button>
                                    </a>
                                </div>
                    </div>
                @endforeach
                </div>
                <!-- <div class="card_outer row justify-content-center d-flex  align-items-center" >
                    @foreach($courses as $course)
                        <div class="cardd d-flex justify-content-center align-items-center">
                            <div class="course-img">
                                @if($course->image != null)
                                    <img src="{{URL::to('/') . '/Course/' . $course->title.'/'.$course->image}}"
                                         alt="">
                                @else
                                    <img src="{{asset('end-user/assets/img/Learn-Quran-For-Kids.png')}}"
                                         alt="">
                                @endif
                            </div>
                            <div class="content-title">
                                <h2 class="title-caedd "><a
                                        href="{{ route('coursedetails', $course->id) }}">{{$course->title}}</a></h2>
                                <p class="copy">{!! \Illuminate\Support\Str::limit($course->desc, 200) !!} ...</p>
                                <a href="{{ route('coursedetails', $course->id) }}">
                                    <button class="btn btn-cour">{{ trans('courses/courses.read_more') }}</button>
                                </a>
                            </div>
                        </div>
                    @endforeach

                </div> -->
            </section>
        <!-- </div> -->
        <div class="btn-re">

            <a href="{{ route('courses') }}"><button class=" button button-wiggle"><span>{{trans('enduser/Home/Home.All Courses')}}</span></button></a>
        </div>
    <!-- </div> -->


    <div>
        <div class="header">


            <!--Content before waves-->
            <div class="inner-header flex">
                <div class=" style1 text-center mb-34 mt-80">

                    <h2>{{trans('enduser/Home/Home.Acadimic achievements')}}</h2>
                </div>


            </div>
            <div class="all-button-tabs">
                <div class="col-sm-3">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" class="side-menu__icon">
                        <path
                            d="M622.34 153.2L343.4 67.5c-15.2-4.67-31.6-4.67-46.79 0L17.66 153.2c-23.54 7.23-23.54 38.36 0 45.59l48.63 14.94c-10.67 13.19-17.23 29.28-17.88 46.9C38.78 266.15 32 276.11 32 288c0 10.78 5.68 19.85 13.86 25.65L20.33 428.53C18.11 438.52 25.71 448 35.94 448h56.11c10.24 0 17.84-9.48 15.62-19.47L82.14 313.65C90.32 307.85 96 298.78 96 288c0-11.57-6.47-21.25-15.66-26.87.76-15.02 8.44-28.3 20.69-36.72L296.6 284.5c9.06 2.78 26.44 6.25 46.79 0l278.95-85.7c23.55-7.24 23.55-38.36 0-45.6zM352.79 315.09c-28.53 8.76-52.84 3.92-65.59 0l-145.02-44.55L128 384c0 35.35 85.96 64 192 64s192-28.65 192-64l-14.18-113.47-145.03 44.56z"/>
                    </svg>
                    <span data-max={{$diplomas_num}} class="text-white font-size-adchivment text-center">+</span>
                    <br>
                    <span
                        class="text-white font-size-adchivment text-center display-block m-t-30">{{trans('enduser/Home/Home.diploma')}}</span>
                </div>
                <div class="col-sm-3">
                    <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 576 512">
                        <path
                            d="M542.22 32.05c-54.8 3.11-163.72 14.43-230.96 55.59-4.64 2.84-7.27 7.89-7.27 13.17v363.87c0 11.55 12.63 18.85 23.28 13.49 69.18-34.82 169.23-44.32 218.7-46.92 16.89-.89 30.02-14.43 30.02-30.66V62.75c.01-17.71-15.35-31.74-33.77-30.7zM264.73 87.64C197.5 46.48 88.58 35.17 33.78 32.05 15.36 31.01 0 45.04 0 62.75V400.6c0 16.24 13.13 29.78 30.02 30.66 49.49 2.6 149.59 12.11 218.77 46.95 10.62 5.35 23.21-1.94 23.21-13.46V100.63c0-5.29-2.62-10.14-7.27-12.99z"/>
                    </svg>
                    <span data-max={{$course_num}} class="text-white font-size-adchivment text-center">+</span><br>
                    <span
                        class="text-white font-size-adchivment text-center display-block m-t-30">{{trans('enduser/Home/Home.Courses')}}</span>
                </div>
                <div class="col-sm-3">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="side-menu__icon">
                        <path
                            d="M319.4 320.6L224 416l-95.4-95.4C57.1 323.7 0 382.2 0 454.4v9.6c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48v-9.6c0-72.2-57.1-130.7-128.6-133.8zM13.6 79.8l6.4 1.5v58.4c-7 4.2-12 11.5-12 20.3 0 8.4 4.6 15.4 11.1 19.7L3.5 242c-1.7 6.9 2.1 14 7.6 14h41.8c5.5 0 9.3-7.1 7.6-14l-15.6-62.3C51.4 175.4 56 168.4 56 160c0-8.8-5-16.1-12-20.3V87.1l66 15.9c-8.6 17.2-14 36.4-14 57 0 70.7 57.3 128 128 128s128-57.3 128-128c0-20.6-5.3-39.8-14-57l96.3-23.2c18.2-4.4 18.2-27.1 0-31.5l-190.4-46c-13-3.1-26.7-3.1-39.7 0L13.6 48.2c-18.1 4.4-18.1 27.2 0 31.6z"/>
                    </svg>
                    <span data-max={{$students_num}} class="text-white font-size-adchivment text-center">+</span>
                    <br>
                    <span
                        class="text-white font-size-adchivment text-center display-block m-t-30">{{trans('enduser/Home/Home.Student')}}</span>
                </div>
                <div class="col-sm-3">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="side-menu__icon">
                        <path
                            d="M320 448v40c0 13.255-10.745 24-24 24H24c-13.255 0-24-10.745-24-24V120c0-13.255 10.745-24 24-24h72v296c0 30.879 25.121 56 56 56h168zm0-344V0H152c-13.255 0-24 10.745-24 24v368c0 13.255 10.745 24 24 24h272c13.255 0 24-10.745 24-24V128H344c-13.2 0-24-10.8-24-24zm120.971-31.029L375.029 7.029A24 24 0 0 0 358.059 0H352v96h96v-6.059a24 24 0 0 0-7.029-16.97z"/>
                    </svg>
                    <span data-max={{$lecture_num}} class="text-white font-size-adchivment text-center">+</span><br>
                    <span
                        class="text-white font-size-adchivment text-center display-block m-t-30">{{trans('enduser/Home/Home.Lectture')}}</span>
                </div>
            </div>
            <!--Waves Container-->
            <div>
                <svg class="waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                     viewBox="0 24 150 28" preserveAspectRatio="none" shape-rendering="auto">
                    <defs>
                        <path id="gentle-wave"
                              d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z"/>
                    </defs>
                    <g class="parallax">
                        <use xlink:href="#gentle-wave" x="48" y="0" fill="rgba(255,255,255,0.7"/>
                        <use xlink:href="#gentle-wave" x="48" y="3" fill="rgba(255,255,255,0.5)"/>
                        <use xlink:href="#gentle-wave" x="48" y="5" fill="rgba(255,255,255,0.3)"/>
                        <use xlink:href="#gentle-wave" x="48" y="7" fill="#fff"/>
                    </g>
                </svg>
            </div>
        </div>


        <!-- Team Section Start -->
        <section class="team-wrap">
            <div class="container">


                        <div class="section-title style1 text-center mb-40 d-flex justify-content-center algin-item-center">
                            <h2>{{trans('enduser/Home/Home.Our Team Member')}}</h2>
                        </div>


                <div class="row justify-content-center">
                    @foreach($users as  $user)
                        <div
                            class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-6 d-flex justify-content-center align-items-center">
                            <div class="team-member">
                                <div class="team-member-img">
                                    @if($user -> profile)
                                        @if($user -> profile ->image != null)
                                            <img
                                                src="{{URL::to('/') . '/Profile/' . $user ->name.'/'. $user -> profile->image}}"
                                                alt="Image">
                                        @else
                                            <img src="{{asset('end-user/assets/img/avatar-male.png')}}" alt="Image">
                                        @endif
                                    @else
                                        <img src="{{asset('end-user/assets/img/avatar-male.png')}}" alt="Image">

                                    @endif
                                    {{--                            <ul class="social-profile style1">--}}
                                    {{--                                <li><a target="_blank" href="https://facebook.com"><i class="ri-facebook-fill"></i> </a></li>--}}
                                    {{--                                <li><a target="_blank" href="https://linkedin.com"> <i class="ri-linkedin-fill"></i> </a></li>--}}
                                    {{--                                <li><a target="_blank" href="https://twitter.com"> <i class="ri-twitter-fill"></i> </a></li>--}}
                                    {{--                            </ul>--}}
                                </div>
                                <div class="team-member-info">
                                    <a href="#"><h4>{{$user ->name}}</h4></a>
                                    <p>{{App\Helpers\General::roleUser($user -> role) }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </section>

        <style>:root {
                --n: 5
            }</style>
        <div class="htmll">
            <div class="section-title style1 text-center mb-34 d-flex justify-content-center algin-item-center">

                <h2>{{trans('enduser/Home/Home.Benefits Acadimic')}}<h2>
            </div>
            <div class="bodyy">

                <article data-year="{{trans('enduser/Home/Home.title-1')}}" style="--idx: 0; --slist: #fff251,#ffb258"
                         class="mt-30px">

                    <p>{{trans('enduser/Home/Home.text-3')}}</p>
                </article>
                <article data-year="{{trans('enduser/Home/Home.title-2')}}" style="--idx: 1; --slist: #fdb970,#ff8588">
                    <!-- <h3>brownie</h3> -->
                    <p>{{trans('enduser/Home/Home.text-14')}}</p>
                </article>
                <article data-year="{{trans('enduser/Home/Home.title-3')}}" style="--idx: 2; --slist: #fc7190,#d2659e">

                    <p>{{trans('enduser/Home/Home.text-17')}}</p>
                </article>
                <article data-year="{{trans('enduser/Home/Home.title-4')}}" style="--idx: 3; --slist: #de99cf,#9d5a86">
                    <p>{{trans('enduser/Home/Home.text-2')}}</p>
                </article>
                <article data-year="{{trans('enduser/Home/Home.title-5')}}" style="--idx: 4; --slist: #50ccca,#4aa3b5">
                    <p>{{trans('enduser/Home/Home.text-13')}}</p>
                </article>

            </div>
        </div>
        <!-- //=======================section feature Acadimic==================== -->
        <!-- Testimonial section end -->
        <!-- Blog Section Start -->
        <section class="blog-wrap">
            <div class="container">
                <div class="row ">
                    <div class="col-md-12">
                        <div class="section-title style1 text-center mb-40 mt-30">
                            <h2>{{trans('enduser/Home/Home.Latest News & Blogs')}}</h2>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    @foreach($blogs as $blog)
                        <div
                            class="col-xl-2  col-lg-3 col-md-4 col-sm-6 col-6 d-flex justify-content-center align-items-center">
                            <div class="blog-card">
                                <a href="{{route('blog_details',$blog->id)}}" class="blog-img">
                                    @if($blog->image != null)
                                        <img style="height:212px;width: 370px"
                                             src="{{URL::to('/') . '/Blogs/' . $blog->id.'/'.$blog->image}}" alt="Image"
                                             class="image-bolg">
                                    @else
                                        <img style="height:212px;width: 370px"
                                             src="{{asset('end-user/assets/img/Crafting-the-Blog-opt-750x498.jpg')}}"
                                             alt="Image" class="image-bolg">
                                    @endif
                                </a>
                                <div class="blog-info">
                                    <div class="blog-date">
                                        <h6>{{$blog->created_at->diffforhumans()}}</h6>
                                    </div>
                                    <h3><a href="{{route('blog_details',$blog->id)}}">{!!$blog->title!!}</a></h3>

                                    <div class="blog-author-wrap ">
                                        <div class="blog-author">
                                            <div class="blog-author-img">
                                                <img src="{{asset('end-user/assets/img/avatar-male.png')}}" alt="Image"
                                                     class="image-blog-person">
                                            </div>
                                            <div class="blog-author-name">
                                                <p>{{trans('enduser/Home/Home.By')}} <a
                                                        href="{{route('blog_details',$blog->id)}}"> {{$blog->user->name}}</a>
                                                </p>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
@endsection


@section('script')



@endsection


