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
                <h4 class="content-title mb-0 my-auto f-z-30">
                    <a href="{{route('lecture.index')}}" class="text-dark">
                    {{trans('lectures/lectures.lectures')}}
                    </a>
                </h4>
                <span
                    class="text-muted mt-1 tx-13 ms-2 mb-0">/ {{$lecture->title}}
                </span>
                <span
                    class="text-muted mt-1 tx-13 ms-2 mb-0">/ {{trans('lectures/lectures.students')}}</span>
            </div>
        </div>

    </div>


    @if (session()->has('edit'))
        <script>
            window.onload = function () {
                notif({
                    msg: " students information has updated successfully",
                    type: "success"
                });
            }

        </script>
    @endif

    @if (session()->has('delete'))
        <script>
            window.onload = function () {
                notif({
                    msg: "students has Deleted Successfully",
                    type: "success"
                });
            }

        </script>
    @endif

    @if (session()->has('success'))
        <script>
            window.onload = function () {
                notif({
                    msg: "lecture has Added Successfully",
                    type: "success"
                });
            }

        </script>
    @endif




    <div class="row row-sm">
        <div class="col-xl-12">
            <div class="card">

                <div class="card-header pb-0">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title mg-b-0 mtb f-z-30">{{trans('lectures/lectures.students_table')}}</h4>
                        <i class="mdi mdi-dots-horizontal text-gray"></i>
                    </div>
                    <p class="tx-12 tx-gray-500 mb-2">{{trans('lectures/lectures.students_present_table_hint')}}</p>

                </div>
                <div class="card-body">
                    <div class="table-responsive border-top userlist-table">
                        <table
                            class="table card-table table-striped table-vcenter text-nowrap mb-0">
                            <thead>
                            <tr>
                                <th class="wd-10p border-bottom-0">#</th>
                                <th class="wd-15p border-bottom-0">{{trans('lectures/lectures.student_name')}}</th>
                                <th class="wd-15p border-bottom-0"><span></span></th>
                                <th class="wd-15p border-bottom-0">{{trans('lectures/lectures.student_email')}}</th>
                                <th class="wd-20p border-bottom-0">{{trans('lectures/lectures.status')}}</th>
                                <th class="wd-10p border-bottom-0">{{trans('general.Actions')}}</th>

                            </tr>
                            </thead>

                            <tbody>
                            @foreach ($course_students as $key => $student)
                                <tr id="row-{{$student->id}}">
                                    <td>{{ ++$key }}</td>
                                    <td>
                                        <img alt="avatar" class="rounded-circle avatar-md me-2"
                                             src="{{ isset($student->profile->image) ? URL::asset($student->profile->image) : URL::asset('images/defaults/student.png')}}">
                                    </td>
                                    <td>{{ $student->name_ar }}</td>
                                    <td>{{ $student->email }}</td>
                                    <td>
                                        <span class="badge rounded-pill bg-{{ in_array($student->id, $lecture_students_ids) ? 'success' : 'danger' }}">
                                            {{ in_array($student->id, $lecture_students_ids) ? trans('lectures/lectures.present') : trans('lectures/lectures.absent') }}
                                        </span>
                                    </td>
                                    <td>
{{--                                        @if(auth('admin') -> user() ->can('delete Lecture'))--}}
                                            <a class="modal-effect btn btn-sm btn-{{ in_array($student->id, $lecture_students_ids) ? 'danger' : 'success' }}" data-effect="effect-scale"
                                               data-lecture="{{ $lecture->id }}"
                                               data-student="{{ $student->id }}"
                                               data-status="{{ in_array($student->id, $lecture_students_ids) }}"
                                               data-bs-toggle="modal" href="#delete-sub"
                                               title="{{trans('general.Change_status')}}"><i
                                                    class="las la-edit"></i></a>
{{--                                        @endif--}}
                                    </td>

                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                        <div class="modal" id="delete-sub">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content modal-content-demo">
                                    <div class="modal-header">
                                        <h6 class="modal-title">{{trans('general.Change_status')}}</h6>
                                        <button aria-label="Close" class="close"
                                                data-bs-dismiss="modal" type="button"><span
                                                aria-hidden="true">&times;</span></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="modal-body">
                                            <h4 class="modal-title fs-19 font-weight-semi-bold pt-2 pb-1"
                                                id="itemDeleteModalTitle"> </h4><br>

                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn ripple "
                                                    id="delete_btn"
                                                    type="submit">{{trans('general.save')}}</button>
                                            <button class="btn ripple btn-secondary"
                                                    data-bs-dismiss="modal"
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
    <script src="{{asset('assets/js/admin-pages/lectures/students.js')}}"></script>

@endsection

