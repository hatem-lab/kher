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
            <h4 class="content-title mb-0 my-auto f-z-30"> <a href="{{route('test.index')}}" class="text-dark">{{trans('tests/tests.tests')}}</a></h4>
                <span
                    class="text-muted mt-1 tx-13 ms-2 mb-0"> / <a href="{{route('test.index')}}"> {{trans('tests/tests.list tests')}}</a>
                </span>
            </div>
        </div>

    </div>


    @if (session()->has('edit'))
        <script>
            window.onload = function () {
                notif({
                    msg: " test information has updated successfully",
                    type: "success"
                });
            }

        </script>
    @endif

    @if (session()->has('delete'))
        <script>
            window.onload = function () {
                notif({
                    msg: "test has Deleted Successfully",
                    type: "success"
                });
            }

        </script>
    @endif

    @if (session()->has('success'))
        <script>
            window.onload = function () {
                notif({
                    msg: "test has Added Successfully",
                    type: "success"
                });
            }

        </script>
    @endif




    <div class="row row-sm">
        <div class="col-xl-12">
            <div class="card">

                <div class="card-header pb-0">
                    @if(auth('admin') -> user() ->can('create Test'))

                        <div class="d-flex justify-content-between fz-13">
                            <a class="btn blue-button mb-15 btn-sm"
                               href="{{ route('test.create') }}">{{trans('general.Add')}}</a>
                        </div>
                    @endif

                </div>
                <div class="card-body">
                    <div class="table-responsive userlist-table">
                        <table class="table table-striped table-vcenter text-nowrap mb-0" id="example1">
                            <thead>
                            <tr>
                                <th class="wd-10p border-bottom-0 fz-13">#</th>
                                <th class="wd-15p border-bottom-0 fz-13">{{trans('tests/tests.title')}}</th>
                                <th class="wd-15p border-bottom-0 fz-13">{{trans('tests/tests.course')}}</th>
                                <th class="wd-20p border-bottom-0 fz-13">{{trans('tests/tests.desc')}}</th>
                                <th class="wd-20p border-bottom-0 fz-13">{{trans('tests/tests.duration')}}</th>
                                <th class="wd-20p border-bottom-0 fz-13">{{trans('tests/tests.date')}}</th>
                                <th class="wd-20p border-bottom-0 fz-13">{{trans('tests/tests.status')}}</th>
                                <th class="wd-10p border-bottom-0 fz-13">{{trans('general.Actions')}}</th>

                            </tr>
                            </thead>

                            <tbody>
                            @foreach ($tests as $key => $test)
                                <tr id="row-{{$test->id}}">
                                    <td>{{ ++$key }}</td>
                                    <td>{{ $test->title }}</td>
                                    <td>{{ $test->course->title }}</td>
                                    <td>
                                        <a href="javascript:;" class="dropdown-item" data-bs-toggle="modal"
                                           data-bs-target="#info-sub" data-desc="{{$test->desc}}"
                                           data-title="{{$test->title}}"
                                        >
                                            {!! substr($test->desc,0,25) !!}...
                                            <span style="color: blue">
                                                {{trans('tests/tests.read_more')}}
                                            </span>
                                        </a>
                                    </td>
                                    <td>{{ $test->duration }}</td>
                                    <td>{{ \Illuminate\Support\Carbon::parse($test->date)->format('d-m-Y H:i:s')}}</td>
                                    <td>
                                        <span class="badge badge-{{ $test->status ? 'success' : 'secondary' }}">
                                          {{ $test->status ? trans('tests/tests.done') : trans('tests/tests.not_done') }}
                                        </span>

                                    </td>

                                    <td>

                                        @if(auth('admin') -> user() ->can('update Test'))

                                            <a class="btn btn-primary btn-sm" title="{{trans('general.Edit')}}"
                                               href="{{ route('test.edit', $test->id) }}"><i
                                                    class="las la-edit"></i></a>
                                        @endif
                                        @if(auth('admin') -> user() ->can('delete Test'))

                                            <a class="modal-effect btn btn-sm btn-danger" data-effect="effect-scale"
                                               data-id="{{ $test->id }}"
                                               data-bs-toggle="modal" href="#delete-sub"
                                               title="{{trans('general.Delete')}}"><i
                                                    class="las la-trash"></i></a>
                                        @endif
                                        @if(auth('admin') -> user() ->can('students Test'))

                                            <a class="btn btn-success btn-sm" title="{{trans('tests/tests.students')}}"
                                               href="{{ route('test.students', $test->id) }}">
                                               <i class="fas fa-user-graduate"></i>
                                            </a>
                                        @endif
                                        @if(auth('admin') -> user() ->can('manage Test question'))


                                            <a class="btn btn-warning btn-sm"
                                               title="{{trans('tests/tests.manage_questions')}}"
                                               href="{{ route('test.questions', $test->id) }}"><i
                                                    class="fas fa-tools"></i></a>
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
                                                id="myModalLabel22">{{trans('tests/tests.desc_for')}}<span
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
    <script src="{{asset('assets/js/admin-pages/tests/list.js')}}"></script>

@endsection

