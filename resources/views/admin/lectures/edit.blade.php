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
                            <h4 class="content-title mb-0 my-auto f-z-30"><a href="{{route('lecture.index')}}" class="text-dark">{{trans('lectures/lectures.lectures')}}</a></h4><span
                class="text-muted mt-1 tx-13 ms-2 mb-0"> / <a href="{{route('lecture.edit',$lecture->id)}}"> {{trans('lectures/lectures.edit_lecture')}}</a></span>
                        </div>
        </div>

    </div>    <!-- breadcrumb -->

    <!-- row -->
    <div class="row">

        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-body">
                    {{--                    <div class="main-content-label mg-b-5">--}}
                    {{--                        Required Input Validation--}}
                    {{--                    </div>--}}
                    {{--                    <p class="mg-b-20">It is Very Easy to Customize and it uses in your website apllication.</p>--}}
                    <form action="{{route('lecture.update', $lecture->id)}}" method="POST"
                          id="lecture_form" data-parsley-validate="">
                        @csrf
                        <div class="row row-sm">
                            <div class="col-lg-6 col-md-12 col-sm-12">
                                <div class="form-group mg-b-0">
                                    <label class="form-label f-z-18">{{trans('lectures/lectures.title')}}: <span class="tx-danger">*</span></label>
                                    <input class="form-control" name="title" value="{{$lecture->title}}" placeholder="{{trans('lectures/lectures.plc_title')}}" required="" type="text">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12 col-sm-12 mg-t-20 mg-lg-t-0">
                                <label class="form-label f-z-18">{{trans('lectures/lectures.type')}} <span class="tx-danger">*</span></label>
                                <select name="type" id="type" required="" class="form-control select2">
                                    <option label="{{trans('lectures/lectures.sel_type')}}">
                                        {{--                                        {{trans('lectures/lectures.sel_diploma')}}--}}
                                    </option>
                                    <option value="0" {{$lecture->type == 0 ? 'selected': ''}}>{{trans('lectures/lectures.unsync')}}</option>
                                    <option value="1" {{$lecture->type == 1 ? 'selected': ''}}>{{trans('lectures/lectures.sync')}}</option>

                                </select>
                                @error('type')
                                <p class="validation_error">{{ $message }}</p>
                                @enderror
                            </div><!-- col-4 -->

                        </div>
                        <div class="row row-sm mt-2">
                            <div class="col-lg-6 col-md-12 col-sm-12 mg-t-20 mg-lg-t-0">
                            <label class="form-label f-z-18">{{trans('lectures/lectures.course')}} <span class="tx-danger">*</span></label>
                                <select name="course" required="" class="form-control select2">
                                    <option >
                                        {{--                                        {{trans('lectures/lectures.sel_diploma')}}--}}
                                    </option>
                                    @foreach($courses as $course)
                                        <option value="{{$course->id}}" {{$lecture->course->id == $course->id ? 'selected': ''}}>
                                            {{$course->title}}
                                        </option>
                                    @endforeach

                                </select>
                                @error('course')
                                <p class="validation_error">{{ $message }}</p>
                                @enderror
                            </div><!-- col-4 -->
                            <div class="col-lg-6 col-md-12 col-sm-12" id="link-div" hidden>
                                <div class="form-group mg-b-0">
                                    <label class="form-label f-z-18">{{trans('lectures/lectures.link')}}: <span class="tx-danger">*</span></label>
                                    <input class="form-control" name="link" id="link" value="{{$lecture->link}}" placeholder="www.example.com" type="text">
                                </div>
                            </div>

                        </div>
                        <div class="row row-sm mt-2">
                            <div class="col-lg-6 col-md-12 col-sm-12">
                                <label class="form-label f-z-18">{{trans('lectures/lectures.start_date')}}: <span class="tx-danger star-span" hidden>*</span></label>
                                <div class="input-group col-md-12 padd-data">
                                    <div class="input-group-text">
                                        <div class="input-group-text">
                                            <i class="typcn typcn-calendar-outline tx-24 lh--9 op-6"></i>
                                        </div>
                                    </div>
                                    <input class="form-control date-input" id="datetimepicker" name="start_date" type="text" value="{{$lecture->start_date}}">
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-12 col-sm-12">
                                <label class="form-label f-z-18">{{trans('lectures/lectures.end_date')}}: <span class="tx-danger star-span" hidden>*</span></label>
                                <div class="input-group col-md-12 padd-data">
                                    <div class="input-group-text">
                                        <div class="input-group-text">
                                            <i class="typcn typcn-calendar-outline tx-24 lh--9 op-6"></i>
                                        </div>
                                    </div>
                                    <input class="form-control date-input" id="datetimepicker1" name="end_date" type="text" value="{{$lecture->end_date}}">
                                </div>
                            </div>

                        </div>
                        <div class="row row-sm mt-2">
                            <div class="col-12">
                                <div class="form-group mg-b-0">
                                    <label
                                        class="form-label f-z-18">{{trans('lectures/lectures.desc')}} </label>
                                    <input class="form-control" type="hidden" name="desc" id="desc">
                                    <div id="blog-editor-wrapper">
                                        <div id="blog-editor-container">
                                            <div class="editor" style="min-height: 200px">

                                                {!! $lecture->desc !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>
                        <div class="col-12">

                            <button class=" form-group  btn blue-button mb-15 pd-x-20 mg-t-10" type="submit">{{trans('general.Edit')}}</button>

                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /row -->

@endsection('content')

@section('scripts')


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


@endsection
