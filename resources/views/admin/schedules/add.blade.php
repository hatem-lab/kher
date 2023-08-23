@extends('layouts.app')

@section('styles')

    <!--- Internal Select2 css-->
{{--    <link href="{{asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">--}}

    <link rel="stylesheet" href="{{asset('assets/css-rtl/editors/quill/katex.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css-rtl/editors/quill/monokai-sublime.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css-rtl/editors/quill/quill.snow.css')}}">

    <!-- Internal Select2 css -->
    <link href="{{asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">

    <!--Internal  Datetimepicker-slider css -->
    <link href="{{asset('assets/plugins/amazeui-datetimepicker/css/amazeui.datetimepicker.css')}}" rel="stylesheet">
    <link href="{{asset('assets/plugins/jquery-simple-datetimepicker/jquery.simple-dtpicker.css')}}" rel="stylesheet">
    <link href="{{asset('assets/plugins/pickerjs/picker.min.css')}}" rel="stylesheet">

    <!-- Internal Spectrum-colorpicker css -->
    <link href="{{asset('assets/plugins/spectrum-colorpicker/spectrum.css')}}" rel="stylesheet">


@endsection

@section('content')

    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4><a href="{{route('schedule.index')}}" class="content-title mb-0 my-auto">{{trans('lectures/lectures.schedules')}}</a></h4><span
                    class="text-muted mt-1 tx-13 ms-2 mb-0">/ {{trans('lectures/lectures.add_schedule')}}</span>
            </div>
        </div>

    </div>    <!-- breadcrumb -->

    <!-- row -->
    <div class="row">

        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-body">

                    <form action="{{route('schedule.store')}}" method="post"
                          id="lecture_form" data-parsley-validate="">
                        @csrf



                        <div id="lecture" class="row row-sm mt-2">
                            <div class="col-12">

                                <p class="mg-b-10">{{trans('lectures/lectures.lecture')}} <span class="tx-danger">*</span></p>
                                <select  name="lecture_id" required="" class="form-control select2">
                                    <option >
                                        select form list
                                    </option>
                                    @foreach($lectures as $one)
                                        <option id="lecture" value="{{$one->id}}">
                                            {{$one->title}}
                                        </option>
                                    @endforeach

                                </select>
                                @error('course')
                                <p class="validation_error">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <input hidden value="" name="id" id="id_input">
                        <input hidden value="" name="id1" id="id_student">




                        <div class="row row-sm mt-2">
                            <div class="col-md-6">
                                <p class="mg-b-10 mt-10">{{trans('lectures/lectures.students')}} <span class="tx-danger">*</span></p>
                                <select name="students[]" onclick="console.log($(this).val())"   required="" multiple class="form-control select2">
                                    <option >
                                        select form list
                                    </option>
                                    @foreach($students as $student)
                                        <option value="{{$student->id}}">
                                            {{$student->getTranslatedName()}}
                                        </option>
                                    @endforeach

                                </select>
                            </div>
                           @if( auth('admin') -> user() ->role != 2)
                
                            <div class="col-md-6">
                                <p class="mg-b-10 mt-10">{{trans('lectures/lectures.teacher')}} <span class="tx-danger">*</span></p>
                                <select name="teacher"  name="teacher_id"  required=""  class="form-control select2">
                                    <option >
                                        select form list
                                    </option>
                                    @foreach($teachers as $one)
                                        <option value="{{$one->id}}">
                                            {{$one->name}}
                                        </option>
                                    @endforeach
                                </select>
                                @error('course')
                                <p class="validation_error">{{ $message }}</p>
                                @enderror
                            </div>
                               @endif

                        </div>

                            <div  class=" col-12"><button id="hide_button" class=" btn btn-main-primary pd-x-20 mg-t-10" type="submit">{{trans('general.Add')}}</button></div>

                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /row -->

@endsection('content')

@section('scripts')

    <!--Internal  Select2 js -->
{{--    <script src="{{asset('assets/plugins/select2/js/select2.min.js')}}"></script>--}}

    <script src="{{asset('assets/js/editors/quill/katex.min.js')}}"></script>
    <script src="{{asset('assets/js/editors/quill/highlight.min.js')}}"></script>
    <script src="{{asset('assets/js/editors/quill/quill.min.js')}}"></script>


    <!--Internal  Parsley.min js -->
    <script src="{{asset('assets/plugins/parsleyjs/parsley.min.js')}}"></script>

    <!--Internal  Perfect-scrollbar js -->
    <script src="{{asset('assets/plugins/perfect-scrollbar/perfect-scrollbar.min-rtl.js')}}"></script>

    <!-- Internal Form-validation js -->
    <script src="{{asset('assets/js/form-validation.js')}}"></script>

    <!--Internal  Datepicker js -->
    <script src="{{asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js')}}"></script>

    <!--Internal  jquery.maskedinput js -->
    <script src="{{asset('assets/plugins/jquery.maskedinput/jquery.maskedinput.js')}}"></script>

    <!--Internal  spectrum-colorpicker js -->
    <script src="{{asset('assets/plugins/spectrum-colorpicker/spectrum.js')}}"></script>

    <!-- Internal Select2.min js -->
    <script src="{{asset('assets/plugins/select2/js/select2.min.js')}}"></script>

    <!--Internal Ion.rangeSlider.min js -->
    <script src="{{asset('assets/plugins/ion-rangeslider/js/ion.rangeSlider.min.js')}}"></script>

    <!--Internal  jquery-simple-datetimepicker js -->
    <script src="{{asset('assets/plugins/amazeui-datetimepicker/js/amazeui.datetimepicker.min.js')}}"></script>

    <!--Internal  pickerjs js -->
    <script src="{{asset('assets/plugins/pickerjs/picker.min.js')}}"></script>

    <!-- Internal form-elements js -->
    <script src="{{asset('assets/js/form-elements.js')}}"></script>

    <!-- Ionicons js -->
    <script src="{{asset('assets/plugins/jquery-simple-datetimepicker/jquery.simple-dtpicker.js')}}"></script>



    <script src="{{asset('assets/js/admin-pages/lectures/add.js')}}"></script>

    <script>
        $(document).ready(function() {
            $('select[name="lecture_id"]').last().on('change', function() {

                var lecture_id=   $(this).val();

               var x= document.getElementById("id_input").value = lecture_id;


            });


                    $('select[name="students[]"]').on('change', function(event) {
                        var id1 = $(this).val();

                         document.getElementById("id_student").value = id1;
                        var id=document.getElementById("id_student").value;
                        console.log(id)

                        var lecture_id = document.getElementById("id_input").value;
                        if (id) {
                            $.ajax({
                                url: "{{ URL::to('admin/schedule/validate/student') }}/"+id ,
                                type: "GET",
                                dataType: "json",
                                data: {
                                    id,lecture_id
                                },
                                success: function(data) {
                                    console.log(data)
                                    if(data.status==2)
                                    {
                                        alert(data.data)
                                       //$('#hide_button').addClass('disabled');
                                    }
                                    // else
                                    // {
                                    //     $('#hide_button').removeClass('disabled');
                                    // }
                                },
                            });

                        } else {
                            console.log('AJAX load did not work');
                        }
                    });

            $('#teacher').on('change', function(event) {
                var selectElement = event.target;
                var id = selectElement.value;
                console.log(id)

                var lecture_id = document.getElementById("id_input").value;
                if (id) {
                    $.ajax({
                        url: "{{ URL::to('admin/schedule/validate/teacher') }}/"+id ,
                        type: "GET",
                        dataType: "json",
                        data: {
                            id,lecture_id
                        },
                        success: function(data) {
                            console.log(data)
                            if(data.status==2)
                            {
                                alert(data.data)
                                $('#hide_button').addClass('disabled');
                            }
                            else
                            {
                                $('#hide_button').removeClass('disabled');
                            }
                        },
                    });

                } else {
                    console.log('AJAX load did not work');
                }
            });





            {{--$('#teacher').on('change', function() {--}}

            {{--    var formData = new FormData()--}}
            {{--    var id = $(this).val();--}}
            {{--    var lecture_id= $('#lecture').val();--}}
            {{--    // var start_date=document.getElementsByClassName('start_date')[0].value;--}}
            {{--    // var end_date=document.getElementsByClassName('end_date')[0].value;--}}
            {{--    if (id) {--}}
            {{--        $.ajax({--}}
            {{--            url: "{{ URL::to('admin/schedule/validate/teacher') }}/"+id ,--}}
            {{--            type: "GET",--}}
            {{--            dataType: "json",--}}
            {{--            data: {--}}
            {{--                id,lecture_id--}}
            {{--            },--}}
            {{--            success: function(data) {--}}
            {{--                if(data.status==2)--}}
            {{--                {--}}
            {{--                    alert(data.data)--}}
            {{--                    $('#hide_button').addClass('disabled');--}}
            {{--                }--}}
            {{--                if(data.status==1)--}}
            {{--                {--}}
            {{--                    $('#hide_button').removeClass('disabled');--}}
            {{--                }--}}
            {{--            },--}}
            {{--        });--}}

            {{--    } else {--}}
            {{--        console.log('AJAX load did not work');--}}
            {{--    }--}}
            {{--});--}}

            {{--$('#test').hide();--}}
            {{--$('input[type="radio"]').click(function() {--}}
            {{--    if ($(this).attr('id') == 'type_div') {--}}
            {{--        $('#test').hide();--}}
            {{--        $('#lecture').show();--}}
            {{--    } else {--}}
            {{--        $('#test').show();--}}
            {{--        $('#lecture').hide();--}}

            {{--    }--}}
            {{--});--}}

        });

    </script>
@endsection
