@extends('layouts.app')

@section('styles')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />


@endsection

@section('content')

<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">{{trans('timeline/timeline.Timeline')}}</h4><span
                                class="text-muted mt-1 tx-13 ms-2 mb-0">/ {{trans('timeline/timeline.Teacher Timeline')}}</span>
                            <span
                                class="text-muted mt-1 tx-13 ms-2 mb-0">/ {{trans('timeline/timeline.calendar')}}</span>
						</div>
					</div>
{{--					<div class="d-flex my-xl-auto right-content">--}}
{{--						<div class="mb-xl-0" id="p-r-c-1">--}}
{{--							<button type="button" class="btn btn-info btn-icon btn-b" id="m-l-c-05"><i--}}
{{--									class="mdi mdi-filter-variant"></i></button>--}}
{{--						</div>--}}
{{--						<div class="mb-xl-0" id="p-r-c-1">--}}
{{--							<button type="button" class="btn btn-danger btn-icon" id="m-l-c-05"><i--}}
{{--									class="mdi mdi-star"></i></button>--}}
{{--						</div>--}}
{{--						<div class="mb-xl-0" id="p-r-c-1">--}}
{{--							<button type="button" class="btn btn-warning ms-1 btn-icon"><i--}}
{{--									class="mdi mdi-refresh"></i></button>--}}
{{--						</div>--}}
{{--						<div class="mb-xl-0">--}}
{{--							<div class="btn-group dropdown">--}}
{{--								<button type="button" class="btn btn-primary">14 Aug 2019</button>--}}
{{--								<button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split"--}}
{{--									id="dropdownMenuDate" data-bs-toggle="dropdown" aria-haspopup="true"--}}
{{--									aria-expanded="false">--}}
{{--									<span class="sr-only">Toggle Dropdown</span>--}}
{{--								</button>--}}
{{--								<div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuDate"--}}
{{--									x-placement="bottom-end">--}}
{{--									<a class="dropdown-item" href="#">2015</a>--}}
{{--									<a class="dropdown-item" href="#">2016</a>--}}
{{--									<a class="dropdown-item" href="#">2017</a>--}}
{{--									<a class="dropdown-item" href="#">2018</a>--}}
{{--								</div>--}}
{{--							</div>--}}
{{--						</div>--}}
{{--					</div>--}}
				</div>
				<!-- breadcrumb -->

				<!-- ROW OPEN -->
				<div class="row">
					<div class="col-md-12">
						<div class="card">
							<div class="card-header">
								<h3 class="card-title">{{trans('timeline/timeline.all events')}}</h3>
							</div>
  <!-- Modal -->
  <div class="modal fade" id="bookingModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Booking title</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <input type="text" class="form-control" id="title">
          <span id="titleError" class="text-danger"></span>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" id="saveBtn" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>

    <div class="container">
        <div class="row">
            <div class="col-12">

                <div class="col-md-11 offset-1 mt-5 mb-5">

                    <div id="calendar">

                    </div>

                </div>
            </div>
        </div>
    </div>
	</div>
					</div>
				</div>

	@endsection('content')

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

 <script>
        $(document).ready(function() {
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
                 {{--select: function(start, end, allDays) {--}}
                 {{--    $('#bookingModal').modal('toggle');--}}
                 {{--    $('#saveBtn').click(function() {--}}
                 {{--        var title = $('#title').val();--}}
                 {{--        var start_date = moment(start).format('YYYY-MM-DD');--}}
                 {{--        var end_date = moment(end).format('YYYY-MM-DD');--}}
                 {{--        $.ajax({--}}
                 {{--            url:"{{ route('calendar.store') }}",--}}
                 {{--            type:"POST",--}}
                 {{--            dataType:'json',--}}
                 {{--            data:{ title, start_date, end_date  },--}}
                 {{--            success:function(response)--}}
                 {{--            {--}}
                 {{--                $('#bookingModal').modal('hide')--}}
                 {{--                $('#calendar').fullCalendar('renderEvent', {--}}
                 {{--                    'title': response.title,--}}
                 {{--                    'start' : response.start,--}}
                 {{--                    'end'  : response.end,--}}
                 {{--                    'color' : response.color--}}
                 {{--                });--}}
                 {{--            },--}}
                 {{--            error:function(error)--}}
                 {{--            {--}}
                 {{--                if(error.responseJSON.errors) {--}}
                 {{--                    $('#titleError').html(error.responseJSON.errors.title);--}}
                 {{--                }--}}
                 {{--            },--}}
                 {{--        });--}}
                 {{--    });--}}
                 {{--},--}}
                editable: true,
                eventDrop: function(event) {

                    var id = event.id;
                    var start_date = moment(event.start).format('YYYY-MM-DD HH:mm:ss');
                    var end_date = moment(event.end).format('YYYY-MM-DD HH:mm:ss');
                    $.ajax({
                            url:"{{ route('calendar.update', '') }}" +'/'+ id,
                            type:"PATCH",
                            dataType:'json',
                            data:{ start_date, end_date  },
                            success:function(response)
                            {
                                swal("Good job!", "Event Updated!", "success");
                            },
                            error:function(error)
                            {
                                console.log(error)
                            },
                        });
                },
                {{--eventClick: function(event){--}}
                {{--    var id = event.id;--}}
                {{--    if(confirm('Are you sure want to remove it')){--}}
                {{--        $.ajax({--}}
                {{--            url:"{{ route('calendar.destroy', '') }}" +'/'+ id,--}}
                {{--            type:"DELETE",--}}
                {{--            dataType:'json',--}}
                {{--            success:function(response)--}}
                {{--            {--}}
                {{--                $('#calendar').fullCalendar('removeEvents', response);--}}
                {{--                // swal("Good job!", "Event Deleted!", "success");--}}
                {{--            },--}}
                {{--            error:function(error)--}}
                {{--            {--}}
                {{--                console.log(error)--}}
                {{--            },--}}
                {{--        });--}}
                {{--    }--}}
                {{--},--}}
                selectAllow: function(event)
                {
                    // console.log(event);

                    return moment(event.start).utcOffset(false).isSame(moment(event.end).subtract(1, 'second').utcOffset(false), 'day');
                },
            });
            $("#bookingModal").on("hidden.bs.modal", function () {
                $('#saveBtn').unbind();
            });
            $('.fc-event').css('font-size', '13px');
            $('.fc-event').css('width', '20px');
            $('.fc-event').css('border-radius', '50%');
        });
    </script>
@endsection
