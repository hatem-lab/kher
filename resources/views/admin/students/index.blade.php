@extends('layouts.app')

@section('styles')

    <!-- Internal Data table css -->
    <link href="{{asset('assets/plugins/datatable/datatables.min.css')}}" rel="stylesheet"/>
    <link href="{{asset('assets/plugins/datatable/responsive.dataTables.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/plugins/datatable/responsive.bootstrap5.css')}}" rel="stylesheet">
    <link href="{{asset('assets/plugins/datatable/css/buttons.bootstrap5.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/plugins/datatable/css/dataTables.bootstrap5.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/plugins/datatable/css/jquery.dataTables.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/notify/css/notifIt.css') }}" rel="stylesheet"/>

@endsection

@section('content')

    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto f-z-30"><a href="{{route('students.index')}}" class="text-dark">{{trans('students/students.Students')}} </a></h4><span
                    class="text-muted mt-1 tx-13 ms-2 mb-0"> / <a href="{{route('students.index')}}">{{trans('students/students.Students Menu')}}</a></span>
            </div>
        </div>

    </div>


    @if (session()->has('edit'))
        <script>
            window.onload = function () {
                notif({
                    msg: " Student information has updated successfully",
                    type: "success"
                });
            }

        </script>
    @endif

    @if (session()->has('delete'))
        <script>
            window.onload = function () {
                notif({
                    msg: "Student has Deleted Successfully",
                    type: "success"
                });
            }

        </script>
    @endif

    @if (session()->has('success'))
        <script>
            window.onload = function () {
                notif({
                    msg: "Student has Added Successfully",
                    type: "success"
                });
            }

        </script>
    @endif




    <div class="row row-sm">
        <div class="col-xl-12">
            <div class="card">

                <div class="card-header pb-0">
                    @if(auth('admin') -> user() ->can('create Student'))

                        <div class="d-flex ">
                            <div class="dropdown">
                                <button aria-expanded="false" aria-haspopup="true" class="btn ripple blue-button mb-15" data-bs-toggle="dropdown" id="dropdownMenuButton" type="button">
                                    @if(isset($course))
                                        {{$course->title}}
                                    @else
                                        فرز حسب الكورس
                                    @endif

                                    <i class="fas fa-caret-down ms-1"></i></button>
                                <div  class="dropdown-menu tx-13">
                                    <a class="dropdown-item" href="{{route('students.index')}}">عدم تحديد كورس</a>
                                    @foreach($courses as $one)
                                        <a class="dropdown-item" href="{{route('students.students.cousres',$one->id)}}">{{$one->title}}</a>
                                    @endforeach

                                </div>
                            </div>
                            <a class="btn blue-button btn-sm mr-10 mb-15"
                               href="{{ route('student.create') }}">{{trans('students/students.Add Student')}}</a>

                        </div>


                    @endif





                </div>
                <div class="card-body">
                    <div class="table-responsive userlist-table">
                        <table class="table table-striped table-vcenter text-nowrap mb-0" id="example1">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>{{trans('students/students.name')}}</th>
                                <th>{{trans('students/students.email')}}</th>
                                <th>{{trans('students/students.certificate')}}</th>
                                <th>{{trans('students/students.status')}}</th>
                                <th>{{trans('students/students.methods')}}</th>

                            </tr>
                            </thead>

                            <tbody>
                            @foreach ($students as $key => $student)
                                <tr id="row-{{$student->id}}">
                                    <td>{{ ++$key }}</td>
                                    <td>{{ $student->getTranslatedName() }}</td>
                                    <td>{{ $student->email }}</td>
                                    <td>{{ $student -> certificate -> getTranslatedName() }}</td>
                                    <td>
                                        @if ($student->status == 1)
                                            <span class="label text-success d-flex">
                                                <div class="dot-label bg-success ml-1"></div>{{trans('students/students.Active')}}
                                            </span>
                                        @else
                                            <span class="label text-danger d-flex">
                                                <div class="dot-label bg-danger ml-1"></div>{{trans('students/students.Inactive')}}
                                            </span>
                                        @endif
                                    </td>


                                    <td>
                                        @if(auth('admin') -> user() ->can('show Student'))

                                            <a class="btn btn-success btn-sm"
                                               href="{{ route('student.show', $student->id) }}"><i
                                                    class="las la-eye"></i></a>
                                        @endif
                                        @if(auth('admin') -> user() ->can('block-activate Student'))

                                            <a class="modal-effect btn btn-sm btn-{{$student->status == 1 ? 'blocke' : 'success'}}"
                                               data-effect="effect-scale"
                                               data-id="{{ $student->id }}" data-status="{{ $student->status }}"
                                               data-bs-toggle="modal" href="#status-sub"
                                               title="{{$student->status == 1 ? trans('general.Block') : trans('general.Activate') }}"><i
                                                    class="las la-user-{{$student->status == 1 ? 'slash' : 'check'}}"></i></a>
                                        @endif

                                        @if(auth('admin') -> user() ->can('update Student'))

                                            <a class="btn btn-primary btn-sm"
                                               href="{{ route('student.edit', $student->id) }}"><i
                                                    class="las la-edit"></i></a>
                                        @endif


                                        {{--                                        <a class="modal-effect btn btn-sm btn-danger" data-effect="effect-scale"--}}
                                        {{--                                           data-student_id="{{ $student->id }}"  data-username="{{ $student->username }}"--}}
                                        {{--                                           data-bs-toggle="modal"  href="#modaldemo1" title="delete"><i--}}
                                        {{--                                                class="las la-trash"></i></a>--}}
                                        @if(auth('admin') -> user() ->can('delete Student'))

                                            <a class="modal-effect btn btn-sm btn-danger" data-effect="effect-scale"
                                               data-id="{{ $student->id }}"
                                               data-bs-toggle="modal" href="#delete-sub"
                                               title="{{trans('general.Delete')}}"><i
                                                    class="las la-trash"></i></a>
                                        @endif

                                    </td>


                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal" id="delete-sub">
            <div class="modal-dialog" role="document">
                <div class="modal-content modal-content-demo">
                    <div class="modal-header">
                        <h6 class="modal-title">{{trans('general.Delete')}}</h6>
                        <button aria-label="Close" class="close"
                                data-bs-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <div class="modal-body">
                            <p>{{trans('students/students.Do Yoy Want to Delete This Student')}}? </p><br>

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

        <div class="modal" id="status-sub">
            <div class="modal-dialog" role="document">
                <div class="modal-content modal-content-demo">
                    <div class="modal-header">
                        <h6 class="modal-title" id="myModalLabel22"></h6>
                        <button aria-label="Close" class="close"
                                data-bs-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('student.changeStatus') }}" method="post">
                            @csrf
                            <div class="modal-body">
                                <p id="itemDeleteModalTitle"></p><br>
                                <input class="form-control" hidden name="student_id" value="" id="student_id"
                                       type="text" readonly>

                            </div>
                            <div class="modal-footer">
                                <button class="btn ripple btn-danger" id="status_btn" type="submit"></button>
                                <button class="btn ripple btn-secondary" data-bs-dismiss="modal"
                                        type="button">{{trans('general.Cancel')}}</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>


    {{--        <div class="modal" id="modaldemo1">--}}
    {{--            <div class="modal-dialog" role="document">--}}
    {{--                <div class="modal-content modal-content-demo">--}}
    {{--                    <div class="modal-header">--}}
    {{--                        <h6 class="modal-title">{{trans('students/students.Delete User')}}</h6><button aria-label="Close" class="close"--}}
    {{--                                                                        data-bs-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>--}}
    {{--                    </div>--}}
    {{--                    <div class="modal-body">--}}
    {{--                        <form action="{{ route('student.destroy') }}" method="post">--}}
    {{--                            {{ method_field('post') }}--}}
    {{--                            @csrf--}}
    {{--                            <div class="modal-body">--}}
    {{--                                <p>{{trans('students/students.Do Yoy Want to Delete This Student')}}?  </p><br>--}}

    {{--                                <input class="form-control" hidden name="student_id" value="" id="student_id" type="text" readonly>--}}

    {{--                            </div>--}}
    {{--                            <div class="modal-footer">--}}
    {{--                                <button class="btn ripple btn-danger" type="submit">{{trans('students/students.Delete')}}</button>--}}
    {{--                                <button class="btn ripple btn-secondary" data-bs-dismiss="modal" type="button">{{trans('students/students.Close')}}</button>--}}
    {{--                            </div>--}}


    {{--                        </form>--}}

    {{--                    </div>--}}

    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div>--}}




    @endsection('content')

    @section('scripts')

        <!-- Internal Data tables -->
            <script src="{{asset('assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
            <script src="{{asset('assets/plugins/datatable/datatables.min.js')}}"></script>
            <script src="{{asset('assets/plugins/datatable/js/dataTables.bootstrap5.js')}}"></script>
            <script src="{{asset('assets/plugins/datatable/js/dataTables.buttons.min.js')}}"></script>
            <script src="{{asset('assets/plugins/datatable/js/buttons.bootstrap5.min.js')}}"></script>
            <script src="{{asset('assets/plugins/datatable/js/jszip.min.js')}}"></script>
            <script src="{{asset('assets/plugins/datatable/js/buttons.html5.min.js')}}"></script>
            <script src="{{asset('assets/plugins/datatable/js/buttons.print.min.js')}}"></script>
            <script src="{{asset('assets/plugins/datatable/js/buttons.colVis.min.js')}}"></script>
            <script src="{{asset('assets/plugins/datatable/pdfmake/pdfmake.min.js')}}"></script>
            <script src="{{asset('assets/plugins/datatable/pdfmake/vfs_fonts.js')}}"></script>
            <script src="{{ URL::asset('assets/plugins/notify/js/notifIt.js') }}"></script>
            <script src="{{ URL::asset('assets/plugins/notify/js/notifit-custom.js') }}"></script>

            <!--Internal  Datatable js -->
            <script src="{{asset('assets/js/table-data.js')}}"></script>
            <script src="{{asset('assets/js/admin-pages/students/list.js')}}"></script>

    {{--            <script>--}}
    {{--                $('#modaldemo1').on('show.bs.modal', function(event) {--}}
    {{--                    var button = $(event.relatedTarget)--}}
    {{--                    var student_id = button.data('student_id')--}}
    {{--                    var modal = $(this)--}}
    {{--                    modal.find('.modal-body #student_id').val(student_id);--}}
    {{--                })--}}

    {{--            </script>--}}
@endsection

