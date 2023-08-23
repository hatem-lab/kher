@extends('layouts.app')

@section('styles')

    <link rel="stylesheet" href="{{asset('assets/css-rtl/editors/quill/katex.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css-rtl/editors/quill/monokai-sublime.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css-rtl/editors/quill/quill.snow.css')}}">


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
               <h4  class="content-title mb-0 my-auto f-z-30"><a href="{{route('diploma.index')}}" class="text-dark">{{trans('diplomas/diplomas.diplomas')}}</a></h4><span
                    class="text-muted mt-1 tx-13 ms-2 mb-0"> / <a href="{{route('diploma.show',$diploma->id)}}"> {{trans('diplomas/diplomas.Diplomas Details')}}</a></span>
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
                                        class="hidden-xs">{{trans('teachers.information')}}</span> </a>
                            </li>
                        </ul>
                    </div>
                    <div class="tab-content border-start border-bottom border-right border-top-0 p-4">
                        <div class="tab-pane active" id="profile">
                            <form role="form">
                                <div class="form-group">
                                    <label for="title">{{trans('diplomas/diplomas.title')}}</label>
                                    <input readonly type="text" value="{{$diploma->title}}" id="title" class="form-control">
                                </div>
                                <div class="form-group mg-b-0">
                                    <label
                                        class="form-label">{{trans('diplomas/diplomas.desc')}} </label>
                                    <div id="blog-editor-wrapper">
                                        <div id="blog-editor-container">
                                            <div class="editor" style="min-height: 200px" readonly="true">

                                                {!! $diploma->desc !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
{{--                                <div class="form-group">--}}
{{--                                    <label for="desc">{{trans('diplomas/diplomas.desc')}}</label>--}}
{{--                                    <textarea readonly   id="desc"--}}
{{--                                              class="form-control"></textarea>--}}
{{--                                </div>--}}

                                <div class="form-group">
                                    <label for="AboutMe">{{trans('diplomas/diplomas.Diplomas Image')}}</label>
                                    <div class="col-sm-4">
                                        <div class=" border p-1 card thumb">
                                            <a href="#" class="image-popup" title="Screenshot-2"> <img
                                                    src="{{URL::to('/') . '/Diploma/' . $diploma->title.'/'.$diploma->image}}" class="thumb-img"
                                                    alt="work-thumbnail"> </a>
                                            <div class="ga-border"></div>

                                        </div>
                                    </div>
                                </div>

                            </form>
                        </div>










                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- row closed -->



@endsection('content')

@section('scripts')

    <script src="{{asset('assets/js/editors/quill/katex.min.js')}}"></script>
    <script src="{{asset('assets/js/editors/quill/highlight.min.js')}}"></script>
    <script src="{{asset('assets/js/editors/quill/quill.min.js')}}"></script>

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

    <script>

        var editor = '#blog-editor-container .editor';
        var Font = Quill.import('formats/font');
        Font.whitelist = ['sofia', 'slabo', 'roboto', 'inconsolata', 'ubuntu'];
        Quill.register(Font, true);
        //
        var blogEditor = new Quill(editor, {
            bounds: editor,
            modules: {
                formula: true,
                syntax: true,
                toolbar: [
                    [
                        {
                            font: []
                        },
                        {
                            size: []
                        }
                    ],
                    ['bold', 'italic', 'underline', 'strike'],
                    [
                        {
                            color: []
                        },
                        {
                            background: []
                        }
                    ],
                    [
                        {
                            script: 'super'
                        },
                        {
                            script: 'sub'
                        }
                    ],
                    [
                        {
                            header: '1'
                        },
                        {
                            header: '2'
                        },
                        'blockquote',
                        'code-block'
                    ],
                    [
                        {
                            list: 'ordered'
                        },
                        {
                            list: 'bullet'
                        },
                        {
                            indent: '-1'
                        },
                        {
                            indent: '+1'
                        }
                    ],
                    [
                        'direction',
                        {
                            align: []
                        }
                    ],
                    ['link', 'image', 'video', 'formula'],
                    ['clean']
                ]
            },
            theme: 'snow',
            placeholder: 'Enter description...',

        });
    </script>
@endsection

