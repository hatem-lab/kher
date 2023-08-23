@extends('user.layouts.master-page')

@section('title',trans('tests/tests.test_questions'))

@section('style')


@endsection


@section('content')
    <div class="contact-popup">
        <div class="contact-popup-title">
            <button type="button" class="close-popup"><i class="ri-close-fill"></i></button>
        </div>
        <div class="contact-popup-wrap">
            <div class="comp-info">
                <div class="comp-logo">
                    <a href="{{route('site.home')}}">
                        <img class="logo-light" src="assets/img/logo.png" alt="Image">
                        <img class="logo-dark" src="assets/img/logo-white.png" alt="Image">
                    </a>
                </div>
                <p class="comp-desc">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                    incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                    ullamco laboris nisi ut aliquip</p>
                <ul class="footer-contact-address">
                    <li><a href="tel:999762236473"> <i class="ri-phone-line"></i> +999 762 23 6473</a></li>
                    <li><i class="ri-mail-send-fill"></i> <a href="mailto:info@ecour.com">info@ecour.com</a></li>
                    <li><i class="ri-earth-fill"></i> <a href="https://www.ecour.com">www.ecour.com</a></li>
                    <li>
                        <i class="ri-map-pin-fill"></i> 24th North Lane, Hill Town, New York
                    </li>
                </ul>
            </div>
            <div class="comp-map">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3151.8385385572983!2d144.95358331584498!3d-37.81725074201705!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ad65d4dd5a05d97%3A0x3e64f855a564844d!2s121%20King%20St%2C%20Melbourne%20VIC%203000%2C%20Australia!5e0!3m2!1sen!2sbd!4v1612419490850!5m2!1sen!2sbd"></iframe>
            </div>
            <div class="share-on text-center">
                <ul class="social-profile style2">
                    <li><a target="_blank" href="https://facebook.com"><i class="ri-facebook-fill"></i> </a></li>
                    <li><a target="_blank" href="https://twitter.com"> <i class="ri-twitter-fill"></i> </a></li>
                    <li><a target="_blank" href="https://linkedin.com"> <i class="ri-linkedin-fill"></i> </a></li>
                    <li><a target="_blank" href="https://instagram.com"> <i class="ri-instagram-line"></i> </a></li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Header  end -->
    <!-- Breadcrumb  start -->
    <section class="breadcrumb-wrap bg-f br-bg-7 h-img-700">
        <div class="overlay op-6 bg-black"></div>
        <div class="container">
            <div class="row">
                <div class="col-xl-8 offset-xl-2 col-lg-10 offset-lg-1 col-md-10 offset-md-1">
                    <div class="breadcrumb-title">
                        <h2>{{trans('tests/tests.test_questions')}}</h2>
                        <ul class="breadcrumb-menu">
                            <li><a href="{{route('site.home')}}">Home </a></li>
                            <li><a href="{{route('student_tests')}}">Tests </a></li>
                            <li><a href="{{route('student.test', $test->id)}}">{{$test->title}}</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb  end -->
    <!-- Tour Details Section start -->
    <section class="faq-wrap pt-100 pb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="ecour-faq">
                        <form method="POST" action="{{route('student.test.apply_test', $test->id)}}"
                              enctype="multipart/form-data">
                            @csrf
                            <div class="accordion" id="accordionExample">
                                @foreach($questions as $question)

                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="heading-{{$question->id}}">
                                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                                    data-bs-target="#collapse-{{$question->id}}" aria-expanded="true"
                                                    aria-controls="collapse-{{$question->id}}">
                                                {{$question->title}} ({{$question->mark}})
                                            </button>
                                        </h2>
                                        <div id="collapse-{{$question->id}}" class="accordion-collapse collapse show"
                                             aria-labelledby="heading-{{$question->id}}"
                                             data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                <div class="single-product-text">
                                                    {!! $question->desc !!}

                                                    @if(isset($question->image) && $question->image != '')

                                                        <div class="text-wrap">
                                                            <div class="example">
                                                                <img alt="Responsive image"
                                                                     class="img-thumbnail wd-100p wd-sm-200"
                                                                     src="{{$question->image}}">
                                                            </div>
                                                        </div>

                                                    @endif
                                                </div>

                                                @if($question->questionType->type == 2)
                                                    <div class="mt-2 mb-3">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio"
                                                                   name="{{$question->id}}" id="flexRadioDefault1"
                                                                   value="1">
                                                            <label class="form-check-label" for="flexRadioDefault1">
                                                                {{trans('questions/questions.true')}}
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio"
                                                                   name="{{$question->id}}" id="flexRadioDefault2"
                                                                   value="0">
                                                            <label class="form-check-label" for="flexRadioDefault2">
                                                                {{trans('questions/questions.false')}}
                                                            </label>
                                                        </div>
                                                    </div>

                                                @elseif($question->questionType->type == 3)
                                                    <div class="mt-2 mb-3">
                                                        @foreach($question->options as $key=>$option)
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio"
                                                                       name="{{$question->id}}"
                                                                       id="flexRadioDefault{{$key}}"
                                                                       value="{{$option->id}}">
                                                                <label class="form-check-label"
                                                                       for="flexRadioDefault{{$key}}">
                                                                    {{$option->desc}}
                                                                </label>
                                                            </div>

                                                        @endforeach
                                                    </div>

                                                @elseif($question->questionType->type == 4)
                                                    <div class="mt-2 mb-3">
                                                        @foreach($question->options as $key=>$option)
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox"
                                                                       value="{{$option->id}}"
                                                                       name="{{$question->id}}[]"
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
                                                                  rows="3" name="{{$question->id}}"
                                                                  placeholder="{{trans('questions/questions.add_answer')}}"></textarea>

                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                <div>
                                    <button type="submit">Submit</button>
                                </div>
                            </div>


                        </form>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="course-details-widget sidebar-box">
                        <ul>
                            <li>
                                <p><i class="las la-user-graduate"></i>Diploma</p>
                                <p>{{$test->course->diploma->title}}</p>
                            </li>
                            <li>
                                <p><i class="las la-file-alt"></i>Course</p>
                                <p>{{$test->course->title}}</p>
                            </li>
                            <li>
                                <p><i class="las la-clock"></i>Date</p>
                                <p>{{\Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $test->date)->format('d-m-Y')}}</p>
                            </li>
                            <li>
                                <p><i class="las la-question-circle"></i>Time</p>
                                <p>{{\Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $test->date)->format('H:i')}}</p>
                            </li>
                            <li>
                                <p><i class="las la-check-square"></i>Duration</p>
                                <p>{{$test->duration}}</p>
                            </li>
                            <li>
                                <p><i class="las la-check-square"></i>weight</p>
                                <p>{{$test->weight}}</p>
                            </li>
                        </ul>
                    </div>
                </div>


            </div>
        </div>
    </section>
    <!-- Tour Details Section end -->
    <!-- Footer  start -->
    <!-- Course Details Section end -->

@endsection

@section('script')


@endsection


