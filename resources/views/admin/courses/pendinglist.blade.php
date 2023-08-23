


@extends('layouts.app')

@section('styles')

    <!-- Internal Data table css -->
    <link href="{{asset('assets/plugins/datatable/datatables.min.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/plugins/datatable/responsive.dataTables.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/plugins/datatable/responsive.bootstrap5.css')}}" rel="stylesheet">
    <link href="{{asset('assets/plugins/datatable/css/buttons.bootstrap5.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/plugins/datatable/css/dataTables.bootstrap5.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/plugins/datatable/css/jquery.dataTables.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/notify/css/notifIt.css') }}" rel="stylesheet" />

@endsection

@section('content')

    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto"><a href="{{route('course.pendinglist')}}" class="text-dark">{{trans('courses/courses.pending_Course_list')}}</a></h4><span
                    class="text-muted mt-1 tx-13 ms-2 mb-0">/ <a href="{{route('course.pendinglist')}}">{{trans('courses/courses.pending_Course_list')}}</a></span>
            </div>
        </div>

    </div>


    @if (session()->has('edit'))
        <script>
            window.onload = function() {
                notif({
                    msg: " course information has updated successfully",
                    type: "success"
                });
            }

        </script>
    @endif

    @if (session()->has('delete'))
        <script>
            window.onload = function() {
                notif({
                    msg: "course has Deleted Successfully",
                    type: "success"
                });
            }

        </script>
    @endif

    @if (session()->has('success'))
        <script>
            window.onload = function() {
                notif({
                    msg: "course has Added Successfully",
                    type: "success"
                });
            }

        </script>
    @endif





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
                                class="visible-xs">

                                <i class="fas fa-file-signature tx-16 me-1"></i></span> <span
                                class="hidden-xs">{{trans('courses/courses.Pending')}}</span> </a>
                    </li>
                    <li class="">
                        <a href="#courses" data-bs-toggle="tab" aria-expanded="false"> <span
                                class="visible-xs"><i class="fas fa-check tx-16 me-1"></i></span>
                            <span class="hidden-xs">{{trans('courses/courses.Accept')}}</span> </a>
                    </li>
                    <li class="">
                        <a href="#schedules" data-bs-toggle="tab" aria-expanded="false"> <span
                                class="visible-xs"><i class="fas fa-times-circle tx-16 me-1"></i></span>
                            <span class="hidden-xs">{{trans('courses/courses.Reject')}}</span> </a>
                    </li>



                </ul>
            </div>
            <div class="tab-content border-start border-bottom border-right border-top-0 p-4">
                <div class="tab-pane active" id="profile">
                <div class="card-header pb-0">
                                    <h3 class="card-title f-z-25">{{trans('courses/courses.Pending Requests')}}</h3>

                                </div>
                <div class="card-body">
                    <div class="table-responsive userlist-table">
                        <table class="table table-striped table-vcenter text-nowrap mb-0" id="example1">
                            <thead>
                            <tr>
                                <th class="wd-10p border-bottom-0">#</th>
                                <th class="wd-15p border-bottom-0">{{trans('courses/courses.course_name')}}</th>
                                <th class="wd-15p border-bottom-0">{{trans('courses/courses.student_name')}} </th>
                                <th class="wd-15p border-bottom-0"> {{trans('courses/courses.status')}}</th>
                                <th class="wd-10p border-bottom-0">{{trans('general.Actions')}}</th>

                            </tr>
                            </thead>

                            <tbody>
                            @foreach ($CourseStudentPending as $key => $course)
                                <tr id="row-{{$course->id}}">
                                    <td>{{ ++$key }}</td>
                                    <td>{{ $course->course->title }}</td>
                                    <td>{{ $course->student->username }}</td>
                                    <td>{{trans('courses/courses.'.$course->status)}}</td>
                                    <td>
                                        <a class="btn btn-primary btn-sm "
                                           href="{{ route('course.acceptlist', $course->id) }}" title="{{trans('courses/courses.accept')}}"><i
                                                class="las la-edit" ></i></a>

                                                <a class="modal-effect btn btn-sm btn-danger"
                                           href="{{ route('course.rejectlist', $course->id) }}" title="{{trans('courses/courses.reject')}}"><i
                                                class="las la-trash" ></i></a>

                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>




                    </div>
                </div>
                </div>

                <div class="tab-pane " id="courses">
                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <div class="card overflow-hidden">
                                <div class="card-header pb-0">
                                    <h3 class="card-title f-z-25">{{trans('courses/courses.Accepted Requests')}}</h3>

                                </div>
                                <div class="card-body">
                                <div class="card-body">
                    <div class="table-responsive userlist-table">
                        <table class="table table-striped table-vcenter text-nowrap mb-0" id="example1">
                            <thead>
                            <tr>
                                <th class="wd-10p border-bottom-0">#</th>
                                <th class="wd-15p border-bottom-0">{{trans('courses/courses.course_name')}}</th>
                                <th class="wd-15p border-bottom-0">{{trans('courses/courses.student_name')}} </th>
                                <th class="wd-15p border-bottom-0"> {{trans('courses/courses.status')}}</th>


                            </tr>
                            </thead>

                            <tbody>
                            @foreach ($CourseStudentAccept as $key => $course)
                                <tr id="row-{{$course->id}}">
                                    <td>{{ ++$key }}</td>
                                    <td>{{ $course->course->title }}</td>
                                    <td>{{ $course->student->username }}</td>
                                    <td>{{trans('courses/courses.'.$course->status)}}</td>

                                </tr>
                            @endforeach
                            </tbody>
                        </table>




                    </div>
                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="tab-pane" id="schedules">

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card custom-card">
                                <div class="card-header custom-card-header">
                                    <h6 class="card-title mb-0 f-z-25">{{trans('courses/courses.Rejected Requests')}}</h6>
                                </div>
                                <div class="card-body">
                                <div class="card-body">
                    <div class="table-responsive userlist-table">
                        <table class="table table-striped table-vcenter text-nowrap mb-0" id="example1">
                            <thead>
                            <tr>
                                <th class="wd-10p border-bottom-0">#</th>
                                <th class="wd-15p border-bottom-0">{{trans('courses/courses.course_name')}}</th>
                                <th class="wd-15p border-bottom-0">{{trans('courses/courses.student_name')}} </th>
                                <th class="wd-15p border-bottom-0"> {{trans('courses/courses.status')}}</th>


                            </tr>
                            </thead>

                            <tbody>
                            @foreach ($CourseStudentReject as $key => $course)
                                <tr id="row-{{$course->id}}">
                                    <td>{{ ++$key }}</td>
                                    <td>{{ $course->course->title }}</td>
                                    <td>{{ $course->student->username }}</td>
                                    <td>{{trans('courses/courses.'.$course->status)}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>




                    </div>
                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Row -->
                </div>








            </div>
        </div>
    </div>
</div>
</div>
<!-- row closed -->


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
            <script src="{{asset('assets/js/admin-pages/courses/list.js')}}"></script>

@endsection

