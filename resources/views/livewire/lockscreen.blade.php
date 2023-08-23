@extends('layouts.custom-app')

@section('styles')

		<!-- Sidemenu-respoansive-tabs css -->
		<link href="{{asset('assets/plugins/sidemenu-responsive-tabs/sidemenu-responsive-tabs.css')}}" rel="stylesheet">

@endsection

@section('class')

		<div class="error-page1">

@endsection

@section('content')

        <div class="container-fluid">
            <div class="row no-gutter">
                <!-- The image half -->
                <div class="col-md-6 col-lg-6 col-xl-7 d-none d-md-flex bg-primary-transparent">
                    <div class="row wd-100p m-auto text-center">
                        <div class="col-md-12 col-lg-12 col-xl-12 my-auto m-auto wd-100p">
                            <img src="{{asset('assets/img/media/lockscreen.png')}}" class="my-autoht-xl-80p wd-md-100p wd-xl-80p m-auto" alt="logo">
                        </div>
                    </div>
                </div>
                <!-- The content half -->
                <div class="col-md-6 col-lg-6 col-xl-5 bg-white">
                    <div class="login d-flex align-items-center py-2">
                        <!-- Demo content-->
                        <div class="container p-0">
                            <div class="row">
                                <div class="col-md-10 col-lg-10 col-xl-9 m-auto">
                                    <div class="mb-5 d-flex justify-content-center">
                                        <a href="{{url('index')}}"><img src="{{asset('assets/img/brand/favicon.png')}}" class="sign-favicon-a ht-40" alt="logo">
                                        <img src="{{asset('assets/img/brand/favicon-white.png')}}" class="sign-favicon-b ht-40" alt="logo">
                                        </a>
                                        <h1 class="main-logo1 ms-1 me-0 my-auto tx-28">Va<span>le</span>x</h1>
                                    </div>
                                    <div class="main-card-signin d-md-flex bg-white">
                                        <div class="p-4 wd-100p">
                                            <div class="main-signin-header">
                                                <div class="avatar avatar-xxl avatar-xxl m-auto text-center mb-2" id="mr-b-2"><img alt="" class="avatar avatar-xxl rounded-circle  mt-2 mb-2" src="{{asset('assets/img/faces/6.jpg')}}"></div>
                                                <div class="m-auto text-center details-block mt-4 mg-b-20" id="mr-b-20 mr-t-4">
                                                    <h5 class="mg-b-10 tx-16">Petey Cruiser</h5>
                                                    <p class="tx-13 text-muted">Enter Your Password to View your Screen</p>
                                                </div>
                                                <form action="#" class="pt-1">
                                                    <div class="form-group">
                                                        <input class="form-control" placeholder="Enter your password" type="password" value="">
                                                    </div>
                                                    <button class="btn btn-main-primary btn-block">Unlock</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- End -->
                    </div>
                </div><!-- End -->
            </div>
        </div>

@endsection('content')

@section('scripts')

		<!--- JQuery sparkline js --->
		<script src="{{asset('assets/plugins/jquery-sparkline/jquery.sparkline.min.js')}}"></script>

@endsection