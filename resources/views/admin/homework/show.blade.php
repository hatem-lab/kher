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
            <h4 class="content-title mb-0 my-auto f-z-30"><a href="{{route('homework.index')}}" class="text-dark">{{trans('Homework/Homework.Homeworks')}}</a></h4>
                <span class="text-muted mt-1 tx-13 ms-2 mb-0">/ <a href="{{route('homework.show',$homework->id)}}">{{trans('Homework/Homework.information homework')}}</a></span>
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
                                <a href="#home" data-bs-toggle="tab" aria-expanded="true" class="active"> <span
                                        class="visible-xs">
                                        <i class="fas fa-file-signature tx-16 me-1"></i></span> <span
                                        class="hidden-xs">{{trans('Homework/Homework.Homework')}}</span> </a>
                            </li>
                            <li class="">
                                <a href="#profile" data-bs-toggle="tab" aria-expanded="false"> <span
                                        class="visible-xs"><i class="fas fa-book-open tx-16 me-1"></i></span>
                                    <span class="hidden-xs">{{trans('Homework/Homework.lecture')}}</span> </a>
                            </li>
                            <li class="">
                                <a href="#settings" data-bs-toggle="tab" aria-expanded="false"> <span
                                        class="visible-xs"> <i class="fas fa-user tx-16 me-1"></i></span>
                                    <span class="hidden-xs">{{trans('Homework/Homework.teacher')}}</span> </a>
                            </li>

                            <li class="">
                                <a href="#students" data-bs-toggle="tab" aria-expanded="false"> <span
                                        class="visible-xs"><i class="fas fa-user-graduate tx-16 me-1"></i></span>
                                    <span class="hidden-xs">{{trans('Homework/Homework.students')}}</span> </a>
                            </li>

                            <li class="">
                                <a href="#files" data-bs-toggle="tab" aria-expanded="false"> <span
                                        class="visible-xs"><i class="fas fa-copy tx-16 me-1"></i></span>
                                    <span class="hidden-xs">{{trans('Homework/Homework.files')}}</span> </a>
                            </li>
                        </ul>
                    </div>
                    <div class="tab-content border-start border-bottom border-right border-top-0 p-4">
                        <div class="tab-pane active" id="home">
                            <h4 class="tx-15 text-uppercase mb-3 f-z-18">{{trans('Homework/Homework.title')}}</h4>
                            <p class="m-b-5">{{$homework->title}}</p>

                            <h4 class="tx-15 text-uppercase mb-3">{{trans('Homework/Homework.date')}}</h4>
                            <p class="m-b-5">{{$homework->date}}</p>

                            <div class="m-t-30">
                                <h4 class="tx-15 text-uppercase mt-3 f-z-18">{{trans('Homework/Homework.Description')}}</h4>
                                <div class=" p-t-10">
                                    <p class="text-muted tx-13 m-b-0">{!! $homework->desc !!}</p>
                                </div>
                                <hr>

                            </div>
                        </div>
                        <div class="tab-pane" id="profile">
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="border p-1 card thumb">

                                        <h4 class="text-center tx-14 mt-3 mb-0">{{trans('Homework/Homework.title')}}</h4>
                                        <div class="ga-border"></div>
                                        <p class="text-muted text-center"><small>{{$homework->lecture->title}}</small></p>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="border p-1 card thumb">

                                        <h4 class="text-center tx-14 mt-3 mb-0">{{trans('Homework/Homework.link')}}</h4>
                                        <div class="ga-border"></div>
                                        <p class="text-muted text-center"><small>{{$homework->lecture->link}}</small></p>
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="border p-1 card thumb">

                                        <h4 class="text-center tx-14 mt-3 mb-0">{{trans('Homework/Homework.end_date')}}</h4>
                                        <div class="ga-border"></div>
                                        <p class="text-muted text-center"><small>{{$homework->lecture->end_date}}</small></p>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="border p-1 card thumb">

                                        <h4 class="text-center tx-14 mt-3 mb-0">{{trans('Homework/Homework.start_date')}}</h4>
                                        <div class="ga-border"></div>
                                        <p class="text-muted text-center"><small>{{$homework->lecture->start_date}}</small></p>
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-sm-8">
                                    <div class="border p-1 card thumb">

                                        <h4 class="text-center tx-14 mt-3 mb-0">{{trans('Homework/Homework.Description')}}</h4>
                                        <div class="ga-border"></div>
                                        <p class="text-muted text-center"><small>{{$homework->lecture->desc}}</small></p>
                                    </div>
                                </div>
                            </div>

                            <br>
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="border p-1 card thumb">

                                        <h4 class="text-center tx-14 mt-3 mb-0">{{trans('Homework/Homework.course title')}}</h4>
                                        <div class="ga-border"></div>
                                        <p class="text-muted text-center"><small>{{$homework->lecture->course->title}}</small></p>
                                    </div>
                                </div>
                                <div class="col-sm-8">
                                    <div class="border p-1 card thumb">

                                        <h4 class="text-center tx-14 mt-3 mb-0">{{trans('Homework/Homework.course description')}}</h4>
                                        <div class="ga-border"></div>
                                        <p class="text-muted text-center"><small>{{$homework->lecture->course->desc}}</small></p>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="border p-1 card thumb">

                                        <h4 class="text-center tx-14 mt-3 mb-0">{{trans('Homework/Homework.diploma title')}}</h4>
                                        <div class="ga-border"></div>
                                        <p class="text-muted text-center"><small>@isset($homework->lecture->course->diploma->title){{$homework->lecture->course->diploma->title}}@endisset</small></p>
                                    </div>
                                </div>
                                <div class="col-sm-8">
                                    <div class="border p-1 card thumb">

                                        <h4 class="text-center tx-14 mt-3 mb-0">{{trans('Homework/Homework.diploma description')}}</h4>
                                        <div class="ga-border"></div>
                                        <p class="text-muted text-center"><small>@isset($homework->lecture->course->diploma->desc){{$homework->lecture->course->diploma->desc}}@endisset</small></p>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="tab-pane" id="settings">
                            <form role="form">
                                <div class="form-group">
                                    <label for="FullName" class="f-z-18">{{trans('Homework/Homework.Full Name')}}</label>
                                    <input readonly type="text" value="{{$teacher->name}}" id="FullName" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="Email" class="f-z-18">{{trans('Homework/Homework.Email')}}</label>
                                    <input readonly  type="email" value="{{$teacher->email}}" id="Email"
                                           class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="Username" class="f-z-18">{{trans('Homework/Homework.address')}}</label>
                                    <input readonly type="text" value="@isset($teacher->profile->address){{$teacher->profile->address}}@endisset" id="Username" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="Password" class="f-z-18">{{trans('Homework/Homework.phone')}}</label>
                                    <input readonly type="text" value="@isset($teacher->profile->phone){{$teacher->profile->phone}}@endisset"  id="Password"
                                           class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="RePassword" class="f-z-18">{{trans('Homework/Homework.birthday')}}</label>
                                    <input readonly  type="text" value="@isset($teacher->profile->birthday){{$teacher->profile->birthday}}@endisset" id="RePassword"
                                           class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="AboutMe" class="f-z-18">{{trans('Homework/Homework.Profile Image')}}</label>
                                    <div class="col-sm-4">
                                        <div class=" border p-1 card thumb">
                                            <a href="#" class="image-popup" title="Screenshot-2"> <img

                                                    @isset($teacher -> profile->image)
                                                    src="{{URL::to('/') . '/Profile/'.$teacher->name.'/'.$teacher->profile->image }}"
                                                    @endisset
                                                    alt="work-thumbnail"> </a>
                                            <h4 class="text-center tx-14 mt-3 mb-0 f-z-15" >{{trans('Homework/Homework.Profile Image')}}</h4>
                                            <div class="ga-border"></div>

                                        </div>
                                    </div>
                                </div>

                            </form>
                        </div>
                        <div class="tab-pane " id="students">
                            <div class="row">
                                <div class="col-lg-12 col-md-12">
                                    <div class="card overflow-hidden">
                                        <div class="card-header pb-0">
                                            <h3 class="card-title f-z-18">{{trans('Homework/Homework.students details')}}</h3>

                                        </div>
                                        <div class="card-body">
                                            <div class="panel-group1" id="accordion11">
                                                @foreach($students as $student)
                                                <div class="panel panel-default  mb-4">
                                                    <div class="panel-heading1 bg-primary ">
                                                        <h4 class="panel-title1">
                                                            <a class="accordion-toggle collapsed" data-bs-toggle="collapse"
                                                               data-bs-parent="#accordion11" href="#collapse{{$student->id}}"
                                                               aria-expanded="false">{{$student->getTranslatedName()}}<i class="fe fe-arrow-left me-2"></i></a>
                                                        </h4>
                                                    </div>
                                                    <div id="collapse{{$student->id}}" class="panel-collapse collapse" role="tabpanel"
                                                         aria-expanded="false">
                                                        <div class="panel-body border">
                                                            <form role="form">
                                                                <div class="form-group">
                                                                    <label for="FullName" class="f-z-18">{{trans('Homework/Homework.Full Name')}}</label>
                                                                    <input readonly type="text" value="{{$student->getTranslatedName()}}" id="FullName" class="form-control">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="Email" class="f-z-18">{{trans('Homework/Homework.Email')}}</label>
                                                                    <input readonly type="email" value="{{$student->email}}" id="Email"
                                                                           class="form-control">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="Username" class="f-z-18">{{trans('Homework/Homework.address')}}</label>
                                                                    <input readonly type="text" value="@isset($student->profile->address){{$student->profile->address}}@endisset" id="Username" class="form-control">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="Password" class="f-z-18">{{trans('Homework/Homework.phone')}}</label>
                                                                    <input readonly type="text" value="@isset($student->profile->phone){{$student->profile->phone}}@endisset"  id="Password"
                                                                           class="form-control">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="RePassword" class="f-z-18">{{trans('Homework/Homework.birthday')}}</label>
                                                                    <input readonly type="text" value="@isset($student->profile->birthday){{$student->profile->birthday}}@endisset" id="RePassword"
                                                                           class="form-control">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="AboutMe" class="f-z-18">{{trans('Homework/Homework.Profile Image')}}</label>
                                                                    <div class="col-sm-4">
                                                                        <div class=" border p-1 card thumb">
                                                                            <a href="#" class="image-popup" title="Screenshot-2"> <img
                                                                                    @isset($student -> profile->image)
                                                                                    src="{{URL::to('/') . '/Profile/students/' .$student->profile->image }}"
                                                                                    @endisset
                                                                                    alt="work-thumbnail"> </a>
                                                                            <h4 class="text-center tx-14 mt-3 mb-0 f-z-18">{{trans('Homework/Homework.Profile Image')}}</h4>
                                                                            <div class="ga-border"></div>

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
                        <div class="tab-pane " id="files">
                            <div class="card-body">
                                <p class="text-danger">* Form: pdf,jpeg ,jpg ,png,zip </p>
                                <h5 class="card-title f-z-18">{{trans('Homework/Homework.Add Attachments')}}</h5>
                                <form method="{{route('homework.Attachments',)}}" action="post"
                                      enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="RePassword" class="f-z-18">{{trans('Homework/Homework.name')}}</label>
                                        <input id="name" name="name" type="text" value="" id="RePassword"
                                               class="form-control">
                                    </div>
                                    <div class="card">
                                        <div class="card-body">
                                            <div>
                                                <input type="file" name="file" id="file" class="dropify" data-height="200" /></div>
                                        </div>
                                    </div>
                                    <input type="hidden"  id="homework_id" name="homework_id"
                                           value="{{ $homework->id }}">
                                    <br><br>
                                    <button  id="add" class="btn blue-button mb-15 btn-sm "
                                            name="uploadedFile">{{trans('Homework/Homework.Add')}}</button>
                                </form>
                            </div>
                            <br>
                            <div class="table-responsive mt-15">
                                <table class="table center-aligned-table mb-0 table table-hover"
                                       style="text-align:center">
                                    <thead>
                                    <tr class="text-dark">
                                        <th scope="col">#</th>
                                        <th scope="col">{{trans('Homework/Homework.file name')}}</th>
                                        <th scope="col">{{trans('Homework/Homework.created at')}}</th>
                                        <th scope="col">{{trans('Homework/Homework.methods')}}</th>
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
                                                <a class="btn btn-success btn-sm"
                                                   href="{{ route('homework.View_file',['path'=>$attachment->path,'file_name'=>$attachment->name])  }}"
                                                   role="button"><i class="fas fa-eye"></i>&nbsp;
                                                    </a>

                                                <a class="btn btn-info btn-sm"
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
                            <!-- row -->








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

