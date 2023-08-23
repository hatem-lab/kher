@extends('layouts.app')

@section('styles')




@endsection

@section('content')

    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto"><a
                        href="{{route('survey.index')}}" class="text-dark">{{trans('surveys/surveys.surveys')}}</a></h4>
                <span
                    class="text-muted mt-1 tx-13 ms-2 mb-0">/ <a href="{{route('survey.students', $survey->id)}}">{{$survey->title}}</a>
                </span>
                <span
                    class="text-muted mt-1 tx-13 ms-2 mb-0">/ <a
                        href="{{route('survey.students', $survey->id)}}">{{trans('surveys/surveys.students')}}</a>
                </span>
                <span
                    class="text-muted mt-1 tx-13 ms-2 mb-0">/ {{$student->name_ar}}
                </span>
            </div>
        </div>

    </div>    <!-- breadcrumb -->

    <!-- row -->
    <div class="row">

        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title mg-b-0">{{trans('surveys/surveys.course')}}: {{isset($survey->course) ? $survey->course->title : trans('surveys/surveys.general')}}</h4>
                        <h4 class="card-title mg-b-0">{{trans('surveys/surveys.survey')}}: {{$survey->title}}</h4>
                        <h4 class="card-title mg-b-0">{{trans('surveys/surveys.student')}}: {{$student->name_ar}}</h4>
                        <i class="mdi mdi-dots-horizontal text-gray"></i>
                    </div>
                    <p class="tx-12 tx-gray-500 mb-2">{{trans('surveys/surveys.student_correct_answer')}}: <strong>{{$student->name_ar}}</strong> </p>

                </div>
                <div class="card-body">
                    {{--                    <div class="main-content-label mg-b-5">--}}
                    {{--                        Required Input Validation--}}
                    {{--                    </div>--}}
                    {{--                    <p class="mg-b-20">It is Very Easy to Customize and it uses in your website apllication.</p>--}}
{{--                    <form action="{{route('survey.students.correctAnswers', [$survey->id, $student->id])}}" method="POST"--}}
{{--                          id="answers_form" data-parsley-validate="" >--}}
{{--                        @csrf--}}

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
                                                               name="flexRadioDefault" id="flexRadioDefault1"
                                                            {{$question->survey_student_answer($student->id)->bool ? 'checked' : 'disabled'}}
                                                               >
                                                        <label class="form-check-label" for="flexRadioDefault1">
                                                            {{trans('questions/questions.true')}}
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio"
                                                               name="flexRadioDefault" id="flexRadioDefault2"
                                                            {{$question->survey_student_answer($student->id)->bool ? 'disabled' : 'checked'}}
                                                               >
                                                        <label class="form-check-label" for="flexRadioDefault2">
                                                            {{trans('questions/questions.false')}}
                                                        </label>
                                                    </div>
                                                </div>

                                            @elseif($question->questionType->type == 3)
                                                <div class="mt-2 mb-3">
                                                    @foreach($question->SurveyOptions as $key=>$option)
                                                        @php($selected_options = intval(json_decode($question->survey_student_answer($student->id)->options)))
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio"
                                                                   name="flexOptionDefault"
                                                                   id="flexRadioDefault{{$key}}" {{ ($option->id== $selected_options) ? 'checked' :'disabled'}}
                                                            readonly>
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
                                                        @php($selected_choices = json_decode($question->survey_student_answer($student->id)->options))
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value=""
                                                                   id="defaultCheck{{$key}}" {{ in_array($option->id, $selected_choices) ? 'checked' :'disabled'}} onclick="return false">
                                                            <label class="form-check-label"
                                                                   for="defaultCheck{{$key}}">
                                                                {{$option->desc}}
                                                            </label>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            @else
                                                <div class="mt-2 mb-3">

                                                        <strong>{{trans('questions/questions.student_answer')}}:</strong>
                                                    <p>
                                                    " <i>{!! $question->survey_student_answer($student->id)->desc !!}</i> "
                                                    </p>
                                                </div>
                                            @endif

                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

{{--                    </form>--}}
                </div>
            </div>
        </div>
    </div>
    <!-- /row -->

@endsection('content')

@section('scripts')
    <!--Internal  Parsley.min js -->
{{--    <script src="{{asset('assets/plugins/parsleyjs/parsley.min.js')}}"></script>--}}

{{--    <!--Internal  Perfect-scrollbar js -->--}}
{{--    <script src="{{asset('assets/plugins/perfect-scrollbar/perfect-scrollbar.min-rtl.js')}}"></script>--}}

{{--    <script src="{{asset('assets/js/form-validation.js')}}"></script>--}}

{{--    <script src="{{asset('assets/js/form-elements.js')}}"></script>--}}

{{--    <script src="{{asset('assets/js/admin-pages/surveys/student_answers.js')}}"></script>--}}


@endsection
