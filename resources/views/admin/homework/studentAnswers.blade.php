@extends('layouts.app')

@section('styles')




@endsection

@section('content')

    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
            <h4 class="content-title mb-0 my-auto f-z-30"><a href="{{route('homework.index')}}" class="text-dark">{{trans('Homework/Homework.Homeworks')}}</a></h4>
                <span
                    class="text-muted mt-1 tx-13 ms-2 mb-0">/ <a href="{{route('homework.students', $homework->id)}}">{{$homework->title}}</a>
                </span>
                <span
                    class="text-muted mt-1 tx-13 ms-2 mb-0">/ <a
                        href="{{route('homework.students', $homework->id)}}">{{trans('tests/tests.students')}}</a>
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
                        <h4 class="card-title mg-b-0">{{trans('tests/tests.course')}}: {{$homework->lecture->course->title}}</h4>
                        <h4 class="card-title mg-b-0">{{trans('Homework/Homework.homework')}}: {{$homework->title}}</h4>
                        <h4 class="card-title mg-b-0">{{trans('tests/tests.student')}}: {{$student->name_ar}}</h4>
                        <i class="mdi mdi-dots-horizontal text-gray"></i>
                    </div>
                    <p class="tx-12 tx-gray-500 mb-2">{{trans('tests/tests.student_correct_answer')}}: <strong>{{$student->name_ar}}</strong> </p>

                </div>
                <div class="card-body">
                    {{--                    <div class="main-content-label mg-b-5">--}}
                    {{--                        Required Input Validation--}}
                    {{--                    </div>--}}
                    {{--                    <p class="mg-b-20">It is Very Easy to Customize and it uses in your website apllication.</p>--}}
                    <form action="{{route('homework.students.correctAnswers', [$homework->id, $student->id])}}" method="POST"
                          id="answers_form" data-parsley-validate="" >
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <label class="form-label">{{trans('questions/questions.total_mark')}}: </label>
                                <input class="form-control" id="total_mark"
                                        value="{{ \App\Models\StudentFile::where('student_id',$student->id)->where('homework_id',$homework->id)->first()->mark }}"
                                       type="number" name="mark" >
                            </div>
                            <div class="col-12">
                                <button class="btn btn-main-primary pd-x-20 mg-t-10"
                                        type="submit">{{trans('general.add_mark')}}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /row -->

@endsection('content')

@section('scripts')
    <!--Internal  Parsley.min js -->
    <script src="{{asset('assets/plugins/parsleyjs/parsley.min.js')}}"></script>

    <!--Internal  Perfect-scrollbar js -->
    <script src="{{asset('assets/plugins/perfect-scrollbar/perfect-scrollbar.min-rtl.js')}}"></script>

    <script src="{{asset('assets/js/form-validation.js')}}"></script>

{{--    <script src="{{asset('assets/js/form-elements.js')}}"></script>--}}

    <script src="{{asset('assets/js/admin-pages/tests/student_answers.js')}}"></script>


@endsection
