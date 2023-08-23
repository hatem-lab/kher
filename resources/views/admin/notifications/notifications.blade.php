@extends('layouts.app')

@section('styles')
    <!-- Interenal Accordion Css -->
    <link href="{{asset('assets/plugins/fontawesome-free/css/all.min.css')}}" rel="stylesheet">

@endsection

@section('content')

    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto"> {{trans('Blog/Blog.Home')}}</h4><span
                    class="text-muted mt-1 tx-13 ms-2 mb-0">/ {{trans('general.Notifications')}}</span>
            </div>
        </div>

    </div>

    <!-- row opened-->
    <div class="row">
        <div class="col-md-12">
            @foreach($nots as $not)
            <!-- div -->
            <div class="card mg-b-20">
                <div class="card-body">
                    <div class="main-content-label mg-b-5">
                        <a href="{{$not['link']}}" target="_blank">{{$not['title']}}</a>
                    </div>
                    <p class="mg-b-20">{{$not['message']}}</p>
                    <div class="example border-0 p-0">
                        {{$not['notDate']}}
{{--                        <div class="btn-list">--}}
{{--                            <button onclick="not1()" class="btn btn-light mg-t-5">Top</button>--}}
{{--                            <button onclick="not2()" class="btn btn-light mg-t-5">Center</button>--}}
{{--                            <button onclick="not3()" class="btn btn-light mg-t-5">Left</button>--}}
{{--                            <button onclick="not4()" class="btn btn-light mg-t-5">Top Fullwidth</button>--}}
{{--                            <button onclick="not5()" class="btn btn-light mg-t-5">Right</button>--}}
{{--                            <button onclick="not51()" class="btn btn-light mg-t-5">Bottom</button>--}}
{{--                        </div>--}}
                    </div>
                </div>
            </div>
            <!-- div -->

            @endforeach


        </div>
    </div>
    <!--row closed-->



@endsection('content')

@section('scripts')

    <script src="{{asset('assets/plugins/treeview/treeview.js')}}"></script>




@endsection
