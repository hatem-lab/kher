@extends('layouts.app')

@section('styles')

    <!---Internal  Owl Carousel css-->
    <link href="{{asset('assets/plugins/owl-carousel/owl.carousel.css')}}" rel="stylesheet">

    <!--- Internal Timeline css-->
    <link href="{{asset('assets/plugins/timeline/css/timeline.min.css')}}" rel="stylesheet">

@endsection

@section('content')

    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{trans('timeline/timeline.Timeline')}}</h4><span
                    class="text-muted mt-1 tx-13 ms-2 mb-0">/ {{trans('timeline/timeline.Teacher Timeline')}}</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->

    <!-- Row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card custom-card">
                <div class="card-header custom-card-header">
                    <h6 class="card-title mb-0">{{trans('timeline/timeline.Vertical Timeline')}}</h6>
                </div>
                @if (!empty('message'))
                    <div class="card-header custom-card-header">
                        <h6 class="card-title mb-0">{{trans('timeline/timeline.you have no courses')}}</h6>
                    </div>
                @endif
                <div class="card-body">
                    @if (count($courses) > 0)
                        <div class="vtimeline">
                            @foreach ($courses as $key => $course)
                                @if($key % 2 == 0)
                                    <div class="timeline-wrapper timeline-wrapper-primary">
                                        <div class="timeline-badge success"><img class="timeline-image" alt="img"
                                                                                 src="{{asset('assets/img/faces/3.jpg')}}">
                                        </div>
                                        <div class="timeline-panel">
                                            <div class="timeline-heading">
                                                <h6 class="timeline-title">{{ $course->title }}</h6>
                                            </div>
                                            <div class="timeline-body">
                                                <p>{!! $course->desc !!}</p>
                                                <a class="btn ripple btn-primary text-white mb-3"
                                                   href="{{ route('calendar.index', ['id'=>$course->id]) }}">{{trans('timeline/timeline.calendar')}}</a>
                                            </div>
                                            <div class="timeline-footer d-flex align-items-center flex-wrap">
                                                <i class="si si-notebook  text-muted me-1"></i>
                                                <span>{{count($course->lectures)}}</span>

                                            </div>
                                        </div>
                                    </div>

                                @else
                                    <div class="timeline-wrapper timeline-inverted timeline-wrapper-danger">
                                        <div class="timeline-badge success"><img class="timeline-image" alt="img"
                                                                                 src="{{asset('assets/img/faces/12.jpg')}}">
                                        </div>
                                        <div class="timeline-panel">
                                            <div class="timeline-heading">
                                                <h6 class="timeline-title">{{ $course->title }}</h6>
                                            </div>
                                            <div class="timeline-body">
                                                <p>{!! $course->desc !!}</p>
                                                <a class="btn ripple btn-primary text-white mb-3"
                                                   href="{{ route('calendar.index', ['id'=>$course->id]) }}">{{trans('timeline/timeline.calendar')}}</a>
                                            </div>
                                            <div class="timeline-footer d-flex align-items-center flex-wrap">
                                                <i class="si si-notebook  text-muted me-1"></i>
                                                <span>{{count($course->lectures)}}</span>

                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach

                        </div>
                </div>
                @endif
            </div>
        </div>
    </div>
    <!-- End Row -->

@endsection('content')

@section('scripts')

    <!--Internal  Datepicker js -->
    <script src="{{asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js')}}"></script>

    <!-- Internal Select2 js-->
    <script src="{{asset('assets/plugins/select2/js/select2.min.js')}}"></script>

@endsection
