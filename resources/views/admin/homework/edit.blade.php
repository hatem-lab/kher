@extends('layouts.app')

@section('styles')

    <!--- Internal Select2 css-->
    {{--    <link href="{{asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">--}}

    <link rel="stylesheet" href="{{asset('assets/css-rtl/editors/quill/katex.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css-rtl/editors/quill/monokai-sublime.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css-rtl/editors/quill/quill.snow.css')}}">

    <!-- Internal Select2 css -->
    <link href="{{asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">

    <!--Internal  Datetimepicker-slider css -->
    <link href="{{asset('assets/plugins/amazeui-datetimepicker/css/amazeui.datetimepicker.css')}}" rel="stylesheet">
    <link href="{{asset('assets/plugins/jquery-simple-datetimepicker/jquery.simple-dtpicker.css')}}" rel="stylesheet">
    <link href="{{asset('assets/plugins/pickerjs/picker.min.css')}}" rel="stylesheet">

    <!-- Internal Spectrum-colorpicker css -->
    <link href="{{asset('assets/plugins/spectrum-colorpicker/spectrum.css')}}" rel="stylesheet">


@endsection

@section('content')

    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
            <h4 class="content-title mb-0 my-auto f-z-30"><a href="{{route('homework.index')}}" class="text-dark">{{trans('Homework/Homework.Homeworks')}}</a></h4>
                <span class="text-muted mt-1 tx-13 ms-2 mb-0"> / <a href="{{route('homework.edit',$homework->id)}}">{{trans('Homework/Homework.edit_homework')}}</a></span>
            </div>
        </div>

    </div>    <!-- breadcrumb -->

    <!-- row -->
    <div class="row">

        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-body">

                    <form action="{{route('homework.update', $homework->id)}}" method="POST"
                          id="lecture_form" data-parsley-validate="">
                        @csrf
                        <div class="row row-sm">
                            <div class="col-12">
                                <div class="form-group mg-b-0">
                                    <label class="form-label">{{trans('lectures/lectures.title')}}: </label>
                                    <input class="form-control" name="title" value="{{$homework->title}}" placeholder="{{trans('lectures/lectures.plc_title')}}" type="text">
                                </div>
                            </div>


                        </div>
                        <br>

                        <div class="row row-sm">
                            <div class="col-12">
                                <div class="form-group mg-b-0">
                                    <label class="form-label">{{trans('Homework/Homework.mark')}}: </label>
                                    <input class="form-control" value="{{$homework->mark}}" name="mark"  required="" type="text">
                                </div>
                            </div>
                        </div>
                             <br>
                        <div class="row row-sm mt-2">
                            <div class="col-lg-12 mg-t-20 mg-lg-t-0">
                                <p class="mg-b-10">{{trans('Homework/Homework.course')}}</p>
                                <select name="course_id" required="" class="form-control select2">

                                    @foreach($courses as $one)
                                        <option value="{{$one->id}}" {{$homework->course->id == $one->id ? 'selected': ''}}>{{$one->title}}</option>
                                    @endforeach
                                </select>

                            </div><!-- col-4 -->

                        </div>
                        <br>
                        <div class="row row-sm mt-2">
                            <div class="col-lg-12 mg-t-20 mg-lg-t-0">
                                <p class="mg-b-10">{{trans('Homework/Homework.teachers')}}</p>
                                <select name="teacher_id" required="" class="form-control select2">

                                    @foreach($teachers as $one)
                                        <option value="{{$one->id}}" {{$homework->user->id == $one->id ? 'selected': ''}}>{{$one->name}}</option>
                                    @endforeach
                                </select>

                            </div><!-- col-4 -->

                        </div>
                        <br>
                        <div class="row row-sm mt-2">
                            <div class="col-lg-12 mg-t-20 mg-lg-t-0">
                                <p class="mg-b-10">{{trans('Homework/Homework.lectures')}}</p>
                                <select name="lecture_id"  class="form-control select2">
                                    <option></option>
                                    @foreach($lectures as $one)
                                        <option value="{{$one->id}}" {{$homework->lecture->id == $one->id ? 'selected': ''}}>{{$one->title}}</option>
                                    @endforeach
                                </select>

                            </div><!-- col-4 -->

                        </div>
                        <br>
                        <div class="row mg-b-20">
                            <div class="col-xs-12 col-md-12">
                                <p class="mg-b-10">{{trans('Homework/Homework.students')}} <span class="tx-danger">*</span></p>
                                <select name="students[]"  multiple class="form-control select2">

                                    @foreach($students as $student)
                                        <option value="{{$student->id}}" {{in_array($student->id, $ids_students) ? 'selected':''}}>
                                            {{$student->getTranslatedName()}}
                                        </option>
                                    @endforeach

                                </select>

                            </div><!-- col-4 -->
                        </div><!-- col-4 -->
                        <div class="row row-sm mt-2">
                            <div class="col-12">
                                <div class="form-group mg-b-0">
                                    <label class="form-label mr-12">{{trans('Homework/Homework.date')}}: <span class="tx-danger star-span">*</span></label>
                                    <div class="input-group col-md-12 padd-data">
                                        <div class="input-group-text">
                                            <div class="input-group-text">
                                                <i class="typcn typcn-calendar-outline tx-24 lh--9 op-6"></i>
                                            </div>
                                        </div>
                                        <input class="form-control date-input" id="datetimepicker" name="date" type="text" value="{{$homework->date}}">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row row-sm mt-2">
                            <div class="col-12">
                                <div class="form-group mg-b-0">
                                       <label class="form-label f-z-18">{{trans('Users/user.statusadd')}}</label>
                                        <select name="status" id="select-beast" class="form-control  nice-select  custom-select select2">
                                            <option value="0" @if($homework->status==0) selected @endif>{{trans('Users/user.Inactive')}}</option>
                                            <option value="1" @if($homework->status==1) selected @endif>{{trans('Users/user.Active')}}</option>
                                        </select>
                                </div>
                            </div>
                        </div>

                        <div class="row row-sm mt-2">
                            <div class="col-12">
                                <div class="form-group mg-b-0">
                                    <label
                                        class="form-label">{{trans('lectures/lectures.desc')}} </label>
                                    <input class="form-control" type="hidden" name="desc" id="desc">
                                    <div id="blog-editor-wrapper">
                                        <div id="blog-editor-container">
                                            <div class="editor" style="min-height: 200px">

                                                {!! $homework->desc !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>



                            <div class="col-12"><button class="btn btn-main-primary pd-x-20 mg-t-10" type="submit">{{trans('general.Edit')}}</button></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /row -->

@endsection('content')

@section('scripts')

    <!--Internal  Select2 js -->
    {{--    <script src="{{asset('assets/plugins/select2/js/select2.min.js')}}"></script>--}}

    <script src="{{asset('assets/js/editors/quill/katex.min.js')}}"></script>
    <script src="{{asset('assets/js/editors/quill/highlight.min.js')}}"></script>
    <script src="{{asset('assets/js/editors/quill/quill.min.js')}}"></script>


    <!--Internal  Parsley.min js -->
    <script src="{{asset('assets/plugins/parsleyjs/parsley.min.js')}}"></script>

    <!--Internal  Perfect-scrollbar js -->
    <script src="{{asset('assets/plugins/perfect-scrollbar/perfect-scrollbar.min-rtl.js')}}"></script>

    <!-- Internal Form-validation js -->
    <script src="{{asset('assets/js/form-validation.js')}}"></script>

    <!--Internal  Datepicker js -->
    <script src="{{asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js')}}"></script>

    <!--Internal  jquery.maskedinput js -->
    <script src="{{asset('assets/plugins/jquery.maskedinput/jquery.maskedinput.js')}}"></script>

    <!--Internal  spectrum-colorpicker js -->
    <script src="{{asset('assets/plugins/spectrum-colorpicker/spectrum.js')}}"></script>

    <!-- Internal Select2.min js -->
    <script src="{{asset('assets/plugins/select2/js/select2.min.js')}}"></script>

    <!--Internal Ion.rangeSlider.min js -->
    <script src="{{asset('assets/plugins/ion-rangeslider/js/ion.rangeSlider.min.js')}}"></script>

    <!--Internal  jquery-simple-datetimepicker js -->
    <script src="{{asset('assets/plugins/amazeui-datetimepicker/js/amazeui.datetimepicker.min.js')}}"></script>

    <!--Internal  pickerjs js -->
    <script src="{{asset('assets/plugins/pickerjs/picker.min.js')}}"></script>

    <!-- Internal form-elements js -->
    <script src="{{asset('assets/js/form-elements.js')}}"></script>

    <!-- Ionicons js -->
    <script src="{{asset('assets/plugins/jquery-simple-datetimepicker/jquery.simple-dtpicker.js')}}"></script>



    <script src="{{asset('assets/js/admin-pages/lectures/edit.js')}}"></script>
    <script>
        $(document).ready(function () {
            $('select[name="course_id"]').on('change', function () {
                var course_id = $(this).val();
                if (course_id) {
                    $.ajax({
                        url: "{{ URL::to('admin/homework/selectLectures') }}/" + course_id,
                        type: "GET",
                        dataType: "json",
                        success: function (data) {
                            $('select[name="lecture_id"]').empty();
                            $.each(data, function (key, value) {

                                $('select[name="lecture_id"]').append('<option value="' + value.id + '">' + value.title + '</option>');
                            });
                        },
                    });
                } else {
                    console.log('AJAX load did not work');
                }
            });

            $('select[name="course_id"]').on('change', function () {
                var course_id = $(this).val();
                if (course_id) {
                    $.ajax({
                        url: "{{ URL::to('admin/homework/selectStudents') }}/" + course_id,
                        type: "GET",
                        dataType: "json",
                        success: function (data) {
                            $('select[name="students[]"]').empty();
                            $.each(data, function (key, value) {
                                $('select[name="students[]"]').append('<option value="' + value.id + '">' + value.name_ar + '</option>');
                            });
                        },
                    });
                } else {
                    console.log('AJAX load did not work');
                }
            });

            $('select[name="course_id"]').on('change', function () {
                var course_id = $(this).val();
                if (course_id) {
                    $.ajax({
                        url: "{{ URL::to('admin/homework/selectTeachers') }}/" + course_id,
                        type: "GET",
                        dataType: "json",
                        success: function (data) {
                            $('select[name="teacher_id"]').empty();
                            $.each(data, function (key, value) {
                                $('select[name="teacher_id"]').append('<option value="' + value.id + '">' + value.name + '</option>');
                            });
                        },
                    });
                } else {
                    console.log('AJAX load did not work');
                }
            });
        });

    </script>


@endsection
