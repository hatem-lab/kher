@extends('user.layouts.master-page')

@section('title','التقدم العلمي')

@section('style')
    <!---Internal Fileupload css-->
    <link href="{{asset('assets/plugins/fileuploads/css/fileupload.css')}}" rel="stylesheet" type="text/css"/>

    <!---Internal Fancy uploader css-->
    <link href="{{asset('assets/plugins/fancyuploder/fancy_fileupload.css')}}" rel="stylesheet"/>

    <!--Internal Sumoselect css-->
    <link rel="stylesheet" href="{{asset('assets/plugins/sumoselect/sumoselect-rtl.css')}}">

    <!--Internal  TelephoneInput css-->
    <link rel="stylesheet" href="{{asset('assets/plugins/telephoneinput/telephoneinput-rtl.css')}}">

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
    <!---Internal  Owl Carousel css-->
    <link href="{{asset('assets/plugins/owl-carousel/owl.carousel.css')}}" rel="stylesheet">

    <!--- Internal Timeline css-->
    <link href="{{asset('assets/plugins/timeline/css/timeline.min.css')}}" rel="stylesheet">
    <!--Internal  Font Awesome -->
    <link href="{{asset('assets/plugins/fontawesome-free/css/all.min.css')}}" rel="stylesheet">

    <!--Internal  treeview -->
    <link href="{{asset('assets/plugins/treeview/treeview-rtl.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('end-user/assets/css/progress.css')}}" rel="stylesheet">



@endsection


@section('content')


    <!-- Breadcrumb  start -->
    <section class="breadcrumb-wrap  br-bg-5 h-img-700">
        <div class="overlay op-6 bg-black"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumb-title">
                        <h2>{{trans('students/students.Progress')}}</h2>
                        <ul class="breadcrumb-menu">
                            <li><a href="{{route('site.home')}}">{{trans('students/students.Home')}} </a></li>
                            <li>{{trans('students/students.Progress')}}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb  end -->




    <!-- ===================================================================================== -->
    <div class="body">
    @foreach($diplomas as $diploma)

        <!-- -->
            <div class="box-progress">


                <h3 class="p-t-23 diploma-color text-center">{{trans('students/students.Diploma Name')}} :
                    {{$diploma->title}}
                </h3>
                <!--  -->
                <!-- <p>Please set the $vertical variable to false to see the horizontal version.</p> -->
                <ul id='timelinee'>
                    @foreach($courses as $course)
                        @if(($course->diploma_id)==($diploma->id))
                            <li>
                                <!-- <input class='radio' id="work" name='works' type='radio' checked> -->
                                <div class="relativee">
                                    <span class='datee text-blue'>{{$course->title}}</span>
                                    <label for="work"
                                           class="text-custom p-r-20">{{trans('students/students.course name')}}
                                        : {{$course->title}}</label>
                                    <span class='circlee'></span>
                                </div>
                                <div class='contentss'>
                                    <div class="style-div1">
                                        <a href="{{route('Course_details',$course->id)}}"
                                           class="text-white">{{trans('students/students.course Details')}}</a>
                                    </div>
                                    @if($course->is_finished == 1 && App\Models\RequestCertificate::where('course_id',$course->id)->where('student_id',auth('student')->user()->id)->first() == null)
                                        <div class="style-div">
                                            <a href="{{route('student.course.requestcertificate', ['id'=>$course->id,'diploma_id'=>$diploma->id])}}"
                                               class="text-white">{{trans('students/students.stage')}}</a>
                                        </div>
                                    @else
                                        <div class="style-div">
                                            {{trans('tests/tests.in_progress')}}
                                        </div>
                                    @endif
                                </div>
                            </li>

                        @endif
                    @endforeach

                </ul>
                <hr>

            </div>
        @endforeach
    </div>

    <!-- =====================================================================================  -->

@section('script')


@endsection


@section('script')


    <script src="{{asset('assets/plugins/fileuploads/js/fileupload.js')}}"></script>
    <script src="{{asset('assets/plugins/fileuploads/js/file-upload.js')}}"></script>


    <script src="{{asset('assets/plugins/fancyuploder/jquery.ui.widget.js')}}"></script>
    <script src="{{asset('assets/plugins/fancyuploder/jquery.fileupload.js')}}"></script>
    <script src="{{asset('assets/plugins/fancyuploder/jquery.iframe-transport.js')}}"></script>
    <script src="{{asset('assets/plugins/fancyuploder/jquery.fancy-fileupload.js')}}"></script>
    <script src="{{asset('assets/plugins/fancyuploder/fancy-uploader.js')}}"></script>

    <script src="{{asset('assets/plugins/treeview/treeview.js')}}"></script>

@endsection


