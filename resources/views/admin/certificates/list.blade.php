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
                <h4 class="content-title mb-0 my-auto f-z-30"><a href="{{route('certificate.index')}}" class="text-dark">{{trans('certificates/certificates.certificates')}}</a></h4>
                <span class="text-muted mt-1 tx-13 ms-2 mb-0"> / <a href="{{route('certificate.index')}}">{{trans('certificates/certificates.certificates list')}}</a></span>
            </div>
        </div>

    </div>


    @if (session()->has('edit'))
        <script>
            window.onload = function () {
                notif({
                    msg: " certificate information has updated successfully",
                    type: "success"
                });
            }

        </script>
    @endif

    @if (session()->has('delete'))
        <script>
            window.onload = function () {
                notif({
                    msg: "certificate has Deleted Successfully",
                    type: "success"
                });
            }

        </script>
    @endif

    @if (session()->has('success'))
        <script>
            window.onload = function () {
                notif({
                    msg: "certificate has Added Successfully",
                    type: "success"
                });
            }

        </script>
    @endif




    <div class="row row-sm">
        <div class="col-xl-12">
            <div class="card">

                <div class="card-header pb-0">
                    @if(auth('admin') -> user() ->can('create Certificate'))
                        <div class="d-flex justify-content-between">
                            <a class="btn blue-button mb-15 btn-sm"
                               href="{{ route('certificate.create') }}">{{trans('general.Add')}}</a>
                        </div>
                    @endif
                </div>
                <div class="card-body">
                    <div class="table-responsive userlist-table">
                        <table class="table table-striped table-vcenter text-nowrap mb-0" id="example1">
                            <thead>
                            <tr>
                                <th class="wd-10p border-bottom-0">#</th>
                                <th class="wd-15p border-bottom-0">{{trans('certificates/certificates.name_en')}}</th>
                                <th class="wd-20p border-bottom-0">{{trans('certificates/certificates.name_ar')}}</th>
                                <th class="wd-10p border-bottom-0">{{trans('general.Actions')}}</th>

                            </tr>
                            </thead>

                            <tbody>
                            @foreach ($certificates as $key => $certificate)
                                <tr id="row-{{$certificate->id}}">
                                    <td>{{ ++$key }}</td>
                                    <td>{{ $certificate->name_en }}</td>
                                    <td>{{ $certificate->name_ar }}</td>

                                    <td>

                                        @if(auth('admin') -> user() ->can('update Certificate'))

                                            <a class="btn btn-primary btn-sm"
                                               href="{{ route('certificate.edit', $certificate->id) }}"
                                               title="{{trans('general.Edit')}}"><i
                                                    class="las la-edit"></i></a>
                                        @endif

                                        @if(auth('admin') -> user() ->can('delete Certificate'))

                                            <a class="modal-effect btn btn-sm btn-danger" data-effect="effect-scale"
                                               data-id="{{ $certificate->id }}"
                                               data-bs-toggle="modal" href="#delete-sub"
                                               title="{{trans('general.Delete')}}"><i
                                                    class="las la-trash"></i></a>
                                        @endif

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
    <script src="{{asset('assets/js/admin-pages/certificates/list.js')}}"></script>

@endsection

