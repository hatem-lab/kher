
<!-- main-sidebar -->
<div class="app-sidebar__overlay" data-bs-toggle="sidebar"></div>
<aside class="app-sidebar sidebar-scroll">
    <div class="main-sidebar-header ">
        <a class="desktop-logo logo-light active" href="{{route('home')}}"><img
                src="{{asset('assets/img/brand/logo-1.png')}}" class="main-logo" alt="logo"></a>
        <a class="desktop-logo logo-dark active" href="{{route('home')}}"><img
                src="{{asset('assets/img/brand/logo-1.png')}}" class="main-logo dark-theme" alt="logo"></a>
        <a class="logo-icon mobile-logo icon-light " href="{{route('home')}}"><img
                src="{{asset('assets/img/brand/logo-1.png')}}" class="logo-icon" alt="logo"></a>
        <!-- <a class="logo-icon mobile-logo icon-dark " href="{{route('home')}}"><img
                src="{{asset('assets/img/brand/logo-1.png')}}" class="logo-icon dark-theme" alt="logo"></a> -->
    </div>
    <div class="main-sidemenu">
        <div class="app-sidebar__user clearfix">
            <div class="dropdown user-pro-body">
                <div class="">
                    <img alt="user-img" class="avatar avatar-xl brround" src="{{auth('admin') -> user() -> profile ? URL::to('/') . '/Profile/' . auth('admin') -> user() ->name.'/'.auth('admin') -> user() -> profile->image : URL::to('/') . '/Profile/' .'default.jpg'}} "><span
                        class="avatar-status profile-status bg-green"></span>
                </div>
                <div class="user-info">
                    <h4 class="fw-semibold mt-3 mb-0">{{auth('admin') -> user() -> name }}</h4>
                    <span class="mb-0 text-muted">{{App\Helpers\General::roleUser(auth('admin') -> user() -> role) }}</span>
                </div>
            </div>
        </div>
        <ul class="side-menu">
            <li class="side-item side-item-category">{{trans('Update.Main')}}</li>
            <li class="slide">
                <a class="side-menu__item" href="{{route('home')}}">
                <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 640 512"><path d="M0 224v272c0 8.84 7.16 16 16 16h80V192H32c-17.67 0-32 14.33-32 32zm360-48h-24v-40c0-4.42-3.58-8-8-8h-16c-4.42 0-8 3.58-8 8v64c0 4.42 3.58 8 8 8h48c4.42 0 8-3.58 8-8v-16c0-4.42-3.58-8-8-8zm137.75-63.96l-160-106.67a32.02 32.02 0 0 0-35.5 0l-160 106.67A32.002 32.002 0 0 0 128 138.66V512h128V368c0-8.84 7.16-16 16-16h96c8.84 0 16 7.16 16 16v144h128V138.67c0-10.7-5.35-20.7-14.25-26.63zM320 256c-44.18 0-80-35.82-80-80s35.82-80 80-80 80 35.82 80 80-35.82 80-80 80zm288-64h-64v320h80c8.84 0 16-7.16 16-16V224c0-17.67-14.33-32-32-32z"/></svg>
                    <span class="side-menu__label">{{trans('Update.Index')}}</span></a>
            </li>

            @if(auth('admin') -> user() ->role ===1)
            <li class="side-item side-item-category">{{trans('Users/user.Users')}}</li>

            <li class="slide">
                <a class="side-menu__item" data-bs-toggle="slide" href="#">
                <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 640 512"><path d="M96 224c35.3 0 64-28.7 64-64s-28.7-64-64-64-64 28.7-64 64 28.7 64 64 64zm448 0c35.3 0 64-28.7 64-64s-28.7-64-64-64-64 28.7-64 64 28.7 64 64 64zm32 32h-64c-17.6 0-33.5 7.1-45.1 18.6 40.3 22.1 68.9 62 75.1 109.4h66c17.7 0 32-14.3 32-32v-32c0-35.3-28.7-64-64-64zm-256 0c61.9 0 112-50.1 112-112S381.9 32 320 32 208 82.1 208 144s50.1 112 112 112zm76.8 32h-8.3c-20.8 10-43.9 16-68.5 16s-47.6-6-68.5-16h-8.3C179.6 288 128 339.6 128 403.2V432c0 26.5 21.5 48 48 48h288c26.5 0 48-21.5 48-48v-28.8c0-63.6-51.6-115.2-115.2-115.2zm-223.7-13.4C161.5 263.1 145.6 256 128 256H64c-35.3 0-64 28.7-64 64v32c0 17.7 14.3 32 32 32h65.9c6.3-47.4 34.9-87.3 75.2-109.4z"/></svg>
                    <span class="side-menu__label">{{trans('Users/user.Users')}}</span><i
                        class="angle fe fe-chevron-down"></i></a>
                <ul class="slide-menu">
                    @if(auth('admin') -> user() ->can('list users'))
                        <li><a class="slide-item" href="{{route('users.index')}}">{{trans('Users/user.users menu')}}</a>
                        </li>
                    @endif
                    @if(auth('admin') -> user() ->can('list roles'))
                        <li><a class="slide-item"
                               href="{{route('roles.index')}}">{{trans('Users/user.users roles')}}</a></li>
                    @endif
                </ul>
            </li>
            @endif

            @if(auth('admin') -> user() ->can('teachers'))
                {{--                <li class="side-item side-item-category">{{trans('Update.Teachers')}}</li>--}}
                <li class="slide">
                    <a class="side-menu__item" data-bs-toggle="slide" href="#">
                    <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 640 512"><path d="M208 352c-2.39 0-4.78.35-7.06 1.09C187.98 357.3 174.35 360 160 360c-14.35 0-27.98-2.7-40.95-6.91-2.28-.74-4.66-1.09-7.05-1.09C49.94 352-.33 402.48 0 464.62.14 490.88 21.73 512 48 512h224c26.27 0 47.86-21.12 48-47.38.33-62.14-49.94-112.62-112-112.62zm-48-32c53.02 0 96-42.98 96-96s-42.98-96-96-96-96 42.98-96 96 42.98 96 96 96zM592 0H208c-26.47 0-48 22.25-48 49.59V96c23.42 0 45.1 6.78 64 17.8V64h352v288h-64v-64H384v64h-76.24c19.1 16.69 33.12 38.73 39.69 64H592c26.47 0 48-22.25 48-49.59V49.59C640 22.25 618.47 0 592 0z"/></svg>
                        <span class="side-menu__label">{{trans('Update.Teachers')}}</span><i
                            class="angle fe fe-chevron-down"></i></a>
                    <ul class="slide-menu">
                        @if(auth('admin') -> user() ->can('list teachers'))
                            <li><a class="slide-item"
                                   href="{{route('teachers.index')}}">{{trans('Update.Teachers menu')}}</a></li>
                        @endif

                            @if(auth('admin')->user()->role == 2)
                                <li><a class="slide-item" href="{{url('timeline')}}">{{trans('Teachers/Teachers.Timeline')}}</a></li>
                            @endif
                    </ul>
                </li>
            @endif


            {{--                        <li class="side-item side-item-category">{{trans('Update.Students')}}</li>--}}
            @if(auth('admin') -> user() ->can('Students'))
                <li class="slide">
                    <a class="side-menu__item" data-bs-toggle="slide" href="#">
                    <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 448 512"><path d="M319.4 320.6L224 416l-95.4-95.4C57.1 323.7 0 382.2 0 454.4v9.6c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48v-9.6c0-72.2-57.1-130.7-128.6-133.8zM13.6 79.8l6.4 1.5v58.4c-7 4.2-12 11.5-12 20.3 0 8.4 4.6 15.4 11.1 19.7L3.5 242c-1.7 6.9 2.1 14 7.6 14h41.8c5.5 0 9.3-7.1 7.6-14l-15.6-62.3C51.4 175.4 56 168.4 56 160c0-8.8-5-16.1-12-20.3V87.1l66 15.9c-8.6 17.2-14 36.4-14 57 0 70.7 57.3 128 128 128s128-57.3 128-128c0-20.6-5.3-39.8-14-57l96.3-23.2c18.2-4.4 18.2-27.1 0-31.5l-190.4-46c-13-3.1-26.7-3.1-39.7 0L13.6 48.2c-18.1 4.4-18.1 27.2 0 31.6z"/></svg>
                        <span class="side-menu__label">{{trans('Update.Students')}}</span><i
                            class="angle fe fe-chevron-down"></i></a>
                    <ul class="slide-menu">
                        @if(auth('admin') -> user() ->can('list Students'))
                            <li><a class="slide-item"
                                   href="{{route('students.index')}}">{{trans('Update.Students menu')}}</a></li>
                        @endif

                        @if(auth('admin') -> user() ->can('list pending Students'))
                            <li><a class="slide-item"
                                   href="{{route('students.pending_registration_request')}}">{{trans('Update.pending_list')}}</a></li>
                        @endif
                            <li><a class="slide-item"
                                   href="{{route('request.certificate')}}">{{trans('Update.request_certificate')}}</a></li>

                    </ul>
                </li>
            @endif


            <li class="side-item side-item-category">{{trans('general.edu_content')}}</li>


            {{--                        @endcan--}}
            @if(auth('admin') -> user() ->can('diplomas'))
                <li class="slide">
                    <a class="side-menu__item" data-bs-toggle="slide" href="#">
                    <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 512 512"><path d="M458.622 255.92l45.985-45.005c13.708-12.977 7.316-36.039-10.664-40.339l-62.65-15.99 17.661-62.015c4.991-17.838-11.829-34.663-29.661-29.671l-61.994 17.667-15.984-62.671C337.085.197 313.765-6.276 300.99 7.228L256 53.57 211.011 7.229c-12.63-13.351-36.047-7.234-40.325 10.668l-15.984 62.671-61.995-17.667C74.87 57.907 58.056 74.738 63.046 92.572l17.661 62.015-62.65 15.99C.069 174.878-6.31 197.944 7.392 210.915l45.985 45.005-45.985 45.004c-13.708 12.977-7.316 36.039 10.664 40.339l62.65 15.99-17.661 62.015c-4.991 17.838 11.829 34.663 29.661 29.671l61.994-17.667 15.984 62.671c4.439 18.575 27.696 24.018 40.325 10.668L256 458.61l44.989 46.001c12.5 13.488 35.987 7.486 40.325-10.668l15.984-62.671 61.994 17.667c17.836 4.994 34.651-11.837 29.661-29.671l-17.661-62.015 62.65-15.99c17.987-4.302 24.366-27.367 10.664-40.339l-45.984-45.004z"/></svg>
                        <span class="side-menu__label">
                                    {{trans('diplomas/diplomas.diplomas')}}
                                </span>
                        <i class="angle fe fe-chevron-down">

                        </i>
                    </a>
                    <ul class="slide-menu">
                        @if(auth('admin') -> user() ->can('list diplomas'))
                            <li><a class="slide-item" href="{{route('diploma.index')}}">{{trans('general.List')}}</a>
                            </li>
                        @endif
                        @if(auth('admin') -> user() ->can('create diplomas'))
                            <li><a class="slide-item" href="{{route('diploma.create')}}">{{trans('general.Add')}}</a>
                            </li>
                        @endif

                    </ul>
                </li>
            @endif

            @if(auth('admin') -> user() ->can('Lectures'))
                <li class="slide">
                    <a class="side-menu__item" data-bs-toggle="slide" href="#">
                    <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 448 512"><path d="M448 360V24c0-13.3-10.7-24-24-24H96C43 0 0 43 0 96v320c0 53 43 96 96 96h328c13.3 0 24-10.7 24-24v-16c0-7.5-3.5-14.3-8.9-18.7-4.2-15.4-4.2-59.3 0-74.7 5.4-4.3 8.9-11.1 8.9-18.6zM128 134c0-3.3 2.7-6 6-6h212c3.3 0 6 2.7 6 6v20c0 3.3-2.7 6-6 6H134c-3.3 0-6-2.7-6-6v-20zm0 64c0-3.3 2.7-6 6-6h212c3.3 0 6 2.7 6 6v20c0 3.3-2.7 6-6 6H134c-3.3 0-6-2.7-6-6v-20zm253.4 250H96c-17.7 0-32-14.3-32-32 0-17.6 14.4-32 32-32h285.4c-1.9 17.1-1.9 46.9 0 64z"/></svg>
                        <span class="side-menu__label">
                                    {{trans('courses/courses.courses')}}
                                </span>
                        <i class="angle fe fe-chevron-down">

                        </i>
                    </a>
                    <ul class="slide-menu">
                       @if(auth('admin') -> user() ->can('list courses'))
                            <li><a class="slide-item" href="{{route('course.index')}}">{{trans('general.List')}}</a>
                            </li>
                        @endif
                        @if(auth('admin') -> user() ->can('create courses'))
                            <li><a class="slide-item" href="{{route('course.create')}}">{{trans('general.Add')}}</a>
                            </li>
                        @endif

                            <li><a class="slide-item" href="{{route('course.pendinglist')}}">{{trans('general.pendinglist')}}</a>
                            </li>


                    </ul>
                </li>
            @endif
            @if(auth('admin') -> user() ->can('Lectures'))
                <li class="slide">
                    <a class="side-menu__item" data-bs-toggle="slide" href="#">
                    <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 576 512"><path d="M542.22 32.05c-54.8 3.11-163.72 14.43-230.96 55.59-4.64 2.84-7.27 7.89-7.27 13.17v363.87c0 11.55 12.63 18.85 23.28 13.49 69.18-34.82 169.23-44.32 218.7-46.92 16.89-.89 30.02-14.43 30.02-30.66V62.75c.01-17.71-15.35-31.74-33.77-30.7zM264.73 87.64C197.5 46.48 88.58 35.17 33.78 32.05 15.36 31.01 0 45.04 0 62.75V400.6c0 16.24 13.13 29.78 30.02 30.66 49.49 2.6 149.59 12.11 218.77 46.95 10.62 5.35 23.21-1.94 23.21-13.46V100.63c0-5.29-2.62-10.14-7.27-12.99z"/></svg>
                        <span class="side-menu__label">
                                    {{trans('lectures/lectures.lectures')}}
                                </span>
                        <i class="angle fe fe-chevron-down">

                        </i>
                    </a>
                    <ul class="slide-menu">
                        @if(auth('admin') -> user() ->can('list Lecture'))

                            <li><a class="slide-item" href="{{route('lecture.index')}}">{{trans('general.List')}}</a>
                            </li>
                        @endif
                        @if(auth('admin') -> user() ->can('create Lecture'))

                            <li><a class="slide-item" href="{{route('lecture.create')}}">{{trans('general.Add')}}</a>
                            </li>
                        @endif

                    </ul>
                </li>
            @endif

             @if(auth('admin') -> user() ->can('Homework'))
                {{--                            <li class="side-item side-item-category">homework</li>--}}
                <li class="slide">
                    <a class="side-menu__item" data-bs-toggle="slide" href="#">
                    <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 384 512"><path d="M224 136V0H24C10.7 0 0 10.7 0 24v464c0 13.3 10.7 24 24 24h336c13.3 0 24-10.7 24-24V160H248c-13.2 0-24-10.8-24-24zm65.18 216.01H224v80c0 8.84-7.16 16-16 16h-32c-8.84 0-16-7.16-16-16v-80H94.82c-14.28 0-21.41-17.29-11.27-27.36l96.42-95.7c6.65-6.61 17.39-6.61 24.04 0l96.42 95.7c10.15 10.07 3.03 27.36-11.25 27.36zM377 105L279.1 7c-4.5-4.5-10.6-7-17-7H256v128h128v-6.1c0-6.3-2.5-12.4-7-16.9z"/></svg>                        <span class="side-menu__label">{{trans('Update.Homework')}}</span><i
                            class="angle fe fe-chevron-down"></i></a>
                    <ul class="slide-menu">
                         @if(auth('admin') -> user() ->can('list Homework'))
                            <li><a class="slide-item" href="{{route('homework.index')}}">
                                    {{--                                                {{trans('Update.Homework menu')}}--}}
                                    {{trans('general.List')}}
                                </a></li>
                        @endif
                        @if(auth('admin') -> user() ->can('create Homework'))

                            <li><a class="slide-item" href="{{route('homework.create')}}">{{trans('general.Add')}}</a>
                            </li>
                        @endif


                    </ul>
                </li>
             @endif

            @if(auth('admin') -> user() ->can('Tests'))
                <li class="slide">
                    <a class="side-menu__item" data-bs-toggle="slide" href="#">
                    <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 576 512"><path d="M218.17 424.14c-2.95-5.92-8.09-6.52-10.17-6.52s-7.22.59-10.02 6.19l-7.67 15.34c-6.37 12.78-25.03 11.37-29.48-2.09L144 386.59l-10.61 31.88c-5.89 17.66-22.38 29.53-41 29.53H80c-8.84 0-16-7.16-16-16s7.16-16 16-16h12.39c4.83 0 9.11-3.08 10.64-7.66l18.19-54.64c3.3-9.81 12.44-16.41 22.78-16.41s19.48 6.59 22.77 16.41l13.88 41.64c19.75-16.19 54.06-9.7 66 14.16 1.89 3.78 5.49 5.95 9.36 6.26v-82.12l128-127.09V160H248c-13.2 0-24-10.8-24-24V0H24C10.7 0 0 10.7 0 24v464c0 13.3 10.7 24 24 24h336c13.3 0 24-10.7 24-24v-40l-128-.11c-16.12-.31-30.58-9.28-37.83-23.75zM384 121.9c0-6.3-2.5-12.4-7-16.9L279.1 7c-4.5-4.5-10.6-7-17-7H256v128h128v-6.1zm-96 225.06V416h68.99l161.68-162.78-67.88-67.88L288 346.96zm280.54-179.63l-31.87-31.87c-9.94-9.94-26.07-9.94-36.01 0l-27.25 27.25 67.88 67.88 27.25-27.25c9.95-9.94 9.95-26.07 0-36.01z"/></svg>
                        <span class="side-menu__label">
                                    {{trans('tests/tests.tests')}}
                                </span>
                        <i class="angle fe fe-chevron-down">

                        </i>
                    </a>
                    <ul class="slide-menu">
                        @if(auth('admin') -> user() ->can('list Test'))
                            <li><a class="slide-item" href="{{route('test.index')}}">{{trans('general.List')}}</a></li>
                        @endif
                        @if(auth('admin') -> user() ->can('create Test'))
                            <li><a class="slide-item" href="{{route('test.create')}}">{{trans('general.Add')}}</a></li>
                        @endif
                    </ul>
                </li>
            @endif


            <li class="side-item side-item-category">{{trans('general.general')}}</li>

            @if(auth('admin') -> user() ->can('Certificates'))
                <li class="slide">
                    <a class="side-menu__item" data-bs-toggle="slide" href="#">
                    <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 384 512"><path d="M0 512V48C0 21.49 21.49 0 48 0h288c26.51 0 48 21.49 48 48v464L192 400 0 512z"/></svg>
                        <span class="side-menu__label">
                                    {{trans('certificates/certificates.certificates')}}



                                </span>
                        <i class="angle fe fe-chevron-down"></i>
                    </a>
                    <ul class="slide-menu">

                        @if(auth('admin') -> user() ->can('list Certificate'))

                            <li><a class="slide-item"
                                   href="{{route('certificate.index')}}">{{trans('general.List')}}</a></li>

                        @endif
                        @if(auth('admin') -> user() ->can('create Certificate'))
                            <li><a class="slide-item"
                                   href="{{route('certificate.create')}}">{{trans('general.Add')}}</a></li>
                        @endif
                    </ul>
                </li>
            @endif


            {{--                        <li class="side-item side-item-category">{{trans('Update.Blogs')}}</li>--}}
            @if(auth('admin') -> user() ->can('blogs'))
                <li class="slide">
                    <a class="side-menu__item" data-bs-toggle="slide" href="#">
                    <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 448 512"><path d="M162.4 196c4.8-4.9 6.2-5.1 36.4-5.1 27.2 0 28.1.1 32.1 2.1 5.8 2.9 8.3 7 8.3 13.6 0 5.9-2.4 10-7.6 13.4-2.8 1.8-4.5 1.9-31.1 2.1-16.4.1-29.5-.2-31.5-.8-10.3-2.9-14.1-17.7-6.6-25.3zm61.4 94.5c-53.9 0-55.8.2-60.2 4.1-3.5 3.1-5.7 9.4-5.1 13.9.7 4.7 4.8 10.1 9.2 12 2.2 1 14.1 1.7 56.3 1.2l47.9-.6 9.2-1.5c9-5.1 10.5-17.4 3.1-24.4-5.3-4.7-5-4.7-60.4-4.7zm223.4 130.1c-3.5 28.4-23 50.4-51.1 57.5-7.2 1.8-9.7 1.9-172.9 1.8-157.8 0-165.9-.1-172-1.8-8.4-2.2-15.6-5.5-22.3-10-5.6-3.8-13.9-11.8-17-16.4-3.8-5.6-8.2-15.3-10-22C.1 423 0 420.3 0 256.3 0 93.2 0 89.7 1.8 82.6 8.1 57.9 27.7 39 53 33.4c7.3-1.6 332.1-1.9 340-.3 21.2 4.3 37.9 17.1 47.6 36.4 7.7 15.3 7-1.5 7.3 180.6.2 115.8 0 164.5-.7 170.5zm-85.4-185.2c-1.1-5-4.2-9.6-7.7-11.5-1.1-.6-8-1.3-15.5-1.7-12.4-.6-13.8-.8-17.8-3.1-6.2-3.6-7.9-7.6-8-18.3 0-20.4-8.5-39.4-25.3-56.5-12-12.2-25.3-20.5-40.6-25.1-3.6-1.1-11.8-1.5-39.2-1.8-42.9-.5-52.5.4-67.1 6.2-27 10.7-46.3 33.4-53.4 62.4-1.3 5.4-1.6 14.2-1.9 64.3-.4 62.8 0 72.1 4 84.5 9.7 30.7 37.1 53.4 64.6 58.4 9.2 1.7 122.2 2.1 133.7.5 20.1-2.7 35.9-10.8 50.7-25.9 10.7-10.9 17.4-22.8 21.8-38.5 3.2-10.9 2.9-88.4 1.7-93.9z"/></svg>
                        <span class="side-menu__label">{{trans('Update.Blogs')}}</span><i
                            class="angle fe fe-chevron-down"></i></a>
                    <ul class="slide-menu">
                        @if(auth('admin') -> user() ->role ===1)
                            <li><a class="slide-item" href="{{route('blogs.records')}}">{{trans('Update.blogs record')}}</a>
                            </li>
                        @endif

                        @if(auth('admin') -> user() ->can('list blogs'))
                            <li><a class="slide-item" href="{{route('blogs.index')}}">{{trans('Update.blogs menu')}}</a>
                            </li>
                        @endif
                            @if(auth('admin') -> user() ->can('create blog'))
                            <li><a class="slide-item" href="{{route('blog.create')}}">{{trans('Update.Add Blog')}}</a>
                            </li>
                            @endif
                    </ul>
                </li>
            @endif
{{--                        <li class="slide">--}}
{{--                            <a class="side-menu__item" data-bs-toggle="slide" href="#"><svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 640 512"><path d="M208 352c-2.39 0-4.78.35-7.06 1.09C187.98 357.3 174.35 360 160 360c-14.35 0-27.98-2.7-40.95-6.91-2.28-.74-4.66-1.09-7.05-1.09C49.94 352-.33 402.48 0 464.62.14 490.88 21.73 512 48 512h224c26.27 0 47.86-21.12 48-47.38.33-62.14-49.94-112.62-112-112.62zm-48-32c53.02 0 96-42.98 96-96s-42.98-96-96-96-96 42.98-96 96 42.98 96 96 96zM592 0H208c-26.47 0-48 22.25-48 49.59V96c23.42 0 45.1 6.78 64 17.8V64h352v288h-64v-64H384v64h-76.24c19.1 16.69 33.12 38.73 39.69 64H592c26.47 0 48-22.25 48-49.59V49.59C640 22.25 618.47 0 592 0z"/></svg><span class="side-menu__label">{{trans('Update.Teachers')}}</span><i class="angle fe fe-chevron-down"></i></a>--}}
{{--                            <ul class="slide-menu">--}}
{{--                                <li><a class="slide-item" href="{{route('teachers.index')}}">{{trans('Update.Teachers menu')}}</a></li>--}}
{{--                               @if(auth('admin')->user()->role == 2)--}}
{{--                                <li><a class="slide-item" href="{{url('timeline')}}">{{trans('Teachers/Teachers.Timeline')}}</a></li>--}}
{{--                                @endif--}}
{{--                            </ul>--}}
{{--                        </li>--}}

            @if(auth('admin') -> user() ->can('Survey'))
                <li class="slide">
                    <a class="side-menu__item" data-bs-toggle="slide" href="#">
                    <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 512 512"><path d="M139.61 35.5a12 12 0 0 0-17 0L58.93 98.81l-22.7-22.12a12 12 0 0 0-17 0L3.53 92.41a12 12 0 0 0 0 17l47.59 47.4a12.78 12.78 0 0 0 17.61 0l15.59-15.62L156.52 69a12.09 12.09 0 0 0 .09-17zm0 159.19a12 12 0 0 0-17 0l-63.68 63.72-22.7-22.1a12 12 0 0 0-17 0L3.53 252a12 12 0 0 0 0 17L51 316.5a12.77 12.77 0 0 0 17.6 0l15.7-15.69 72.2-72.22a12 12 0 0 0 .09-16.9zM64 368c-26.49 0-48.59 21.5-48.59 48S37.53 464 64 464a48 48 0 0 0 0-96zm432 16H208a16 16 0 0 0-16 16v32a16 16 0 0 0 16 16h288a16 16 0 0 0 16-16v-32a16 16 0 0 0-16-16zm0-320H208a16 16 0 0 0-16 16v32a16 16 0 0 0 16 16h288a16 16 0 0 0 16-16V80a16 16 0 0 0-16-16zm0 160H208a16 16 0 0 0-16 16v32a16 16 0 0 0 16 16h288a16 16 0 0 0 16-16v-32a16 16 0 0 0-16-16z"/></svg>
                        <span class="side-menu__label">
                                    {{trans('surveys/surveys.surveys')}}
                                </span>
                        <i class="angle fe fe-chevron-down">

                        </i>
                    </a>
                    <ul class="slide-menu">
                        @if(auth('admin') -> user() ->can('list Survey'))
                            <li><a class="slide-item" href="{{route('survey.index')}}">{{trans('general.List')}}</a>
                            </li>
                        @endif
                        @if(auth('admin') -> user() ->can('create Survey'))
                            <li><a class="slide-item" href="{{route('survey.create')}}">{{trans('general.Add')}}</a>
                            </li>
                        @endif
                    </ul>
                </li>

            @endif

            @if(auth('admin') -> user() ->can('Schedule'))

                <li class="slide">
                    <a class="side-menu__item" data-bs-toggle="slide" href="#">
                    <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 448 512"><path d="M160 32V64H288V32C288 14.33 302.3 0 320 0C337.7 0 352 14.33 352 32V64H400C426.5 64 448 85.49 448 112V160H0V112C0 85.49 21.49 64 48 64H96V32C96 14.33 110.3 0 128 0C145.7 0 160 14.33 160 32zM0 192H448V464C448 490.5 426.5 512 400 512H48C21.49 512 0 490.5 0 464V192zM64 304C64 312.8 71.16 320 80 320H112C120.8 320 128 312.8 128 304V272C128 263.2 120.8 256 112 256H80C71.16 256 64 263.2 64 272V304zM192 304C192 312.8 199.2 320 208 320H240C248.8 320 256 312.8 256 304V272C256 263.2 248.8 256 240 256H208C199.2 256 192 263.2 192 272V304zM336 256C327.2 256 320 263.2 320 272V304C320 312.8 327.2 320 336 320H368C376.8 320 384 312.8 384 304V272C384 263.2 376.8 256 368 256H336zM64 432C64 440.8 71.16 448 80 448H112C120.8 448 128 440.8 128 432V400C128 391.2 120.8 384 112 384H80C71.16 384 64 391.2 64 400V432zM208 384C199.2 384 192 391.2 192 400V432C192 440.8 199.2 448 208 448H240C248.8 448 256 440.8 256 432V400C256 391.2 248.8 384 240 384H208zM320 432C320 440.8 327.2 448 336 448H368C376.8 448 384 440.8 384 432V400C384 391.2 376.8 384 368 384H336C327.2 384 320 391.2 320 400V432z"/></svg>
                        <span class="side-menu__label">{{trans('lectures/lectures.schedules')}}</span><i
                            class="angle fe fe-chevron-down"></i></a>
                    <ul class="slide-menu">
                        @if(auth('admin') -> user() ->can('create Schedule'))
                            <li><a class="slide-item" href="{{route('schedule.create')}}">اضافة</a></li>
                        @endif

                    </ul>
                </li>
            @endif

            @if(auth('admin') -> user() ->can('library'))
                <li class="slide">
                    <a class="side-menu__item" data-bs-toggle="slide" href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 512 512"><path d="M458.622 255.92l45.985-45.005c13.708-12.977 7.316-36.039-10.664-40.339l-62.65-15.99 17.661-62.015c4.991-17.838-11.829-34.663-29.661-29.671l-61.994 17.667-15.984-62.671C337.085.197 313.765-6.276 300.99 7.228L256 53.57 211.011 7.229c-12.63-13.351-36.047-7.234-40.325 10.668l-15.984 62.671-61.995-17.667C74.87 57.907 58.056 74.738 63.046 92.572l17.661 62.015-62.65 15.99C.069 174.878-6.31 197.944 7.392 210.915l45.985 45.005-45.985 45.004c-13.708 12.977-7.316 36.039 10.664 40.339l62.65 15.99-17.661 62.015c-4.991 17.838 11.829 34.663 29.661 29.671l61.994-17.667 15.984 62.671c4.439 18.575 27.696 24.018 40.325 10.668L256 458.61l44.989 46.001c12.5 13.488 35.987 7.486 40.325-10.668l15.984-62.671 61.994 17.667c17.836 4.994 34.651-11.837 29.661-29.671l-17.661-62.015 62.65-15.99c17.987-4.302 24.366-27.367 10.664-40.339l-45.984-45.004z"/></svg>
                        <span class="side-menu__label">
                                    {{trans('library/library.library')}}
                                </span>
                        <i class="angle fe fe-chevron-down">

                        </i>
                    </a>
                    <ul class="slide-menu">
                        @if(auth('admin') -> user() ->can('list library files'))
                            <li><a class="slide-item" href="{{route('library.index')}}">{{trans('general.List')}}</a>
                            </li>
                        @endif
                        @if(auth('admin') -> user() ->can('add library files'))
                            <li><a class="slide-item" href="{{route('library.create')}}">{{trans('general.Add')}}</a>
                            </li>
                        @endif

                    </ul>
                </li>
            @endif


            @if(auth('admin') -> user() ->can('Setting'))
                <li class="slide">
                    <a class="side-menu__item" href="{{route('settings')}}">
                    <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 640 512"><path d="M512.1 191l-8.2 14.3c-3 5.3-9.4 7.5-15.1 5.4-11.8-4.4-22.6-10.7-32.1-18.6-4.6-3.8-5.8-10.5-2.8-15.7l8.2-14.3c-6.9-8-12.3-17.3-15.9-27.4h-16.5c-6 0-11.2-4.3-12.2-10.3-2-12-2.1-24.6 0-37.1 1-6 6.2-10.4 12.2-10.4h16.5c3.6-10.1 9-19.4 15.9-27.4l-8.2-14.3c-3-5.2-1.9-11.9 2.8-15.7 9.5-7.9 20.4-14.2 32.1-18.6 5.7-2.1 12.1.1 15.1 5.4l8.2 14.3c10.5-1.9 21.2-1.9 31.7 0L552 6.3c3-5.3 9.4-7.5 15.1-5.4 11.8 4.4 22.6 10.7 32.1 18.6 4.6 3.8 5.8 10.5 2.8 15.7l-8.2 14.3c6.9 8 12.3 17.3 15.9 27.4h16.5c6 0 11.2 4.3 12.2 10.3 2 12 2.1 24.6 0 37.1-1 6-6.2 10.4-12.2 10.4h-16.5c-3.6 10.1-9 19.4-15.9 27.4l8.2 14.3c3 5.2 1.9 11.9-2.8 15.7-9.5 7.9-20.4 14.2-32.1 18.6-5.7 2.1-12.1-.1-15.1-5.4l-8.2-14.3c-10.4 1.9-21.2 1.9-31.7 0zm-10.5-58.8c38.5 29.6 82.4-14.3 52.8-52.8-38.5-29.7-82.4 14.3-52.8 52.8zM386.3 286.1l33.7 16.8c10.1 5.8 14.5 18.1 10.5 29.1-8.9 24.2-26.4 46.4-42.6 65.8-7.4 8.9-20.2 11.1-30.3 5.3l-29.1-16.8c-16 13.7-34.6 24.6-54.9 31.7v33.6c0 11.6-8.3 21.6-19.7 23.6-24.6 4.2-50.4 4.4-75.9 0-11.5-2-20-11.9-20-23.6V418c-20.3-7.2-38.9-18-54.9-31.7L74 403c-10 5.8-22.9 3.6-30.3-5.3-16.2-19.4-33.3-41.6-42.2-65.7-4-10.9.4-23.2 10.5-29.1l33.3-16.8c-3.9-20.9-3.9-42.4 0-63.4L12 205.8c-10.1-5.8-14.6-18.1-10.5-29 8.9-24.2 26-46.4 42.2-65.8 7.4-8.9 20.2-11.1 30.3-5.3l29.1 16.8c16-13.7 34.6-24.6 54.9-31.7V57.1c0-11.5 8.2-21.5 19.6-23.5 24.6-4.2 50.5-4.4 76-.1 11.5 2 20 11.9 20 23.6v33.6c20.3 7.2 38.9 18 54.9 31.7l29.1-16.8c10-5.8 22.9-3.6 30.3 5.3 16.2 19.4 33.2 41.6 42.1 65.8 4 10.9.1 23.2-10 29.1l-33.7 16.8c3.9 21 3.9 42.5 0 63.5zm-117.6 21.1c59.2-77-28.7-164.9-105.7-105.7-59.2 77 28.7 164.9 105.7 105.7zm243.4 182.7l-8.2 14.3c-3 5.3-9.4 7.5-15.1 5.4-11.8-4.4-22.6-10.7-32.1-18.6-4.6-3.8-5.8-10.5-2.8-15.7l8.2-14.3c-6.9-8-12.3-17.3-15.9-27.4h-16.5c-6 0-11.2-4.3-12.2-10.3-2-12-2.1-24.6 0-37.1 1-6 6.2-10.4 12.2-10.4h16.5c3.6-10.1 9-19.4 15.9-27.4l-8.2-14.3c-3-5.2-1.9-11.9 2.8-15.7 9.5-7.9 20.4-14.2 32.1-18.6 5.7-2.1 12.1.1 15.1 5.4l8.2 14.3c10.5-1.9 21.2-1.9 31.7 0l8.2-14.3c3-5.3 9.4-7.5 15.1-5.4 11.8 4.4 22.6 10.7 32.1 18.6 4.6 3.8 5.8 10.5 2.8 15.7l-8.2 14.3c6.9 8 12.3 17.3 15.9 27.4h16.5c6 0 11.2 4.3 12.2 10.3 2 12 2.1 24.6 0 37.1-1 6-6.2 10.4-12.2 10.4h-16.5c-3.6 10.1-9 19.4-15.9 27.4l8.2 14.3c3 5.2 1.9 11.9-2.8 15.7-9.5 7.9-20.4 14.2-32.1 18.6-5.7 2.1-12.1-.1-15.1-5.4l-8.2-14.3c-10.4 1.9-21.2 1.9-31.7 0zM501.6 431c38.5 29.6 82.4-14.3 52.8-52.8-38.5-29.6-82.4 14.3-52.8 52.8z"/></svg>

                        <span class="side-menu__label">
                                    {{trans('settings/settings.Settings')}}
                                </span>

                    </a>
                </li>
            @endif
            {{--						<li class="side-item side-item-category">WEB APPS</li>--}}
            {{--						<li class="slide">--}}
            {{--							<a class="side-menu__item" data-bs-toggle="slide" href="#"><svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M4 12c0 4.08 3.06 7.44 7 7.93V4.07C7.05 4.56 4 7.92 4 12z" opacity=".3"/><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-1 17.93c-3.94-.49-7-3.85-7-7.93s3.05-7.44 7-7.93v15.86zm2-15.86c1.03.13 2 .45 2.87.93H13v-.93zM13 7h5.24c.25.31.48.65.68 1H13V7zm0 3h6.74c.08.33.15.66.19 1H13v-1zm0 9.93V19h2.87c-.87.48-1.84.8-2.87.93zM18.24 17H13v-1h5.92c-.2.35-.43.69-.68 1zm1.5-3H13v-1h6.93c-.04.34-.11.67-.19 1z"/></svg><span class="side-menu__label">Apps</span><i class="angle fe fe-chevron-down"></i></a>--}}
            {{--							<ul class="slide-menu">--}}
            {{--								<li><a class="slide-item" href="{{url('cards')}}">Cards</a></li>--}}
            {{--								<li><a class="slide-item" href="{{url('draggablecards')}}">Draggablecards</a></li>--}}
            {{--								<li><a class="slide-item" href="{{url('rangeslider')}}">Range-slider</a></li>--}}
            {{--								<li><a class="slide-item" href="{{url('calendar')}}">Calendar</a></li>--}}
            {{--								<li><a class="slide-item" href="{{url('contacts')}}">Contacts</a></li>--}}
            {{--								<li><a class="slide-item" href="{{url('image-compare')}}">Image-compare</a></li>--}}
            {{--								<li><a class="slide-item" href="{{url('notification')}}">Notification</a></li>--}}
            {{--								<li><a class="slide-item" href="{{url('widget-notification')}}">Widget-notification</a></li>--}}
            {{--								<li><a class="slide-item" href="{{url('treeview')}}">Treeview</a></li>--}}
            {{--							</ul>--}}
            {{--						</li>--}}
            {{--						<li class="slide">--}}
            {{--							<a class="side-menu__item" data-bs-toggle="slide" href="#"><svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M6.26 9L12 13.47 17.74 9 12 4.53z" opacity=".3"/><path d="M19.37 12.8l-7.38 5.74-7.37-5.73L3 14.07l9 7 9-7zM12 2L3 9l1.63 1.27L12 16l7.36-5.73L21 9l-9-7zm0 11.47L6.26 9 12 4.53 17.74 9 12 13.47z"/></svg><span class="side-menu__label">Elements</span><i class="angle fe fe-chevron-down"></i></a>--}}
            {{--							<ul class="slide-menu">--}}
            {{--								<li><a class="slide-item" href="{{url('alerts')}}">Alerts</a></li>--}}
            {{--								<li><a class="slide-item" href="{{url('avatar')}}">Avatar</a></li>--}}
            {{--								<li><a class="slide-item" href="{{url('breadcrumbs')}}">Breadcrumbs</a></li>--}}
            {{--								<li><a class="slide-item" href="{{url('buttons')}}">Buttons</a></li>--}}
            {{--								<li><a class="slide-item" href="{{url('badge')}}">Badge</a></li>--}}
            {{--								<li><a class="slide-item" href="{{url('dropdown')}}">Dropdown</a></li>--}}
            {{--								<li><a class="slide-item" href="{{url('thumbnails')}}">Thumbnails</a></li>--}}
            {{--								<li><a class="slide-item" href="{{url('list-group')}}">List Group</a></li>--}}
            {{--								<li><a class="slide-item" href="{{url('navigation')}}">Navigation</a></li>--}}
            {{--								<li><a class="slide-item" href="{{url('images')}}">Images</a></li>--}}
            {{--								<li><a class="slide-item" href="{{url('pagination')}}">Pagination</a></li>--}}
            {{--								<li><a class="slide-item" href="{{url('popover')}}">Popover</a></li>--}}
            {{--								<li><a class="slide-item" href="{{url('progress')}}">Progress</a></li>--}}
            {{--								<li><a class="slide-item" href="{{url('spinners')}}">Spinners</a></li>--}}
            {{--								<li><a class="slide-item" href="{{url('media-object')}}">Media Object</a></li>--}}
            {{--								<li><a class="slide-item" href="{{url('typography')}}">Typography</a></li>--}}
            {{--								<li><a class="slide-item" href="{{url('tooltip')}}">Tooltip</a></li>--}}
            {{--								<li><a class="slide-item" href="{{url('toast')}}">Toast</a></li>--}}
            {{--								<li><a class="slide-item" href="{{url('tags')}}">Tags</a></li>--}}
            {{--								<li><a class="slide-item" href="{{url('tabs')}}">Tabs</a></li>--}}
            {{--							</ul>--}}
            {{--						</li>--}}
            {{--						<li class="slide">--}}
            {{--							<a class="side-menu__item" data-bs-toggle="slide" href="#"><svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24" ><path d="M0 0h24v24H0z" fill="none"/><path d="M12 4c-4.41 0-8 3.59-8 8s3.59 8 8 8c.28 0 .5-.22.5-.5 0-.16-.08-.28-.14-.35-.41-.46-.63-1.05-.63-1.65 0-1.38 1.12-2.5 2.5-2.5H16c2.21 0 4-1.79 4-4 0-3.86-3.59-7-8-7zm-5.5 9c-.83 0-1.5-.67-1.5-1.5S5.67 10 6.5 10s1.5.67 1.5 1.5S7.33 13 6.5 13zm3-4C8.67 9 8 8.33 8 7.5S8.67 6 9.5 6s1.5.67 1.5 1.5S10.33 9 9.5 9zm5 0c-.83 0-1.5-.67-1.5-1.5S13.67 6 14.5 6s1.5.67 1.5 1.5S15.33 9 14.5 9zm4.5 2.5c0 .83-.67 1.5-1.5 1.5s-1.5-.67-1.5-1.5.67-1.5 1.5-1.5 1.5.67 1.5 1.5z" opacity=".3"/><path d="M12 2C6.49 2 2 6.49 2 12s4.49 10 10 10c1.38 0 2.5-1.12 2.5-2.5 0-.61-.23-1.21-.64-1.67-.08-.09-.13-.21-.13-.33 0-.28.22-.5.5-.5H16c3.31 0 6-2.69 6-6 0-4.96-4.49-9-10-9zm4 13h-1.77c-1.38 0-2.5 1.12-2.5 2.5 0 .61.22 1.19.63 1.65.06.07.14.19.14.35 0 .28-.22.5-.5.5-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.14 8 7c0 2.21-1.79 4-4 4z"/><circle cx="6.5" cy="11.5" r="1.5"/><circle cx="9.5" cy="7.5" r="1.5"/><circle cx="14.5" cy="7.5" r="1.5"/><circle cx="17.5" cy="11.5" r="1.5"/></svg><span class="side-menu__label">Advanced UI</span><i class="angle fe fe-chevron-down"></i></a>--}}
            {{--							<ul class="slide-menu">--}}
            {{--								<li><a class="slide-item" href="{{url('accordion')}}">Accordion</a></li>--}}
            {{--								<li><a class="slide-item" href="{{url('carousel')}}">Carousel</a></li>--}}
            {{--								<li><a class="slide-item" href="{{url('collapse')}}">Collapse</a></li>--}}
            {{--								<li><a class="slide-item" href="{{url('modals')}}">Modals</a></li>--}}
            {{--								<li><a class="slide-item" href="{{url('timeline')}}">Timeline</a></li>--}}
            {{--								<li><a class="slide-item" href="{{url('sweet-alert')}}">Sweet Alert</a></li>--}}
            {{--								<li><a class="slide-item" href="{{url('rating')}}">Ratings</a></li>--}}
            {{--								<li><a class="slide-item" href="{{url('counters')}}">Counters</a></li>--}}
            {{--								<li><a class="slide-item" href="{{url('search')}}">Search</a></li>--}}
            {{--								<li><a class="slide-item" href="{{url('userlist')}}">Userlist</a></li>--}}
            {{--								<li><a class="slide-item" href="{{url('blog')}}">Blog</a></li>--}}
            {{--							</ul>--}}
            {{--						</li>--}}
            {{--						<li class="side-item side-item-category">COMPONENTS</li>--}}
            {{--						<li class="slide">--}}
            {{--							<a class="side-menu__item" data-bs-toggle="slide" href="#"><svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24" ><path d="M0 0h24v24H0V0z" fill="none"/><path d="M15 11V4H4v8.17l.59-.58.58-.59H6z" opacity=".3"/><path d="M21 6h-2v9H6v2c0 .55.45 1 1 1h11l4 4V7c0-.55-.45-1-1-1zm-5 7c.55 0 1-.45 1-1V3c0-.55-.45-1-1-1H3c-.55 0-1 .45-1 1v14l4-4h10zM4.59 11.59l-.59.58V4h11v7H5.17l-.58.59z"/></svg><span class="side-menu__label">Mail</span><i class="angle fe fe-chevron-down"></i></a>--}}
            {{--							<ul class="slide-menu">--}}
            {{--								<li><a class="slide-item" href="{{url('mail')}}">Mail</a></li>--}}
            {{--								<li><a class="slide-item" href="{{url('mail-compose')}}">Mail Compose</a></li>--}}
            {{--								<li><a class="slide-item" href="{{url('mail-read')}}">Read-mail</a></li>--}}
            {{--								<li><a class="slide-item" href="{{url('mail-settings')}}">mail-settings</a></li>--}}
            {{--								<li><a class="slide-item" href="{{url('chat')}}">Chat</a></li>--}}
            {{--							</ul>--}}
            {{--						</li>--}}
            {{--						<li class="slide">--}}
            {{--							<a class="side-menu__item" data-bs-toggle="slide" href="#"><svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M13 4H6v16h12V9h-5V4zm3 14H8v-2h8v2zm0-6v2H8v-2h8z" opacity=".3"/><path d="M8 16h8v2H8zm0-4h8v2H8zm6-10H6c-1.1 0-2 .9-2 2v16c0 1.1.89 2 1.99 2H18c1.1 0 2-.9 2-2V8l-6-6zm4 18H6V4h7v5h5v11z"/></svg><span class="side-menu__label">Forms</span><i class="angle fe fe-chevron-down"></i></a>--}}
            {{--							<ul class="slide-menu">--}}
            {{--								<li><a class="slide-item" href="{{url('form-elements')}}">Form Elements</a></li>--}}
            {{--								<li><a class="slide-item" href="{{url('form-advanced')}}">Advanced Forms</a></li>--}}
            {{--								<li><a class="slide-item" href="{{url('form-layouts')}}">Form Layouts</a></li>--}}
            {{--								<li><a class="slide-item" href="{{url('form-validation')}}">Form Validation</a></li>--}}
            {{--								<li><a class="slide-item" href="{{url('form-wizards')}}">Form Wizards</a></li>--}}
            {{--								<li><a class="slide-item" href="{{url('form-editor')}}">WYSIWYG Editor</a></li>--}}
            {{--							</ul>--}}
            {{--						</li>--}}
            {{--						<li class="slide">--}}
            {{--							<a class="side-menu__item" data-bs-toggle="slide" href="#"><svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24" ><path d="M0 0h24v24H0V0z" fill="none"/><path d="M5 5h15v3H5zm12 5h3v9h-3zm-7 0h5v9h-5zm-5 0h3v9H5z" opacity=".3"/><path d="M20 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h15c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zM8 19H5v-9h3v9zm7 0h-5v-9h5v9zm5 0h-3v-9h3v9zm0-11H5V5h15v3z"/></svg><span class="side-menu__label">Tables</span><i class="angle fe fe-chevron-down"></i></a>--}}
            {{--							<ul class="slide-menu">--}}
            {{--								<li><a class="slide-item" href="{{url('table-basic')}}">Basic Tables</a></li>--}}
            {{--								<li><a class="slide-item" href="{{url('table-data')}}">Data Tables</a></li>--}}
            {{--							</ul>--}}
            {{--						</li>--}}
            {{--						<li class="slide">--}}
            {{--							<a class="side-menu__item" href="{{url('widgets')}}"><svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon"  viewBox="0 0 24 24" ><path d="M0 0h24v24H0V0z" fill="none"/><path d="M5 5h4v4H5zm10 10h4v4h-4zM5 15h4v4H5zM16.66 4.52l-2.83 2.82 2.83 2.83 2.83-2.83z" opacity=".3"/><path d="M16.66 1.69L11 7.34 16.66 13l5.66-5.66-5.66-5.65zm-2.83 5.65l2.83-2.83 2.83 2.83-2.83 2.83-2.83-2.83zM3 3v8h8V3H3zm6 6H5V5h4v4zM3 21h8v-8H3v8zm2-6h4v4H5v-4zm8-2v8h8v-8h-8zm6 6h-4v-4h4v4z"/></svg><span class="side-menu__label">Widgets</span><span class="badge bg-warning text-dark" id="bg-side-text">Hot</span></a>--}}
            {{--						</li>--}}
            {{--						<li class="slide">--}}
            {{--							<a class="side-menu__item" data-bs-toggle="slide" href="#"><svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M12 4C9.24 4 7 6.24 7 9c0 2.85 2.92 7.21 5 9.88 2.11-2.69 5-7 5-9.88 0-2.76-2.24-5-5-5zm0 7.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z" opacity=".3"/><path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zM7 9c0-2.76 2.24-5 5-5s5 2.24 5 5c0 2.88-2.88 7.19-5 9.88C9.92 16.21 7 11.85 7 9z"/><circle cx="12" cy="9" r="2.5"/></svg><span class="side-menu__label">Maps</span><i class="angle fe fe-chevron-down"></i></a>--}}
            {{--							<ul class="slide-menu">--}}
            {{--								<li><a class="slide-item" href="{{url('map-leaflet')}}">Mapel Maps</a></li>--}}
            {{--								<li><a class="slide-item" href="{{url('map-vector')}}">Vector Maps</a></li>--}}
            {{--							</ul>--}}
            {{--						</li>--}}
            {{--						<li class="side-item side-item-category">Pages</li>--}}
            {{--						<li class="slide">--}}
            {{--							<a class="side-menu__item" data-bs-toggle="slide" href="#"><svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" class="side-menu__icon" viewBox="0 0 24 24" ><g><rect fill="none"/></g><g><g/><g><path d="M21,5c-1.11-0.35-2.33-0.5-3.5-0.5c-1.95,0-4.05,0.4-5.5,1.5c-1.45-1.1-3.55-1.5-5.5-1.5S2.45,4.9,1,6v14.65 c0,0.25,0.25,0.5,0.5,0.5c0.1,0,0.15-0.05,0.25-0.05C3.1,20.45,5.05,20,6.5,20c1.95,0,4.05,0.4,5.5,1.5c1.35-0.85,3.8-1.5,5.5-1.5 c1.65,0,3.35,0.3,4.75,1.05c0.1,0.05,0.15,0.05,0.25,0.05c0.25,0,0.5-0.25,0.5-0.5V6C22.4,5.55,21.75,5.25,21,5z M3,18.5V7 c1.1-0.35,2.3-0.5,3.5-0.5c1.34,0,3.13,0.41,4.5,0.99v11.5C9.63,18.41,7.84,18,6.5,18C5.3,18,4.1,18.15,3,18.5z M21,18.5 c-1.1-0.35-2.3-0.5-3.5-0.5c-1.34,0-3.13,0.41-4.5,0.99V7.49c1.37-0.59,3.16-0.99,4.5-0.99c1.2,0,2.4,0.15,3.5,0.5V18.5z"/><path d="M11,7.49C9.63,6.91,7.84,6.5,6.5,6.5C5.3,6.5,4.1,6.65,3,7v11.5C4.1,18.15,5.3,18,6.5,18 c1.34,0,3.13,0.41,4.5,0.99V7.49z" opacity=".3"/></g><g><path d="M17.5,10.5c0.88,0,1.73,0.09,2.5,0.26V9.24C19.21,9.09,18.36,9,17.5,9c-1.28,0-2.46,0.16-3.5,0.47v1.57 C14.99,10.69,16.18,10.5,17.5,10.5z"/><path d="M17.5,13.16c0.88,0,1.73,0.09,2.5,0.26V11.9c-0.79-0.15-1.64-0.24-2.5-0.24c-1.28,0-2.46,0.16-3.5,0.47v1.57 C14.99,13.36,16.18,13.16,17.5,13.16z"/><path d="M17.5,15.83c0.88,0,1.73,0.09,2.5,0.26v-1.52c-0.79-0.15-1.64-0.24-2.5-0.24c-1.28,0-2.46,0.16-3.5,0.47v1.57 C14.99,16.02,16.18,15.83,17.5,15.83z"/></g></g></svg><span class="side-menu__label">Pages</span><i class="angle fe fe-chevron-down"></i></a>--}}
            {{--							<ul class="slide-menu">--}}
            {{--								<li><a class="slide-item" href="{{url('profile')}}">Profile</a></li>--}}
            {{--								<li><a class="slide-item" href="{{url('editprofile')}}">Edit-Profile</a></li>--}}
            {{--								<li><a class="slide-item" href="{{url('invoice')}}">Invoice</a></li>--}}
            {{--								<li><a class="slide-item" href="{{url('pricing')}}">Pricing</a></li>--}}
            {{--								<li><a class="slide-item" href="{{url('gallery')}}">Gallery</a></li>--}}
            {{--								<li><a class="slide-item" href="{{url('todotask')}}">Todotask</a></li>--}}
            {{--								<li><a class="slide-item" href="{{url('faq')}}">Faqs</a></li>--}}
            {{--								<li><a class="slide-item" href="{{url('emptypage')}}">Empty Page</a></li>--}}
            {{--							</ul>--}}
            {{--						</li>--}}
            {{--						<li class="slide">--}}
            {{--							<a class="side-menu__item" data-bs-toggle="slide" href="#"><svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24" ><path d="M0 0h24v24H0V0z" fill="none"/><path d="M10.9 19.91c.36.05.72.09 1.1.09 2.18 0 4.16-.88 5.61-2.3L14.89 13l-3.99 6.91zm-1.04-.21l2.71-4.7H4.59c.93 2.28 2.87 4.03 5.27 4.7zM8.54 12L5.7 7.09C4.64 8.45 4 10.15 4 12c0 .69.1 1.36.26 2h5.43l-1.15-2zm9.76 4.91C19.36 15.55 20 13.85 20 12c0-.69-.1-1.36-.26-2h-5.43l3.99 6.91zM13.73 9h5.68c-.93-2.28-2.88-4.04-5.28-4.7L11.42 9h2.31zm-3.46 0l2.83-4.92C12.74 4.03 12.37 4 12 4c-2.18 0-4.16.88-5.6 2.3L9.12 11l1.15-2z" opacity=".3"/><path d="M12 22c5.52 0 10-4.48 10-10 0-4.75-3.31-8.72-7.75-9.74l-.08-.04-.01.02C13.46 2.09 12.74 2 12 2 6.48 2 2 6.48 2 12s4.48 10 10 10zm0-2c-.38 0-.74-.04-1.1-.09L14.89 13l2.72 4.7C16.16 19.12 14.18 20 12 20zm8-8c0 1.85-.64 3.55-1.7 4.91l-4-6.91h5.43c.17.64.27 1.31.27 2zm-.59-3h-7.99l2.71-4.7c2.4.66 4.35 2.42 5.28 4.7zM12 4c.37 0 .74.03 1.1.08L10.27 9l-1.15 2L6.4 6.3C7.84 4.88 9.82 4 12 4zm-8 8c0-1.85.64-3.55 1.7-4.91L8.54 12l1.15 2H4.26C4.1 13.36 4 12.69 4 12zm6.27 3h2.3l-2.71 4.7c-2.4-.67-4.35-2.42-5.28-4.7h5.69z"/></svg><span class="side-menu__label">Utilities</span><i class="angle fe fe-chevron-down"></i></a>--}}
            {{--							<ul class="slide-menu">--}}
            {{--								<li><a class="slide-item" href="{{url('background')}}">Background</a></li>--}}
            {{--								<li><a class="slide-item" href="{{url('border')}}">Border</a></li>--}}
            {{--								<li><a class="slide-item" href="{{url('display')}}">Display</a></li>--}}
            {{--								<li><a class="slide-item" href="{{url('flex')}}">Flex</a></li>--}}
            {{--								<li><a class="slide-item" href="{{url('height')}}">Height</a></li>--}}
            {{--								<li><a class="slide-item" href="{{url('margin')}}">Margin</a></li>--}}
            {{--								<li><a class="slide-item" href="{{url('padding')}}">Padding</a></li>--}}
            {{--								<li><a class="slide-item" href="{{url('position')}}">Position</a></li>--}}
            {{--								<li><a class="slide-item" href="{{url('width')}}">Width</a></li>--}}
            {{--								<li><a class="slide-item" href="{{url('extras')}}">Extras</a></li>--}}
            {{--							</ul>--}}
            {{--						</li>--}}
            {{--						<li class="slide">--}}
            {{--							<a class="side-menu__item" data-bs-toggle="slide" href="#"><svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M6 20h12V10H6v10zm6-7c1.1 0 2 .9 2 2s-.9 2-2 2-2-.9-2-2 .9-2 2-2z" opacity=".3"/><path d="M18 8h-1V6c0-2.76-2.24-5-5-5S7 3.24 7 6v2H6c-1.1 0-2 .9-2 2v10c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V10c0-1.1-.9-2-2-2zM9 6c0-1.66 1.34-3 3-3s3 1.34 3 3v2H9V6zm9 14H6V10h12v10zm-6-3c1.1 0 2-.9 2-2s-.9-2-2-2-2 .9-2 2 .9 2 2 2z"/></svg><span class="side-menu__label">Custom Pages</span><i class="angle fe fe-chevron-down"></i></a>--}}
            {{--							<ul class="slide-menu">--}}
            {{--								<li><a class="slide-item" href="{{url('signin')}}">Sign In</a></li>--}}
            {{--								<li><a class="slide-item" href="{{url('signup')}}">Sign Up</a></li>--}}
            {{--								<li><a class="slide-item" href="{{url('forgot')}}">Forgot Password</a></li>--}}
            {{--								<li><a class="slide-item" href="{{url('reset')}}">Reset Password</a></li>--}}
            {{--								<li><a class="slide-item" href="{{url('lockscreen')}}">Lockscreen</a></li>--}}
            {{--								<li><a class="slide-item" href="{{url('underconstruction')}}">UnderConstruction</a></li>--}}
            {{--								<li><a class="slide-item" href="{{url('error404')}}">404 Error</a></li>--}}
            {{--								<li><a class="slide-item" href="{{url('error500')}}">500 Error</a></li>--}}
            {{--							</ul>--}}
            {{--						</li>--}}
            {{--						<li class="slide ">--}}
            {{--							<a class="side-menu__item" data-bs-toggle="slide" href="#"><svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24" ><path d="M0 0h24v24H0V0z" fill="none"/><path d="M5 9h14V5H5v4zm2-3.5c.83 0 1.5.67 1.5 1.5S7.83 8.5 7 8.5 5.5 7.83 5.5 7 6.17 5.5 7 5.5zM5 19h14v-4H5v4zm2-3.5c.83 0 1.5.67 1.5 1.5s-.67 1.5-1.5 1.5-1.5-.67-1.5-1.5.67-1.5 1.5-1.5z" opacity=".3"/><path d="M20 13H4c-.55 0-1 .45-1 1v6c0 .55.45 1 1 1h16c.55 0 1-.45 1-1v-6c0-.55-.45-1-1-1zm-1 6H5v-4h14v4zm-12-.5c.83 0 1.5-.67 1.5-1.5s-.67-1.5-1.5-1.5-1.5.67-1.5 1.5.67 1.5 1.5 1.5zM20 3H4c-.55 0-1 .45-1 1v6c0 .55.45 1 1 1h16c.55 0 1-.45 1-1V4c0-.55-.45-1-1-1zm-1 6H5V5h14v4zM7 8.5c.83 0 1.5-.67 1.5-1.5S7.83 5.5 7 5.5 5.5 6.17 5.5 7 6.17 8.5 7 8.5z"/></svg><span class="side-menu__label">Submenus</span><i class="angle fe fe-chevron-down"></i></a>--}}
            {{--							<ul class="slide-menu">--}}
            {{--								<li><a class="slide-item" href="#">Level1</a></li>--}}
            {{--								<li class="sub-slide">--}}
            {{--									<a class="sub-side-menu__item" data-bs-toggle="sub-slide" href="#"><span class="sub-side-menu__label">Level2</span><i class="sub-angle fe fe-chevron-down"></i></a>--}}
            {{--									<ul class="sub-slide-menu">--}}
            {{--										<li><a class="sub-slide-item" href="#">Level01</a></li>--}}
            {{--										<li><a class="sub-slide-item" href="#">Level02</a></li>--}}
            {{--										<li class="sub-slide-sub">--}}
            {{--											<a class="sub-side-menu__item sub-slide-item" data-bs-toggle="sub-slide-sub" href="#"><span class="sub-side-menu__label">Level03</span><i class="sub-angle fe fe-chevron-down"></i></a>--}}
            {{--											<ul class="sub-slide-menu-sub">--}}
            {{--												<li><a class="sub-slide-item" href="#">Level11</a></li>--}}
            {{--												<li><a class="sub-slide-item" href="#">Level2</a></li>--}}
            {{--											</ul>--}}
            {{--										</li>--}}
            {{--									</ul>--}}
            {{--								</li>--}}
            {{--							</ul>--}}
            {{--						</li>--}}
        </ul>
    </div>
</aside>
<!-- main-sidebar -->
