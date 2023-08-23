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
                <h4 class="content-title mb-0 my-auto f-z-30"><a href="{{route('teachers.index')}}" class="text-dark">{{trans('Teachers/Teachers.Teachers')}}</a></h4><span
                    class="text-muted mt-1 tx-13 ms-2 mb-0"> / <a href="{{route('teachers.index')}}">{{trans('Teachers/Teachers.Teachers Menu')}}</a></span>
            </div>
        </div>

    </div>


    @if (session()->has('edit'))
        <script>
            window.onload = function () {
                notif({
                    msg: " User information has updated successfully",
                    type: "success"
                });
            }

        </script>
    @endif

    @if (session()->has('delete'))
        <script>
            window.onload = function () {
                notif({
                    msg: "User has Deleted Successfully",
                    type: "success"
                });
            }

        </script>
    @endif

    @if (session()->has('success'))
        <script>
            window.onload = function () {
                notif({
                    msg: "User has Added Successfully",
                    type: "success"
                });
            }

        </script>
    @endif




    <div class="row row-sm">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header pb-0">
                    @if(auth('admin') -> user() ->can('create teacher'))

                        <div class="d-flex justify-content-between mr">
                            <a class="btn blue-button mb-15 btn-sm"
                               href="{{ route('teacher.create') }}">{{trans('Teachers/Teachers.Add')}}</a>
                        </div>
                    @endif

                    <div class="card-body bg-white">
                        <div class="table-responsive userlist-table">
                            <table class="table table-striped table-vcenter text-nowrap mb-0" id="example1">
                                <thead>
                                <tr>
                                    <th class="wd-10p border-bottom-0">#</th>
                                    <th class="wd-15p border-bottom-0">{{trans('Teachers/Teachers.name')}}</th>
                                    <th class="wd-20p border-bottom-0">{{trans('Teachers/Teachers.email')}}</th>
                                    <th class="wd-15p border-bottom-0">{{trans('Teachers/Teachers.status')}}</th>
                                    <th class="wd-15p border-bottom-0">{{trans('Teachers/Teachers.user role')}}</th>
                                    <th class="wd-10p border-bottom-0">{{trans('Teachers/Teachers.methods')}}</th>

                                </tr>
                                </thead>

                                <tbody>
                                @foreach ($data as $key => $user)
                                    <tr id="row-{{$user->id}}">
                                        <td>{{ ++$i }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>
                                            @if ($user->status == 1)
                                                <span class="label text-success d-flex">
                                                <div class="dot-label bg-success ml-1"></div>{{trans('Teachers/Teachers.Active')}}
                                            </span>
                                            @else
                                                <span class="label text-danger d-flex">
                                                <div class="dot-label bg-danger ml-1"></div>{{trans('Teachers/Teachers.Inactive')}}
                                            </span>
                                            @endif
                                        </td>

                                        <td>
                                            @if (!empty($user->getRoleNames()))
                                                @foreach ($user->getRoleNames() as $v)
                                                    <label class="badge badge-success">{{ $v }}</label>
                                                @endforeach
                                            @endif
                                        </td>

                                        <td>
                                            @if(auth('admin') -> user() ->can('show teacher'))

                                                <a class="btn btn-success btn-sm"
                                                   href="{{ route('teacher.show', $user->id) }}"><i
                                                        class="las la-eye"></i></a>
                                            @endif


                                            @if(auth('admin') -> user() ->can('block-activate teacher'))

                                                <a class="modal-effect btn btn-sm btn-{{$user->status == 1 ? 'blocke' : 'success'}}"
                                                   data-effect="effect-scale"
                                                   data-id="{{ $user->id }}" data-status="{{ $user->status }}"
                                                   data-bs-toggle="modal" href="#status-sub"
                                                   title="{{$user->status == 1 ? trans('general.Block') : trans('general.Activate') }}"><i
                                                        class="las la-user-{{$user->status == 1 ? 'slash' : 'check'}}"></i></a>
                                            @endif

                                            @if(auth('admin') -> user() ->can('update teacher'))

                                                <a class="btn btn-primary btn-sm"
                                                   href="{{ route('teacher.edit', $user->id) }}"><i
                                                        class="las la-edit"></i></a>
                                            @endif

                                            @if(auth('admin') -> user() ->can('delete teacher'))

                                                <a class="modal-effect btn btn-sm btn-danger" data-effect="effect-scale"
                                                   data-id="{{ $user->id }}"
                                                   data-bs-toggle="modal" href="#delete-sub"
                                                   title="{{trans('general.Delete')}}"><i
                                                        class="las la-trash"></i></a>
                                            @endif


                                            {{--                                        <a class="modal-effect btn btn-sm btn-danger" data-effect="effect-scale"--}}
                                            {{--                                           data-teacher_id="{{ $user->id }}" data-username="{{ $user->name }}"--}}
                                            {{--                                           data-bs-toggle="modal" href="#modaldemo1" title="delete"><i--}}
                                            {{--                                                class="las la-trash"></i></a>--}}

                                            {{--                                        <div class="modal" id="modaldemo1">--}}
                                            {{--                                            <div class="modal-dialog" role="document">--}}
                                            {{--                                                <div class="modal-content modal-content-demo">--}}
                                            {{--                                                    <div class="modal-header">--}}
                                            {{--                                                        <h6 class="modal-title">{{trans('Teachers/Teachers.Delete User')}}</h6><button aria-label="Close" class="close"--}}
                                            {{--                                                                                                        data-bs-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>--}}
                                            {{--                                                    </div>--}}
                                            {{--                                                    <div class="modal-body">--}}
                                            {{--                                                        <form action="{{ route('teacher.destroy',$user->id) }}" method="post">--}}
                                            {{--                                                            {{ method_field('post') }}--}}
                                            {{--                                                            @csrf--}}
                                            {{--                                                            <div class="modal-body">--}}
                                            {{--                                                                <p>{{trans('Teachers/Teachers.Do Yoy Want to Delete This User')}} ? </p><br>--}}

                                            {{--                                                                <input class="form-control" hidden name="teacher_id" value="{{$user->name}}" id="teacher_id" type="text" readonly>--}}

                                            {{--                                                            </div>--}}
                                            {{--                                                            <div class="modal-footer">--}}
                                            {{--                                                                <button class="btn ripple btn-danger" type="submit">{{trans('Teachers/Teachers.Delete')}}</button>--}}
                                            {{--                                                                <button class="btn ripple btn-secondary" data-bs-dismiss="modal" type="button">{{trans('Teachers/Teachers.Close')}}</button>--}}
                                            {{--                                                            </div>--}}


                                            {{--                                                        </form>--}}

                                            {{--                                                    </div>--}}

                                            {{--                                                </div>--}}
                                            {{--                                            </div>--}}
                                            {{--                                        </div>--}}


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
                                    data-bs-dismiss="modal" type="button"><span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="modal-body">
                                <p>{{trans('Teachers/Teachers.Do Yoy Want to Delete This User')}} ? </p><br>

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
                                    data-bs-dismiss="modal" type="button"><span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('teacher.changeStatus') }}" method="post">
                                @csrf
                                <div class="modal-body">
                                    <p id="itemDeleteModalTitle"></p><br>
                                    <input class="form-control" hidden name="teacher_id" value="" id="teacher_id"
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
                <script src="{{asset('assets/js/admin-pages/teachers/list.js')}}"></script>

    {{--            <script>--}}
    {{--                $('#modaldemo1').on('show.bs.modal', function(event) {--}}
    {{--                    var button = $(event.relatedTarget)--}}
    {{--                    var student_id = button.data('student_id')--}}
    {{--                    var modal = $(this)--}}
    {{--                    modal.find('.modal-body #student_id').val(student_id);--}}
    {{--                })--}}

    {{--            </script>--}}
@endsection

