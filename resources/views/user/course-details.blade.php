@extends('user.layouts.master-page')

@section('title','تفاصيل الكورس')

@section('style')


@endsection


@section('content')
    <div class="contact-popup">
        <div class="contact-popup-title">
            <button type="button" class="close-popup"><i class="ri-close-fill"></i></button>
        </div>
        <div class="contact-popup-wrap">
            <div class="comp-info">
                <div class="comp-logo">
                    <a href="{{route('site.home')}}">
                        <img class="logo-light" src="assets/img/logo.png" alt="Image">
                        <img class="logo-dark" src="assets/img/logo-white.png" alt="Image">
                    </a>
                </div>
                <p class="comp-desc">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                    incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                    ullamco laboris nisi ut aliquip</p>
                <ul class="footer-contact-address">
                    <li><a href="tel:999762236473"> <i class="ri-phone-line"></i> +999 762 23 6473</a></li>
                    <li><i class="ri-mail-send-fill"></i> <a href="mailto:info@ecour.com">info@ecour.com</a></li>
                    <li><i class="ri-earth-fill"></i> <a href="https://www.ecour.com">www.ecour.com</a></li>
                    <li>
                        <i class="ri-map-pin-fill"></i> 24th North Lane, Hill Town, New York
                    </li>
                </ul>
            </div>
            <div class="comp-map">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3151.8385385572983!2d144.95358331584498!3d-37.81725074201705!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ad65d4dd5a05d97%3A0x3e64f855a564844d!2s121%20King%20St%2C%20Melbourne%20VIC%203000%2C%20Australia!5e0!3m2!1sen!2sbd!4v1612419490850!5m2!1sen!2sbd"></iframe>
            </div>
            <div class="share-on text-center">
                <ul class="social-profile style2">
                    <li><a target="_blank" href="https://facebook.com"><i class="ri-facebook-fill"></i> </a></li>
                    <li><a target="_blank" href="https://twitter.com"> <i class="ri-twitter-fill"></i> </a></li>
                    <li><a target="_blank" href="https://linkedin.com"> <i class="ri-linkedin-fill"></i> </a></li>
                    <li><a target="_blank" href="https://instagram.com"> <i class="ri-instagram-line"></i> </a></li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Header  end -->
    <!-- Breadcrumb start -->
    <section class="breadcrumb-wrap  br-bg-4 h-img-700">
        <div class="overlay op-6 bg-black"></div>
        <div class="container">
            <div class="row">
                <div class="col-xl-8 offset-xl-2 col-lg-10 offset-lg-1 col-md-10 offset-md-1">
                    <div class="breadcrumb-title">
                        <h2>{{trans('courses/courses.Course Details')}}</h2>
                        <ul class="breadcrumb-menu">
                            <li><a href="{{route('site.home')}}">{{trans('courses/courses.Home')}}</a></li>
                            <li><a href="{{route('courses')}}">{{trans('courses/courses.courses')}} </a></li>
                            <li>{{trans('courses/courses.Course Details')}}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb  end -->
    <!-- Course Details Section start -->
    <section class="course-details-wrap ptb-100">
        <div class="container">
            <div class="row gx-5">
                <div class="col-lg-8">
                    <div class="course-details">
                        <div class="course-details-img">
                            @if($course->image != null)
                                <img src="{{URL::to('/') . '/Course/' . $course->title.'/'.$course->image}}"
                                     alt="Image">
                            @else
                                <img src="{{asset('end-user/assets/img/Learn-Quran-For-Kids.png')}}" alt="Image">
                            @endif
                        </div>
                        <ul class="course-details-meta">
                            <li><i class="las la-clock"></i>{{$hours}}{{trans('diplomas/diplomas.Hours')}}</li>
                            <li>
                                <i class="las la-graduation-cap"></i>{{count($course->students)}}{{trans('diplomas/diplomas.Students')}}
                            </li>

                        </ul>
                        <ul class="nav nav-tabs course-tablist" role="tablist">
                            <li class="nav-item">
                                <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#tab_1"
                                        type="button" role="tab">{{trans('diplomas/diplomas.Description')}}</button>
                            </li>
                            <li class="nav-item">
                                <button class="nav-link " data-bs-toggle="tab" data-bs-target="#tab_2" type="button"
                                        role="tab">{{trans('diplomas/diplomas.Lectures')}}</button>
                            </li>
                            <li class="nav-item">
                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#tab_3" type="button"
                                        role="tab">{{trans('diplomas/diplomas.Diplomas')}}</button>
                            </li>
                            <li class="nav-item">
                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#tab_4" type="button"
                                        role="tab">{{trans('diplomas/diplomas.Reviews')}}</button>
                            </li>
                        </ul>
                        <div class="tab-content course-tab-content">
                            <div class="tab-pane fade show active" id="tab_1" role="tabpanel">
                                <h5 class="mt-0">{{$course->title}}</h5>
                                <p>{{$course->desc}}</p>
                            </div>
                            <div class="tab-pane fade" id="tab_2" role="tabpanel">
                                <div class="accordion" id="accordionExample">
                                    @foreach ($course->lectures as $lec )


                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="headingOne">
                                                <button class="accordion-button collapsed" type="button"
                                                        data-bs-toggle="collapse" data-bs-target="#collapse{{$lec->id}}"
                                                        aria-expanded="false" aria-controls="collapseOne">
                                                    {!!$lec->title!!}
                                                </button>
                                            </h2>
                                            {{--                                         //   @if(!$is_registerd->isEmpty())--}}
                                            <div id="collapse{{$lec->id}}" class="accordion-collapse collapse "
                                                 aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                                <div class="accordion-body  lecture-accordion">
                                                    <div class="lecture-item">
                                                        @if(auth('student')->user())
                                                            @if(!$is_registerd->isEmpty())
                                                                <div class="lecture-name">
                                                                    <p><i class="las la-file-alt"></i><a
                                                                            href="{{route('lecturedetails',$lec->id)}}">{!!$lec->desc!!}</a>
                                                                    </p>

                                                                </div>
                                                            @endif
                                                        @endif
                                                        @if(auth('user')->user())
                                                            <div class="lecture-name">
                                                                <p><i class="las la-file-alt"></i><a
                                                                        href="{{route('lecturedetails',$lec->id)}}">{!!$lec->desc!!}</a>
                                                                </p>
                                                            </div>
                                                        @endif

                                                        <div class="lecture-time">
                                                            @if($lec->type == 1)
                                                                @if(auth('student')->user())
                                                                    @if(!$is_registerd->isEmpty())
                                                                        <span class="style-span-time">
                                                                        <a href="{{route('lecturedetails',$lec->id)}}"><span
                                                                                style="color:white; "
                                                                                class="badge rounded-pill badge-light-primary">متزامن</span></a>
                                                                        </span><br>
                                                                        <span>{{(strtotime($lec->end_date) - strtotime($lec->start_date)) / 60}} {{trans('diplomas/diplomas.min')}}</span>

                                                                    @endif
                                                                @endif
                                                                @if(auth('user')->user())
                                                                    <span class="style-span-time">
                                                                        <a href="{{route('lecturedetails',$lec->id)}}"><span
                                                                                style="color:white; "
                                                                                class="badge rounded-pill badge-light-primary">متزامن</span></a>
                                                                            </span><br>
                                                                    <span>{{(strtotime($lec->end_date) - strtotime($lec->start_date)) / 60}} {{trans('diplomas/diplomas.min')}}</span>
                                                                @endif

                                                            @else
                                                                @if(auth('student')->user())
                                                                    @if(!$is_registerd->isEmpty())
                                                                        <span class="style-span-time2">
                                                                        <a href="{{route('lecturedetails',$lec->id)}}"><span
                                                                                style="color:white;"
                                                                                class="badge rounded-pill badge-light-primary">غير متزامن </span></a>
                                                                        </span><br>
                                                                        <span>{{(strtotime($lec->end_date) - strtotime($lec->start_date)) / 60}} {{trans('diplomas/diplomas.min')}}</span>
                                                                    @endif
                                                                @endif

                                                                @if(auth('user')->user())
                                                                    <span class="style-span-time2">
                                                                         <a href="{{route('lecturedetails',$lec->id)}}"><span
                                                                                 style="color:white;"
                                                                                 class="badge rounded-pill badge-light-primary">غير متزامن </span></a>
                                                                         </span><br>
                                                                    <span>{{(strtotime($lec->end_date) - strtotime($lec->start_date)) / 60}} {{trans('diplomas/diplomas.min')}}</span>

                                                                @endif


                                                            @endif
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            {{--                                            @endif--}}
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="tab-pane fade" id="tab_3" role="tabpanel">
                                <div class="row justify-content-cetner">


                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="team-member m-r-34 m-r-5">
                                            <div class="team-member-img">
                                                @if($course->diploma->image != null)
                                                    <img
                                                        src="{{URL::to('/') . '//Course//' . $course->title.'/'.$course->image}}"
                                                        alt="Image">
                                                @else
                                                    <img
                                                        src="{{asset('end-user/assets/img/vecteezygraduation-certificateas0420_generated.jpg')}}"
                                                        alt="Image">
                                                @endif

                                            </div>
                                            <div class="team-member-info">
                                                <h4>{{$course->diploma->title}}</h4>
                                                <div class=" showpanel team-member-info" style="overflow:hidden">
                                                    <div id="basic-desc">
                                                        <p>{!!$course->diploma->desc!!}</p>
                                                    </div>
                                                </div>
                                                <div class="toggleHolder p-b-1">
                                                    <button
                                                        class=" descShow toggler-1 btn btn-toggle">{{trans('enduser/Home/Home.Show More')}}</button>
                                                    <button
                                                        class="toggler-2 btn btn-toggle-close">{{trans('enduser/Home/Home.Show Less')}}</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                            </div>
                            <div class="tab-pane fade" id="tab_4" role="tabpanel">
                                <div class="post-comment-wrap mb-0 review-box">
                                    @foreach ($course->students as $item)


                                        <div class="comment-item">
                                            <div class="comment-author_img">
                                                <img src="{{asset('end-user/assets/img/avatar-male.png')}}" alt="Image">
                                            </div>
                                            <div class="comment-author_text">
                                                <div class="comment-author_info">
                                                    <h6>{{$item->name_en}}</h6>
                                                    <div class="course-rating">
                                                        <ul>
                                                            @for ($i = 0; $i < 5; $i++)
                                                                @if ($i < App\Models\CourseStudent::where('course_id',$course->id)->where('student_id',$item->id)->first()->rating)
                                                                    <li><i class="ri-star-fill"></i></li>
                                                                @else

                                                                    <li><i class="ri-star-line"></i></li>
                                                                @endif
                                                            @endfor
                                                        </ul>
                                                    </div>
                                                </div>
                                                <p>{{App\Models\CourseStudent::where('course_id',$course->id)->where('student_id',$item->id)->first()->rating}}</p>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="course-details-widget sidebar-box">
                        <ul>
                            <li>
                                <p><i class="las la-user-graduate"></i>{{trans('diplomas/diplomas.Students')}}</p>
                                <p>{{count($course->students)}}</p>
                            </li>
                            <li>
                                <p><i class="las la-file-alt"></i>{{trans('diplomas/diplomas.Lectures')}}</p>
                                <p>{{count($course->lectures)}}</p>
                            </li>
                            <li>
                                <p><i class="las la-clock"></i>{{trans('tests/tests.Duration')}}</p>
                                <p>{{$hours}}</p>
                            </li>
                            <li>
                                <p><i class="las la-question-circle"></i>{{trans('tests/tests.Tests')}}</p>
                                <p>{{count($course->tests)}}</p>
                            </li>
                            <li>
                                <p><i class="las la-check-square"></i>{{trans('tests/tests.Homeworks')}}</p>
                                <p>{{count($course->homeworks)}}</p>
                            </li>
                        </ul>
                    </div>
                    @if(auth('student')->user())
                        @if($course->is_finished == 1 )
                            <a href="{{route('student.course.requestcertificate', ['id'=>$course->id,'diploma_id'=>$course->diploma->id])}}"
                               class="btn v3">{{trans('enduser/Home/Home.Request Certificate')}}</a>
                        @endif
                    @endif


                </div>
            </div>
        </div>
    </section>

@endsection

@section('script')


@endsection


