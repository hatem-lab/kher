@extends('layouts.app')

@section('styles')

    <!-- Internal Data table css -->

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
                        <h4 class="content-title mb-0 my-auto f-z-30"><a href="{{route('students.index')}}" class="text-dark">{{trans('students/students.Students')}}</a></h4><span
                            class="text-muted mt-1 tx-13 ms-2 mb-0">/ <a href="{{route('student.edit',$student->id)}}">{{trans('students/students.Students info edit')}}</a></span>
                    </div>
                </div>

            </div>


            <div class="card">
            <div class="card-body">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-right">
                        <a class="btn blue-button mb-15 btn-sm" href="{{ route('students.index') }}">{{trans('students/students.Back')}}</a>
                    </div>
                </div><br>

                {!! Form::model($student, ['method' => 'POST','route' => ['student.update', $student->id]]) !!}


                <div class="row mg-b-20">
                        <div class="parsley-input col-md-6" id="fnWrapper">
                            <label class="form-label f-z-18">{{trans('students/students.Arabic name')}}: <span class="tx-danger">*</span></label>
                            <input class="form-control form-control-sm mg-b-20"
                                   data-parsley-class-handler="#lnWrapper" value="{{$student->name_ar}}"  name="username" required="" type="text">
                        </div>
                        <div class="parsley-input col-md-6" id="fnWrapper">
                            <label class="form-label f-z-18">{{trans('students/students.English name')}}: <span class="tx-danger">*</span></label>
                            <input class="form-control form-control-sm mg-b-20"
                                   data-parsley-class-handler="#lnWrapper" value="{{$student->name_en}}"  name="name_en" required="" type="text">
                        </div>
                </div>

                <div class="row row-sm mg-b-20">
                        <div class="parsley-input col-md-6" id="fnWrapper">
                            <label class="form-label f-z-18">{{trans('students/students.user name')}}: <span class="tx-danger">*</span></label>
                            {!! Form::text('username', null, array('class' => 'form-control','required')) !!}
                        </div>

                        <div class="parsley-input col-md-6 mg-t-20 mg-md-t-0" id="lnWrapper">
                            <label class="form-label f-z-18">{{trans('students/students.email')}}: <span class="tx-danger">*</span></label>
                            {!! Form::text('email', null, array('class' => 'form-control','required')) !!}
                        </div>
                </div>
                <div class="row row-sm mg-b-20">
                    <div class="parsley-input col-md-6 mg-t-20 mg-md-t-0" id="lnWrapper">
                        <label class="form-label f-z-18">{{trans('students/students.password')}}: <span class="tx-danger">*</span></label>
                        {!! Form::password('password', array('class' => 'form-control',)) !!}
                    </div>

                    <div class="parsley-input col-md-6 mg-t-20 mg-md-t-0" id="lnWrapper">
                        <label class="form-label f-z-18">{{trans('students/students.confirm password')}}: <span class="tx-danger">*</span></label>
                        {!! Form::password('confirm-password', array('class' => 'form-control',)) !!}
                    </div>
                </div>

                <div class="row row-sm mg-b-20">
                    <div class="col-lg-6  m-b-40">
                        <label class="form-label f-z-18">{{trans('students/students.certificate')}}</label>
                        <select name="certificate_id" id="select-beast" class="form-control  nice-select  custom-select select2">
                            @foreach($certificate as $one)
                                <option value="{{$one->id}}" @if($student->certificate_id==$one->id) selected @endif >{{$one->getTranslatedName()}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-lg-6">
                        <label class="form-label f-z-18">{{trans('students/students.status')}}</label>
                        <select name="status" id="select-beast" class="form-control  nice-select  custom-select select2">
                            <option value="2" @if($student->status==2) selected @endif>{{trans('students/students.Inactive')}}</option>
                            <option value="1" @if($student->status==1) selected @endif>{{trans('students/students.Active')}}</option>
                        </select>
                    </div>
                </div>

                <div class="mg-t-30">
                    <button class="btn blue-button mb-15 pd-x-20" type="submit">{{trans('students/students.update')}}</button>
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

<!-- Internal Nice-select js-->
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
