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
                        <h4 class="content-title mb-0 my-auto f-z-30"><a href="{{route('students.index')}}" class="text-dark">{{trans('students/students.Students')}}</a></h4><span
                            class="text-muted mt-1 tx-13 ms-2 mb-0"> / <a href="{{route('student.create')}}"> {{trans('students/students.Create Students')}} </a></span>
                    </div>
                </div>

            </div>

        <div class="card">
            <div class="card-body">
                <div class="col-lg-12 margin-tb pr-0">
                    <div class="pull-right">
                        <a class="btn blue-button mb-15 btn-sm" href="{{ route('students.index') }}">{{trans('students/students.Back')}}</a>
                    </div>
                </div><br>
                <form class="parsley-style-1" id="selectForm2" autocomplete="off" name="selectForm2"
                    action="{{route('student.store','test')}}" method="post">
                    {{csrf_field()}}

                    <div class="">

                        <div class="row mg-b-20">
                            <div class="parsley-input col-md-6" id="fnWrapper">
                                <label class="f-z-18">{{trans('students/students.user name')}}: <span class="tx-danger">*</span></label>
                                <input class="form-control form-control-sm mg-b-20"
                                    data-parsley-class-handler="#lnWrapper"  name="username" required="" type="text">
                            </div>
                            <div class="parsley-input col-md-6" id="fnWrapper">
                                <label class="f-z-18">{{trans('students/students.English name')}}: <span class="tx-danger">*</span></label>
                                <input class="form-control form-control-sm mg-b-20"
                                       data-parsley-class-handler="#lnWrapper"  name="name_en" required="" type="text">
                            </div>

                            <div class="parsley-input col-md-6" id="fnWrapper">
                                <label class="f-z-18">{{trans('students/students.Arabic name')}}: <span class="tx-danger">*</span></label>
                                <input class="form-control form-control-sm mg-b-20"
                                       data-parsley-class-handler="#lnWrapper"  name="name_ar" required="" type="text">
                            </div>

                            <div class="parsley-input col-md-6 mg-t-20 mg-md-t-0" id="lnWrapper">
                                <label class="f-z-18">{{trans('students/students.email')}}: <span class="tx-danger">*</span></label>
                                <input class="form-control form-control-sm mg-b-20"
                                    data-parsley-class-handler="#lnWrapper" name="email" required="" type="email">
                            </div>
                        </div>

                    </div>

                    <div class="row mg-b-20">
                        <div class="parsley-input col-md-6 mg-t-20 mg-md-t-0" id="lnWrapper">
                            <label class="f-z-18">{{trans('students/students.password')}}: <span class="tx-danger">*</span></label>
                            <input class="form-control form-control-sm mg-b-20" data-parsley-class-handler="#lnWrapper"
                                name="password" required="" type="password">
                        </div>

                        <div class="parsley-input col-md-6 mg-t-20 mg-md-t-0" id="lnWrapper">
                            <label class="f-z-18">{{trans('students/students.confirm password')}}: <span class="tx-danger">*</span></label>
                            <input class="form-control form-control-sm mg-b-20" data-parsley-class-handler="#lnWrapper"
                                name="confirm-password" required="" type="password">
                        </div>
                    </div>

                    <div class="row row-sm mg-b-20">
                        <div class="col-lg-6 m-b-40">
                            <label class="form-label f-z-18">{{trans('students/students.certificate')}}</label>
                            <select name="certificate_id" id="select-beast" class="form-control  nice-select  custom-select select2">
                                @foreach($certificate as $one)
                                <option value="{{$one->id}}">{{$one->getTranslatedName()}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-lg-6">
                            <label class="form-label f-z-18">{{trans('students/students.status')}}</label>
                            <select name="status" id="select-beast" class="form-control  nice-select  custom-select select2">
                                <option value="1">{{trans('students/students.Active')}}</option>
                                <option value="2">{{trans('students/students.Inactive')}}</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                        <button class="btn blue-button mb-15 pd-x-20 btn-right" type="submit">{{trans('students/students.Add')}}</button>
                    </div>
                </form>
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

    <!-- Internal Data tables -->
    <script src="{{asset('assets/plugins/select2/js/select2.min.js')}}"></script>
    <script src="{{asset('assets/js/form-elements.js')}}"></script>
    <script>
        $('.select2').select2();
    </script>
    <script src="{{ URL::asset('assets/plugins/notify/js/notifIt.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/notify/js/notifit-custom.js') }}"></script>



@endsection
