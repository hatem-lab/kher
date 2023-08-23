@extends('layouts.app')

@section('styles')


    <link href="{{ URL::asset('assets/plugins/notify/css/notifIt.css') }}" rel="stylesheet" />

@endsection

@section('content')

    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
            <h4 class="content-title mb-0 my-auto f-z-30"><a href="{{route('homework.index')}}" class="text-dark">{{trans('Homework/Homework.Homeworks')}}</a></h4><span
                    class="text-muted mt-1 tx-13 ms-2 mb-0">/ {{$homework->title}}
                </span>

            </div>
        </div>

    </div>
    <!-- breadcrumb -->
    @if (session()->has('edit'))
        <script>
            window.onload = function() {
                notif({
                    msg: " User information has updated successfully",
                    type: "success"
                });
            }

        </script>
    @endif
    <!-- row -->
    <div class="row row-sm">

        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">
                    <div class="tabs-menu ">
                        <!-- Tabs -->
                        <ul class="nav nav-tabs profile navtab-custom panel-tabs">
                            <li class="">
                                <a href="#students" data-bs-toggle="tab" aria-expanded="true" class="active"> <span
                                        class="visible-xs">
                                        <i class="fas fa-user-graduate tx-16 me-1"></i></span> <span
                                        class="hidden-xs">{{trans('tests/tests.students')}}</span> </a>
                            </li>
                            <li class="">
                                <a href="#test" data-bs-toggle="tab" aria-expanded="false"> <span
                                        class="visible-xs"><i class="fas fa-file tx-16 me-1"></i></span>
                                    <span class="hidden-xs">{{trans('Homework/Homework.homework_preview')}}</span> </a>
                            </li>


                        </ul>
                    </div>
                    <div class="tab-content border-start border-bottom border-right border-top-0 p-4">
                        <div class="tab-pane active" id="students">
                            <div class="row row-sm">
                                <div class="col-xl-12">
                                    <div class="card">

                                        <div class="card-header pb-0">
                                            <div class="d-flex justify-content-between">
                                                <h4 class="card-title mg-b-0 f-z-30">{{trans('tests/tests.students_table')}}</h4>
                                                <i class="mdi mdi-dots-horizontal text-gray"></i>
                                            </div>
                                            <p class="tx-12 tx-gray-500 mb-2 f-z-15 text-white">{{trans('Homework/Homework.students_table_hint')}}</p>

                                        </div>
                                        <div class="card-body">
                                            <div class="table-responsive border-top userlist-table">
                                                <table
                                                    class="table card-table table-striped table-vcenter text-nowrap mb-0">
                                                    <thead>
                                                    <tr>
                                                        <th class="wd-10p border-bottom-0">#</th>
                                                        <th class="wd-15p border-bottom-0">{{trans('tests/tests.student_name')}}</th>
                                                        <th class="wd-15p border-bottom-0"><span></span></th>
                                                        <th class="wd-15p border-bottom-0">{{trans('tests/tests.student_email')}}</th>
                                                        <th class="wd-15p border-bottom-0">{{trans('tests/tests.created_at')}}</th>
                                                        <th class="wd-20p border-bottom-0">{{trans('tests/tests.student_mark')}}</th>
                                                        <th class="wd-10p border-bottom-0">{{trans('general.Actions')}}</th>

                                                    </tr>
                                                    </thead>

                                                    <tbody>
                                                    @foreach ($students as $key => $student)
                                                        <tr id="row-{{$student->id}}">
                                                            <td>{{ ++$key }}</td>
                                                            <td>
                                                                <img alt="avatar" class="rounded-circle avatar-md me-2"
                                                                     src="{{ isset($student->profile->image) ? URL::asset($student->profile->image) : URL::asset('images/defaults/student.png')}}">
                                                            </td>
                                                            <td>{{ $student->name_ar }}</td>
                                                            <td>{{ $student->email }}</td>
                                                            <td>{{ \App\Models\StudentFile::where('student_id',$student->id)->where('homework_id',$homework->id)->first()->created_at->diffForHumans() }}</td>

                                                            <td>{{ \App\Models\StudentFile::where('student_id',$student->id)->where('homework_id',$homework->id)->first()->mark }}</td>

                                                            <td>


                                                                <a class="btn btn-primary btn-sm"
                                                                   href="{{ route('homework.students.answers', [$homework->id, $student->id]) }}"
                                                                   title="{{trans('general.addMark')}}" >
                                                                     <i class="las la-edit"></i></a>

                                                                <a class="btn btn-success btn-sm"
                                                                   href="{{ route('homework.View_file_student',['path'=>\App\Models\StudentFile::where('student_id',$student->id)->where('homework_id',$homework->id)->first()->path,'file_id'=>\App\Models\StudentFile::where('student_id',$student->id)->where('homework_id',$homework->id)->first()->id])  }}"
                                                                   role="button"><i class="fas fa-eye"></i>&nbsp;
                                                                </a>

                                                                <a class="btn btn-info btn-sm"
                                                                   href="{{ route('homework.download_student',['path'=>\App\Models\StudentFile::where('student_id',$student->id)->where('homework_id',$homework->id)->first()->path,'file_id'=>\App\Models\StudentFile::where('student_id',$student->id)->where('homework_id',$homework->id)->first()->id])  }}"
                                                                   role="button"><i
                                                                        class="fas fa-download"></i>&nbsp;
                                                                </a>


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
                                                                    <button class="btn ripple btn-danger"
                                                                            id="delete_btn"
                                                                            type="submit">{{trans('general.Delete')}}</button>
                                                                    <button class="btn ripple btn-secondary"
                                                                            data-bs-dismiss="modal"
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
                                                                        id="myModalLabel22">{{trans('tests/tests.desc_for')}}
                                                                        <span
                                                                            id="d-title"></span></h4>
                                                                    <button type="button" class="btn-close"
                                                                            data-bs-dismiss="modal"
                                                                            aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">

                                                                    {{--                        <span class="la la-exclamation-circle fs-60 text-warning"></span>--}}
                                                                    <h4 class="modal-title fs-19 font-weight-semi-bold pt-2 pb-1"
                                                                        id="d-desc"></h4>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button"
                                                                            class="btn btn-outline-secondary"
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
                        </div>

                        <div class="tab-pane" id="test">


                            <div class="table-responsive mt-15">
                                <table class="table center-aligned-table mb-0 table table-hover"
                                       style="text-align:center">
                                    <thead>
                                    <tr class="text-dark">
                                        <th scope="col">#</th>
                                        <th scope="col">{{trans('Homework/Homework.file name')}}</th>
                                        <th scope="col">{{trans('Homework/Homework.created at')}} </th>
                                        <th scope="col">{{trans('Homework/Homework.methods')}}</th>
                                    </tr>
                                    </thead>
                                    <tbody id="list">
                                    <?php $i = 0; ?>
                                    @foreach($homework->files as $attachment)
                                        <?php $i++; ?>
                                        <tr id="row-{{$attachment->id}}">
                                            <td>{{ $i }}</td>
                                            <td>{{ $attachment->name }}</td>
                                            <td>{{ $attachment->created_at }}</td>
                                            <td colspan="2">
                                                <a class="btn btn-outline-success btn-sm"
                                                   href="{{ route('homework.View_file',['path'=>$attachment->path,'file_name'=>$attachment->name])  }}"
                                                   role="button"><i class="fas fa-eye"></i>&nbsp;
                                                </a>

                                                <a class="btn btn-outline-info btn-sm"
                                                   href="{{ route('homework.download',['path'=>$attachment->path,'file_name'=>$attachment->name])  }}"
                                                   role="button"><i
                                                        class="fas fa-download"></i>&nbsp;
                                                </a>


                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
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
                        <!-- row -->


                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- row closed -->

@endsection('content')

@section('scripts')

    <script src="{{ URL::asset('assets/plugins/notify/js/notifIt.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/notify/js/notifit-custom.js') }}"></script>


@endsection

