@extends('layouts.custom-app')

@section('styles')

@endsection

@section('class')

		<div class="error-page1">

@endsection

@section('content')

<div class="container-fluid">
    <div class="row no-gutter">
        <!-- The image half -->
        <div class="col-md-6 col-lg-6 col-xl-7 d-none d-md-flex bg-primary-transparent">
            <div class="row wd-100p mr-center text-center">
                <div class="col-md-12 col-lg-12 col-xl-12 my-auto mr-center wd-100p">
                    <img src="{{asset('assets/img/media/forgot.png')}}" class="my-auto ht-xl-80p wd-md-100p wd-xl-80p mr-center" alt="logo">
                </div>
            </div>
        </div>
        <!-- The content half -->
        <div class="col-md-6 col-lg-6 col-xl-5 bg-white">
            <div class="login d-flex align-items-center py-2">
                <!-- Demo content-->
                <div class="container p-0">
                    <div class="row">
                        <div class="col-md-10 col-lg-10 col-xl-9 mr-center">
                            <div class="mb-5 d-flex">
                                <a href="{{url('index')}}"><img src="{{asset('assets/img/brand/favicon.png')}}" class="sign-favicon-a ht-40" alt="logo">
                                <img src="{{asset('assets/img/brand/favicon-white.png')}}" class="sign-favicon-b ht-40" alt="logo">
                                </a>
                                <h1 class="main-logo1 ms-1 me-0 my-auto tx-28">Va<span>le</span>x</h1>
                            </div>
                            <div class="main-card-signin d-md-flex bg-white m-0" id="m-card-signin">
                                <div class="wd-100p">
                                    <div class="main-signin-header">
                                        <h2>Forgot Password!</h2>
                                        <h4>Please Enter Your Email</h4>
                                        <form action="#">
                                            <div class="form-group">
                                                <label>Email</label> <input class="form-control" placeholder="Enter your email" type="text">
                                            </div>
                                            <button class="btn btn-main-primary btn-block">Send</button>
                                        </form>
                                    </div>
                                    <div class="main-signup-footer mg-t-20">
                                        <p>Forget it, <a href="{{url('signin')}}"> Send me back</a> to the sign in screen.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- End -->
            </div>
        </div><!-- End -->
    </div>


@endsection('content')

@section('scripts')

		<!--- JQuery sparkline js --->
		<script src="{{asset('assets/plugins/jquery-sparkline/jquery.sparkline.min.js')}}"></script>

@endsection