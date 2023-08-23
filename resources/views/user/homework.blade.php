@extends('user.layouts.master-page')

@section('title','الوظائف')

@section('style')


@endsection


@section('content')
    <!-- Breadcrumb  start -->
    <section class="breadcrumb-wrap  br-bg-homework h-img-700">
        <div class="overlay op-6 bg-black"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumb-title">
                        <h2>{{trans('diplomas/diplomas.Homeworks')}}</h2>
                        <ul class="breadcrumb-menu">
                            <li><a href="{{route('site.home')}}">{{trans('diplomas/diplomas.Home')}} </a></li>
                            <li>{{trans('diplomas/diplomas.Homeworks')}}</li>
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
            <div class="row align-items-end">
                <div class="col-lg-12">
                    <div class="section-title style1 text-center mb-40">
                        <h2>{{trans('diplomas/diplomas.Homeworks')}}</h2>
                    </div>
                </div>
            </div>
            <div class="row justify-content-md-evenly">
                @if(auth('student')->user())
                    @isset($homeworks_students)
                        @foreach($homeworks_students as $one)
                            @if(! \App\Models\StudentFile::where('homework_id',$one->id)->where('student_id',auth('student')->user()->id)->first())

                                <div class="col-lg-2 col-md-4 col-sm-12">
                                    <div class="course-card style3">
                                        <div class="course-img">
                                            <img src="{{asset('end-user/assets/img/homework.jpg')}}" alt="Image"/>
                                            {{--                            <div class="event-date">--}}
                                            {{--                                <i class="las la-calendar-week"></i>25 April, 2021--}}
                                            {{--                            </div>--}}
                                        </div>
                                        <div class="event-date">
                                            <i class="las la-calendar-week"></i>{{$one->created_at->diffForHumans()}}
                                        </div>
                                        <div class="course-info">
                                            <h3><a href="{{route('student.homework',$one->id)}}">
                                                    {{$one->title}}


                                                </a></h3>
                                        </div>
                                        <div class="course-metainfo">
                                            <div class="course-metainfo-left">
                                                <p>@isset($one->lecture->title){{$one->lecture->title}}@endisset</p>
                                            </div>
                                            <div class="course-metainfo-right">
                                                <a href="{{route('student.homework',$one->id)}}"
                                                   class="btn v4">{{trans('diplomas/diplomas.show details')}}</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    @endisset
                @else
                    <div class="col-xl-4 col-lg-6 col-md-6">
                        <div class="course-card style3">
                            <div class="course-img">

                            </div>

                            <div class="course-info">
                                <h3><a href="#">you have to be student to see your homeworks</a></h3>
                            </div>

                        </div>
                    </div>
                @endif
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


