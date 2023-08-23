@extends('user.layouts.master-page')

@section('title','الاستبيانات')

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
                        <h2>{{trans('surveys/surveys.surveys')}}</h2>
                        <ul class="breadcrumb-menu">
                            <li><a href="{{route('site.home')}}">{{trans('tests/tests.Home')}} </a></li>
                            <li>{{trans('surveys/surveys.surveys')}}</li>
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

                @foreach($surveys as $survey)
                    <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                        <div class="course-card style3">
                            <div class="course-img">
                                <img src="{{asset('end-user/assets/img/survey-report.jpg')}}" alt="img-education">
                            </div>
                            <div class="event-date">


                                <div>
                                    <i class="las la-calendar-week"></i> {{\Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $survey->created_at)->format('d-m-Y')}}
                                    <i class="las la-clock"></i> {{\Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $survey->created_at)->format('H:i')}}

                                </div>

                            </div>
                            <div class="course-info">
                                <h3><a href="{{route('student.survayD',$survey->id)}}">{{$survey->title}}</a></h3>

                            </div>
                            <div class="course-metainfo">
                                <div class="course-metainfo-left">
                                    <p><i class="las la-map-marker-alt"></i>{{trans('tests/tests.course')}}
                                        : {{isset($survey->course) ? $survey->course->title : trans('surveys/surveys.general')}}
                                    </p>
                                </div>
                                <div class="course-metainfo-right">
                                    <a href="{{route('student.survayD',$survey->id)}}"
                                       class="btn v4">{{trans('tests/tests.show details')}} </a>
                                </div>
                            </div>
                        </div>
                    </div>


                @endforeach
            </div>
        </div>
    </section>
    <!-- Events Section end -->
@endsection

@section('script')


@endsection


