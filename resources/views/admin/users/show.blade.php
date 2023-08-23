@extends('layouts.app')

@section('styles')

    <!-- Interenal Accordion Css -->
    <link href="{{asset('assets/plugins/accordion/accordion.css')}}" rel="stylesheet" />
    <!--- Internal Select2 css-->
    <link href="{{asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">

    <!---Internal Fileupload css-->
    <link href="{{asset('assets/plugins/fileuploads/css/fileupload.css')}}" rel="stylesheet" type="text/css"/>

    <!---Internal Fancy uploader css-->
    <link href="{{asset('assets/plugins/fancyuploder/fancy_fileupload.css')}}" rel="stylesheet" />

    <!--Internal Sumoselect css-->
    <link rel="stylesheet" href="{{asset('assets/plugins/sumoselect/sumoselect-rtl.css')}}">

    <!--Internal  TelephoneInput css-->
    <link rel="stylesheet" href="{{asset('assets/plugins/telephoneinput/telephoneinput-rtl.css')}}">
    <!---Internal  Owl Carousel css-->
    <link href="{{asset('assets/plugins/owl-carousel/owl.carousel.css')}}" rel="stylesheet">

    <!--- Internal Timeline css-->
    <link href="{{asset('assets/plugins/timeline/css/timeline.min.css')}}" rel="stylesheet">
    <!--Internal  Font Awesome -->
    <link href="{{asset('assets/plugins/fontawesome-free/css/all.min.css')}}" rel="stylesheet">

    <!--Internal  treeview -->
    <link href="{{asset('assets/plugins/treeview/treeview-rtl.css')}}" rel="stylesheet" type="text/css" />


@endsection

@section('content')

    @if (session()->has('delete'))
        <script>
            window.onload = function () {
                notif({
                    msg: "Attachment has Deleted Successfully",
                    type: "success"
                });
            }

        </script>
    @endif

    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <a href="{{route('students.index')}}" class="content-title mb-0 my-auto "> <a href="{{route('users.index')}}" class="f-z-30 text-dark">{{trans('students/students.User')}}</a>
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
                                <a href="#profile" data-bs-toggle="tab" aria-expanded="true" class="active"> <span
                                        class="visible-xs"><i
                                            class="las la-user-circle tx-16 me-1"></i></span> <span
                                        class="hidden-xs">{{trans('students/students.information')}}</span> </a>
                            </li>
                            <li class="">
                                <a href="#roles" data-bs-toggle="tab" aria-expanded="false"> <span
                                        class="visible-xs"><i class="las la-cog tx-16 me-1"></i></span>
                                    <span class="hidden-xs">{{trans('students/students.Roles')}}</span> </a>
                            </li>
                        </ul>
                    </div>
                    <div class="tab-content border-start border-bottom border-right border-top-0 p-4">
                        <div class="tab-pane active" id="profile">
                            <form role="form">
                                <div class="form-group">
                                    <label for="FullName">{{trans('students/students.Full Name')}}</label>
                                    <input readonly type="text" value="{{$user->name}}" id="FullName" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="Email">{{trans('students/students.email')}}</label>
                                    <input readonly  type="email" value="{{$user->email}}" id="Email"
                                           class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="Username">{{trans('students/students.address')}}</label>
                                    <input readonly  type="text" value="@isset($user->profile){{$user->profile->address}}@endisset" id="Username" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="Password">{{trans('students/students.phone')}}</label>
                                    <input readonly type="text" value="@isset($user->profile){{$user->profile->phone}}@endisset"  id="Password"
                                           class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="RePassword">{{trans('students/students.birthday')}}</label>
                                    <input readonly  type="text" value="@isset($user->profile){{$user->profile->birthday}}@endisset" id="RePassword"
                                           class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="AboutMe">{{trans('students/students.Profile Image')}}</label>
                                    <div class="col-sm-4">
                                        <div class=" border p-1 card thumb">
                                            <a href="#" class="image-popup" title="Screenshot-2">
                                                @isset($user->profile)
                                                <img
                                                    src="{{URL::to('/') . '/Profile/' . $user->name.'/'.$user->profile->image}}" class="thumb-img"
                                                    alt="work-thumbnail">
                                                @endisset
                                            </a>
                                            <h4 class="text-center tx-14 mt-3 mb-0">{{trans('students/students.Profile Image')}}</h4>
                                            <div class="ga-border"></div>

                                        </div>
                                    </div>
                                </div>

                            </form>
                        </div>
                        <div class="tab-pane " id="roles">
                            <div class="row">
                                <div class="col-lg-12 col-md-12">
                                    <div class="card overflow-hidden">
                                        <div class="card-header pb-0">
                                            <h3 class="card-title">{{trans('students/students.roles details')}}</h3>

                                        </div>
                                        <div class="card-body">
                                            <div class="panel-group1" id="accordion11">
                                                @if (!empty($user->getRoleNames()))
                                                    @foreach ($user->roles as $one)
                                                        <div class="panel panel-default  mb-4">
                                                            <div class="panel-heading1 bg-primary ">
                                                                <h4 class="panel-title1">
                                                                    <a class="accordion-toggle collapsed" data-bs-toggle="collapse"
                                                                       data-bs-parent="#accordion11" href="#collapse{{$one->id}}"
                                                                       aria-expanded="false">{{$one->name}}<i class="fe fe-arrow-left me-2"></i></a>
                                                                </h4>
                                                            </div>
                                                            <div id="collapse{{$one->id}}" class="panel-collapse collapse" role="tabpanel"
                                                                 aria-expanded="false">
                                                                <div class="panel-body border">
                                                                    <form role="form">
                                                                        <div class="row">
                                                                            <div class="col-md-12">
                                                                                <div class="card mg-b-20">
                                                                                    <div class="card-body">
                                                                                        <div class="row">
                                                                                            <!-- col -->
                                                                                            <div class="col-lg-4">
                                                                                                <ul id="treeview{{$one->name}}">
                                                                                                            <li><a href="#">{{$one->name}}</a>
                                                                                                                <ul>
                                                                                                                    @if(!empty((new \App\Helpers\General)->getPermissionsRole($one->id)))
                                                                                                                        @foreach((new \App\Helpers\General)->getPermissionsRole($one->id) as $v)
                                                                                                                            <li>{{ $v->name }}</li>
                                                                                                                        @endforeach
                                                                                                                    @endif

                                                                                                                </ul>
                                                                                                            </li>
                                                                                                </ul>
                                                                                            </div>
                                                                                        </div>

                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>




                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                @endif


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
    <!-- row closed -->



@endsection('content')

@section('scripts')


    <!--Internal  Datepicker js -->
    <script src="{{asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js')}}"></script>

    <!-- Internal Select2 js-->
    <script src="{{asset('assets/plugins/select2/js/select2.min.js')}}"></script>

    <!--Internal Fileuploads js-->
    <script src="{{asset('assets/plugins/fileuploads/js/fileupload.js')}}"></script>
    <script src="{{asset('assets/plugins/fileuploads/js/file-upload.js')}}"></script>

    <!--Internal Fancy uploader js-->
    <script src="{{asset('assets/plugins/fancyuploder/jquery.ui.widget.js')}}"></script>
    <script src="{{asset('assets/plugins/fancyuploder/jquery.fileupload.js')}}"></script>
    <script src="{{asset('assets/plugins/fancyuploder/jquery.iframe-transport.js')}}"></script>
    <script src="{{asset('assets/plugins/fancyuploder/jquery.fancy-fileupload.js')}}"></script>
    <script src="{{asset('assets/plugins/fancyuploder/fancy-uploader.js')}}"></script>

    <!--Internal  Form-elements js-->
    <script src="{{asset('assets/js/advanced-form-elements.js')}}"></script>
    <script src="{{asset('assets/js/select2.js')}}"></script>

    <!--Internal Sumoselect js-->
    <script src="{{asset('assets/plugins/sumoselect/jquery.sumoselect.js')}}"></script>

    <!-- Internal TelephoneInput js-->
    <script src="{{asset('assets/plugins/telephoneinput/telephoneinput.js')}}"></script>
    <script src="{{asset('assets/plugins/telephoneinput/inttelephoneinput.js')}}"></script>




    <script src="{{asset('assets/js/admin-pages/homework/delete_file.js')}}"></script>
    <!--Internal  Datepicker js -->
    <script src="{{asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js')}}"></script>
    <!-- Internal Select2 js-->
    <script src="{{asset('assets/plugins/select2/js/select2.min.js')}}"></script>
    <!--Internal  Perfect-scrollbar js -->
    <script src="{{asset('assets/plugins/perfect-scrollbar/perfect-scrollbar.min-rtl.js')}}"></script>

    <!-- Internal Treeview js -->
    <script src="{{asset('assets/plugins/treeview/treeview.js')}}"></script>


@endsection

