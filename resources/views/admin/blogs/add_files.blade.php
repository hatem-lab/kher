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
                <h4 class="content-title mb-0 my-auto"> Homework</h4><span
                    class="text-muted mt-1 tx-13 ms-2 mb-0">/{{trans(Blog/Blog.Add Files)}} </span>
            </div>
        </div>

    </div>    <!-- breadcrumb -->

    <!-- row -->
    <div class="row">

        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="pull-right">
                        <a class="btn btn-primary btn-sm" href="{{ route('homework.index') }}">{{trans(Blog/Blog.Back)}}</a>
                    </div>
                        <form action="{{route('homework.Attachments')}}" method="POST"
                          id="lecture_form" data-parsley-validate="">
                        @csrf
                        <div class="tab-pane " id="files">
                            <div class="card-body">
                                <p class="text-danger">* Form: pdf,jpeg ,jpg ,png,zip </p>
                                <h5 class="card-title">{{trans(Blog/Blog.Add Attachments)}}</h5>
                                <form method="" action=""
                                      enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="RePassword">{{trans(Blog/Blog.name)}}</label>
                                        <input id="name" name="name" type="text" value="" id="RePassword"
                                               class="form-control">
                                    </div>
                                    <div class="card">
                                        <div >
                                            <div>
                                                <input type="file" name="file" id="file" class="dropify" data-height="200" /></div>
                                        </div>
                                    </div>
                                    <input type="hidden"  id="homework_id" name="homework_id"
                                           value="{{ $homework->id }}">
                                    <br><br>
                                    <button  id="add" class="btn btn-primary"
                                             name="uploadedFile">{{trans(Blog/Blog.file Add)}}</button>
                                </form>
                            </div>
                            <br>
                            <div class="table-responsive mt-15">
                                <table class="table center-aligned-table mb-0 table table-hover"
                                       style="text-align:center">
                                    <thead>
                                    <tr class="text-dark">
                                        <th scope="col">#</th>
                                        <th scope="col">{{trans(Blog/Blog.file name)}}</th>
                                        <th scope="col">{{trans(Blog/Blog.created at)}}</th>
                                        <th scope="col">{{trans(Blog/Blog.methods)}}</th>
                                    </tr>
                                    </thead>
                                    <tbody id="list">
                                    <?php $i = 0; ?>
                                    @foreach($attachments as $attachment)
                                        <?php $i++; ?>
                                        <tr id="row-{{$attachment->id}}">
                                            <td>{{ $i }}</td>
                                            <td>{{ $attachment->name }}</td>
                                            <td>{{ $attachment->created_at }}</td>
                                            <td colspan="2">
                                                <a class="btn btn-outline-success btn-sm"
                                                   href="{{ route('homework.View_file',['path'=>$attachment->path,'file_name'=>$attachment->name])  }}"
                                                   role="button"><i class="fas fa-eye"></i>&nbsp;
                                                </a>

                                                <a class="btn btn-outline-info btn-sm"
                                                   href="{{ route('homework.download',['path'=>$attachment->path,'file_name'=>$attachment->name])  }}"
                                                   role="button"><i
                                                        class="fas fa-download"></i>&nbsp;
                                                </a>
                                                {{--   @can('حذف المرفق')  --}}
                                                <a class="modal-effect btn btn-sm btn-danger" data-effect="effect-scale"
                                                   data-id="{{ $attachment->id }}"
                                                   data-bs-toggle="modal" href="#delete-sub"
                                                   title="{{trans('general.Delete')}}"><i
                                                        class="las la-trash"></i></a>
                                                {{--   @endcan  --}}

                                            </td>
                                        </tr>
                                    @endforeach
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
            var name = $('#name').val();
            var homework_id='{{$homework -> id}}'
            formData.append('file', image);
            formData.append('name', name);
            formData.append('homework_id', homework_id);
            $.ajax({
                url: "{{route('homework.Attachments')}}",
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


    <script src="{{asset('assets/js/admin-pages/homework/delete_file.js')}}"></script>

@endsection
