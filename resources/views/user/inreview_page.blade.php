<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <!--====== Required meta tags ======-->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!--====== Title ======-->
    <title>الحساب في المراجعة</title>
    <!--====== Google Fonts ======-->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=PT+Serif:wght@400;700&family=Poppins:wght@200;300;400;500;600;700;800&display=swap" rel="stylesheet">
    <!--====== Favicon Icon ======-->

    <link rel="shortcut icon" href="{{asset('end-user/assets/img/favicon.png')}}" type="image/png">
    <!--====== Bootstrap css ======-->
    <link href="{{asset('end-user/assets/css/bootstrap.rtl.min.css')}}" rel="stylesheet">
    <!--====== Jquery UI css ======-->
    <link href="{{asset('end-user/assets/css/jquery-ui-min.css')}}" rel="stylesheet">
    <!--====== icon css ======-->
    <link href="{{asset('end-user/assets/css/line-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('end-user/assets/css/remixicon.css')}}" rel="stylesheet">
    <!--====== Animate  css ======-->
    <link href="{{asset('end-user/assets/css/animate.min.cs')}}s" rel="stylesheet">
    <!--====== Swiper css ======-->
    <link href="{{asset('end-user/assets/css/swiper-min.css')}}" rel="stylesheet">
    <!--====== Magnific Popup css ======-->
    <link href="{{asset('end-user/assets/css/magnific-popup.css')}}" rel="stylesheet">
    <!--====== Style css ======-->
    <link href="{{asset('end-user/assets/scss/style.css')}}" rel="stylesheet">
</head>

<body>
<!--Preloader starts-->
<div class="preloader js-preloader">
    <img src="assets/img/preloader.gif" alt="Image">
</div>
<!--Preloader ends-->

<!-- Theme Switcher Start -->
{{--<div class="switch-theme-mode">--}}
{{--    <label id="switch" class="switch">--}}
{{--        <input type="checkbox" onchange="toggleTheme()" id="slider">--}}
{{--        <span class="slider round"></span>--}}
{{--    </label>--}}
{{--</div>--}}
<!-- Theme Switcher End -->

<!-- page wrapper Start -->
<div class="page-wrapper">
    <!-- Header  Start -->



    <!-- Breadcrumb  end -->
    <!-- Error Section start -->
    <div class="error-wrap ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="error-content">
                        <span class="trans_text v4">الحساب قيد المراجعة عند الادارة!</span>

                        <p>انتظر حتى يتم القبول لتستطيع التفاعل في الموقع</p>
                        <a href="{{route('site.home')}}" class="btn v1"><i class="las la-arrow-left"></i>العودة الى الرئيسية</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Error Section end -->


    <!-- Footer  end -->
</div>
<!-- Page wrapper end -->

<!-- Back-to-top button start -->
<a href="#" class="back-to-top bounce"><i class="las la-arrow-up"></i></a>
<!-- Back-to-top button end -->

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
        <script src="{{asset('end-user/assets/js/countdown.js')}}"></script>
        <!--====== Main js ======-->
        <script src="{{asset('end-user/assets/js/main.js')}}"></script>
</body>
</html>
