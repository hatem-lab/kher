

    <!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <!--====== Required meta tags ======-->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!--====== Title ======-->
    <title>رمز التحقق</title>
    <!--====== Google Fonts ======-->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=PT+Serif:wght@400;700&family=Poppins:wght@200;300;400;500;600;700;800&display=swap" rel="stylesheet">
    <!--====== Favicon Icon ======-->
    <link rel="shortcut icon" href="assets/img/favicon.png" type="image/png">
    <!--====== Bootstrap css ======-->
    <link href="{{asset('end-user/assets/css/bootstrap.rtl.min.css')}}" rel="stylesheet">
    <!--====== Jquery UI css ======-->
    <link href="{{asset('end-user/assets/css/jquery-ui-min.css')}}" rel="stylesheet">
    <!--====== icon css ======-->
    <link href="{{asset('end-user/assets/css/line-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('end-user/assets/css/remixicon.css')}}" rel="stylesheet">
    <!--====== Animate  css ======-->
    <link href="{{asset('end-user/assets/css/animate.min.css')}}" rel="stylesheet">
    <!--====== Swiper css ======-->
    <link href="{{asset('end-user/assets/css/swiper-min.css')}}" rel="stylesheet">
    <!--====== Magnific Popup css ======-->
    <link href="{{asset('end-user/assets/css/magnific-popup.css')}}" rel="stylesheet">
    <!--====== Style css ======-->
    <link href="{{asset('end-user/assets/scss/style.css')}}" rel="stylesheet">
</head>

<body>

<!-- Theme Switcher End -->

<!-- page wrapper Start -->
<div class="page-wrapper">



    <!-- Header  end -->
    <!-- Breadcrumb  start -->
    <section class="breadcrumb-wrap bg-f br-bg-verfiy" style="height:700px">
        <div class="overlay op-6 bg-black"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumb-title">
                        <h2>{{trans('enduser/Home/Home.Verification')}}</h2>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb  end -->
    <!-- Register Section start -->
    <section class="Login-wrap pt-100 pb-100">
        <div class="container">
            <div class="col-xl-6 offset-xl-3 col-lg-8 offset-lg-2 col-md-10 offset-md-1">
                <div class="login-form">
                    <div class="login-header bg-blue">
                        <h2 class="text-center mb-0">{{trans('enduser/Home/Home.please Enter the code we sent to your Email')}}</h2>
                    </div>
                    <div class="login-body">
                        <form  class="form-wrap" method="post" action="{{route('verify-user')}}">
                            @csrf
                            @isset($user)
                            <input hidden name="id" value="{{$user->id}}" />
                            @endisset
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="name">{{trans('enduser/Home/Home.Verification Code')}}</label>
                                        <input id="name" name="code" type="text" placeholder="ُ{{trans('enduser/Home/Home.Enter your code')}}" required>
                                    </div>
                                    @error('code')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>

{{--                                <div class="col-lg-12">--}}
{{--                                    <div type="submit" class="form-group">--}}
{{--                                        <button class="btn v6">Register</button>--}}
{{--                                    </div>--}}
{{--                                </div>--}}

</div>
                                <footer class="form-footer clearfix">
                                    <div class=" no-gutters">
                                        <div class="">
                                            <input type="hidden" name="submitLogin" value="1">
                                            <button class="btn-style-verf" data-link-action="sign-in" type="submit">
                                                    {{trans('enduser/Home/Home.Confirm')}}
                                            </button>
                                        </div>
                                    </div>
                                </footer>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Register Section end -->

    <!-- Footer  end -->
</div>
<!-- Page wrapper end -->



<!--====== jquery js ======-->
<script src="{{asset('end-user/assets/js/jquery.min.js')}}"></script>
<!--====== jquery UI js ======-->
<script src="{{asset('end-user/assets/js/jquery-ui.min.js')}}"></script>
<!--====== Bootstrap js ======-->
<script src="{{asset('end-user/assets/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('end-user/assets/js/form-validator.min.js')}}"></script>
<script src="{{asset('end-user/assets/js/contact-form-script.js')}}"></script>
<!--====== Swiper js ======-->
<script src="{{asset('end-user/assets/js/swiper-min.js')}}"></script>
<!--====== Magnific Popup js ======-->
<script src="{{asset('end-user/assets/js/jquery-magnific-popup.js')}}"></script>
<!--====== Countdown js ======-->
<script src="{{asset('end-user/assets/js/countdown.j')}}s"></script>
<!--====== Main js ======-->
<script src="{{asset('end-user/assets/js/main.j')}}s"></script>
</body>
</html>
