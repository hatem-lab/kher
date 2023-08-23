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
    <link href="{{asset('assets/plugins/fileuploads/css/fileupload.css')}}" rel="stylesheet" type="text/css"/>

    <!---Internal Fancy uploader css-->
    <link href="{{asset('assets/plugins/fancyuploder/fancy_fileupload.css')}}" rel="stylesheet" />

@endsection

@section('content')

    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
            <h4 class="content-title mb-0 my-auto f-z-30"> <a href="{{route('blogs.index')}}" class="text-dark">{{trans('Blog/Blog.Blogs')}}</a></h4>
                <span  class="text-muted mt-1 tx-13 ms-2 mb-0"> / <a href="{{route('blog.edit',$data->id)}}">{{trans('Blog/Blog.Edit')}}</a></span>
            </div>
        </div>

    </div>    <!-- breadcrumb -->




    <!-- row -->
    <div class="row">

        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-body">

                    <form action="{{route('blog.update', $data->id)}}" method="POST"
                          id="lecture_form" data-parsley-validate="">
                        @csrf
                        <div class="row row-sm">
                            <div class="col-12 ">
                                <div class="form-group mg-b-0">
                                    <label class="form-label">{{trans('lectures/lectures.title')}}: </label>
                                    <input class="form-control" name="title" value="{{$data->title}}" placeholder="{{trans('lectures/lectures.plc_title')}}" type="text">
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

                                                {!! $data->desc !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12"><button class="btn btn-main-primary pd-x-20 mg-t-10" type="submit">{{trans('general.Edit')}}</button></div>
                        </div>
                    </form>

                        <div class="tab-pane " id="files">
                            <div class="card-body">
                                <h5 class="card-title">{{trans('Blog/Blog.Add Image')}}</h5>
                                <form method="" action=""
                                      enctype="multipart/form-data">
                                    @csrf
                                    <div class="card">
                                        <div class="card-body">
                                            <div>
                                                <input type="file" name="file" id="file" class="dropify" data-height="200" /></div>
                                        </div>
                                    </div>
                                    <input type="hidden"  id="id" name="id"
                                           value="{{ $data->id }}">
                                    <br><br>
                                    <button  id="add" class="btn btn-primary btn-sm "
                                             name="uploadedFile">{{trans('Blog/Blog.Add')}}</button>
                                </form>
                            </div>
                            <br>
                            <div class="table-responsive mt-15">
                                <table class="table center-aligned-table mb-0 table table-hover"
                                       style="text-align:center">
                                    <thead>
                                    <tr class="text-dark">
                                        <th scope="col">#</th>
                                        <th scope="col">{{trans('Blog/Blog.Image')}}</th>
                                        <th scope="col">{{trans('Blog/Blog.Methods')}}</th>
                                    </tr>
                                    </thead>
                                    <tbody id="list">
                                    <?php $i = 0; ?>
                                        <?php $i++; ?>
                                        <tr id="row-{{$data->id}}">
                                            <td>{{ $i }}</td>
                                            <td><img src="{{URL::to('/') . '/Blogs/' . $data->id.'/'.$data->image}}" alt="Avatar" height="100" width="100"></td>


                                            <td colspan="2">
                                                {{--   @can('حذف المرفق')  --}}
                                                <a class="modal-effect btn btn-sm btn-danger" data-effect="effect-scale"
                                                   data-id="{{ $data->id }}"
                                                   data-bs-toggle="modal" href="#delete-sub"
                                                   title="{{trans('general.Delete')}}"><i
                                                        class="las la-trash"></i></a>
                                                {{--   @endcan  --}}

                                            </td>
                                        </tr>
                                    </tbody>
                                    </tbody>
                                </table>
                                <div class="modal" id="delete-sub">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content modal-content-demo">
                                            <div class="modal-header">
                                                <h6 class="modal-title">{{trans('general.Delete')}}</h6>
                                                <button aria-label="Close" class="close"
                                                        data-bs-dismiss="modal" type="button"><span
                                                        aria-hidden="true">&times;</span></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="modal-body">
                                                    <p>{{trans('general.delete_warning')}} </p><br>

                                                </div>
                                                <div class="modal-footer">
                                                    <button class="btn ripple btn-danger" id="delete_btn"
                                                            type="submit">{{trans('general.Delete')}}</button>
                                                    <button class="btn ripple btn-secondary" data-bs-dismiss="modal"
                                                            type="button">{{trans('general.Cancel')}}</button>
                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!-- row -->

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
    <!--Internal Fileuploads js-->
    <script src="{{asset('assets/plugins/fileuploads/js/fileupload.js')}}"></script>
    <script src="{{asset('assets/plugins/fileuploads/js/file-upload.js')}}"></script>

    <!--Internal Fancy uploader js-->
    <script src="{{asset('assets/plugins/fancyuploder/jquery.ui.widget.js')}}"></script>
    <script src="{{asset('assets/plugins/fancyuploder/jquery.fileupload.js')}}"></script>
    <script src="{{asset('assets/plugins/fancyuploder/jquery.iframe-transport.js')}}"></script>
    <script src="{{asset('assets/plugins/fancyuploder/jquery.fancy-fileupload.js')}}"></script>
    <script src="{{asset('assets/plugins/fancyuploder/fancy-uploader.js')}}"></script>
    <script src="{{asset('assets/js/admin-pages/blog/delete_file.js')}}"></script>


    <script>
        $(document).on('click', '#add', function (e) {
            e.preventDefault();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var formData = new FormData()
            var image = $("input[type=file]")[0].files[0];
            var id='{{$data -> id}}'
            formData.append('file', image);
            formData.append('id', id);
            $.ajax({
                url: "{{route('blog.image')}}",
                cache: false,
                processData: false,
                contentType: false,
                type: 'POST',
                data: formData,
                success: function (data) {
                    if (data.status == true) {
                        $('#list').empty().html(data.content);

                    } else {
                    }
                }, error: function (reject) {
                }
            });
        });
    </script>

@endsection
