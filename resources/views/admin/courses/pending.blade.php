


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
            <h4 class="content-title mb-0 my-auto f-z-30"><a href="{{route('course.index')}}" class="text-dark">{{trans('courses/courses.courses')}}</a></h4><span
                    class="text-muted mt-1 tx-13 ms-2 mb-0"> / {{trans('courses/courses.pending_Course_list')}}</span>
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




    <div class="row row-sm">
        <div class="col-xl-12">
            <div class="card">

               
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
                            @foreach ($CourseStudent as $key => $course)
                                <tr id="row-{{$course->id}}">
                                    <td>{{ ++$key }}</td>
                                    <td>{{ $course->course->title }}</td>
                                    <td>{{ $course->student->username }}</td>
                                    <td>{{ $course->status }}</td>
                                    <td>
                                        <a class="btn btn-primary btn-sm"
                                           href="{{ route('course.accept', $course->id) }}" title="{{trans('courses/courses.accept')}}"><i
                                                class="las la-edit" ></i></a>

                                                <a class="modal-effect btn btn-sm btn-danger"
                                           href="{{ route('course.reject', $course->id) }}" title="{{trans('courses/courses.reject')}}"><i
                                                class="las la-trash" ></i></a>

                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                   

                       
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
            <script src="{{asset('assets/js/admin-pages/courses/list.js')}}"></script>

@endsection

