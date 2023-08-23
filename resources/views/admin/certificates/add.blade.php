@extends('layouts.app')

@section('styles')

    <!--- Internal Select2 css-->
    <link href="{{asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">

@endsection

@section('content')

    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
            <h4 class="content-title mb-0 my-auto f-z-30"><a href="{{route('certificate.index')}}" class="text-dark">{{trans('certificates/certificates.certificates')}}</a></h4>

                <span
                    class="text-muted mt-1 tx-13 ms-2 mb-0 "> / <a href="{{route('certificate.create')}}">{{trans('certificates/certificates.add_certificate')}}</a></span>
            </div>
        </div>

    </div>    <!-- breadcrumb -->

    <!-- row -->
    <div class="row">

        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-body">
{{--                    <div class="main-content-label mg-b-5">--}}
{{--                        Required Input Validation--}}
{{--                    </div>--}}
{{--                    <p class="mg-b-20">It is Very Easy to Customize and it uses in your website apllication.</p>--}}
                    <form action="{{route('certificate.store')}}" method="POST" data-parsley-validate="">
                        @csrf
                        <div class="row row-sm">
                            <div class="col-lg-6 col-sm-12 mb-10">
                                <div class="form-group mg-b-0">
                                    <label class="form-label f-z-18">{{trans('certificates/certificates.name_en')}}: <span class="tx-danger">*</span></label>
                                    <input class="form-control" name="name_en" placeholder="{{trans('certificates/certificates.plc_name_en')}}" required="" type="text">
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-12 ">
                                <div class="form-group">
                                    <label class="form-label f-z-18">{{trans('certificates/certificates.name_ar')}}: <span class="tx-danger">*</span></label>
                                    <input class="form-control" name="name_ar" placeholder="{{trans('certificates/certificates.plc_name_ar')}}" required="" type="text">
                                </div>
                            </div>
                            <div class="col-12"><button class="btn blue-button mb-15 pd-x-20 mg-t-10" type="submit">{{trans('general.Add')}}</button></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /row -->

@endsection('content')

@section('scripts')

    <!--Internal  Select2 js -->
    <script src="{{asset('assets/plugins/select2/js/select2.min.js')}}"></script>

    <!--Internal  Parsley.min js -->
    <script src="{{asset('assets/plugins/parsleyjs/parsley.min.js')}}"></script>

    <!--Internal  Perfect-scrollbar js -->
    <script src="{{asset('assets/plugins/perfect-scrollbar/perfect-scrollbar.min-rtl.js')}}"></script>

    <!-- Internal Form-validation js -->
    <script src="{{asset('assets/js/form-validation.js')}}"></script>

@endsection
