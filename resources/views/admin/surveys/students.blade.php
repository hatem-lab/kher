@extends('layouts.app')

@section('styles')

    <!-- Interenal Accordion Css -->


    <link href="{{asset('assets/plugins/accordion/accordion.css')}}" rel="stylesheet"/>

@endsection

@section('content')

    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto f-z-30"><a
                        href="{{route('survey.index')}}" class="text-dark">{{trans('surveys/surveys.surveys')}}</a></h4>
                <span
                    class="text-muted mt-1 tx-13 ms-2 mb-0">/ {{$survey->title}}
                </span>

            </div>
        </div>

    </div>
    <!-- breadcrumb -->

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
                                        class="visible-xs"><i
                                            class="las la-user-circle tx-16 me-1"></i></span> <span
                                        class="hidden-xs">{{trans('surveys/surveys.students')}}</span> </a>
                            </li>
                            <li class="">
                                <a href="#survey" data-bs-toggle="tab" aria-expanded="false"> <span
                                        class="visible-xs"><i class="las la-images tx-15 me-1"></i></span>
                                    <span class="hidden-xs">{{trans('surveys/surveys.survey_preview')}}</span> </a>
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
                                                <h4 class="card-title mg-b-0 f-z-18 mtb">{{trans('surveys/surveys.students_table')}}</h4>
                                                <i class="mdi mdi-dots-horizontal text-gray"></i>
                                            </div>
                                            <p class="tx-12 tx-gray-500 mb-2 text-white f-z-15">{{trans('surveys/surveys.students_table_hint')}}</p>

                                        </div>
                                        <div class="card-body">
                                            <div class="table-responsive border-top userlist-table">
                                                <table
                                                    class="table card-table table-striped table-vcenter text-nowrap mb-0" id="example1">
                                                    <thead>
                                                    <tr>
                                                        <th class="wd-10p border-bottom-0">#</th>
                                                        <th class="wd-15p border-bottom-0">{{trans('surveys/surveys.student_name')}}</th>
                                                        <th class="wd-15p border-bottom-0"><span></span></th>
                                                        <th class="wd-15p border-bottom-0">{{trans('surveys/surveys.student_email')}}</th>
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

                                                            <td>


                                                                <a class="btn btn-warning btn-sm"
                                                                   title="{{trans('general.Answers')}}"
                                                                   href="{{ route('survey.students.answers', [$survey->id, $student->id]) }}">
                                                                   <i class="fas fa-edit"></i>
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
                                                                        id="myModalLabel22">{{trans('surveys/surveys.desc_for')}}
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
                        <div class="tab-pane" id="survey">


                            <div class="row row-sm">
                                @foreach($survey->survey_questions as $question)
                                    <div class="col-sm-12">
                                        <div class="card">
                                            <div class="card-body">

                                                <p class="card-text">{!! $question->desc !!}</p>


                                            @if($question->questionType->type == 2)
                                                    <div class="mt-2 mb-3">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio"
                                                                   name="flexRadioDefault" id="flexRadioDefault1">
                                                            <label class="form-check-label" for="flexRadioDefault1">
                                                                {{trans('questions/questions.true')}}
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio"
                                                                   name="flexRadioDefault" id="flexRadioDefault2">
                                                            <label class="form-check-label" for="flexRadioDefault2">
                                                                {{trans('questions/questions.false')}}
                                                            </label>
                                                        </div>
                                                    </div>

                                                @elseif($question->questionType->type == 3)
                                                    <div class="mt-2 mb-3">
                                                        @foreach($question->SurveyOptions as $key=>$option)
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio"
                                                                       name="flexRadioDefault"
                                                                       id="flexRadioDefault{{$key}}">
                                                                <label class="form-check-label"
                                                                       for="flexRadioDefault{{$key}}">
                                                                    {{$option->desc}}
                                                                </label>
                                                            </div>

                                                        @endforeach
                                                    </div>

                                                @elseif($question->questionType->type == 4)
                                                    <div class="mt-2 mb-3">
                                                        @foreach($question->SurveyOptions as $key=>$option)
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" value=""
                                                                       id="defaultCheck{{$key}}">
                                                                <label class="form-check-label"
                                                                       for="defaultCheck{{$key}}">
                                                                    {{$option->desc}}
                                                                </label>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                @else
                                                    <div class="mt-2 mb-3">

                                                        <textarea class="form-control" id="exampleFormControlTextarea1"
                                                                  rows="3"
                                                                  placeholder="{{trans('questions/questions.add_answer')}}"></textarea>

                                                    </div>
                                                @endif
                                                <a href="{{route('survey.question.edit', $question->id)}}"
                                                   class="btn blue-button mb-15">{{trans('general.Edit')}}</a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
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


@endsection

