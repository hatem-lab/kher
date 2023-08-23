@extends('user.layouts.master-page')

@section('title','المكتبة')

@section('style')
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
    <!-- Breadcrumb  start -->
    <section class="breadcrumb-wrap  br-bg-homework h-img-700">
        <div class="overlay op-6 bg-black"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumb-title">
                        <h2>المكتبة</h2>
                        <ul class="breadcrumb-menu">
                            <li><a href="{{route('site.home')}}">{{trans('diplomas/diplomas.Home')}}</a></li>

                            <li>المكتبة</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb  end -->

    <section class="project-wrap pt-100 pb-100">
        <div class="container">
            <div class="row justify-content-md-center">
                @foreach($libraries as $lib)
{{--                    <div class="col-xl-3 col-lg-4 col-md-6">--}}
{{--                        <div class="course-card style1">--}}
{{--                            <div class="course-img">--}}
{{--                                <div class="section-title style1 text-center mb-40">--}}
{{--                                    <p>{{$file->name}}</p>--}}
{{--                                </div>--}}
{{--                                <a href="course-details.html">--}}
{{--                                    <iframe--}}
{{--                                        --}}{{--                                    src="{{URL::to('/') . '/Library/' .$file->path}}"--}}
{{--                                        src="{{$file->link}}"--}}
{{--                                        frameBorder="0"--}}
{{--                                        scrolling="auto"--}}
{{--                                        height="100%"--}}
{{--                                        width="100%"--}}
{{--                                    ></iframe>--}}
{{--                                </a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
                    <div class="col-lg-2 col-md-4 col-sm-6">
                        <div class="team-member ">
                            <div class="team-member-img height-330">

                                @if($lib->image != null)
                                    <img src="{{URL::to('/') . $lib->image}}"
                                         alt="Image">
                                @else

                                    <img
                                        src="{{asset('end-user/assets/img/book-open.jpg')}}"
                                        alt="Image" style="width:400px ;height:400px">
                                @endif

                            </div>
                            <h4><a class="p-r-20"
                                   href="{{$lib->link}}" target="_blank">{{ $lib->name }}</a></h4>

                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection

@section('script')

    <!--Internal Fileuploads js-->
    <script src="{{asset('assets/plugins/fileuploads/js/fileupload.js')}}"></script>
    <script src="{{asset('assets/plugins/fileuploads/js/file-upload.js')}}"></script>

    <!--Internal Fancy uploader js-->
    <script src="{{asset('assets/plugins/fancyuploder/jquery.ui.widget.js')}}"></script>
    <script src="{{asset('assets/plugins/fancyuploder/jquery.fileupload.js')}}"></script>
    <script src="{{asset('assets/plugins/fancyuploder/jquery.iframe-transport.js')}}"></script>
    <script src="{{asset('assets/plugins/fancyuploder/jquery.fancy-fileupload.js')}}"></script>
    <script src="{{asset('assets/plugins/fancyuploder/fancy-uploader.js')}}"></script>



@endsection


