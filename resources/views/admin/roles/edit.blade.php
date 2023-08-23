


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
    <link href="{{URL::asset('assets/plugins/treeview/treeview-rtl.css')}}" rel="stylesheet" type="text/css" />

@endsection

@section('content')

    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <a href="{{route('roles.index')}}"><h4 class="content-title mb-0 my-auto">{{trans('role/role.Roles')}}/</h4></a>
                <a><span
                        class="text-muted mt-1 tx-13 ms-2 mb-0">{{$role->name}}{{" "}}/</span></a>
                <a><span
                        class="text-muted mt-1 tx-13 ms-2 mb-0">{{trans('role/role.Edit Role')}}</span></a>


            </div>
        </div>

    </div>
    {!! Form::model($role, ['method' => 'POST','route' => ['role.update', $role->id]]) !!}
    <!-- row -->
    <div class="row">
    <div class="col-md-12">
        <div class="card mg-b-20">
            <div class="card-body">
                <div class="main-content-label mg-b-5">
                    <div class="form-group">
                        <p> {{trans('role/role.name Role')}} :</p>
                        {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
                    </div>
                </div>
                <div class="row">
                    <!-- col -->
                    <div class="col-lg-4">
                        <ul id="treeview1">
                            <li><a href="#">{{trans('role/role.Permissions')}}</a>
                                <ul>
                                    <li>
                                        @foreach($permission as $value)
                                            <label>{{ Form::checkbox('permission[]', $value->id, in_array($value->id, $rolePermissions) ? true : false, array('class' => 'name')) }}
                                                {{ trans('permissions/permissions.'.$value->name) }}</label>
                                            <br />
                                        @endforeach
                                    </li>

                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                        <button type="submit" class="btn blue-button">{{trans('role/role.update')}}</button>
                    </div>
                    <!-- /col -->
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- row closed -->
    </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->
    {!! Form::close() !!}




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
            <script src="{{URL::asset('assets/plugins/treeview/treeview.js')}}"></script>
            <!--Internal  Datatable js -->
            <script src="{{asset('assets/js/table-data.js')}}"></script>

@endsection
