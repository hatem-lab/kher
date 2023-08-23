@extends('layouts.app')

@section('styles')

    <!--- Internal Select2 css-->
    <link href="{{asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('assets/css-rtl/editors/quill/katex.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css-rtl/editors/quill/monokai-sublime.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css-rtl/editors/quill/quill.snow.css')}}">
    <!---Internal Fileupload css-->
    <link href="{{asset('assets/plugins/fileuploads/css/fileupload.css')}}" rel="stylesheet" type="text/css"/>

    <!---Internal Fancy uploader css-->
    <link href="{{asset('assets/plugins/fancyuploder/fancy_fileupload.css')}}" rel="stylesheet" />

@endsection

@section('content')

    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto f-z-30"><a href="{{route('diploma.index')}}" class="text-dark">{{trans('diplomas/diplomas.diplomas')}}</a></h4><span
                    class="text-muted mt-1 tx-13 ms-2 mb-0"> / <a href="{{route('diploma.create')}}"> {{trans('diplomas/diplomas.add_diploma')}} </a></span>
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
                    <form action="{{route('diploma.store')}}" method="POST"
                          id="diploma_form" data-parsley-validate="" enctype="multipart/form-data">
                        @csrf
                        <div class="row row-sm">
                            <div class="col-12">
                                <div class="form-group mg-b-0">
                                    <label class="form-label f-z-18">{{trans('diplomas/diplomas.title')}}: <span class="tx-danger">*</span></label>
                                    <input class="form-control" name="title" placeholder="{{trans('diplomas/diplomas.plc_title')}}" required="" type="text">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group mg-b-0">
                                    <label class="form-label f-z-18">العنوان بالانكليزي: <span class="tx-danger">*</span></label>
                                    <input class="form-control" name="title_en" placeholder="{{trans('diplomas/diplomas.plc_title')}}" required="" type="text">
                                </div>
                            </div>
                            <div class="col-12 mt-2">
                                <div class="form-group mg-b-0">
                                    <label
                                        class="form-label f-z-18">{{trans('diplomas/diplomas.desc')}} </label>
                                    <input class="form-control" type="hidden" name="desc" id="desc">
                                    <div id="blog-editor-wrapper">
                                        <div id="blog-editor-container">
                                            <div class="editor" style="min-height: 200px">


                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-body">
                                    <div>
                                        <input type="file" name="image" id="file" class="dropify" data-height="200" required="" /></div>
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
    <script src="{{asset('assets/plugins/select2/js/select2.min.js')}}"></script>

    <script src="{{asset('assets/js/editors/quill/katex.min.js')}}"></script>
    <script src="{{asset('assets/js/editors/quill/highlight.min.js')}}"></script>
    <script src="{{asset('assets/js/editors/quill/quill.min.js')}}"></script>

    <script src="{{asset('assets/plugins/fileuploads/js/fileupload.js')}}"></script>
    <script src="{{asset('assets/plugins/fileuploads/js/file-upload.js')}}"></script>

    <!--Internal Fancy uploader js-->
    <script src="{{asset('assets/plugins/fancyuploder/jquery.ui.widget.js')}}"></script>
    <script src="{{asset('assets/plugins/fancyuploder/jquery.fileupload.js')}}"></script>
    <script src="{{asset('assets/plugins/fancyuploder/jquery.iframe-transport.js')}}"></script>
    <script src="{{asset('assets/plugins/fancyuploder/jquery.fancy-fileupload.js')}}"></script>
    <script src="{{asset('assets/plugins/fancyuploder/fancy-uploader.js')}}"></script>


    <!--Internal  Parsley.min js -->
    <script src="{{asset('assets/plugins/parsleyjs/parsley.min.js')}}"></script>

    <!--Internal  Perfect-scrollbar js -->
    <script src="{{asset('assets/plugins/perfect-scrollbar/perfect-scrollbar.min-rtl.js')}}"></script>

    <!-- Internal Form-validation js -->
    <script src="{{asset('assets/js/form-validation.js')}}"></script>

    <script src="{{asset('assets/js/admin-pages/diplomas/add.js')}}"></script>

    <script src="{{ URL::asset('assets/plugins/notify/js/notifIt.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/notify/js/notifit-custom.js') }}"></script>



@endsection
