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
    <!-- row -->
    <div class="row">
        <div class="col-lg-12 col-md-12">

            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <button aria-label="Close" class="close" data-dismiss="alert" type="button">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <strong>خطا</strong>
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
                        <a href="{{route('users.index')}}"><h4 class="content-title mb-0 my-auto">{{trans('Users/user.Users')}}/</h4></a>
                      <a><span
                              class="text-muted mt-1 tx-13 ms-2 mb-0">{{$user->name}}{{" "}}/</span></a>
                        <a><span
                                class="text-muted mt-1 tx-13 ms-2 mb-0">{{trans('Users/user.Edit')}}</span></a>

                    </div>
                </div>

            </div>


            <div class="card">
            <div class="card-body">
                <div class="col-lg-12 margin-tb pr">
                    <div class="pull-right">
                        <a class="btn blue-button mb-15 btn-sm" href="{{ route('users.index') }}">{{trans('Users/user.Back')}}</a>
                    </div>
                </div><br>

                    {!! Form::model($user, ['method' => 'POST','route' => ['user.update', $user->id]]) !!}
                    <div class="">

                    <div class="row mg-b-20">
                        <div class="parsley-input col-md-6" id="fnWrapper">
                            <label class="f-z-18">{{trans('Users/user.user name')}}: </label>
                            <input class="form-control" name="name"  value="{{$user->name}} " type="text">

                            </div>

                        <div class="parsley-input col-md-6 mg-t-20 mg-md-t-0" id="lnWrapper">
                            <label class="f-z-18">{{trans('Users/user.email')}}: </label>
                            <input class="form-control" name="email"  value="{{$user->email}} " type="text">

                            </div>
                        </div>

                    </div>

                <div class="row mg-b-20">
                    <div class="parsley-input col-md-6 mg-t-20 mg-md-t-0" id="lnWrapper">
                        <label class="f-z-18">{{trans('Users/user.password')}}: </label>
                        <input class="form-control" name="password"  value="" type="password">

                    </div>

                    <div class="parsley-input col-md-6 mg-t-20 mg-md-t-0" id="lnWrapper">
                        <label class="f-z-18">{{trans('Users/user.confirm password')}}: </label>
                        <input class="form-control" name="confirm-password"  value="" type="password">

                    </div>
                </div>

                <div class="row row-sm mg-b-20">
                    <div class="col-lg-6 col-md-12 m-b-40">
                        <label class="form-label f-z-18">{{trans('Users/user.status')}}</label>
                        <select name="status" id="select-beast" class="form-control  nice-select  custom-select select2">
                            <option value="0" @if($user->status==0) selected @endif>{{trans('Users/user.Inactive')}}</option>
                            <option value="1" @if($user->status==1) selected @endif>{{trans('Users/user.Active')}}</option>
                        </select>
                    </div>
                </div>

{{--                <div class="row mg-b-20">--}}
                    <div class="col-xs-12 col-md-12 col-lg-6 ">
                        <div class="form-group">
                            <strong class=" form-label f-z-18">{{trans('Users/user.user role')}}</strong>
{{--                            {!! Form::select('roles[]', $roles,$userRole, array('class' => 'form-control','multiple'))--}}
{{--                            !!}--}}
                            <select name="roles[]"  multiple class="form-control select2">
                                @foreach($roles as $one)
                                    <option value="{{$one}}" {{in_array($one, $userRole) ? 'selected':''}}>
                                    {{$one}}
                                </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row row-sm mg-b-20">
                    <div class="col-lg-6 col-md-12">

                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" name="is_teacher" {{ $user->role == 2 ? 'checked' : '' }}>
                            <label class="form-check-label f-z-18" for="flexSwitchCheckChecked">{{trans('Users/user.teacher')}} </label>
                        </div>
                    </div>

                </div>


                <div class="mg-t-30">
                    <button class="btn blue-button mb-15 pd-x-20" type="submit">{{trans('Users/user.update')}}</button>
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
    </script>
    <!--Internal  Parsley.min js -->
    <script src="{{URL::asset('assets/plugins/parsleyjs/parsley.min.js')}}"></script>
    <!-- Internal Form-validation js -->
    <script src="{{URL::asset('assets/js/form-validation.js')}}"></script>
@endsection
