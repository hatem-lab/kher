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
                <a href="{{route('students.index')}}" class="content-title mb-0 my-auto">{{trans('students/students.Student')}}</a><span
                    class="text-muted mt-1 tx-13 ms-2 mb-0">/ {{trans('students/students.Show')}}</span>
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
                                <a href="#courses" data-bs-toggle="tab" aria-expanded="true" class="active"> <span
                                        class="visible-xs"><i
                                            class="las la-user-circle tx-16 me-1"></i></span> <span
                                        class="hidden-xs">{{trans('students/students.courses')}}</span> </a>
                            </li>
                        </ul>
                    </div>
                    <div class="tab-content border-start border-bottom border-right border-top-0 p-4">


                        <div class="tab-pane active" id="courses">
                            <div class="row">
                                <div class="col-lg-12 col-md-12">
                                    <div class="card overflow-hidden">
                                        <div class="card-header pb-0">
                                            <h3 class="card-title">{{trans('students/students.courses details')}} </h3>

                                        </div>
                                        <div class="card-body">
                                            <div class="panel-group1" id="accordion11">
                                                @foreach($student->courses as $one)
                                                    <div class="panel panel-default  mb-4">
                                                        <div class="panel-heading1 bg-primary ">
                                                            <h4 class="panel-title1">
                                                                <a class="accordion-toggle collapsed" data-bs-toggle="collapse"
                                                                   data-bs-parent="#accordion11" href="#collapse{{$one->id}}"
                                                                   aria-expanded="false">{{$one->title}}<i class="fe fe-arrow-left me-2"></i></a>
                                                            </h4>
                                                        </div>
                                                        <div id="collapse{{$one->id}}" class="panel-collapse collapse" role="tabpanel"
                                                             aria-expanded="false">
                                                            <div class="panel-body border">
                                                                <form role="form">


                                                                    <div class="form-group">
                                                                        <label for="FullName">{{trans('students/students.description')}}</label>
                                                                        <textarea readonly type="text"  id="FullName" class="form-control">{{ $one->desc }}</textarea>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label for="Email">{{trans('students/students.Diploma title')}}</label>
                                                                        <input readonly type="email" value="{{$one->diploma->title}}" id="Email"
                                                                               class="form-control">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="FullName">{{trans('students/students.Diploma description')}}</label>
                                                                        <textarea readonly type="text"  id="FullName" class="form-control">{{ $one->diploma->desc }}</textarea>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label for="Email">{{trans('students/students.course results')}}</label>

                                                                        <p><strong>1- اختبارات هذا الكورس</strong></p>
                                                                        <div class="row">
                                                                           @if(!$one->tests->isEmpty())
                                                                            @foreach($one->tests as $index=>$test)
                                                                              @if(\App\Models\StudentTest::where('test_id',$test->id)->where('student_id',$student->id)->first())
                                                                            <div class="col-lg-3 col-md-12">
                                                                                <label for="Email">test {{$test->title}} </label>
                                                                            <input readonly type="email" value="
                                                                            @if(\App\Models\StudentTest::where('test_id',$test->id)->where('student_id',$student->id)->first())
                                                                            @if(\App\Models\StudentTest::where('test_id',$test->id)->where('student_id',$student->id)->first()->total_mark !==null)
                                                                            {{\App\Models\StudentTest::where('test_id',$test->id)->where('student_id',$student->id)->first()->total_mark}}
                                                                            @else
                                                                                لم يتم تصحيح الاختبار بعد
                                                                            @endif
                                                                            @else
                                                                                لم يتم تقديم الاختبار بعد
                                                                            @endif

                                                                                " id="Email"
                                                                                   class="form-control">
                                                                            </div>
                                                                                    @else
                                                                                        <div class="col-lg-3 col-md-12">
                                                                                            <label for="Email">test:{{$test->title}} result</label>
                                                                                            <input readonly type="email" value="لم يقدم هذا الطالب هذا الاحتبار بعد" id="Email"
                                                                                                   class="form-control">
                                                                                        </div>
                                                                                @endif
                                                                            @endforeach
                                                                            @else
                                                                                <div class="col-lg-3 col-md-12">
                                                                                    <label for="Email">{{trans('students/students.homework result')}}</label>
                                                                                    <input readonly type="email" value="لم يوجد اختبارات في هذا الكورس بعد" id="Email"
                                                                                           class="form-control">
                                                                                </div>
                                                                            @endif
                                                                        </div>
                                                                        <br>
                                                                        <p><strong>2- وظائف هذا الكورس</strong></p>
                                                                        <div class="row">
                                                                            @if(!$one->homeworks->isEmpty())
                                                                            @foreach($one->homeworks as $index=>$homework)

                                                                                <div class="col-lg-3 col-md-12">
                                                                                    <label for="Email">homework {{$homework->title}}</label>
                                                                                    <input readonly type="email" value="
                                                                                      @if(\App\Models\StudentFile::where('homework_id',$homework->id)->where('student_id',$student->id)->first())
                                                                                        @if(\App\Models\StudentFile::where('homework_id',$homework->id)->where('student_id',$student->id)->first()->mark !==null)
                                                                                    {{\App\Models\StudentFile::where('homework_id',$homework->id)->where('student_id',$student->id)->first()->mark}}
                                                                                        @else
                                                                                        لم يتم تصحيح الوظيفة بعد
                                                                                        @endif
                                                                                      @else
                                                                                        لم يتم تقديم ملف الوظيفة بعد
                                                                                      @endif
                                                                                        " id="Email"
                                                                                           class="form-control">
                                                                                </div>
                                                                            @endforeach
                                                                            @else
                                                                                <div class="col-lg-3 col-md-12">
                                                                                    <label for="Email">{{trans('students/students.homework result')}}</label>
                                                                                    <input readonly type="email" value="لم يوجد وظائف في هذا الكورس بعد" id="Email"
                                                                                           class="form-control">
                                                                                </div>
                                                                            @endif
                                                                        </div>
                                                                        <br>
                                                                        <p><strong>3- علامة الحضور هذا الكورس</strong></p>
                                                                        <div class="row">
                                                                            <div class="col-lg-4 col-md-12">
                                                                                <label for="Email">{{trans('students/students.present result')}}</label>
                                                                                <input readonly type="email" value="{{App\Helpers\General::studentPresent($one,$student->id)}}" id="Email"
                                                                                       class="form-control">
                                                                            </div>
                                                                        </div>
                                                                        <br>
                                                                        <div class="row">
                                                                            <div class="col-lg-4 col-md-12">
                                                                                <label for="Email">{{trans('students/students.result as value')}}</label>
                                                                                <input readonly type="email" value="{{App\Helpers\General::studentResult($one,$student->id)}}" id="Email"
                                                                                       class="form-control">
                                                                            </div>
                                                                        </div>
                                                                        <br>
                                                                            <div class="row">
                                                                            <div class="col-lg-4 col-md-12">
                                                                                <label for="Email">{{trans('students/students.result as text')}}</label>
                                                                                <input readonly type="email" value="{{App\Helpers\General::resultStudentText($one,$student->id)}}" id="Email"
                                                                                       class="form-control">
                                                                            </div>
                                                                            </div>
                                                                    </div>

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

