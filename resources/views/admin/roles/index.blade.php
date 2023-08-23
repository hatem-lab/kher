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
                <h4 class="content-title mb-0 my-auto f-z-30"> <a href="{{route('roles.index')}}" class="text-dark">{{trans('role/role.Roles')}}</a></h4><span
                    class="text-muted mt-1 tx-13 ms-2 mb-0"> / <a href="{{route('roles.index')}}">{{trans('role/role.Roles Menu')}}</a></span>
            </div>
        </div>

    </div>


    @if (session()->has('edit'))
        <script>
            window.onload = function () {
                notif({
                    msg: " Role has Updated Successfully",
                    type: "success"
                });
            }

        </script>
    @endif

    @if (session()->has('delete'))
        <script>
            window.onload = function () {
                notif({
                    msg: "Role has Deleted Successfully",
                    type: "success"
                });
            }

        </script>
    @endif

    @if (session()->has('success'))
        <script>
            window.onload = function () {
                notif({
                    msg: "Role has Added Successfully",
                    type: "success"
                });
            }

        </script>
    @endif




    <div class="row row-sm">
        <div class="col-xl-12">
            <div class="card">

                <div class="card-header pb-0">
                    @if(auth('admin') -> user() ->can('create role'))

                        <div class="d-flex justify-content-between ">
                            <a class="btn blue-button mb-15 btn-sm mr-10"
                               href="{{ route('role.create') }}">{{trans('role/role.Add Role')}}</a>
                        </div>
                    @endif

                </div>
                <div class="card-body">
                    <div class="table-responsive userlist-table">
                        <table class="table table-striped table-vcenter text-nowrap mb-0" id="example1">
                            <thead>
                            <tr>
                                <th class="width-th">#</th>
                                <th class="width-th">{{trans('role/role.name')}}</th>
                                <th class="width-th">{{trans('role/role.methods')}}</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($roles as $key => $role)
                                <tr id="row-{{$role->id}}">
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $role->name }}</td>
                                    <td>
                                        @if(auth('admin') -> user() ->can('show role'))

                                            <a class="btn btn-success btn-sm"
                                               href="{{ route('role.show', $role->id) }}"
                                               title="{{trans('general.View')}}"><i
                                                    class="las la-eye"></i></a>
                                        @endif
                                        @if(auth('admin') -> user() ->can('update role'))

                                            <a class="btn btn-primary btn-sm"
                                               href="{{ route('role.edit', $role->id) }}"
                                               title="{{trans('general.Edit')}}"><i
                                                    class="las la-edit"></i></a>
                                        @endif

                                        {{--                                    <a class="modal-effect btn btn-sm btn-danger" data-effect="effect-scale"--}}
                                        {{--                                       data-role_id="{{ $role->id }}" data-rolename="{{ $role->name }}"--}}
                                        {{--                                       data-bs-toggle="modal" href="#modaldemo1" title="{{trans('general.Delete')}}"><i--}}
                                        {{--                                            class="las la-trash"></i></a>--}}
                                        @if(auth('admin') -> user() ->can('delete role'))

                                            <a class="modal-effect btn btn-sm btn-danger" data-effect="effect-scale"
                                               data-id="{{ $role->id }}"
                                               data-bs-toggle="modal" href="#delete-sub"
                                               title="{{trans('general.Delete')}}"><i
                                                    class="las la-trash"></i></a>
                                        @endif


                                        {{--                                    <div class="modal" id="modaldemo1">--}}
                                        {{--                                        <div class="modal-dialog" role="document">--}}
                                        {{--                                            <div class="modal-content modal-content-demo">--}}
                                        {{--                                                <div class="modal-header">--}}
                                        {{--                                                    <h6 class="modal-title">{{trans('role/role.Delete Role')}}</h6><button aria-label="Close" class="close"--}}
                                        {{--                                                                                                    data-bs-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>--}}
                                        {{--                                                </div>--}}
                                        {{--                                                <div class="modal-body">--}}
                                        {{--                                                    <form action="{{ route('role.destroy',$role->id) }}" method="post">--}}
                                        {{--                                                        {{ method_field('post') }}--}}
                                        {{--                                                        @csrf--}}
                                        {{--                                                        <div class="modal-body">--}}
                                        {{--                                                            <p>?{{trans('role/role.Do Yoy Want to Delete This Role')}}  </p><br>--}}

                                        {{--                                                            <input class="form-control" hidden name="role_id" value="{{$role->name}}" id="role_id" type="text" readonly>--}}

                                        {{--                                                        </div>--}}
                                        {{--                                                        <div class="modal-footer">--}}
                                        {{--                                                            <button class="btn ripple btn-primary" type="submit">{{trans('role/role.Delete')}}</button>--}}
                                        {{--                                                            <button class="btn ripple btn-secondary" data-bs-dismiss="modal" type="button">{{trans('role/role.Close')}}</button>--}}
                                        {{--                                                        </div>--}}


                                        {{--                                                    </form>--}}

                                        {{--                                                </div>--}}

                                        {{--                                            </div>--}}
                                        {{--                                        </div>--}}
                                        {{--                                    </div>--}}


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
                                            <p>{{trans('role/role.Do Yoy Want to Delete This Role')}} ? </p><br>

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
            <script src="{{asset('assets/js/admin-pages/roles/list.js')}}"></script>

    {{--        <script>--}}
    {{--            $('#modaldemo1').on('show.bs.modal', function(event) {--}}
    {{--                var button = $(event.relatedTarget)--}}
    {{--                var role_id = button.data('role_id')--}}
    {{--                var modal = $(this)--}}
    {{--                modal.find('.modal-body #role_id').val(role_id);--}}
    {{--            })--}}

    {{--        </script>--}}
@endsection
