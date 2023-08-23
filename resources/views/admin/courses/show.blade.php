@extends('layouts.app')

@section('styles')


    <!-- Interenal Accordion Css -->
    <link href="{{asset('assets/plugins/accordion/accordion.css')}}" rel="stylesheet" />
    <!--- Internal Select2 css-->
    <link href="{{asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">

    <!---Internal Fileupload css-->
    <link href="{{asset('assets/plugins/fileuploads/css/fileupload.css')}}" rel="stylesheet" type="text/css"/>

    <!---Internal Fancy uploader css-->
    <link href="{{asset('assets/plugins/fancyuploder/fancy_fileupload.css')}}" rel="stylesheet" />

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
    <link href="{{asset('assets/plugins/treeview/treeview-rtl.css')}}" rel="stylesheet" type="text/css" />


@endsection

@section('content')

    @if (session()->has('delete'))
        <script>
            window.onload = function () {
                notif({
                    msg: "Attachment has Deleted Successfully",
                    type: "success"
                });
            }

        </script>
    @endif

    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
            <h4 class="content-title mb-0 my-auto f-z-30"><a href="{{route('course.index')}}" class="text-dark">{{trans('courses/courses.courses')}}</a></h4><span
                    class="text-muted mt-1 tx-13 ms-2 mb-0"> / <a href="{{route('course.show',$course->id)}}">{{trans('courses/courses.Show details course')}}</a></span>
            </div>
        </div>

    </div>
    <!-- breadcrumb -->

    <!-- row -->
    <div class="row row-sm">

        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">
                    <div class="tabs-menu ">
                        <!-- Tabs -->
                        <ul class="nav nav-tabs profile navtab-custom panel-tabs">
                            <li class="">
                                <a href="#profile" data-bs-toggle="tab" aria-expanded="true" class="active"> <span
                                        class="visible-xs"><i
                                            class="las la-user-circle tx-20 me-1"></i></span> <span
                                        class="hidden-xs">{{trans('courses/courses.information')}}</span> </a>
                            </li>
                            <li class="">
                                <a href="#courses" data-bs-toggle="tab" aria-expanded="false"> <span
                                        class="visible-xs"><i class="fas fa-book-open tx-20 me-1"></i></span>
                                    <span class="hidden-xs">{{trans('courses/courses.diploma')}}</span> </a>
                            </li>
                            <li class="">
                                <a href="#schedules" data-bs-toggle="tab" aria-expanded="false"> <span
                                        class="visible-xs"><i class="fas fa-calendar-alt tx-20 me-1"></i></span>
                                    <span class="hidden-xs">{{trans('courses/courses.teachers')}}</span> </a>
                            </li>
                        </ul>
                    </div>
                    <div class="tab-content border-start border-bottom border-right border-top-0 p-4">
                        <div class="tab-pane active" id="profile">
                            <form role="form">
                                <div class="form-group">
                                    <label for="FullName">{{trans('courses/courses.title')}}</label>
                                    <input readonly type="text" value="{{$course->title}}" id="FullName" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="desc">{{trans('courses/courses.desc')}}</label>
                                    <input readonly  type="text" value="{{$course->desc}}" id="desc"
                                           class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="desc">{{trans('courses/courses.course_status')}}</label>
                                    <input readonly  type="text" value="{{$course->status}}" id="status"
                                           class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="desc">{{trans('courses/courses.end_date')}}</label>
                                    <input readonly  type="text" value="{{$course->end_date}}" id="end_date"
                                           class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="AboutMe">{{trans('courses/courses.Course Image')}}</label>
                                    <div class="col-sm-4">
                                        <div class=" border p-1 card thumb">
                                            <a href="#" class="image-popup" title="Screenshot-2"> <img
                                                    src="{{URL::to('/') . '/Course/' . $course->title.'/'.$course->image}}" class="thumb-img"
                                                    alt="work-thumbnail"> </a>
                                            <div class="ga-border"></div>

                                        </div>
                                    </div>
                                </div>


                            </form>
                        </div>

                        <div class="tab-pane " id="courses">
                            <div class="row">
                                <div class="col-lg-12 col-md-12">
                                    <div class="card overflow-hidden">
                                        <div class="card-header pb-0">
                                            <h3 class="card-title">{{trans('courses/courses.DIPLOMA DETAILS')}}</h3>

                                        </div>
                                        <div class="card-body">
                                            <div class="panel-group1" id="accordion11">

                                                    <div class="panel panel-default  mb-4">
                                                        <div class="panel-heading1 bg-color">
                                                            <h4 class="panel-title1">
                                                                <a class="accordion-toggle collapsed" data-bs-toggle="collapse"
                                                                   data-bs-parent="#accordion11" href="#collapse{{$diplomas->id}}"
                                                                   aria-expanded="false">{{$diplomas->title}}<i class="fe fe-arrow-left me-2"></i></a>
                                                            </h4>
                                                        </div>
                                                        <div id="collapse{{$diplomas->id}}" class="panel-collapse collapse" role="tabpanel"
                                                             aria-expanded="false">
                                                            <div class="panel-body border">
                                                                <form role="form">


                                                                    <div class="form-group">
                                                                        <label for="FullName">{{trans('Teachers\Teachers.description')}}</label>
                                                                        <textarea readonly type="text"  id="FullName" class="form-control">{!! $diplomas->desc !!} </textarea>
                                                                    </div>



                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>



                        <div class="tab-pane " id="schedules">
                            <div class="row">
                                <div class="col-lg-12 col-md-12">
                                    <div class="card overflow-hidden">
                                        <div class="card-header pb-0">
                                            <h3 class="card-title">{{trans('courses/courses.TEACHERS DETAILS')}}</h3>

                                        </div>
                                        <div class="card-body">
                                            <div class="panel-group1" id="accordion11">
                                                @foreach($teachers as $one)
                                                    <div class="panel panel-default  mb-4">
                                                        <div class="panel-heading1 bg-color">
                                                            <h4 class="panel-title1">
                                                                <a class="accordion-toggle collapsed" data-bs-toggle="collapse"
                                                                   data-bs-parent="#accordion11" href="#collapse{{$one->id}}"
                                                                   aria-expanded="false">{{$one->name}}<i class="fe fe-arrow-left me-2"></i></a>
                                                            </h4>
                                                        </div>
                                                        <div id="collapse{{$one->id}}" class="panel-collapse collapse" role="tabpanel"
                                                             aria-expanded="false">
                                                            <div class="panel-body border">
                                                                <form role="form">


                                                                    <div class="form-group">
                                                                        <label for="FullName">{{trans('Teachers/Teachers.name')}}</label>
                                                                        <textarea readonly type="text"  id="FullName" class="form-control">{{ $one->name }}</textarea>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label for="Email">{{trans('Teachers/Teachers.email')}}</label>
                                                                        <input readonly type="email" value="{{$one->email}}" id="Email"
                                                                               class="form-control">
                                                                    </div>
                                                                    @if ($one->status == 1)
                                                                     <div class="form-group">
                                                                        <label for="FullName">{{trans('Teachers/Teachers.status')}}</label>
                                                                        <textarea readonly type="text"  id="FullName" class="form-control">{{trans('Teachers/Teachers.Active')}}</textarea>
                                                                    </div>
                                                                    @else
                                                                    <div class="form-group">
                                                                        <label for="FullName">{{trans('Teachers/Teachers.status')}}</label>
                                                                        <textarea readonly type="text"  id="FullName" class="form-control">{{trans('Teachers/Teachers.Inactive')}}</textarea>
                                                                    </div>
                                                                    @endif

                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- row closed -->



@endsection('content')

@section('scripts')


    <!--Internal  Datepicker js -->
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




    <script src="{{asset('assets/js/admin-pages/homework/delete_file.js')}}"></script>
    <!--Internal  Datepicker js -->
    <script src="{{asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js')}}"></script>
    <!-- Internal Select2 js-->
    <script src="{{asset('assets/plugins/select2/js/select2.min.js')}}"></script>
    <!--Internal  Perfect-scrollbar js -->
    <script src="{{asset('assets/plugins/perfect-scrollbar/perfect-scrollbar.min-rtl.js')}}"></script>

    <!-- Internal Treeview js -->
    <script src="{{asset('assets/plugins/treeview/treeview.js')}}"></script>

@endsection

