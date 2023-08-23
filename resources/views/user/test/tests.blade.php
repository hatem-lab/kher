@extends('user.layouts.master-page')

@section('title','الامتحانات')

@section('style')


@endsection


@section('content')

    <!-- Breadcrumb  start -->
    <section class="breadcrumb-wrap  br-bg-7 h-img-700">
        <div class="overlay op-6 bg-black"></div>
        <div class="container">
            <div class="row">
                <div class="col-xl-8 offset-xl-2 col-lg-10 offset-lg-1 col-md-10 offset-md-1">
                    <div class="breadcrumb-title">
                        <h2>{{trans('tests/tests.Tests')}}</h2>
                        <ul class="breadcrumb-menu">
                            <li><a href="{{route('site.home')}}">{{trans('tests/tests.Home')}} </a></li>
                            <li>{{trans('tests/tests.Tests')}}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb  end -->
    <!-- Event Section start -->
    <section class="event-wrap pt-100 pb-100">
        <div class="container">
            {{--            <div class="row align-items-end">--}}
            {{--                <div class="col-lg-12">--}}
            {{--                    <div class="section-title style1 text-center mb-40">--}}
            {{--                        <span>Home</span>--}}
            {{--                        <h2>Tests</h2>--}}
            {{--                    </div>--}}
            {{--                </div>--}}
            {{--            </div>--}}
            <div class="row justify-content-md-center">

                @foreach($tests as $test)
                    <div class="col-lg-2 col-md-4 col-sm-6 col-12">
                        <div class="course-card style3">
                            <!-- <div class="course-img">
                            </div> -->
                            <div class="event-date">
                                <?php
                                if ($test->done_status_code == 1) {
                                    $color = 'green';
                                } elseif ($test->done_status_code == 2) {
                                    $color = 'blue';

                                } elseif ($test->done_status_code == 3) {
                                    $color = 'red';

                                } else {
                                    $color = 'black';

                                }
                                ?>
                                <span class="style-span-time2">
                                    <span class="badge rounded-pill badge-light-primary">{{$test->done_status}}</span>

                                </span>
                                <div>
                                    <i class="las la-calendar"></i> {{\Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $test->date)->format('d-m-Y')}}
                                    <br>
                                    <i class="las la-clock "></i> {{\Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $test->date)->format('H:i')}}

                                </div>

                            </div>
                            <div class="course-info">
                                <h3><a href="{{route('student.test',$test->id)}}">{{$test->title}}</a></h3>
                                <span class="badge rounded-pill badge-light-primary">{{$test->done_status}} </span>

                            </div>
                            <!-- <div class="course-metainfo"> -->
                                <div class="course-metainfo-left">
                                    <span><i class="las la-map-marker-alt"></i>{{trans('tests/tests.course')}} : {{$test->course->title}}</span><br>
                                    <span><i
                                            class="las la-business-time m-t-20"></i>{{trans('tests/tests.duration')}}: {{$test->duration}}{{trans('tests/tests.minutes')}}</span>
                                </div>
                            <!-- </div> -->
                            <div class="course-metainfo-right">
                                <a href="{{route('student.test',$test->id)}}"
                                   class="btn v4">{{trans('tests/tests.show details')}} </a>
                            </div>
                        </div>
                    </div>

                    {{--                    <div class="col-xl-4 col-lg-6 col-md-6">--}}
                    {{--                    <div class="course-card style3">--}}
                    {{--                        <div class="course-img">--}}
                    {{--                            <a href="event-details.html"><img src="assets/img/event/event-1.jpg" alt="Image"></a>--}}
                    {{--                            <div class="event-date">--}}
                    {{--                                <i class="las la-calendar-week"></i>25 April, 2021 {{$test->date}}--}}
                    {{--                            </div>--}}
                    {{--                        </div>--}}
                    {{--                        <div class="course-info">--}}
                    {{--                            <h3><a href="event-details.html">{{$test->title}}</a></h3>--}}
                    {{--                        </div>--}}
                    {{--                        <div class="course-metainfo">--}}
                    {{--                            <div class="course-metainfo-left">--}}
                    {{--                                <p><i class="las la-map-marker-alt"></i>{{trans('tests/tests.course')}}: {{$test->course->title}}</p>--}}
                    {{--                                <p><i class="las la-business-time"></i>{{trans('tests/tests.duration')}}: {{$test->duration}} {{trans('test/test.minutes')}} </p>--}}
                    {{--                            </div>--}}
                    {{--                            <div class="course-metainfo-right">--}}
                    {{--                                <a href="event-details.html" class="btn v4">details</a>--}}
                    {{--                            </div>--}}
                    {{--                        </div>--}}
                    {{--                    </div>--}}
                    {{--                </div>--}}
                @endforeach
            </div>
            {{--            <div class="row mt-20">--}}
            {{--                <div class="col-lg-12 text-center">--}}
            {{--                    <a href="#" class="btn v1">Load More <i class="ri-loader-line"></i> </a>--}}
            {{--                </div>--}}
            {{--            </div>--}}
        </div>
    </section>
    <!-- Events Section end -->
@endsection

@section('script')


@endsection


