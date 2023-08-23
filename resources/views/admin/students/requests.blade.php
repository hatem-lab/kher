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
                    class="text-muted mt-1 tx-13 ms-2 mb-0"> / <a href="">{{trans('students/students.Certificate Menu')}}</a></span>
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
                </div>
                <div class="card-body">
                    <div class="table-responsive userlist-table">
                        <table class="table table-striped table-vcenter text-nowrap mb-0" id="example1">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>{{trans('students/students.student')}}</th>
                                <th>{{trans('students/students.diploma')}}</th>
                                <th>{{trans('students/students.status')}}</th>
                                <th>{{trans('students/students.methods')}}</th>

                            </tr>
                            </thead>

                            <tbody>
                            @foreach ($requests as $key => $request)
                                <tr id="row-{{$request->id}}">
                                    <td>{{ ++$key }}</td>
                                    <td>{{ $request->student->name_ar }}</td>
                                    <td>{{ $request->diploma->title }}</td>
                                    <td>
                                        @if ($request->status == 1)
                                            <span class="label text-success d-flex">
                                                <div class="dot-label bg-success ml-1"></div>{{trans('students/students.Request')}}
                                            </span>
                                        @else
                                            <span class="label text-danger d-flex">
                                                <div class="dot-label bg-danger ml-1"></div>{{trans('students/students.Done')}}
                                            </span>
                                        @endif
                                    </td>


                                    <td>

                                        <a target="_blank" class="btn btn-success btn-sm"
                                           href="{{ route('certificate', ['request_sent'=>$request->id,'student_id'=>$request->student->id,'diploma_id'=>$request->diploma->id]) }}">
                                            <i
                                                class="fas fa-download"></i></a>

                                        @if ($request->status == 2)
                                        <a target="_blank" class="btn btn-success btn-sm"
                                           href="{{ route('certificate.view_certificate',$request->id)}}"
                                           role="button"><i class="fas fa-eye"></i>&nbsp;
                                        </a>
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

