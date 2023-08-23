@extends('user.layouts.master-page')

@section('title','الدخول')

@section('style')


@endsection


@section('content')

    <!-- Cart Popup start -->
    <div class="cart-popup">
        <div class="cart-popup-title">
            <h2>Shopping Cart (3)</h2>
            <button type="button" class="close-popup"><i class="las la-times"></i></button>
        </div>
        <div class="cart-popup-item-wrap">
            <div class="cart-popup-item">
                <div class="cart-popup-item-img">
                    <img src="assets/img/product/cart-thumb-1.jpg" alt="Image">
                </div>
                <div class="cart-popup-item-name">
                    <p>Vougue Magazine</p>
                    <div class="product-quantity">
                        <div class="qtySelector">
                            <span class="ri-subtract-line decreaseQty"></span>
                            <input type="text" class="qtyValue" value="1"/>
                            <span class="las la-plus increaseQty"></span>
                        </div>
                    </div>
                </div>
                <div class="cart-popup-item-price">
                    <button type="button"><i class="las la-times"></i></button>
                    <span>$148.00</span>
                </div>
            </div>
            <div class="cart-popup-item">
                <div class="cart-popup-item-img">
                    <img src="assets/img/product/cart-thumb-2.jpg" alt="Image">
                </div>
                <div class="cart-popup-item-name">
                    <p>Business Report Guideline</p>
                    <div class="product-quantity">
                        <div class="qtySelector">
                            <span class="ri-subtract-line decreaseQty"></span>
                            <input type="text" class="qtyValue" value="1"/>
                            <span class="las la-plus increaseQty"></span>
                        </div>
                    </div>
                </div>
                <div class="cart-popup-item-price">
                    <button type="button"><i class="las la-times"></i></button>
                    <span>$100.00</span>
                </div>
            </div>
            <div class="cart-popup-item">
                <div class="cart-popup-item-img">
                    <img src="assets/img/product/cart-thumb-3.jpg" alt="Image">
                </div>
                <div class="cart-popup-item-name">
                    <p>Today's English</p>
                    <div class="product-quantity">
                        <div class="qtySelector">
                            <span class="ri-subtract-line decreaseQty"></span>
                            <input type="text" class="qtyValue" value="1"/>
                            <span class="las la-plus increaseQty"></span>
                        </div>
                    </div>
                </div>
                <div class="cart-popup-item-price">
                    <button type="button"><i class="las la-times"></i></button>
                    <span>$98.00</span>
                </div>
            </div>
        </div>
        <div class="cart-popup-total-wrap">
            <div class="cart-popup-total">
                <h5>TOTAL</h5>
                <h5>$346.00</h5>
            </div>
            <a href="shop-left-sidebar.html" class="btn v4">Continue Shopping</a>
            <a href="checkout.html" class="btn v3">Check Out</a>
        </div>
    </div>
    <!-- Cart Popup End -->
    <!-- Contact Popup Start -->
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
    <!-- Contact Popup End -->
    <!-- Header  end -->
    <!-- Breadcrumb  start -->
    <!-- <section class="breadcrumb-wrap bg-f br-bg-4">
        <div class="overlay op-6 bg-black"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumb-title">
                        <h2>Login</h2>
                        <ul class="breadcrumb-menu">
                            <li><a href="index.html">Home </a></li>
                            <li>Login</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section> -->
    <!-- Breadcrumb  end -->
    <!-- Tour Details Section start -->
    <section class="Login-wrap pt-100 pb-100">
        <div class="container">
            <div>
                <div class="login-form">
                    <div class="login-header">

                    </div>
                    <div class="login-body">
                        <div class="login-body">
                            <div class="login-right">
                                <div class="login-title">
                                    <h2 class="text-center mb-0">{{trans('login/login.login')}}</h2>
                                </div>
                                @include('includes.alerts.errors')
                                <form class="form-wrap" action="{{route('user.login')}}" method="post">
                                    @csrf
                                    <div class="row">
                                        <input type="hidden" id="not" name="not_t">

                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label for="email">{{trans('login/login.Username/Email/Phone')}}</label>
                                                <input class="email" id="email" name="email" type="email"
                                                       placeholder="{{trans('login/login.Username/Email/Phone')}}"
                                                       required>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label for="pwd">{{trans('login/login.Password')}}</label>
                                                <input class="password" id="pwd" name="password" type="password"
                                                       placeholder="{{trans('login/login.Password')}}">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-6">
                                            <div class="form_group mb-20">
                                                <input type="checkbox" id="test_1">
                                                <label for="test_1">{{trans('login/login.Remember Me')}}</label>
                                            </div>
                                        </div>
                                        {{--                                <div class="col-lg-6 col-md-6 col-6 text-end mb-20">--}}
                                        {{--                                    <a href="forgot-pwd.html" class="link">{{trans('login/login.Forgot Password?')}}</a>--}}
                                        {{--                                </div>--}}
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <button class="btn v1">{{trans('login/login.login')}}</button>
                                            </div>
                                        </div>
                                        <div class="col-md-12 text-center">
                                            <p class="mb-0 p-link">{{trans('login/login.Don’t Have an Account?')}} <a
                                                    class="link2"
                                                    href="{{route('site.getRegister')}}">{{trans('login/login.Create an Account')}}</a>
                                            </p>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="login-left">
                                <img src="{{asset('end-user/assets/img/1.png')}}">
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('script')


@endsection


