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

    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
            <h4 class="content-title mb-0 my-auto f-z-30"> <a href="{{route('test.index')}}" class="text-dark">{{trans('tests/tests.tests')}}</a></h4>
                <span
                    class="text-muted mt-1 tx-13 ms-2 mb-0">/ <a href="{{route('test.students', $test->id)}}">{{$test->title}}</a>
                </span>
                <span
                    class="text-muted mt-1 tx-13 ms-2 mb-0">/ {{trans('tests/tests.questions tests')}}
                </span>
            </div>
        </div>

    </div>


    @if (session()->has('edit'))
        <script>
            window.onload = function () {
                notif({
                    msg: " questions information has updated successfully",
                    type: "success"
                });
            }

        </script>
    @endif

    @if (session()->has('delete'))
        <script>
            window.onload = function () {
                notif({
                    msg: "questions has Deleted Successfully",
                    type: "success"
                });
            }

        </script>
    @endif

    @if (session()->has('success'))
        <script>
            window.onload = function () {
                notif({
                    msg: "questions has Added Successfully",
                    type: "success"
                });
            }

        </script>
    @endif




    <div class="row row-sm">
        <div class="col-xl-12">
            <div class="card">

                <div class="card-header pb-0">
                    <div class="d-flex justify-content-between">
                        <a class="btn btn-primary btn-sm"
                           href="{{ route('test.question.create', $test->id) }}">{{trans('tests/tests.add_question')}}</a>
                    </div>

                </div>
                <div class="card-body">
                    <div class="table-responsive userlist-table">
                        <table class="table table-striped table-vcenter text-nowrap mb-0" id="example1">
                            <thead>
                            <tr>
                                <th class="wd-10p border-bottom-0">#</th>
                                <th class="wd-15p border-bottom-0">{{trans('tests/tests.title')}}</th>
                                <th class="wd-20p border-bottom-0">{{trans('tests/tests.desc')}}</th>
                                <th class="wd-20p border-bottom-0">{{trans('tests/tests.type')}}</th>
                                <th class="wd-20p border-bottom-0">{{trans('tests/tests.created_at')}}</th>
                                <th class="wd-10p border-bottom-0">{{trans('general.Actions')}}</th>

                            </tr>
                            </thead>

                            <tbody>
                            @foreach ($questions as $key => $question)
                                <tr id="row-{{$question->id}}">
                                    <td>{{ ++$key }}</td>
                                    <td>{{ $question->title }}</td>
                                    <td>
                                        <a href="javascript:;" class="dropdown-item" data-bs-toggle="modal"
                                           data-bs-target="#info-sub" data-desc="{{$question->desc}}"
                                           data-title="{{$question->title}}"
                                        >
                                            {!! substr($question->desc,0,25) !!}...
                                            <span style="color: blue">
                                                {{trans('tests/tests.read_more')}}
                                            </span>
                                        </a>
                                    </td>
                                    <td>{{trans('tests/tests.'.\App\Helpers\Constants::questionType[$question->questionType->type]) }}</td>
                                    <td>{{ \Illuminate\Support\Carbon::parse($question->created_at)->format('d-m-Y H:i:s')}}</td>

                                    <td>


                                        <a class="btn btn-primary btn-sm" title="{{trans('general.Edit')}}"
                                           href="{{ route('question.edit', $question->id) }}"><i
                                                class="las la-edit"></i></a>

                                        <a class="modal-effect btn btn-sm btn-danger" data-effect="effect-scale"
                                           data-id="{{ $question->id }}"
                                           data-bs-toggle="modal" href="#delete-sub"
                                           title="{{trans('general.Delete')}}"><i
                                                class="las la-trash"></i></a>

                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                        <div class="modal" id="delete-sub">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content modal-content-demo">
                                    <div class="modal-header">
                                        <h6 class="modal-title">{{trans('general.Delete')}}</h6>
                                        <button aria-label="Close" class="close"
                                                data-bs-dismiss="modal" type="button"><span
                                                aria-hidden="true">&times;</span></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="modal-body">
                                            <p>{{trans('general.delete_warning')}} </p><br>

                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn ripple btn-danger" id="delete_btn"
                                                    type="submit">{{trans('general.Delete')}}</button>
                                            <button class="btn ripple btn-secondary" data-bs-dismiss="modal"
                                                    type="button">{{trans('general.Cancel')}}</button>
                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="shown-event-ex">
                            <div
                                class="modal fade text-start"
                                id="info-sub"
                                tabindex="-1"
                                aria-labelledby="myModalLabel22"
                                aria-hidden="true"
                            >
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">

                                            <h4 class="modal-title"
                                                id="myModalLabel22">{{trans('tests/tests.desc_for')}}<span
                                                    id="d-title"></span></h4>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">

                                            {{--                        <span class="la la-exclamation-circle fs-60 text-warning"></span>--}}
                                            <h4 class="modal-title fs-19 font-weight-semi-bold pt-2 pb-1"
                                                id="d-desc"></h4>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-outline-secondary"
                                                    data-bs-dismiss="modal">{{trans('general.Cancel')}}</button>
                                        </div>
                                    </div>
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

        <!-- Internal Data tables -->
            <script src="{{asset('assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
            <script src="{{asset('assets/plugins/datatable/datatables.min.js')}}"></script>
            <script src="{{asset('assets/plugins/datatable/js/dataTables.bootstrap5.js')}}"></script>
            <script src="{{asset('assets/plugins/datatable/js/dataTables.buttons.min.js')}}"></script>
            <script src="{{asset('assets/plugins/datatable/js/buttons.bootstrap5.min.js')}}"></script>
            <script src="{{asset('assets/plugins/datatable/js/jszip.min.js')}}"></script>
            <script src="{{asset('assets/plugins/datatable/js/buttons.html5.min.js')}}"></script>
            <script src="{{asset('assets/plugins/datatable/js/buttons.print.min.js')}}"></script>
            <script src="{{asset('assets/plugins/datatable/js/buttons.colVis.min.js')}}"></script>
            <script src="{{asset('assets/plugins/datatable/pdfmake/pdfmake.min.js')}}"></script>
            <script src="{{asset('assets/plugins/datatable/pdfmake/vfs_fonts.js')}}"></script>
            <script src="{{ URL::asset('assets/plugins/notify/js/notifIt.js') }}"></script>
            <script src="{{ URL::asset('assets/plugins/notify/js/notifit-custom.js') }}"></script>

            <!--Internal  Datatable js -->
            <script src="{{asset('assets/js/table-data.js')}}"></script>
            <script src="{{asset('assets/js/admin-pages/questions/list.js')}}"></script>

@endsection

