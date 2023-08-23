<header class="header-wrap style1">
    <div class="header-bottom">
        <div class="container">
            <div class="row align-items-center div-height">

                <div class="col-lg-2 col-md-1 col-6 order-lg-1 order-md-1 order-1">
                    <div class="logo">
                        <a href="{{route('site.home')}}">
                            <img class="logo-light" src="{{asset('assets/img/brand/logo-1.png')}}" alt="Image">
                        </a>
                    </div>
                </div>
                <div class="col-lg-7 col-md-4 col-6 order-lg-2 order-md-3 order- height-logo">
                    <div class="main-menu-wrap style1">
                        <div class="menu-close xl-none">
                            <a href="javascript:void(0)"><i class="las la-times"></i></a>
                        </div>
                        <div id="menu" class="text-left">
                            <ul class="main-menu ">
                                <!-- <li class="has-children"> -->
                                <li class="custom-siz-style">
                                    <a href="{{route('site.home')}}">{{trans('enduser/Header/Header.HOME')}}</a>
                                </li>

                                <li class="has-children">
                                    <a href="#">{{trans('enduser/Header/Header.COURSES traning')}}</a>
                                    <ul class="sub-menu ">
                                        <li class="has-children">
                                            <a href="{{route('diplomas')}}">{{trans('enduser/Header/Header.DIPLOMAS')}}</a>
                                            @if(auth('student')->user())

                                                <ul class="sub-menu sub-menu-1">
                                                    <li>
                                                        <a href="{{route('studentdiplomas')}}">{{trans('enduser/Header/Header.YOUR DIPLOMAS')}}</a>
                                                    </li>

                                                </ul>
                                            @endif

                                        </li>
                                        <li class="has-children">
                                            <a href="{{route('courses')}}">{{trans('enduser/Header/Header.COURSES')}}</a>
                                            @if(auth('student')->user())
                                                <ul class="sub-menu sub-menu-1">
                                                    <li>
                                                        <a href="{{route('studentcourses')}}">{{trans('enduser/Header/Header.YOUR COURSES')}}</a>
                                                    </li>
                                                    <li>
                                                        <a href="{{route('coursesregister')}}">{{trans('enduser/Header/Header.Register Courses')}}</a>
                                                    </li>
                                                </ul>
                                        </li>
                                        <li>
                                            <a href="{{route('student_tests')}}">{{trans('enduser/Header/Header.YOUR Tests')}}</a>
                                        </li>

                                        {{--                                        @elseif(auth('user')->user())--}}
                                        {{--                                            <ul class="sub-menu sub-menu-1">--}}
                                        {{--                                                <li>--}}
                                        {{--                                                    <a href="{{route('studentcourses')}}">{{trans('enduser/Header/Header.YOUR COURSES')}}</a>--}}
                                        {{--                                                </li>--}}
                                        {{--                                            </ul>--}}
                                        {{--                                            </li>--}}
                                        {{--                                            <li>--}}
                                        {{--                                                <a href="{{route('student_tests')}}">{{trans('enduser/Header/Header.YOUR Tests')}}</a>--}}
                                        {{--                                            </li>--}}

                                        <li>
                                            <a href="{{route('student.homeworks')}}">{{trans('enduser/Header/Header.Homeworks')}}</a>
                                        </li>
                                        @endif
                                    </ul>
                                </li>
                                <li>
                                    <a href="{{route('user_blogs')}}">{{trans('enduser/Header/Header.BLOG')}}</a>

                                </li>
                                <li>
                                    <a href="{{route('site.library')}}">{{trans('enduser/Header/Header.Library')}}</a>
                                </li>


                                <li>
                                    <a href="{{route('Contact_us')}}">{{trans('enduser/Header/Header.Contact Us')}}</a>
                                </li>

                                <li>
                                    <a  href="{{route('site.about')}}">{{trans('enduser/Header/Header.About Acadimic')}}</a>
                                </li>


                                @if(auth('student')->user())
                                    <li class="has-children">
                                        <a class="color-more">{{trans('enduser/Header/Header.More')}}</a>
                                        <ul class="sub-menu">
                                            @if(auth('student')->user())
                                                <li>
                                                    <a href="{{route('student.progress')}}">{{trans('enduser/Header/Header.Progress')}}</a>

                                                </li>
                                            @endif
                                            @if(auth('student')->user())
                                                <li>
                                                    <a href="{{route('student.calendar')}}">{{trans('enduser/Header/Header.calendar')}}</a>

                                                </li>
                                            @endif
                                            @if(auth('student')->user())
                                                <li>
                                                    <a href="{{route('student.survay')}}">{{trans('enduser/Header/Header.Survey')}}</a>

                                                </li>
                                            @endif
                                            @if(auth('student')->user())
                                                <li>
                                                    <a href="{{route('student.profile')}}">{{trans('enduser/Header/Header.profile')}}</a>

                                                </li>
                                            @endif
                                        </ul>
                                    </li>
                                @endif

                            </ul>
                        </div>
                    </div>
                    <div class="mobile-bar-wrap">
                        <div class="sidebar-menu xl-none">
                            <i class="ri-equalizer-line"></i>
                        </div>
                        <div class="mobile-top-bar xl-none">
                            <i class="ri-settings-3-line"></i>
                        </div>
                        <div class="mobile-menu xl-none">
                            <a href='javascript:void(0)'><i class="ri-menu-line"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-7 col-3 order-3  div-login">

                    <!-- scound scroll notifcation -->

                    @if(auth('user') -> user())
                        <a href="#" class="link style3">
                            {{ trans('enduser/Header/Header.hello_user', ['name' => auth('user') -> user()->name]) }}
                        </a>


                    @elseif(auth('student') -> user())
                        <a href="{{ route('student.progress') }}" class="link style3">
                            {{ trans('enduser/Header/Header.hello_user', ['name' => auth('student') -> user()->name_ar]) }}

                        </a>

                    @else
                        <a href="{{route('getLogin')}}" class="link style3">
                            {{trans('enduser/Header/Header.Login')}}
                        </a>
                        <div class="slash">/</div>
                        <a href="{{route('site.getRegister')}}" class="link style3">
                            {{trans('general.register')}}
                        </a>
                    @endif
                    <div class="header-social">
                        @if(auth('user')->user() || auth('student')->user())
                            <a href="{{route('user.logout')}}" class="link style3">
                                {{trans('enduser/Header/Header.Logout')}}
                            </a>
                        @endif
                    </div>

                    @if(auth('student') -> user())
                        <ul class="notification-drop">
                            <li class="item">
                                <a class="new nav-link alert" id="not_btn">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                         class="header-icon-svgs feather feather-bell" viewBox="0 0 24 24"
                                         fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                         stroke-linejoin="round">
                                        <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path>
                                        <path d="M13.73 21a2 2 0 0 1-3.46 0"></path>
                                    </svg>
                                    <span class="pulse"></span></a>
                                <span class="badgeee top ntftcn-cnt" id="num_out"><span id="num"></span></span>

                                <!-- <div id="dropdown-menu-notif"> -->
                                <ul id="ul-notifcation">
                                    <div class="menu-header-content  text-start bg-color1">
                                        <div class="d-flex">
                                            <h6 class="dropdown-title mb-1 tx-15 text-white fw-semibold"> {{ trans('enduser/Header/Header.Notifications')}}

                                            </h6>

                                        </div>

                                    </div>


                                    <div class="main-notification-list Notification-scroll main-notification-box"
                                         id="nots_list">

                                    </div>
                                    <div class="dropdown-footer">
                                        <a href="{{route('student-my-notifications')}}">{{trans('general.view_all')}}</a>
                                    </div>
                                </ul>
                                <!-- </div> -->
                            </li>
                        </ul>

                    @endif
                </div>

            </div>
        </div>
    </div>
</header>
