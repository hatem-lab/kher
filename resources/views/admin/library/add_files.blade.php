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

@endsection

@section('content')

    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
            <h4 class="content-title mb-0 my-auto f-z-30"><a href="{{route('lecture.index')}}" class="text-dark">المكتبة</a></h4><span
                    class="text-muted mt-1 tx-13 ms-2 mb-0">/ <a href="{{route('library.create')}}"> {{trans('lectures/lectures.Add Files')}}</a></span>
            </div>
        </div>

    </div>    <!-- breadcrumb -->

    <!-- row -->
    <div class="row">

        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-body">
{{--                    <div class="pull-right">--}}
{{--                        <a class="btn blue-button mb-15 btn-sm" href="{{ route('lecture.index') }}"> {{trans('lectures/lectures.Back')}}</a>--}}
{{--                    </div>--}}
                        <form action="{{route('library.Attachments')}}" method="POST"
                          id="lecture_form" data-parsley-validate="" enctype="multipart/form-data">
                        @csrf
                        <div class="tab-pane " id="files">
                            <div class="card-body">
                                <p class="text-danger f-z-18">* Form: pdf </p>
                                <h5 class="card-title f-z-18"> {{trans('lectures/lectures.Add Attachments')}}</h5>


                                    <div class="card">
                                        <div class="card-body">
                                            <div>
                                                <input type="file" name="file" id="file" class="dropify" data-height="200" /></div>
                                        </div>
                                    </div>
{{--                                    <input type="hidden"  id="lecture_id" name="lecture_id"--}}
{{--                                           value="{{ $lecture->id }}">--}}
                                    <br><br>
                                    <button   class="btn blue-button mb-15 btn-sm "
                                             name="uploadedFile"> {{trans('lectures/lectures.Add')}}</button>

                            </div>
                            <br>

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




    <script src="{{asset('assets/js/admin-pages/lectures/delete_file.js')}}"></script>

@endsection
