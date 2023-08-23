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
                <h4 class="content-title mb-0 my-auto f-z-30"><a href="{{route('course.index')}}" class="text-dark">{{trans('courses/courses.courses')}}</a></h4><span
                    class="text-muted mt-1 tx-13 ms-2 mb-0"> / <a href="{{route('course.index')}}">{{trans('courses/courses.list courses')}}</a></span>
            </div>
        </div>

    </div>


    @if (session()->has('edit'))
        <script>
            window.onload = function () {
                notif({
                    msg: " course information has updated successfully",
                    type: "success"
                });
            }

        </script>
    @endif

    @if (session()->has('delete'))
        <script>
            window.onload = function () {
                notif({
                    msg: "course has Deleted Successfully",
                    type: "success"
                });
            }

        </script>
    @endif

    @if (session()->has('success'))
        <script>
            window.onload = function () {
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

                <div class="card-header pb-0">
                    @if(auth('admin') -> user() ->can('create courses'))

                        <div class="d-flex justify-content-between">
                            <a class="btn blue-button mb-15 btn-sm"
                               href="{{ route('course.create') }}">{{trans('general.Add')}}</a>
                        </div>
                    @endif

                </div>
                <div class="card-body">
                    <div class="table-responsive userlist-table">
                        <table class="table table-striped table-vcenter text-nowrap mb-0" id="example1">
                            <thead>
                            <tr>
                                <th class="wd-10p border-bottom-0">#</th>
                                <th class="wd-15p border-bottom-0">{{trans('courses/courses.title')}}</th>
                                <th class="wd-15p border-bottom-0">{{trans('courses/courses.diploma')}}</th>
                                <th class="wd-15p border-bottom-0">{{trans('courses/courses.teachers')}}</th>
                                <th class="wd-20p border-bottom-0">{{trans('courses/courses.desc')}}</th>
                                <th class="wd-10p border-bottom-0">{{trans('general.Actions')}}</th>

                            </tr>
                            </thead>

                            <tbody>
                            @foreach ($courses as $key => $course)
                                <tr id="row-{{$course->id}}">
                                    <td>{{ ++$key }}</td>
                                    <td>{{ $course->title }}</td>
                                    <td>{{ $course->diploma->title }}</td>
                                    <td>

                                        <ul>
                                            @foreach ($course->users as $key => $teacher)
                                                <li>{{$teacher->name}}</li>
                                            @endforeach
                                        </ul>

                                    </td>
                                    <td>
                                        <a href="javascript:;" class="dropdown-item" data-bs-toggle="modal"
                                           data-bs-target="#info-sub" data-desc="{{$course->desc}}"
                                           data-title="{{$course->title}}"
                                        >
                                            {!! substr($course->desc,0,25) !!}...
                                            <span style="color: blue">
                                                {{trans('courses/courses.read_more')}}
                                            </span>
                                        </a>
                                    </td>

                                    <td>
                                        @if(auth('admin') -> user() ->can('finish-activate course'))
                                            <a class="modal-effect btn btn-sm btn-{{$course->is_finished== 0 ? 'danger' : 'success'}}"
                                               data-effect="effect-scale"
                                               data-id="{{ $course->id }}" data-status="{{ $course->is_finished }}"
                                               data-bs-toggle="modal" href="#status-sub"
                                               title="{{$course->is_finished == 0 ? trans('general.Finish') : trans('general.Activate') }}"><i
                                                    class="las la-user-{{$course->is_finished == 0 ? 'slash' : 'check'}}"></i></a>
                                        @endif

                                       @if(auth('admin') -> user() ->can('show course'))

                                        <a class="btn btn-success btn-sm"
                                        href="{{ route('course.show', $course->id) }}"><i
                                                class="las la-eye"></i></a>
                                                  @endif

{{--                                            TODO PERMESSION--}}
                                    <a class="btn btn-success btn-sm"
                                           href="{{ route('course.pending', $course->id) }}" title="{{trans('courses/courses.pending_Course_list')}}"><i class="fas fa-bars"></i></a>

                                        @if(auth('admin') -> user() ->can('update courses'))

                                            <a class="btn btn-primary btn-sm"
                                               href="{{ route('course.edit', $course->id) }}"
                                               title="{{trans('general.Edit')}}"><i
                                                    class="las la-edit"></i></a>
                                        @endif

                                        @if(auth('admin') -> user() ->can('delete courses'))

                                            <a class="modal-effect btn btn-sm btn-danger" data-effect="effect-scale"
                                               data-id="{{ $course->id }}"
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

                        <div class="shown-event-ex">
                            <div
                                class="modal fade text-start"
                                id="info-sub"
                                tabindex="-1"
                                aria-labelledby="myModalLabel22"
                                aria-hidden="true"
                            >
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">

                                            <h4 class="modal-title"
                                                id="myModalLabel22">{{trans('courses/courses.desc_for')}}<span
                                                    id="d-title"></span></h4>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">

                                            {{--                        <span class="la la-exclamation-circle fs-60 text-warning"></span>--}}
                                            <h4 class="modal-title fs-19 font-weight-semi-bold pt-2 pb-1"
                                                id="d-desc"></h4>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-outline-secondary"
                                                    data-bs-dismiss="modal">{{trans('general.Cancel')}}</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="modal" id="status-sub">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content modal-content-demo">
                                    <div class="modal-header">
                                        <h6 class="modal-title" id="myModalLabel223"></h6>
                                        <button aria-label="Close" class="close"
                                                data-bs-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('course.changeFinishStatus') }}" method="post">
                                            @csrf
                                            <div class="modal-body">
                                                <p id="itemDeleteModalTitle3"></p><br>
                                                <input class="form-control" hidden name="course_id" value="" id="course_id" type="text"
                                                       readonly>

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

