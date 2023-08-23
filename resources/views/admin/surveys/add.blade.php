@extends('layouts.app')

@section('styles')

    <!--- Internal Select2 css-->
{{--    <link href="{{asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">--}}

    <link rel="stylesheet" href="{{asset('assets/css-rtl/editors/quill/katex.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css-rtl/editors/quill/monokai-sublime.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css-rtl/editors/quill/quill.snow.css')}}">

    <!-- Internal Select2 css -->
    <link href="{{asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">

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
                <h4 class="content-title mb-0 my-auto f-z-30"><a href="{{route('survey.index')}}" class="text-dark">{{trans('surveys/surveys.surveys')}}</a></h4><span
                    class="text-muted mt-1 tx-13 ms-2 mb-0"> / <a href="{{route('survey.create')}}">{{trans('surveys/surveys.add_survey')}}</a></span>
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
                    <form action="{{route('survey.store')}}" method="POST"
                          id="survey_form" data-parsley-validate="">
                        @csrf
                        <div class="row row-sm">
                            <div class="col-sm-12 col-md-12 col-lg-12 ">
                                <div class="form-group mg-b-0">
                                    <label class="form-label f-z-18">{{trans('surveys/surveys.title')}}: <span class="tx-danger">*</span></label>
                                    <input class="form-control mt-10" name="title" placeholder="{{trans('surveys/surveys.plc_title')}}" required="" type="text">
                                </div>
                            </div>
                           
                            <div class=" col-sm-12 col-md-12 col-lg-12  mg-t-20 mg-lg-t-0">
                            
                                <p class="mg-b-10 f-z-18">{{trans('surveys/surveys.type')}} <span class="tx-danger">*</span></p>
                                <select name="type" id="type" required="" class="form-control select2">
                                    <option></option>
                                    <option value="0">
                                        {{trans('surveys/surveys.general')}}
                                    </option>
                                    <option value="1">
                                        {{trans('surveys/surveys.course')}}
                                    </option>
                                
                                </select>
                                @error('type')
                                <p class="validation_error">{{ $message }}</p>
                                @enderror
                            </div><!-- col-4 -->
                           
                        </div>
                      
                        <div class="row row-sm mt-2" id="course_div">
                             @error('course')
                                <p class="validation_error">{{ $message }}</p>
                                @enderror
                            <div class=" col-sm-12 col-md-12 col-lg-12 mg-t-20 mg-lg-t-0">
                                <p class="mg-b-10 f-z-18">{{trans('surveys/surveys.course')}} <span class="tx-danger">*</span></p>
                              
                                <select name="course" id="course_sel" class="form-control select2 " placeholder=" ">
                                    <option >
                                        {{--                                        {{trans('surveys/surveys.sel_diploma')}}--}}
                                    </option>
                                    @foreach($courses as $course)
                                        <option value="{{$course->id}}">
                                            {{$course->title}}
                                        </option>
                                    @endforeach
                              
                                </select>
                               
                            </div><!-- col-4 -->
                          
                        </div>

                         <div class="row row-sm mt-2">
                            <div class="col-12">
                                <div class="form-group mg-b-0">
                                    <label
                                        class="form-label f-z-18">{{trans('surveys/surveys.desc')}} </label>
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


    <!-- Internal Select2.min js -->
    <script src="{{asset('assets/plugins/select2/js/select2.min.js')}}"></script>



    <!-- Internal form-elements js -->
    <script src="{{asset('assets/js/form-elements.js')}}"></script>

    <!-- Ionicons js -->

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



    <script src="{{asset('assets/js/admin-pages/surveys/add.js')}}"></script>


@endsection
