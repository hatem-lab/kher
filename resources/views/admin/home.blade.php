@extends('layouts.app')

@section('styles')

    <!--  Owl-carousel css-->
    <link href="{{asset('assets/plugins/owl-carousel/owl.carousel.css')}}" rel="stylesheet" />

    <!-- Maps css -->
    <link href="{{asset('assets/plugins/jqvmap/jqvmap.min.css')}}" rel="stylesheet">

    <style>
        #compositeline5,#compositeline6,#compositeline7,#compositeline8 {
        canvas{
            width:100% !important;
        }
        }
    </style>
@endsection

@section('content')

    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="left-content">
            <div>
                <h2 class="main-content-title tx-24 mg-b-1 mg-b-lg-1">{{trans('dashboard/dashboard.welcome_kher')}}</h2>
                <!-- <p class="mg-b-0">{{trans('dashboard/dashboard.dashboard')}}</p> -->
            </div>
        </div>
{{--        <div class="main-dashboard-header-right">--}}
{{--            <div>--}}
{{--                <label class="tx-13">Customer Ratings</label>--}}
{{--                <div class="main-star">--}}
{{--                    <i class="typcn typcn-star active"></i> <i class="typcn typcn-star active"></i> <i class="typcn typcn-star active"></i> <i class="typcn typcn-star active"></i> <i class="typcn typcn-star"></i> <span>(14,873)</span>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div>--}}
{{--                <label class="tx-13">Online Sales</label>--}}
{{--                <h5>563,275</h5>--}}
{{--            </div>--}}
{{--            <div>--}}
{{--                <label class="tx-13">Offline Sales</label>--}}
{{--                <h5>783,675</h5>--}}
{{--            </div>--}}
{{--        </div>--}}
    </div>
    <!-- breadcrumb -->

    <!-- row -->
    <div class="row row-sm">
        <div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
            <div class="card overflow-hidden sales-card bg-primary-gradient">
                <div class="ps-3 pt-3 pe-3 pb-2 pt-0">
                    <div class=" float-left my-auto ms-auto">
                        <div class="">
                            <!-- <i class="icon-directions text-white"></i> -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon icon_white" viewBox="0 0 512 512"><path d="M458.622 255.92l45.985-45.005c13.708-12.977 7.316-36.039-10.664-40.339l-62.65-15.99 17.661-62.015c4.991-17.838-11.829-34.663-29.661-29.671l-61.994 17.667-15.984-62.671C337.085.197 313.765-6.276 300.99 7.228L256 53.57 211.011 7.229c-12.63-13.351-36.047-7.234-40.325 10.668l-15.984 62.671-61.995-17.667C74.87 57.907 58.056 74.738 63.046 92.572l17.661 62.015-62.65 15.99C.069 174.878-6.31 197.944 7.392 210.915l45.985 45.005-45.985 45.004c-13.708 12.977-7.316 36.039 10.664 40.339l62.65 15.99-17.661 62.015c-4.991 17.838 11.829 34.663 29.661 29.671l61.994-17.667 15.984 62.671c4.439 18.575 27.696 24.018 40.325 10.668L256 458.61l44.989 46.001c12.5 13.488 35.987 7.486 40.325-10.668l15.984-62.671 61.994 17.667c17.836 4.994 34.651-11.837 29.661-29.671l-17.661-62.015 62.65-15.99c17.987-4.302 24.366-27.367 10.664-40.339l-45.984-45.004z"/></svg>
                        </div>
                    </div>
                    <div class="">
                        <h6 class="mb-3 tx-22 text-white">{{trans('dashboard/dashboard.diplomas_num')}}</h6>
                    </div>
                    <div class="pb-0 mt-0">
                        <div class="d-flex">
                            <div class="">
                                <h4 class="tx-20 fw-bold mb-1 text-white">{{$diplomas_num}}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
            <div class="card overflow-hidden sales-card bg-danger-gradient">
                <div class="ps-3 pt-3 pe-3 pb-2 pt-0">
                    <div class=" float-left my-auto ms-auto">
                        <div class="">
                            <!-- <i class="icon-compass text-white"></i> -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon icon_white" viewBox="0 0 448 512"><path d="M448 360V24c0-13.3-10.7-24-24-24H96C43 0 0 43 0 96v320c0 53 43 96 96 96h328c13.3 0 24-10.7 24-24v-16c0-7.5-3.5-14.3-8.9-18.7-4.2-15.4-4.2-59.3 0-74.7 5.4-4.3 8.9-11.1 8.9-18.6zM128 134c0-3.3 2.7-6 6-6h212c3.3 0 6 2.7 6 6v20c0 3.3-2.7 6-6 6H134c-3.3 0-6-2.7-6-6v-20zm0 64c0-3.3 2.7-6 6-6h212c3.3 0 6 2.7 6 6v20c0 3.3-2.7 6-6 6H134c-3.3 0-6-2.7-6-6v-20zm253.4 250H96c-17.7 0-32-14.3-32-32 0-17.6 14.4-32 32-32h285.4c-1.9 17.1-1.9 46.9 0 64z"/></svg>
                        </div>
                    </div>
                    <div class="">
                        <h6 class="mb-3 tx-22 text-white">{{trans('dashboard/dashboard.courses_num')}}</h6>
                    </div>
                    <div class="pb-0 mt-0">
                        <div class="d-flex">
                            <div class="">
                                <h4 class="tx-20 fw-bold mb-1 text-white">{{$course_num}}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
            <div class="card overflow-hidden sales-card bg-success-gradient">
                <div class="ps-3 pt-3 pe-3 pb-2 pt-0">
                    <div class=" float-left my-auto ms-auto">
                        <div class="">
                            <!-- <i class="icon-badge text-white"></i> -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon icon_white" viewBox="0 0 640 512"><path d="M208 352c-2.39 0-4.78.35-7.06 1.09C187.98 357.3 174.35 360 160 360c-14.35 0-27.98-2.7-40.95-6.91-2.28-.74-4.66-1.09-7.05-1.09C49.94 352-.33 402.48 0 464.62.14 490.88 21.73 512 48 512h224c26.27 0 47.86-21.12 48-47.38.33-62.14-49.94-112.62-112-112.62zm-48-32c53.02 0 96-42.98 96-96s-42.98-96-96-96-96 42.98-96 96 42.98 96 96 96zM592 0H208c-26.47 0-48 22.25-48 49.59V96c23.42 0 45.1 6.78 64 17.8V64h352v288h-64v-64H384v64h-76.24c19.1 16.69 33.12 38.73 39.69 64H592c26.47 0 48-22.25 48-49.59V49.59C640 22.25 618.47 0 592 0z"/></svg>
                        </div>
                    </div>
                    <div class="">
                        <h6 class="mb-3 tx-22 text-white">{{trans('dashboard/dashboard.teachers_num')}}</h6>
                    </div>
                    <div class="pb-0 mt-0">
                        <div class="d-flex">
                            <div class="">
                                <h4 class="tx-20 fw-bold mb-1 text-white">{{$teachers_num}}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
            <div class="card overflow-hidden sales-card bg-warning-gradient">
                <div class="ps-3 pt-3 pe-3 pb-2 pt-0">
                    <div class=" float-left my-auto ms-auto">
                        <div class="">
                            <!-- <i class="icon-plus text-white"></i> -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon icon_white" viewBox="0 0 448 512"><path d="M319.4 320.6L224 416l-95.4-95.4C57.1 323.7 0 382.2 0 454.4v9.6c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48v-9.6c0-72.2-57.1-130.7-128.6-133.8zM13.6 79.8l6.4 1.5v58.4c-7 4.2-12 11.5-12 20.3 0 8.4 4.6 15.4 11.1 19.7L3.5 242c-1.7 6.9 2.1 14 7.6 14h41.8c5.5 0 9.3-7.1 7.6-14l-15.6-62.3C51.4 175.4 56 168.4 56 160c0-8.8-5-16.1-12-20.3V87.1l66 15.9c-8.6 17.2-14 36.4-14 57 0 70.7 57.3 128 128 128s128-57.3 128-128c0-20.6-5.3-39.8-14-57l96.3-23.2c18.2-4.4 18.2-27.1 0-31.5l-190.4-46c-13-3.1-26.7-3.1-39.7 0L13.6 48.2c-18.1 4.4-18.1 27.2 0 31.6z"/></svg>
                        </div>
                    </div>
                    <div class="">
                        <h6 class="mb-3 tx-22 text-white">{{trans('dashboard/dashboard.active_students_num')}}</h6>
                    </div>
                    <div class="pb-0 mt-0">
                        <div class="d-flex">
                            <div class="">
                                <h4 class="tx-20 fw-bold mb-1 text-white">{{$students_num}}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- row closed -->

    <!-- row -->
    <div class="row row-sm">
        <div class="col-xl-4 col-lg-6 col-md-6 col-xm-12">
            <div class="card overflow-hidden sales-card bg-primary-gradient">
                <div class="ps-3 pt-3 pe-3 pb-2 pt-0">
                    <div class=" float-left my-auto ms-auto">
                        <div class="">
                            <!-- <i class="icon-list text-white"></i> -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon icon_white" viewBox="0 0 512 512"><!-- Font Awesome Pro 5.15.4 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) --><path d="M0 168v-16c0-13.255 10.745-24 24-24h360V80c0-21.367 25.899-32.042 40.971-16.971l80 80c9.372 9.373 9.372 24.569 0 33.941l-80 80C409.956 271.982 384 261.456 384 240v-48H24c-13.255 0-24-10.745-24-24zm488 152H128v-48c0-21.314-25.862-32.08-40.971-16.971l-80 80c-9.372 9.373-9.372 24.569 0 33.941l80 80C102.057 463.997 128 453.437 128 432v-48h360c13.255 0 24-10.745 24-24v-16c0-13.255-10.745-24-24-24z"/></svg>
                        </div>
                    </div>
                    <div class="">
                        <h6 class="mb-3 tx-22 text-white">{{trans('dashboard/dashboard.student_request_num')}}</h6>
                    </div>
                    <div class="pb-0 mt-0">
                        <div class="d-flex">
                            <div class="">
                                <h4 class="tx-20 fw-bold mb-1 text-white">{{$pending_students_num}}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-lg-6 col-md-6 col-xm-12">
            <div class="card overflow-hidden sales-card bg-danger-gradient">
                <div class="ps-3 pt-3 pe-3 pb-2 pt-0">
                    <div class=" float-left my-auto ms-auto">
                        <div class="">
                            <!-- <i class="icon-layers text-white"></i> -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon icon_white" viewBox="0 0 448 512"><!-- Font Awesome Pro 5.15.4 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) --><path d="M224.3 273l-136 136c-9.4 9.4-24.6 9.4-33.9 0l-22.6-22.6c-9.4-9.4-9.4-24.6 0-33.9l96.4-96.4-96.4-96.4c-9.4-9.4-9.4-24.6 0-33.9L54.3 103c9.4-9.4 24.6-9.4 33.9 0l136 136c9.5 9.4 9.5 24.6.1 34zm192-34l-136-136c-9.4-9.4-24.6-9.4-33.9 0l-22.6 22.6c-9.4 9.4-9.4 24.6 0 33.9l96.4 96.4-96.4 96.4c-9.4 9.4-9.4 24.6 0 33.9l22.6 22.6c9.4 9.4 24.6 9.4 33.9 0l136-136c9.4-9.2 9.4-24.4 0-33.8z"/></svg>
                        </div>
                    </div>
                    <div class="">
                        <h6 class="mb-3 tx-22 text-white">{{trans('dashboard/dashboard.course_request_num')}}</h6>
                    </div>
                    <div class="pb-0 mt-0">
                        <div class="d-flex">
                            <div class="">
                                <h4 class="tx-20 fw-bold mb-1 text-white">{{$course_request_num}}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
{{--        <div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">--}}
{{--            <div class="card overflow-hidden sales-card bg-success-gradient">--}}
{{--                <div class="ps-3 pt-3 pe-3 pb-2 pt-0">--}}
{{--                    <div class="">--}}
{{--                        <h6 class="mb-3 tx-22 text-white">{{trans('dashboard/dashboard.teachers_num')}}</h6>--}}
{{--                    </div>--}}
{{--                    <div class="pb-0 mt-0">--}}
{{--                        <div class="d-flex">--}}
{{--                            <div class="">--}}
{{--                                <h4 class="tx-20 fw-bold mb-1 text-white">{{$teachers_num}}</h4>--}}
{{--                                <p class="mb-0 tx-12 text-white op-7">Compared to last week</p>--}}
{{--                            </div>--}}
{{--                            <span class="float-end my-auto ms-auto">--}}
{{--											<i class="fas fa-arrow-circle-up text-white"></i>--}}
{{--											<span class="text-white op-7"> 52.09%</span>--}}
{{--										</span>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <span id="compositeline3" class="pt-1">5,10,5,20,22,12,15,18,20,15,8,12,22,5,10,12,22,15,16,10</span>--}}
{{--            </div>--}}
{{--        </div>--}}
        <div class="col-xl-4 col-lg-6 col-md-6 col-xm-12">
            <div class="card overflow-hidden sales-card bg-success-gradient">
                <div class="ps-3 pt-3 pe-3 pb-2 pt-0">
                    <div class=" float-left my-auto ms-auto">
                        <div class="">
                            <!-- <i class="icon-people text-white"></i> -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon icon_white" viewBox="0 0 640 512"><path d="M0 224v272c0 8.84 7.16 16 16 16h80V192H32c-17.67 0-32 14.33-32 32zm360-48h-24v-40c0-4.42-3.58-8-8-8h-16c-4.42 0-8 3.58-8 8v64c0 4.42 3.58 8 8 8h48c4.42 0 8-3.58 8-8v-16c0-4.42-3.58-8-8-8zm137.75-63.96l-160-106.67a32.02 32.02 0 0 0-35.5 0l-160 106.67A32.002 32.002 0 0 0 128 138.66V512h128V368c0-8.84 7.16-16 16-16h96c8.84 0 16 7.16 16 16v144h128V138.67c0-10.7-5.35-20.7-14.25-26.63zM320 256c-44.18 0-80-35.82-80-80s35.82-80 80-80 80 35.82 80 80-35.82 80-80 80zm288-64h-64v320h80c8.84 0 16-7.16 16-16V224c0-17.67-14.33-32-32-32z"/></svg>
                        </div>
                    </div>
                    <div class="">
                        <h6 class="mb-3 tx-22 text-white">{{trans('dashboard/dashboard.user_num')}}</h6>
                    </div>
                    <div class="pb-0 mt-0">
                        <div class="d-flex">
                            <div class="">
                                <h4 class="tx-20 fw-bold mb-1 text-white">{{$users_num}}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- row closed -->


{{--    <!-- row opened -->--}}
{{--    <div class="row row-sm">--}}
{{--        <div class="col-md-12 col-lg-12 col-xl-7">--}}
{{--            <div class="card">--}}
{{--                <div class="card-header bg-transparent pd-b-0 pd-t-20 bd-b-0">--}}
{{--                    <div class="d-flex justify-content-between">--}}
{{--                        <h4 class="card-title mb-0">Order status</h4>--}}
{{--                        <i class="mdi mdi-dots-horizontal text-gray"></i>--}}
{{--                    </div>--}}
{{--                    <p class="tx-12 text-muted mb-0">Order Status and Tracking. Track your order from ship date to arrival. To begin, enter your order number.</p>--}}
{{--                </div>--}}
{{--                <div class="card-body">--}}
{{--                    <div class="total-revenue">--}}
{{--                        <div>--}}
{{--                            <h4>120,750</h4>--}}
{{--                            <label><span class="bg-primary"></span>success</label>--}}
{{--                        </div>--}}
{{--                        <div>--}}
{{--                            <h4>56,108</h4>--}}
{{--                            <label><span class="bg-danger"></span>Pending</label>--}}
{{--                        </div>--}}
{{--                        <div>--}}
{{--                            <h4>32,895</h4>--}}
{{--                            <label><span class="bg-warning"></span>Failed</label>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div id="bar" class="sales-bar mt-4"></div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="col-lg-12 col-xl-5">--}}
{{--            <div class="card card-dashboard-map-one">--}}
{{--                <label class="main-content-label">Sales Revenue by Customers in USA</label>--}}
{{--                <span class="d-block mg-b-20 text-muted tx-12">Sales Performance of all states in the United States</span>--}}
{{--                <div class="">--}}
{{--                    <div class="vmap-wrapper ht-180" id="vmap2"></div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <!-- row closed -->--}}

{{--    <!-- row opened -->--}}
{{--    <div class="row row-sm">--}}
{{--        <div class="col-xl-4 col-md-12 col-lg-12">--}}
{{--            <div class="card">--}}
{{--                <div class="card-header pb-1">--}}
{{--                    <h3 class="card-title mb-2">Recent Customers</h3>--}}
{{--                    <p class="tx-12 mb-0 text-muted">A customer is an individual or business that purchases the goods service has evolved to include real-time</p>--}}
{{--                </div>--}}
{{--                <div class="card-body p-0 customers mt-1">--}}
{{--                    <div class="list-group list-lg-group list-group-flush">--}}
{{--                        <div class="list-group-item list-group-item-action" href="#">--}}
{{--                            <div class="media mt-0">--}}
{{--                                <img class="avatar-lg rounded-circle m-r-3 my-auto" src="{{asset('assets/img/faces/3.jpg')}}" alt="Image description">--}}
{{--                                <div class="media-body">--}}
{{--                                    <div class="d-flex align-items-center">--}}
{{--                                        <div class="mt-0">--}}
{{--                                            <h5 class="mb-1 tx-15">Samantha Melon</h5>--}}
{{--                                            <p class="mb-0 tx-13 text-muted">User ID: #1234 <span class="text-success m-l-2">Paid</span></p>--}}
{{--                                        </div>--}}
{{--                                        <span class="ms-auto wd-45p fs-16 mt-2">--}}
{{--														<div id="spark1" class="wd-100p"></div>--}}
{{--													</span>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="list-group-item list-group-item-action br-t-1" href="#">--}}
{{--                            <div class="media mt-0">--}}
{{--                                <img class="avatar-lg rounded-circle m-r-3 my-auto" src="{{asset('assets/img/faces/11.jpg')}}" alt="Image description">--}}
{{--                                <div class="media-body">--}}
{{--                                    <div class="d-flex align-items-center">--}}
{{--                                        <div class="mt-1">--}}
{{--                                            <h5 class="mb-1 tx-15">Jimmy Changa</h5>--}}
{{--                                            <p class="mb-0 tx-13 text-muted">User ID: #1234 <span class="text-danger  m-l-2">Pending</span></p>--}}
{{--                                        </div>--}}
{{--                                        <span class="ms-auto wd-45p fs-16 mt-2">--}}
{{--														<div id="spark2" class="wd-100p"></div>--}}
{{--													</span>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="list-group-item list-group-item-action br-t-1" href="#">--}}
{{--                            <div class="media mt-0">--}}
{{--                                <img class="avatar-lg rounded-circle m-r-3 my-auto" src="{{asset('assets/img/faces/17.jpg')}}" alt="Image description">--}}
{{--                                <div class="media-body">--}}
{{--                                    <div class="d-flex align-items-center">--}}
{{--                                        <div class="mt-1">--}}
{{--                                            <h5 class="mb-1 tx-15">Gabe Lackmen</h5>--}}
{{--                                            <p class="mb-0 tx-13 text-muted">User ID: #1234<span class="text-danger  m-l-2">Pending</span></p>--}}
{{--                                        </div>--}}
{{--                                        <span class="ms-auto wd-45p fs-16 mt-2">--}}
{{--														<div id="spark3" class="wd-100p"></div>--}}
{{--													</span>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="list-group-item list-group-item-action br-t-1" href="#">--}}
{{--                            <div class="media mt-0">--}}
{{--                                <img class="avatar-lg rounded-circle m-r-3 my-auto" src="{{asset('assets/img/faces/15.jpg')}}" alt="Image description">--}}
{{--                                <div class="media-body">--}}
{{--                                    <div class="d-flex align-items-center">--}}
{{--                                        <div class="mt-1">--}}
{{--                                            <h5 class="mb-1 tx-15">Manuel Labor</h5>--}}
{{--                                            <p class="mb-0 tx-13 text-muted">User ID: #1234<span class="text-success  m-l-2">Paid</span></p>--}}
{{--                                        </div>--}}
{{--                                        <span class="ms-auto wd-45p fs-16 mt-2">--}}
{{--														<div id="spark4" class="wd-100p"></div>--}}
{{--													</span>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="list-group-item list-group-item-action br-t-1 br-br-7 br-bl-7" href="#">--}}
{{--                            <div class="media mt-0">--}}
{{--                                <img class="avatar-lg rounded-circle m-r-3 my-auto" src="{{asset('assets/img/faces/6.jpg')}}" alt="Image description">--}}
{{--                                <div class="media-body">--}}
{{--                                    <div class="d-flex align-items-center">--}}
{{--                                        <div class="mt-1">--}}
{{--                                            <h5 class="mb-1 tx-15">Sharon Needles</h5>--}}
{{--                                            <p class="b-0 tx-13 text-muted mb-0">User ID: #1234<span class="text-success  m-l-2">Paid</span></p>--}}
{{--                                        </div>--}}
{{--                                        <span class="ms-auto wd-45p fs-16 mt-2">--}}
{{--														<div id="spark5" class="wd-100p"></div>--}}
{{--													</span>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="col-xl-4 col-md-12 col-lg-6">--}}
{{--            <div class="card">--}}
{{--                <div class="card-header pb-1">--}}
{{--                    <h3 class="card-title mb-2">Sales Activity</h3>--}}
{{--                    <p class="tx-12 mb-0 text-muted">Sales activities are the tactics that salespeople use to achieve their goals and objective</p>--}}
{{--                </div>--}}
{{--                <div class="product-timeline card-body pt-2 mt-1">--}}
{{--                    <ul class="timeline-1 mb-0">--}}
{{--                        <li class="mt-0" id="mrg-8"> <i class="ti-pie-chart bg-primary-gradient text-white product-icon"></i> <span class="font-weight-semibold mb-4 tx-14 ">Total Products</span> <a href="#" class="float-left tx-11 text-muted">3 ago days</a>--}}
{{--                            <p class="mb-0 text-muted tx-12">1.3k New Products</p>--}}
{{--                        </li>--}}
{{--                        <li class="mt-0" id="mrg-8"> <i class="mdi mdi-cart-outline bg-danger-gradient text-white product-icon"></i> <span class="font-weight-semibold mb-4 tx-14 ">Total Sales</span> <a href="#" class="float-left tx-11 text-muted">35 ago mins</a>--}}
{{--                            <p class="mb-0 text-muted tx-12">1k New Sales</p>--}}
{{--                        </li>--}}
{{--                        <li class="mt-0" id="mrg-8"> <i class="ti-bar-chart-alt bg-success-gradient text-white product-icon"></i> <span class="font-weight-semibold mb-4 tx-14 ">Toatal Revenue</span> <a href="#" class="float-left tx-11 text-muted">50 ago mins</a>--}}
{{--                            <p class="mb-0 text-muted tx-12">23.5K New Revenue</p>--}}
{{--                        </li>--}}
{{--                        <li class="mt-0" id="mrg-8"> <i class="ti-wallet bg-warning-gradient text-white product-icon"></i> <span class="font-weight-semibold mb-4 tx-14 ">Toatal Profit</span> <a href="#" class="float-left tx-11 text-muted">1 ago hour</a>--}}
{{--                            <p class="mb-0 text-muted tx-12">3k New profit</p>--}}
{{--                        </li>--}}
{{--                        <li class="mt-0" id="mrg-8"> <i class="si si-eye bg-purple-gradient text-white product-icon"></i> <span class="font-weight-semibold mb-4 tx-14 ">Customer Visits</span> <a href="#" class="float-left tx-11 text-muted">1 ago day</a>--}}
{{--                            <p class="mb-0 text-muted tx-12">15% increased</p>--}}
{{--                        </li>--}}
{{--                        <li class="mt-0 mb-0" id="mrg-8"> <i class="icon-note icons bg-primary-gradient text-white product-icon"></i> <span class="font-weight-semibold mb-4 tx-14 ">Customer Reviews</span> <a href="#" class="float-left tx-11 text-muted">1 ago day</a>--}}
{{--                            <p class="mb-0 text-muted tx-12">1.5k reviews</p>--}}
{{--                        </li>--}}
{{--                    </ul>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="col-xl-4 col-md-12 col-lg-6">--}}
{{--            <div class="card">--}}
{{--                <div class="card-header pb-0">--}}
{{--                    <h3 class="card-title mb-2">Recent Orders</h3>--}}
{{--                    <p class="tx-12 mb-0 text-muted">An order is an investor's instructions to a broker or brokerage firm to purchase or sell</p>--}}
{{--                </div>--}}
{{--                <div class="card-body sales-info ot-0 pb-0 pt-0">--}}
{{--                    <div id="chart" class="ht-150"></div>--}}
{{--                    <div class="row sales-infomation pb-0 mb-0 mr-center wd-100p">--}}
{{--                        <div class="col-md-6 col">--}}
{{--                            <p class="mb-0 d-flex"><span class="legend bg-primary brround"></span>Delivered</p>--}}
{{--                            <h3 class="mb-1">5238</h3>--}}
{{--                            <div class="d-flex">--}}
{{--                                <p class="text-muted ">Last 6 months</p>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="col-md-6 col">--}}
{{--                            <p class="mb-0 d-flex"><span class="legend bg-info brround"></span>Cancelled</p>--}}
{{--                            <h3 class="mb-1">3467</h3>--}}
{{--                            <div class="d-flex">--}}
{{--                                <p class="text-muted">Last 6 months</p>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="card ">--}}
{{--                <div class="card-body">--}}
{{--                    <div class="row">--}}
{{--                        <div class="col-md-6">--}}
{{--                            <div class="d-flex align-items-center pb-2">--}}
{{--                                <p class="mb-0">Total Sales</p>--}}
{{--                            </div>--}}
{{--                            <h4 class="fw-bold mb-2">$7,590</h4>--}}
{{--                            <div class="progress progress-style progress-sm">--}}
{{--                                <div class="progress-bar bg-primary-gradient wd-80p" role="progressbar" aria-valuenow="78" aria-valuemin="0" aria-valuemax="78"></div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="col-md-6 mt-4 mt-md-0">--}}
{{--                            <div class="d-flex align-items-center pb-2">--}}
{{--                                <p class="mb-0">Active Users</p>--}}
{{--                            </div>--}}
{{--                            <h4 class="fw-bold mb-2">$5,460</h4>--}}
{{--                            <div class="progress progress-style progress-sm">--}}
{{--                                <div class="progress-bar bg-danger-gradient wd-75" role="progressbar"  aria-valuenow="45" aria-valuemin="0" aria-valuemax="45"></div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <!-- row close -->--}}

    <!-- row opened -->
    <div class="row row-sm row-deck">

        <div class="col-md-12 col-lg-6 col-xl-6">
            <div class="card card-table-two">
                <div class="d-flex justify-content-between">
                    <h4 class="card-title mb-1">{{trans('dashboard/dashboard.student_request')}}</h4>
                    <i class="mdi mdi-dots-horizontal text-gray"></i>
                </div>
                <span class="tx-12 tx-muted mb-3 ">{{trans('dashboard/dashboard.student_request_plc')}} <a href="#">{{trans('dashboard/dashboard.more')}} </a></span>
                <div class="table-responsive country-table">
                    <table class="table table-striped table-bordered mb-0 text-sm-nowrap text-lg-nowrap text-xl-nowrap">
                        <thead>
                        <tr>
                            <th class="wd-lg-25p">{{trans('dashboard/dashboard.name')}}</th>
                            <th class="wd-lg-25p tx-right">{{trans('dashboard/dashboard.email')}}</th>
                            <th class="wd-lg-25p tx-right">{{trans('dashboard/dashboard.certificate')}}</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($pending_students_request as $student )
                        <tr>
                            <td>{{$student->name_ar}}</td>
                            <td class="tx-right tx-medium tx-inverse">{{$student->email}}</td>
                            <td class="tx-right tx-medium tx-danger">{{$student->certificate ? $student->certificate->name_ar :''}}</td>
                        </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-12 col-lg-6 col-xl-6">
            <div class="card card-table-two">
                <div class="d-flex justify-content-between">
                    <h4 class="card-title mb-1">{{trans('dashboard/dashboard.course_request')}}</h4>
                    <i class="mdi mdi-dots-horizontal text-gray"></i>
                </div>
                <span class="tx-12 tx-muted mb-3 ">{{trans('dashboard/dashboard.course_request_plc')}} <a href="#">{{trans('dashboard/dashboard.more')}} </a></span>
                <div class="table-responsive country-table">
                    <table class="table table-striped table-bordered mb-0 text-sm-nowrap text-lg-nowrap text-xl-nowrap">
                        <thead>
                        <tr>
                            <th class="wd-lg-25p">{{trans('dashboard/dashboard.name')}}</th>
                            <th class="wd-lg-25p tx-right">{{trans('dashboard/dashboard.email')}}</th>
                            <th class="wd-lg-25p tx-right">{{trans('dashboard/dashboard.course')}}</th>
                            <th class="wd-lg-25p tx-right">{{trans('dashboard/dashboard.diploma')}}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($pending_courses_request as $request )
                        <tr>
                            <td>{{$request->student->name_ar}}</td>
                            <td class="tx-right tx-medium tx-inverse">{{$request->student->email}}</td>
                            <td class="tx-right tx-medium tx-inverse">{{$request->course->title}}</td>
                            <td class="tx-right tx-medium tx-danger">{{$request->course->diploma->title}}</td>
                        </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- /row -->

@endsection('content')

@section('scripts')

    <!-- Moment js -->
    <script src="{{asset('assets/plugins/raphael/raphael.min.js')}}"></script>

    <!--Internal  Chart.bundle js -->
    <script src="{{asset('assets/plugins/chartjs/Chart.bundle.min.js')}}"></script>

    <!--Internal Sparkline js -->
    <script src="{{asset('assets/plugins/jquery-sparkline/jquery.sparkline.min.js')}}"></script>

    <!--Internal Apexchart js-->
    <script src="{{asset('assets/js/apexcharts.js')}}"></script>

    <!-- Internal Map -->
    <script src="{{asset('assets/plugins/jqvmap/jquery.vmap.min.js')}}"></script>
    <script src="{{asset('assets/plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>

    <!--Internal  index js -->
    <script src="{{asset('assets/js/index.js')}}"></script>

    <!-- Apexchart js-->
    <script src="{{asset('assets/js/apexcharts.js')}}"></script>
    <script src="{{asset('assets/js/jquery.vmap.sampledata.js')}}"></script>

@endsection
