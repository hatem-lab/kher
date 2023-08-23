@extends('layouts.app')

@section('styles')

    <!-- Internal Morris Css-->
    <link href="{{asset('assets/plugins/morrisjs/morris.css')}}" rel="stylesheet">
    <link href="{{asset('assets/plugins/jqvmap/jqvmap.min.css')}}" rel="stylesheet">

@endsection

@section('content')

    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">Apps</h4><span class="text-muted mt-1 tx-13 ms-2 mb-0">/ Cards</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->

    <!-- row opened-->
    <div class="row">
        @foreach($schedule as $one)
            @if( $one !== null)
        <div class="col-12 col-sm-6 col-lg-6 col-xl-3">
            <div class="card">
                <div class="card-header pb-0">

                    <h5 class="card-title mb-0 pb-0"> {{$one->student->name_ar}}</h5>
                </div>
                <div class="card-body">
                    {{trans('lectures/lectures.Has')}} {{$one->lecture->title}} <br> <strong>{{trans('lectures/lectures.from')}}:</strong> {{$one->lecture->start_date}} <br> <strong>{{trans('lectures/lectures.to')}}:</strong> {{$one->lecture->end_date}}
                </div>
                <div class="card-footer">
                    student
                </div>
            </div>
        </div>
            @endif
        @endforeach
    </div>
    <div class="form-actions">
        <button type="button" class="btn btn-warning mr-1"
                onclick="history.back();">
            <i class="ft-x"></i> {{trans('lectures/lectures.Back')}}
        </button>

    </div>
    <!--row closed-->




@endsection('content')

@section('scripts')

    <!--Internal  Datepicker js -->
    <script src="{{asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js')}}"></script>

    <!-- Internal Select2 js-->
    <script src="{{asset('assets/plugins/select2/js/select2.min.js')}}"></script>

    <!--- Internal Darggable js-->
    <script src="{{asset('assets/plugins/darggable/jquery-ui-darggable.min.js')}}"></script>
    <script src="{{asset('assets/plugins/darggable/darggable.js')}}"></script>

@endsection
