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
    <!-- row -->
    <div class="row">
        <div class="col-lg-12 col-md-12">

            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <button aria-label="Close" class="close" data-dismiss="alert" type="button">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <strong>error</strong>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="breadcrumb-header justify-content-between">
                <div class="my-auto">
                    <div class="d-flex">

                        <a href="{{route('teachers.index')}}"><h6 class="content-title mb-0 my-auto f-z-30">{{trans('Teachers/Teachers.Teachers')}}/</h6></a>
                        <a><span
                                class="text-muted mt-1 tx-13 ms-2 mb-0">{{$user->name}}{{" "}}/</span></a>
                        <a><span
                                class="text-muted mt-1 tx-13 ms-2 mb-0">{{trans('Users/user.Edit')}}</span></a>

                    </div>
                </div>

            </div>


            <div class="card">
                <div class="card-body">
                    <div class="col-lg-12 margin-tb">
                        <div class="pull-right">
                            <a class="btn  blue-button mb-15 btn-sm" href="{{ route('teachers.index') }}">{{trans('Teachers/Teachers.Back')}}</a>
                        </div>
                    </div><br>

                    {!! Form::model($user, ['method' => 'POST','route' => ['teacher.update', $user->id]]) !!}
                    <div class="">

                        <div class="row mg-b-20">
                            <div class="parsley-input col-md-6" id="fnWrapper">
                                <label>{{trans('Teachers/Teachers.user name')}}: </label>
                                {!! Form::text('name', null, array('class' => 'form-control','required')) !!}
                            </div>

                            <div class="parsley-input col-md-6 mg-t-20 mg-md-t-0" id="lnWrapper">
                                <label>{{trans('Teachers/Teachers.email')}}: </label>
                                {!! Form::text('email', null, array('class' => 'form-control','required')) !!}
                            </div>
                        </div>

                    </div>

                    <div class="row mg-b-20">
                        <div class="parsley-input col-md-6 mg-t-20 mg-md-t-0" id="lnWrapper">
                            <label>{{trans('Teachers/Teachers.password')}}: </label>
                            {!! Form::password('password', array('class' => 'form-control',)) !!}
                        </div>

                        <div class="parsley-input col-md-6 mg-t-20 mg-md-t-0" id="lnWrapper">
                            <label>{{trans('Teachers/Teachers.confirm password')}}: </label>
                            {!! Form::password('confirm-password', array('class' => 'form-control',)) !!}
                        </div>
                    </div>

                    <div class="row row-sm mg-b-20">
                        <div class="col-lg-6 col-md-12">
                            <label class="form-label">{{trans('Teachers/Teachers.status')}}</label>
                            <select name="status" id="select-beast" class="form-control  nice-select  custom-select select2">
                                <option value="0" @if($user->status==0) selected @endif>{{trans('Teachers/Teachers.Inactive')}}</option>
                                <option value="1" @if($user->status==1) selected @endif>{{trans('Teachers/Teachers.Active')}}</option>
                            </select>
                        </div>

                        <div class="col-lg-6 col-md-12">
                            <div class="form-group">
                                <label class="form-label ">{{trans('Teachers/Teachers.user role')}}<span
                                        class="tx-danger">*</span></label>

                                {!! Form::select('roles[]', $roles,$userRole, array('class' => 'form-control select2','multiple'))
                                !!}
                            </div>
                        </div>
                    </div>
                    <div class="mg-t-30">
                        <button class="btn  blue-button mb-15 pd-x-20" type="submit">{{trans('Teachers/Teachers.update')}}</button>
                    </div>
                    {!! Form::close() !!}
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
@endsection
@section('scripts')

    {{--<!-- Internal Nice-select js-->--}}
    {{--<script src="{{URL::asset('assets/plugins/jquery-nice-select/js/jquery.nice-select.js')}}"></script>--}}
    {{--<script src="{{URL::asset('assets/plugins/jquery-nice-select/js/nice-select.js')}}"></script>--}}
    <script src="{{asset('assets/plugins/select2/js/select2.min.js')}}"></script>

    <script src="{{asset('assets/js/form-elements.js')}}"></script>

    <script>
        $('.select2').select2();
    </script>{{URL::asset('assets/plugins/parsleyjs/parsley.min.js')}}"></script>
    <!-- Internal Form-validation js -->
    <script src="{{URL::asset('assets/js/form-validation.js')}}"></script>
@endsection
