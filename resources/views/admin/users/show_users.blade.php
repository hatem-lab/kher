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
                <h4 class="content-title f-z-30 mb-0 my-auto text-dark"> <a href="{{route('users.index')}}" class="text-dark">{{trans('Users/user.Users')}}</a></h4><span
                    class="text-muted mt-1 tx-13 ms-2 mb-0 ">/ <a href="{{route('users.index')}}">{{trans('Users/user.users menu')}}</a></span>
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
                    @if(auth('admin') -> user() ->can('create user'))
                        <div class="d-flex justify-content-between mr">
                            <a class="btn blue-button btn-sm mb-15"
                               href="{{ route('user.create') }}">{{trans('Users/user.Add User')}}</a>
                        </div>
                    @endif

                </div>
                <div class="card-body">
                    <div class="table-responsive userlist-table">
                        <table class="table table-striped table-vcenter text-nowrap mb-0" id="example1">
                            <thead>
                            <tr>
                                <th class="wd-10p border-bottom-0">#</th>
                                <th class="wd-15p border-bottom-0">{{trans('Users/user.name')}}</th>
                                <th class="wd-20p border-bottom-0">{{trans('Users/user.email')}}</th>
                                <th class="wd-15p border-bottom-0">{{trans('Users/user.status')}}</th>
                                <th class="wd-15p border-bottom-0">{{trans('Users/user.user role')}}</th>
                                <th class="wd-10p border-bottom-0">{{trans('Users/user.methods')}}</th>

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
                                                <div class="dot-label bg-success ml-1"></div>{{trans('Users/user.Active')}}
                                            </span>
                                        @else
                                            <span class="label text-danger d-flex">
                                                <div class="dot-label bg-danger ml-1"></div>{{trans('Users/user.Inactive')}}
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
                                        @if(auth('admin') -> user() ->can('show user'))
                                            <a class="btn btn-success btn-sm"
                                               href="{{ route('user.show', $user->id) }}"
                                               title="{{trans('general.View')}}"><i
                                                    class="las la-eye"></i></a>
                                        @endif

                                        @if(auth('admin') -> user() ->can('block-activate user'))
                                            <a class="modal-effect btn btn-sm btn-{{$user->status == 1 ? 'danger' : 'success'}}"
                                               data-effect="effect-scale"
                                               data-id="{{ $user->id }}" data-status="{{ $user->status }}"
                                               data-bs-toggle="modal" href="#status-sub"
                                               title="{{$user->status == 1 ? trans('general.Block') : trans('general.Activate') }}"><i
                                                    class="las la-user-{{$user->status == 1 ? 'slash' : 'check'}}"></i></a>
                                        @endif



                                        @if(auth('admin') -> user() ->can('update user'))
                                            <a class="btn btn-primary btn-sm"
                                               href="{{ route('user.edit', $user->id) }}"
                                               title="{{trans('general.Edit')}}"><i
                                                    class="las la-edit"></i></a>
                                        @endif
                                        @if(auth('admin') -> user() ->can('delete user'))
                                            {{--                                        <a class="modal-effect btn btn-sm btn-danger" data-effect="effect-scale"--}}
                                            {{--                                           data-user_id="{{ $user->id }}" data-username="{{ $user->name }}"--}}
                                            {{--                                           data-bs-toggle="modal" href="#modaldemo1" title="{{trans('general.Delete')}}"><i--}}
                                            {{--                                                class="las la-trash"></i></a>--}}

                                            <a class="modal-effect btn btn-sm btn-danger" data-effect="effect-scale"
                                               data-id="{{ $user->id }}"
                                               data-bs-toggle="modal" href="#delete-sub"
                                               title="{{trans('general.Delete')}}"><i
                                                    class="las la-trash"></i></a>
                                        @endif
                                        {{--                                        <div class="modal" id="modaldemo1">--}}
                                        {{--                                            <div class="modal-dialog" role="document">--}}
                                        {{--                                                <div class="modal-content modal-content-demo">--}}
                                        {{--                                                    <div class="modal-header">--}}
                                        {{--                                                        <h6 class="modal-title">{{trans('Users/user.Delete User')}}</h6><button aria-label="Close" class="close"--}}
                                        {{--                                                                                                        data-bs-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>--}}
                                        {{--                                                    </div>--}}
                                        {{--                                                    <div class="modal-body">--}}
                                        {{--                                                        <form action="{{ route('user.destroy',$user->id) }}" method="post">--}}
                                        {{--                                                            {{ method_field('post') }}--}}
                                        {{--                                                            @csrf--}}
                                        {{--                                                            <div class="modal-body">--}}
                                        {{--                                                                <p>{{trans('Users/user.Do Yoy Want to Delete This User')}} ؟ </p><br>--}}

                                        {{--                                                                <input class="form-control" hidden name="user_id" value="{{$user->name}}" id="user_id" type="text" readonly>--}}

                                        {{--                                                            </div>--}}
                                        {{--                                                            <div class="modal-footer">--}}
                                        {{--                                                                <button class="btn ripple btn-danger" type="submit">{{trans('Users/user.Delete')}}</button>--}}
                                        {{--                                                                <button class="btn ripple btn-secondary" data-bs-dismiss="modal" type="button">{{trans('Users/user.Close')}}</button>--}}
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
                                data-bs-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <div class="modal-body">
                            <p>{{trans('Users/user.Do Yoy Want to Delete This User')}} ؟ </p><br>

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
                        <form action="{{ route('user.changeStatus') }}" method="post">
                            @csrf
                            <div class="modal-body">
                                <p id="itemDeleteModalTitle"></p><br>
                                <input class="form-control" hidden name="user_id" value="" id="user_id" type="text"
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
            <script src="{{asset('assets/js/admin-pages/users/list.js')}}"></script>



    {{--            <script>--}}
    {{--                $('#modaldemo1').on('show.bs.modal', function(event) {--}}
    {{--                    var button = $(event.relatedTarget)--}}
    {{--                    var user_id = button.data('user_id')--}}
    {{--                    var modal = $(this)--}}
    {{--                    modal.find('.modal-body #user_id').val(user_id);--}}
    {{--                })--}}

    {{--            </script>--}}
@endsection

