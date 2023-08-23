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
                <h4 class="content-title mb-0 my-auto">{{trans('students/students.Students')}}</h4><span
                    class="text-muted mt-1 tx-13 ms-2 mb-0">/ {{trans('students/students.Students Menu')}}</span>
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

                {{--                <div class="card-header pb-0">--}}
                {{--                    <div class="d-flex justify-content-between">--}}
                {{--                        <a class="btn btn-primary btn-sm mr-10" href="{{ route('student.create') }}">{{trans('students/students.Add Student')}}</a>--}}
                {{--                    </div>--}}

                {{--                </div>--}}
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
                                        <span class="label text-warning d-flex">
                                                <div class="dot-label bg-warning ml-1"></div>
                                            {{ trans('students/students.'.App\Helpers\Constants::studentStatus[$student->status]) }}
                                            </span>

                                    </td>

                                    <td>
                                        @if(auth('admin') -> user() ->can('accept-registration Student'))

                                            <a class="modal-effect btn btn-sm btn-success" data-effect="effect-scale"
                                               data-id="{{ $student->id }}"
                                               data-bs-toggle="modal" href="#accept-sub"
                                               title="{{trans('general.Accept')}}"><i
                                                    class="las la-check"></i></a>
                                        @endif


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

                        <div class="modal" id="accept-sub">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content modal-content-demo">
                                    <div class="modal-header">
                                        <h6 class="modal-title">{{trans('general.Accept')}}</h6>
                                        <button aria-label="Close" class="close"
                                                data-bs-dismiss="modal" type="button"><span
                                                aria-hidden="true">&times;</span></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="modal-body">
                                            <p>{{trans('general.accept_warning')}} </p><br>

                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn ripple btn-success" id="accept_btn"
                                                    type="submit">{{trans('general.Accept')}}</button>
                                            <button class="btn ripple btn-secondary" data-bs-dismiss="modal"
                                                    type="button">{{trans('general.Cancel')}}</button>
                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


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
            <script src="{{asset('assets/js/admin-pages/students/pending_requests.js')}}"></script>

@endsection

