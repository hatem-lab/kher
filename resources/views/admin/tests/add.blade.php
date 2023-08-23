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

    <!---Internal Fileupload css-->
{{--    <link href="{{asset('assets/plugins/fileuploads/css/fileupload.css')}}" rel="stylesheet" type="text/css"/>--}}

{{--    <!---Internal Fancy uploader css-->--}}
{{--    <link href="{{asset('assets/plugins/fancyuploder/fancy_fileupload.css')}}" rel="stylesheet" />--}}
@endsection

@section('content')

    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto f-z-30"> <a href="{{route('test.index')}}" class="text-dark">{{trans('tests/tests.tests')}}</a></h4>
                <span class="text-muted mt-1 tx-13 ms-2 mb-0">/ {{trans('tests/tests.add_test')}}</span>
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
                    <form action="{{route('test.store')}}" method="POST"
                          id="test_form" data-parsley-validate="">
                        @csrf
                        <div class="row row-sm">
                            <div class="col-12">
                                <div class="form-group mg-b-0">
                                    <label class="form-label f-z-18">{{trans('tests/tests.title')}}: <span class="tx-danger">*</span></label>
                                    <input class="form-control mt-12" name="title" placeholder="{{trans('tests/tests.plc_title')}}" required="" type="text">
                                </div>
                            </div>
                            
                            <div class="col-12 mg-t-6 mg-lg-t-0">
                                <p class="mg-b-10 f-z-18">{{trans('tests/tests.course')}} <span class="tx-danger">*</span></p>
                                <select name="course" required="" class="form-control select2">
                                    <option >
                                        {{--                                        {{trans('tests/tests.sel_diploma')}}--}}
                                    </option>
                                    @foreach($courses as $course)
                                        <option value="{{$course->id}}">
                                            {{$course->title}}
                                        </option>
                                    @endforeach

                                </select>
                                @error('course')
                                <p class="validation_error">{{ $message }}</p>
                                @enderror
                            </div><!-- col-4 -->
                        </div>

                        <div class="row row-sm mt-2">
                            <div class="col-12 p-data">
                                <label class="form-label mr-12 f-z-18">{{trans('tests/tests.date')}}: <span class="tx-danger star-span">*</span></label>
                                <div class="input-group col-md-12 padd-data">
                                    <div class="input-group-text">
                                        <div class="input-group-text">
                                            <i class="typcn typcn-calendar-outline tx-24 lh--9 op-6"></i>
                                        </div>
                                    </div>
                                    <input class="form-control date-input" id="datetimepicker" name="date" type="text" value="{{now()}}">
                                </div>
                            </div>
                                <br>
                            <div class="col-12">
                                <label class="form-label f-z-18">{{trans('tests/tests.duration')}}: <span class="tx-danger star-span">*</span></label>
                                <input class="form-control" name="duration" placeholder="{{trans('tests/tests.plc_duration')}}" required="" type="number">

                            </div>

                        </div>
                        <div class="row row-sm mt-2">

                            <div class="col-12">
                                <label class="form-label f-z-18">{{trans('tests/tests.weight')}}: </label>
                                <input class="form-control" name="weight" placeholder="{{trans('tests/tests.plc_weight')}}"  type="number">

                            </div>

                        </div>
                         <div class="row row-sm mt-2">
                            <div class="col-12">
                                <div class="form-group mg-b-0">
                                    <label
                                        class="form-label f-z-18">{{trans('tests/tests.desc')}} </label>
                                    <input class="form-control" type="hidden" name="desc" id="desc">
                                    <div id="blog-editor-wrapper">
                                        <div id="blog-editor-container">
                                            <div class="editor" style="min-height: 200px">


                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="col-12"><button class="btn blue-button mb-15 pd-x-20 mg-t-10" type="submit">{{trans('general.Add')}}</button></div>
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

    <!--Internal Fileuploads js-->
{{--    <script src="{{asset('assets/plugins/fileuploads/js/fileupload.js')}}"></script>--}}
{{--    <script src="{{asset('assets/plugins/fileuploads/js/file-upload.js')}}"></script>--}}

{{--    <!--Internal Fancy uploader js-->--}}
{{--    <script src="{{asset('assets/plugins/fancyuploder/jquery.ui.widget.js')}}"></script>--}}
{{--    <script src="{{asset('assets/plugins/fancyuploder/jquery.fileupload.js')}}"></script>--}}
{{--    <script src="{{asset('assets/plugins/fancyuploder/jquery.iframe-transport.js')}}"></script>--}}
{{--    <script src="{{asset('assets/plugins/fancyuploder/jquery.fancy-fileupload.js')}}"></script>--}}
{{--    <script src="{{asset('assets/plugins/fancyuploder/fancy-uploader.js')}}"></script>--}}

{{--    <!--Internal  Form-elements js-->--}}
{{--    <script src="{{asset('assets/js/advanced-form-elements.js')}}"></script>--}}



    <script src="{{asset('assets/js/admin-pages/tests/add.js')}}"></script>


@endsection
