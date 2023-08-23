


@include('user.layouts.style')

<body>
    <!--Preloader starts-->
    <div class="preloader js-preloader">
        <img src="{{asset('assets/img/brand/logo-1.png')}}" alt="">
    </div>
    <!--Preloader ends-->

    <!-- Theme Switcher Start -->
    <!-- <div class="switch-theme-mode">
        <label id="switch" class="switch">
            <input type="checkbox" onchange="toggleTheme()" id="slider">
            <span class="slider round"></span>
        </label>
    </div> -->

    <div class="page-wrapper">
        @include('user.layouts.includes.main-header')
        @yield('content')
        @include('user.layouts.includes.main-footer')
        <!-- Footer  end -->
    </div>
    <!-- Page wrapper end -->

    <!-- Back-to-top button start -->
    <a href="#" class="back-to-top bounce"><i class="las la-arrow-up"></i></a>
    <!-- Back-to-top button end -->

    <!--====== jquery js ======-->

</body>


@include('user.layouts.script')









