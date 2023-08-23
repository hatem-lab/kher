@extends('user.layouts.master-page')

@section('title','الكورسات')

@section('styles')

    <!-- Interenal Accordion Css -->
    <link href="{{asset('assets/plugins/accordion/accordion.css')}}" rel="stylesheet"/>
    <!--- Internal Select2 css-->
    <link href="{{asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">

    <!---Internal Fileupload css-->
    <link href="{{asset('assets/plugins/fileuploads/css/fileupload.css')}}" rel="stylesheet" type="text/css"/>

    <!---Internal Fancy uploader css-->
    <link href="{{asset('assets/plugins/fancyuploder/fancy_fileupload.css')}}" rel="stylesheet"/>

    <!--Internal Sumoselect css-->
    <link rel="stylesheet" href="{{asset('assets/plugins/sumoselect/sumoselect-rtl.css')}}">

    <!--Internal  TelephoneInput css-->
    <link rel="stylesheet" href="{{asset('assets/plugins/telephoneinput/telephoneinput-rtl.css')}}">

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
    <!-- Breadcrumb  start -->
    <section class="breadcrumb-wrap bg-f br-bg-4">
        <div class="overlay op-6 bg-black"></div>
        <div class="container">
            <div class="row">
                <div class="col-xl-8 offset-xl-2 col-lg-10 offset-lg-1 col-md-10 offset-md-1">
                    <div class="breadcrumb-title">
                        <h2>{{$lecture->title}}</h2>
                        <ul class="breadcrumb-menu">
                            <li><a href="{{route('site.home')}}">{{trans('courses/courses.Home')}}</a></li>
                            <li><a href="{{route('courses')}}">{{trans('courses/courses.courses')}} </a></li>
                            <li>
                                <a href="{{route('coursedetails',$lecture->course->id)}}">{{trans('courses/courses.Course Details')}}</a>
                            </li>
                            <li>{{trans('Lectures/Lectures.Lecture Details')}}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb  end -->
    <!-- Project Details Section start -->
    <section class="project-details-wrap ptb-100">
        <div class="container">
            <div class="row gx-5">
                <div class="col-xl-8 col-lg-8 col-md-12 col-12">
                    <div class="projecct-details">
                        <div class="course-details-img">
                            <img src="{{asset('end-user/assets/img/courseimg.png')}}" alt="Image">
                        </div>

                        <ul class="nav nav-tabs course-tablist" role="tablist">
                            <li class="nav-item">
                                <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#tab_1"
                                        type="button" role="tab">{{trans('lectures/lectures.Description')}}</button>
                            </li>
                            <li class="nav-item">
                                <button class="nav-link " data-bs-toggle="tab" data-bs-target="#tab_2" type="button"
                                        role="tab">{{trans('lectures/lectures.HomeWork')}}</button>
                            </li>
                            <li class="nav-item">
                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#tab_3" type="button"
                                        role="tab">{{trans('lectures/lectures.files')}}</button>
                            </li>
                            <li class="nav-item">
                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#tab_4" type="button"
                                        role="tab">{{trans('lectures/lectures.schedules')}}</button>
                            </li>
                        </ul>
                        <div class="tab-content course-tab-content">
                            <div class="tab-pane fade show active" id="tab_1" role="tabpanel">
                                <h5 class="mt-0">{!!$lecture->title!!}</h5>
                                <p>{!!$lecture->desc!!}</p>
                            </div>
                            <div class="tab-pane fade" id="tab_2" role="tabpanel">
                                @isset($lecture->homework)
                                <div class="accordion" id="accordionExample">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingOne">
                                            <button class="accordion-button collapsed" type="button"
                                                    data-bs-toggle="collapse" data-bs-target="#collapseOne"
                                                    aria-expanded="false" aria-controls="collapseOne">
                                                @isset($lecture->homework->title){{$lecture->homework->title}}@endisset
                                            </button>
                                        </h2>
                                        <div id="collapseOne" class="accordion-collapse collapse "
                                             aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                            <div class="accordion-body  lecture-accordion">
                                                <div class="lecture-item">
                                                    <div class="lecture-name">
                                                        <p><i class="las la-file-alt"></i><a
                                                                href="{{route('student.homework',$lecture->homework->id)}}">@isset($lecture->homework->desc){{$lecture->homework->desc}}@endisset</a>
                                                        </p>
                                                    </div>
                                                    <div class="lecture-time">
                                                        <span>@isset($lecture->homework->mark){{$lecture->homework->mark}} {{trans('lectures/lectures.Mark')}}@endisset</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endisset
                            </div>


                            <div class="tab-pane fade" id="tab_3" role="tabpanel">
                                <div class="row justify-content-cetner">
                                    @if($lecture->type ==0)

                                        @foreach ($lecture->files as $file )

                                            @if($file !== null)

                                            <div class="col-xl-6">
                                                <div class="team-member style2">
                                                    <div class="team-member-img">
                                                        <embed
                                                            src="{{URL::to('/') . '/Lecture/' . $file->name.'/'.$file->path}}"
                                                            width="600px" height="200px"/>
                                                        <ul class="social-profile style1">
                                                            <li><a target="_blank"
                                                                   href="{{ route('lecture.download',['path'=>$file->path,'file_name'=>$file->name])  }}"><i
                                                                        class="ri-download-fill"></i> </a></li>
                                                            <li><a target="_blank"
                                                                   href="{{ route('lecture.View_file',['path'=>$file->path,'file_name'=>$file->name])  }}">
                                                                    <i class="ri-eye-fill"></i> </a></li>
                                                        </ul>
                                                    </div>
                                                    <div class="team-member-info">
                                                        <h4>{{$file->name}}</h4>

                                                    </div>
                                                </div>
                                            </div>
                                            @endif
                                        @endforeach

                                    @endif


                                    @if($lecture->type == 1)
                                        <div class="project-details-para">
                                            <h4>الرابط</h4>
                                            <div class="event-map mt-25">
                                                {{$lecture->link}}
                                            </div>
                                        </div>
                                    @endif

                                </div>

                            </div>
                            <div class="tab-pane fade" id="tab_4" role="tabpanel">
                                <div class="post-comment-wrap mb-0 review-box">
                                    @foreach ($lecture->schedules as $item)
                                        <div class="comment-item">
                                            <div class="comment-author_img">
                                                <img src="{{asset('end-user/assets/img/images_chat.png')}}" alt="Image">
                                            </div>
                                            <div class="comment-author_text">
                                                <div class="comment-author_info">
                                                    <h6>{{$item->start_date}}</h6>

                                                </div>
                                                <p>{{App\Models\User::where('id',$item->user_id)->first()->name}}</p>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-12 col-12">
                    <div class="sidebar">
                        <div class="sidebar-widget event-countdown">
                            <div class="event-cd bg-f1 ">
                                <div class=" op-6 bg-black"></div>
                                <div class="event-counter ">
                                    <div class="countdown text-center d-flex" data-countdown="2021/5/11"></div>
                                </div>
                            </div>
                        </div>
                        <div class="course-details-widget sidebar-box">
                            <h5>{{trans('lectures/lectures.Details lectures')}}</h5>
                            <ul>
                                <li>
                                    <p><i class="las la-user-graduate"></i>{{trans('lectures/lectures.Start Date')}}</p>
                                    <p>{{explode(" ",$lecture->start_date)[0]}}</p>
                                </li>
                                <li>
                                    <p><i class="las la-file-alt"></i>{{trans('lectures/lectures.Start Time')}}</p>
                                    <p>{{explode(" ",$lecture->start_date)[1]}}</p>
                                </li>
                                <li>
                                    <p><i class="las la-clock"></i>{{trans('lectures/lectures.End Date')}}</p>
                                    <p>{{explode(" ",$lecture->end_date)[0]}}</p>
                                </li>
                                <li>
                                    <p><i class="las la-question-circle"></i>{{trans('lectures/lectures.End Time')}}</p>
                                    <p>{{explode(" ",$lecture->end_date)[1]}}</p>
                                </li>
                                <li>
                                    <p><i class="las la-check-square"></i>{{trans('lectures/lectures.course')}}</p>
                                    <p>{{$lecture->course->title}}</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
<!-- Project Details Section end -->
@section('script')
    <!--Internal  Select2 js -->
    <script src="{{asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js')}}"></script>

    <!-- Internal Select2 js-->
    <script src="{{asset('assets/plugins/select2/js/select2.min.js')}}"></script>

    <!--Internal Fileuploads js-->
    <script src="{{asset('assets/plugins/fileuploads/js/fileupload.js')}}"></script>
    <script src="{{asset('assets/plugins/fileuploads/js/file-upload.js')}}"></script>

    <!--Internal Fancy uploader js-->
    <script src="{{asset('assets/plugins/fancyuploder/jquery.ui.widget.js')}}"></script>
    <script src="{{asset('assets/plugins/fancyuploder/jquery.fileupload.js')}}"></script>
    <script src="{{asset('assets/plugins/fancyuploder/jquery.iframe-transport.js')}}"></script>
    <script src="{{asset('assets/plugins/fancyuploder/jquery.fancy-fileupload.js')}}"></script>
    <script src="{{asset('assets/plugins/fancyuploder/fancy-uploader.js')}}"></script>

    <!--Internal  Form-elements js-->
    <script src="{{asset('assets/js/advanced-form-elements.js')}}"></script>
    <script src="{{asset('assets/js/select2.js')}}"></script>

    <!--Internal Sumoselect js-->
    <script src="{{asset('assets/plugins/sumoselect/jquery.sumoselect.js')}}"></script>

    <!-- Internal TelephoneInput js-->
    <script src="{{asset('assets/plugins/telephoneinput/telephoneinput.js')}}"></script>
    <script src="{{asset('assets/plugins/telephoneinput/inttelephoneinput.js')}}"></script>

@endsection


