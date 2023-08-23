@extends('user.layouts.master-page')

@section('title','التفاصيل الكاملة للكورس')

@section('content')


    <!-- Breadcrumb  start -->
    <section class="breadcrumb-wrap  br-bg-4 h-img-700">
        <div class="overlay op-6 bg-black"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumb-title">
                        <h2>{{trans('students/students.Progress')}}</h2>
                        <ul class="breadcrumb-menu">
                            <li><a href="{{route('site.home')}}">{{trans('students/students.Home')}} </a></li>
                            <li>{{trans('students/students.course all details')}}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb  end -->
    <div>

        <!-- Instructor Details Section start -->
        <section class="instructor-details-wrap ptb-100">
            <div class="container">
                <h2 class="bg-custom m-b-20">{{trans('students/students.Course Name')}} :{{$course->title}}</h2>
                <div class="col-lg-12 col-md-12">
                    <ul class="nav flex-nav nav-tabs course-tablist style2" role="tablist">
                        <li class="nav-item">
                            <button class="nav-link " data-bs-toggle="tab" data-bs-target="#tab_1" type="button"
                                    role="tab">{{trans('students/students.description')}}</button>
                        </li>
                        <li class="nav-item">
                            <button class="nav-link" data-bs-toggle="tab" data-bs-target="#tab_2" type="button"
                                    role="tab">{{trans('students/students.exam results')}}</button>
                        </li>
                        <li class="nav-item">
                            <button class="nav-link" data-bs-toggle="tab" data-bs-target="#tab_3" type="button"
                                    role="tab">{{trans('students/students.homeworks')}}</button>
                        </li>
                        <li class="nav-item">
                            <button class="nav-link" data-bs-toggle="tab" data-bs-target="#tab_4" type="button"
                                    role="tab">{{trans('students/students.Presence and absence')}}</button>
                        </li>
                    </ul>
                </div>
                <div class="tab-content insructor-tab-content">
                    <div class="tab-pane fade show active" id="tab_1" role="tabpanel">
                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                <div class="card overflow-hidden">
                                    <div class="card-header pb-0 p-t-20 bg-color">
                                        <h3 class="card-title text-white">{{trans('students/students.courses progress')}} </h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="panel-group1" id="accordion11">

                                            <div class="panel panel-default  mb-4">
                                            <!--<div class="panel-heading1">
                                                                                                <h4 class="panel-title1 bg-custom m-b-20">
                                                                                                    <a class="accordion-toggle collapsed bg-custom" data-bs-toggle="collapse"
                                                                                                    data-bs-parent="#accordion11" href="#collapse{{$course->id}}"
                                                                                                    aria-expanded="false" >{{trans('students/students.Course Name')}} :{{$course->title}}<i class="fe fe-arrow-left me-2"></i></a>
                                                                                                </h4>
                                                                                            </div> -->
                                            <!-- <div id="collapse{{$course->id}}" class="panel-collapse collapse" role="tabpanel"
                                                                                                        aria-expanded="false"> -->
                                                <div class="panel-body">
                                                    <form role="form">
                                                        <div class="form-group m-b-20 ">
                                                            <label for="FullName"
                                                                   class="bg-custom fs-20 f-w-800">{{trans('students/students.Course Name')}}
                                                                : </label>
                                                            <label>{{$course->title}}</label>
                                                        </div>
                                                        <form role="form">
                                                            <div class="form-group m-b-20 ">
                                                                <label for="FullName"
                                                                       class="bg-custom fs-20 f-w-800">{{trans('students/students.description')}}
                                                                    : </label>
                                                                <label>{{ $course->desc }}</label>
                                                            </div>

                                                            <div class="form-group m-b-20 ">
                                                                <label for="Email"
                                                                       class="bg-custom fs-20 f-w-800">{{trans('students/students.Diploma title')}}</label>
                                                                <label>{{$course->diploma->title}}</label>

                                                            </div>
                                                            <div class="form-group m-b-20 ">
                                                                <label for="FullName"
                                                                       class="bg-custom fs-20 f-w-800">{{trans('students/students.Diploma description')}}</label>
                                                                <label>{{ $course->diploma->desc }}</label>
                                                            </div>
                                                        </form>
                                                    </form>
                                                </div>
                                                <!-- </div> -->

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="tab-pane fade" id="tab_2" role="tabpanel">
                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                <div class="card overflow-hidden">
                                    <div class="card-header pb-0 p-t-20 bg-color">
                                        <h3 class="card-title text-white">{{trans('students/students.exam results')}} </h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            @if(!$course->tests->isEmpty())
                                                @foreach($course->tests as $test)
                                                    @if(\App\Models\StudentTest::where('test_id',$test->id)->where('student_id',auth('student')->user()->id)->first())
                                                        <div class="col-xl-4 col-lg-6 col-md-6">
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
                                                                    <h3>
                                                                        <a href="{{route('student.test',$test->id)}}">{{$test->title}}</a>
                                                                    </h3>
                                                                    <span
                                                                        class="badge rounded-pill badge-light-primary">{{$test->done_status}} </span>

                                                                </div>
                                                                <div class="course-metainfo">
                                                                    <div class="course-metainfo-left">
                                                                        <span><i class="las la-map-marker-alt"></i>{{trans('tests/tests.course')}} : {{$test->course->title}}</span><br>
                                                                        <span><i
                                                                                class="las la-business-time m-t-20"></i>{{trans('tests/tests.duration')}}: {{$test->duration}}{{trans('tests/tests.minutes')}}</span>
                                                                    </div>
                                                                    <div class="course-metainfo-right">
                                                                        <a href="{{route('student.test',$test->id)}}"
                                                                           class="btn v4">{{trans('tests/tests.show details')}} </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @else
                                                        <div class="col-lg-3 col-md-12">
                                                            <label for="Email">{{$test->title}}</label>
                                                            <input readonly type="email"
                                                                   value="لم يقدم هذا الطالب هذا الاحتبار بعد"
                                                                   id="Email"
                                                                   class="form-control">
                                                        </div>
                                                    @endif
                                                @endforeach
                                            @else
                                                <div class="col-lg-3 col-md-12">
                                                    <label
                                                        for="Email">{{trans('students/students.homework result')}}</label>
                                                    <input readonly type="email"
                                                           value="لم يوجد اختبارات في هذا الكورس بعد" id="Email"
                                                           class="form-control">
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="tab_3" role="tabpanel">
                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                <div class="card overflow-hidden">

                                    <div class="card-header pb-0 p-t-20 bg-color">
                                        <h3 class="card-title text-white">{{trans('students/students.homeworks')}} </h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                        @if(!$course->homeworks->isEmpty())
                                            @foreach($course->homeworks as $homework)
                                                <!-- ====================================================== -->
                                                    <!-- <div class="row justify-content-md-center"> -->
                                                    <div class="col-lg-3 col-md-6">
                                                        <div class="course-card style3">
                                                            <div class="course-img">
                                                                <img src="{{asset('end-user/assets/img/homework.jpg')}}"
                                                                     alt="Image"/>

                                                            </div>
                                                            <div class="event-date">
                                                                <i class="las la-calendar-week"></i>{{$homework->created_at->diffForHumans()}}
                                                            </div>
                                                            <div class="course-info">
                                                                <h3>
                                                                    <a href="{{route('student.homework',$homework->id)}}">
                                                                        {{$homework->title}}


                                                                    </a></h3>
                                                            </div>
                                                            <div class="course-metainfo">
                                                                <div class="course-metainfo-right">
                                                                    <a href="{{route('student.homework',$homework->id)}}"
                                                                       class="btn v4">{{trans('diplomas/diplomas.show details')}}</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>




                                                    <!-- ====================================================== -->


                                                @endforeach
                                            @else
                                                <div class="col-lg-3 col-md-12">
                                                    <label
                                                        for="Email">{{trans('students/students.homework result')}}</label>
                                                    <input readonly type="email" value="لم يوجد وظائف في هذا الكورس بعد"
                                                           id="Email"
                                                           class="form-control">
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="tab_4" role="tabpanel">
                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                <div class="card overflow-hidden">
                                    <div class="card-header pb-0 p-t-20 bg-color">
                                        <h3 class="card-title text-white">{{trans('students/students.exam results')}} </h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-4 col-md-12">
                                                <label for="Email">{{trans('students/students.present result')}}</label>
                                                <input readonly type="email"
                                                       value="{{App\Helpers\General::studentPresent($course,auth('student')->user()->id)}}"
                                                       id="Email"
                                                       class="form-control">
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col-lg-4 col-md-12">
                                                <label
                                                    for="Email">{{trans('students/students.result as value')}}</label>
                                                <input readonly type="email"
                                                       value="{{App\Helpers\General::studentResult($course,auth('student')->user()->id)}}"
                                                       id="Email"
                                                       class="form-control">
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col-lg-4 col-md-12">
                                                <label for="Email">{{trans('students/students.result as text')}}</label>
                                                <input readonly type="email"
                                                       value="{{App\Helpers\General::resultStudentText($course,auth('student')->user()->id)}}"
                                                       id="Email"
                                                       class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>
{{--            @if($course->is_finished == 1 && App\Models\RequestCertificate::where('course_id',$course->id)->where('student_id',auth('student')->user()->id)->first() == null)--}}
{{--                <a href="{{route('student.course.requestcertificate', $course->id)}}"--}}
{{--                   class="btn v3">{{trans('enduser/Home/Home.Request Certificate')}}</a>--}}
{{--        @endif--}}

    </div>



@endsection
