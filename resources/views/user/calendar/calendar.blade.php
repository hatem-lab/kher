@extends('user.layouts.master-page')

@section('title','التقويم')

@section('style')

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css"/>



@endsection


@section('content')

    <!-- Breadcrumb  start -->
    <section class="breadcrumb-wrap  br-bg-calender h-img-700">
        <div class="overlay op-6 bg-black"></div>
        <div class="container">
            <div class="row">
                <div class="col-xl-8 offset-xl-2 col-lg-10 offset-lg-1 col-md-10 offset-md-1">
                    <div class="breadcrumb-title">
                        <h2>{{trans('enduser/Header/Header.calendar')}}</h2>
                        <ul class="breadcrumb-menu">
                            <li><a href="{{route('site.home')}}">{{trans('tests/tests.Home')}} </a></li>
                            <li>{{trans('enduser/Header/Header.calendar')}}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb  end -->
    <!-- Event Section start -->
    <section class="event-wrap pt-100 pb-100">
        <div class="container">
            {{--            <div class="row align-items-end">--}}
            {{--                <div class="col-lg-12">--}}
            {{--                    <div class="section-title style1 text-center mb-40">--}}
            {{--                        <span>Home</span>--}}
            {{--                        <h2>Tests</h2>--}}
            {{--                    </div>--}}
            {{--                </div>--}}
            {{--            </div>--}}
            <div class="row justify-content-md-center">
                <div id="calendar">
                </div>
            </div>

        </div>
    </section>
    <!-- Events Section end -->
@endsection

@section('script')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
            integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13"
            crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script>
        $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var booking = @json($events);
            $('#calendar').fullCalendar({
                header: {
                    left: 'prev, next today',
                    center: 'title',
                    right: 'month, agendaWeek, agendaDay',
                },
                events: booking,
                selectable: true,
                selectHelper: true,
                editable: false,
                eventClick: function (event) {
                    var id = event.id;
                    var title = event.title;
                    if (title.includes("lecture")) {
                        window.location.href = "{{route('lecturedetails', '') }}" + '/' + id;
                    }
                    if (title.includes("HomeWork")) {
                        window.location.href = "{{route('student.homework', '') }}" + '/' + id;
                    }
                    if (title.includes("Test")) {
                        window.location.href = "{{route('student.test', '') }}" + '/' + id;
                    }
                },
                selectAllow: function (event) {
                    return moment(event.start).utcOffset(false).isSame(moment(event.end).subtract(1, 'second').utcOffset(false), 'day');
                },
            });
            $("#bookingModal").on("hidden.bs.modal", function () {
                $('#saveBtn').unbind();
            });
            $('.fc-event').css('font-size', '15px');
            $('.fc-event').css('width', '97%');
            //  $('.fc-event').css('border-radius', '50%');
        });
    </script>
@endsection


