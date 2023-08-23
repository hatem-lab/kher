@extends('user.layouts.master-page')

@section('title',trans('general.all_notifications'))

@section('style')
    <style>

        body {
            font-family: "Roboto", sans-serif;
            background: #EFF1F3;
            min-height: 100vh;
            position: relative;
        }

        .section-50 {
            padding: 50px 0;
        }

        .m-b-50 {
            margin-bottom: 50px;
        }

        .dark-link {
            color: #333;
        }

        .heading-line {
            position: relative;
            padding-bottom: 5px;
        }

        .heading-line:after {
            content: "";
            height: 4px;
            width: 75px;
            background-color: #29B6F6;
            position: absolute;
            bottom: 0;
            left: 0;
        }

        .notification-ui_dd-content {
            margin-bottom: 30px;
        }

        .notification-list {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-pack: justify;
            -ms-flex-pack: justify;
            justify-content: space-between;
            padding: 20px;
            margin-bottom: 7px;
            background: #fff;
            -webkit-box-shadow: 0 3px 10px rgba(0, 0, 0, 0.06);
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.06);
        }

        .notification-list--unread {
            border-right: 2px solid #29B6F6;
        }

        .notification-list .notification-list_content {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
        }

        .notification-list .notification-list_content .notification-list_img img {
            height: 48px;
            width: 48px;
            border-radius: 50px;
            margin-right: 20px;
        }

        .notification-list .notification-list_content .notification-list_detail p {
            margin-bottom: 5px;
            line-height: 1.2;
        }

        .notification-list .notification-list_feature-img img {
            height: 48px;
            width: 48px;
            border-radius: 5px;
            margin-left: 20px;
        }
    </style>

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
    <section class="breadcrumb-wrap  br-bg-notifcation h-img-700">
        <div class="overlay op-6 bg-black"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumb-title">

                        <h2>{{trans('general.all_notifications')}}</h2>
                        <ul class="breadcrumb-menu">
                            <li><a href="{{route('site.home')}}">{{trans('courses/courses.Home')}}</a></li>
                            <li>{{trans('general.all_notifications')}}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb  end -->
    <!-- Project Section start -->

    <!-- Tour Details Section start -->
    <section class="section-50">
        <div class="container">
            <div class="notification-ui_dd-content">
                @foreach($nots as $not)
                    <div class="notification-list">
                        <a href="{{$not['link']}}" target="_blank">
                            <div class="notification-list_content">


                                <div class="notification-list_detail">
                                    <p>{{$not['title']}}</p>
                                    <p class="text-muted">{{$not['message']}}</p>
                                    <p class="text-muted"><small>{{$not['notDate']}}</small></p>
                                </div>
                            </div>
                        </a>


                    </div>
                @endforeach
                {{--                <div class="notification-list notification-list--unread">--}}
                {{--                    <div class="notification-list_content">--}}
                {{--                        <div class="notification-list_img">--}}
                {{--                            <img src="https://i.imgur.com/w4Mp4ny.jpg" alt="user">--}}
                {{--                        </div>--}}
                {{--                        <div class="notification-list_detail">--}}
                {{--                            <p><b>Richard Miles</b> liked your post</p>--}}
                {{--                            <p class="text-muted">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Unde, dolorem.</p>--}}
                {{--                            <p class="text-muted"><small>10 mins ago</small></p>--}}
                {{--                        </div>--}}
                {{--                    </div>--}}
                {{--                    <div class="notification-list_feature-img">--}}
                {{--                        <img src="https://i.imgur.com/AbZqFnR.jpg" alt="Feature image">--}}
                {{--                    </div>--}}
                {{--                </div>--}}
                {{--                <div class="notification-list">--}}
                {{--                    <div class="notification-list_content">--}}
                {{--                        <div class="notification-list_img">--}}
                {{--                            <img src="https://i.imgur.com/ltXdE4K.jpg" alt="user">--}}
                {{--                        </div>--}}
                {{--                        <div class="notification-list_detail">--}}
                {{--                            <p><b>Brian Cumin</b> reacted to your post</p>--}}
                {{--                            <p class="text-muted">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Unde, dolorem.</p>--}}
                {{--                            <p class="text-muted"><small>10 mins ago</small></p>--}}
                {{--                        </div>--}}
                {{--                    </div>--}}
                {{--                    <div class="notification-list_feature-img">--}}
                {{--                        <img src="https://i.imgur.com/bpBpAlH.jpg" alt="Feature image">--}}
                {{--                    </div>--}}
                {{--                </div>--}}
                {{--                <div class="notification-list">--}}
                {{--                    <div class="notification-list_content">--}}
                {{--                        <div class="notification-list_img">--}}
                {{--                            <img src="https://i.imgur.com/CtAQDCP.jpg" alt="user">--}}
                {{--                        </div>--}}
                {{--                        <div class="notification-list_detail">--}}
                {{--                            <p><b>Lance Bogrol</b> reacted to your post</p>--}}
                {{--                            <p class="text-muted">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Unde, dolorem.</p>--}}
                {{--                            <p class="text-muted"><small>10 mins ago</small></p>--}}
                {{--                        </div>--}}
                {{--                    </div>--}}
                {{--                    <div class="notification-list_feature-img">--}}
                {{--                        <img src="https://i.imgur.com/iIhftMJ.jpg" alt="Feature image">--}}
                {{--                    </div>--}}
                {{--                </div>--}}
                {{--                <div class="notification-list">--}}
                {{--                    <div class="notification-list_content">--}}
                {{--                        <div class="notification-list_img">--}}
                {{--                            <img src="https://i.imgur.com/zYxDCQT.jpg" alt="user">--}}
                {{--                        </div>--}}
                {{--                        <div class="notification-list_detail">--}}
                {{--                            <p><b>Parsley Montana</b> reacted to your post</p>--}}
                {{--                            <p class="text-muted">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Unde, dolorem.</p>--}}
                {{--                            <p class="text-muted"><small>10 mins ago</small></p>--}}
                {{--                        </div>--}}
                {{--                    </div>--}}
                {{--                    <div class="notification-list_feature-img">--}}
                {{--                        <img src="https://i.imgur.com/bpBpAlH.jpg" alt="Feature image">--}}
                {{--                    </div>--}}
                {{--                </div>--}}
            </div>


        </div>
    </section>    <!-- Tour Details Section end -->

@endsection

@section('script')


@endsection


