@extends('user.layouts.master-page')

@section('title','تفاصيل الوظيفة')

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
                        <h2>{{trans('diplomas/diplomas.Homeworks')}}</h2>
                        <ul class="breadcrumb-menu">
                            <li><a href="{{route('site.home')}}">{{trans('diplomas/diplomas.Home')}}</a></li>
                            <li><a href="{{route('student.homeworks')}}">{{trans('diplomas/diplomas.Homeworks')}}</a>
                            </li>
                            <li>{{trans('diplomas/diplomas.upload Homeworks')}}</li>
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
                        {{--                        <div class="event-gallery bg-f event-bg-1"></div>--}}

                        <div class="project-details-para">
                            <h4><span
                                    class="bg-custom">{{trans('diplomas/diplomas.Homeworks name')}} :</span> {!!$homework->title!!}
                            </h4>
                            <h4 class="bg-custom">{{trans('diplomas/diplomas.Homeworks desc')}}</h4>
                            <div class="desc-homework">
                                <p> {!!$homework->desc!!}</p>
                            </div>
                        </div>
                        <div class="project-details-para">
                            <h4 class="bg-custom">{{trans('diplomas/diplomas.Homework Files')}}</h4>
                            <div class="row mt-25">
                                @foreach($homework->files as $file)
                                    <div class="col-xl-6">
                                        <div class="team-member style2">
                                            <div class="team-member-img">
                                                {{--                                            <img src="{{URL::to('/') . '/Homework/' . $file->name.'/'.$file->path}}" alt="Image">--}}
                                                <embed
                                                    src="{{URL::to('/') . '/Homework/' . $file->name.'/'.$file->path}}"
                                                    width="600px" height="200px"/>
                                                <ul class="social-profile style1">
                                                    <li><a target="_blank"
                                                           href="{{ route('homework.download',['path'=>$file->path,'file_name'=>$file->name])  }}"><i
                                                                class="ri-download-fill"></i> </a></li>
                                                    <li><a target="_blank"
                                                           href="{{ route('homework.View_file',['path'=>$file->path,'file_name'=>$file->name])  }}">
                                                            <i class="ri-eye-fill"></i> </a></li>
                                                </ul>
                                            </div>
                                            <div class="team-member-info">
                                                <h4>{{$file->name}}</h4>
                                                <p>{{$homework->title}}</p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="project-details-para">
                            <h4>{{trans('diplomas/diplomas.Upload Files')}}</h4>
                            <form method="POST" action="{{route('student.attachments',$homework->id)}}"
                                  enctype="multipart/form-data">
                                @csrf

                                <div class="form-group event-map mt-25">
                                    <input required type="file" name="file" id="file" class="dropify" data-height="200"/>
                                </div>
                                <br>
                                <br>
                                @if($homework->status==1)
                                    <div class="form-group event-map mt-25">
                                        <button style="margin-right: -3px;" TYPE="submit"
                                                class="bg-color1 btn-lg text-red"
                                                name="uploadedFile">{{trans('Homework/Homework.Add')}}
                                        </button>
                                    </div>

                                @else
                                    <div class="course-info">
                                        <h3><a href="#">تم انتهاء الوقت المخصص لرفع ملفات الوظيفة</a></h3>
                                    </div>
                                @endif

                            </form>

                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-12 col-12">
                    <div class="sidebar">

                        <div class="course-details-widget sidebar-box">
                            <h5>{{trans('diplomas/diplomas.Event Details')}}</h5>
                            <ul>
                                <li>
                                    <p><i class="las la-user-graduate"></i>{{trans('diplomas/diplomas.Start Date')}}</p>
                                    <p>{{$homework->created_at->format('d/m/y')}}</p>
                                </li>
                                <li>
                                    <p><i class="las la-file-alt"></i>{{trans('diplomas/diplomas.Start Time')}}</p>
                                    <p>{{$homework->created_at->format('H:i:s')}}</p>
                                </li>
                                <li>
                                    <p><i class="las la-clock"></i>{{trans('diplomas/diplomas.End Date')}}</p>
                                    <p>{{\Carbon\Carbon::parse($homework->date)->format('d/m/y')}}</p>
                                </li>
                                <li>
                                    <p><i class="las la-question-circle"></i>{{trans('diplomas/diplomas.End Time')}}</p>
                                    <p>{{\Carbon\Carbon::parse($homework->date)->format('H:i:s')}}</p>
                                </li>

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Project Details Section end -->

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


