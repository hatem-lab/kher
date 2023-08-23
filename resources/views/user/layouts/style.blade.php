
    <!DOCTYPE html>
    <html lang="ar" dir="rtl">

    <head>
        <!--====== Required meta tags ======-->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!--====== Title ======-->
        <title>@yield('title')</title>
        <!--====== Google Fonts ======-->
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=PT+Serif:wght@400;700&family=Poppins:wght@200;300;400;500;600;700;800&display=swap" rel="stylesheet">
        <!--====== Favicon Icon ======-->
        <link rel="shortcut icon" href="{{asset('assets/img/brand/logo-1.png')}}" type="image/png">
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
        <link href="{{asset('end-user/assets/css/style-end-user.css')}}" rel="stylesheet">
        <link href="{{asset('end-user/assets/css/divScroll.css')}}" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet">

        <link rel="stylesheet" href="{{ asset('assets/css-rtl/toastr/toastr.min.css') }}">


        <link rel="stylesheet" href="{{ asset('assets/css-rtl/toastr/ext-component-toastr.css') }}">

        @yield('style')
    </head>
