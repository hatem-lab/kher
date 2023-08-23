@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="{{asset('assets/css-rtl/editors/quill/katex.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css-rtl/editors/quill/monokai-sublime.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css-rtl/editors/quill/quill.snow.css')}}">

    <!-- Internal Select2 css -->
    <link href="{{asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">

    <!--Internal  Datetimepicker-slider css -->
    <link href="{{asset('assets/plugins/amazeui-datetimepicker/css/amazeui.datetimepicker.css')}}" rel="stylesheet">
    <link href="{{asset('assets/plugins/jquery-simple-datetimepicker/jquery.simple-dtpicker.css')}}" rel="stylesheet">
    <link href="{{asset('assets/plugins/pickerjs/picker.min.css')}}" rel="stylesheet">
    <!--Internal Sumoselect css-->
    <link rel="stylesheet" href="{{asset('assets/plugins/sumoselect/sumoselect-rtl.css')}}">

    <!-- Internal Spectrum-colorpicker css -->
    <link href="{{asset('assets/plugins/spectrum-colorpicker/spectrum.css')}}" rel="stylesheet">
    <!---Internal Fileupload css-->
    <link href="{{asset('assets/plugins/fileuploads/css/fileupload.css')}}" rel="stylesheet" type="text/css"/>

    <!---Internal Fancy uploader css-->
    <link href="{{asset('assets/plugins/fancyuploder/fancy_fileupload.css')}}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/plugins/notify/css/notifIt.css') }}" rel="stylesheet" />

@endsection

@section('content')

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

				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">{{trans('Profile/profile.User')}}</h4><span
								class="text-muted mt-1 tx-13 ms-2 mb-0">/ {{trans('Profile/profile.Profile')}} </span>
						</div>
					</div>
				</div>
				<!-- breadcrumb -->


				<!-- row -->
				<div class="row row-sm">
					<div class="col-lg-4">
						<div class="card mg-b-20">
							<div class="card-body">
								<div class="ps-0">
									<div class="main-profile-overview">
										<div class="main-img-user profile-user">
											<img alt="" src="{{auth('admin') -> user() -> profile ? URL::to('/') . '/Profile/' . auth('admin') -> user() ->name.'/'.auth('admin') -> user() -> profile->image : URL::to('/') . '/Profile/' .'default.jpg'}} ">

                                            <a
												class="fas fa-camera profile-edit" href="JavaScript:void(0);"></a>

										</div>
										<div class="d-flex justify-content-between mg-b-20">
											<div>
												<h5 class="main-profile-name">{{auth('admin') -> user() -> name}}</h5>
												<p class="main-profile-name-text">{{App\Helpers\General::roleUser(auth('admin') -> user() -> role) }}</p>
											</div>
										</div>

										<hr class="mg-y-30">
                                        <div class="card mg-b-20">
                                            <div class="card-body">

                                                <div class="main-profile-contact-list">
                                                    <div class="media">
                                                        <div class="media-icon bg-primary-transparent text-primary">
                                                        </div>
                                                        <div class="media-body">
                                                            <span>{{trans('Profile/profile.Bithday')}}</span>
                                                            <div>
                                                                @isset($user->profile)
                                                                {{$user->profile->birthday}}
                                                                @endisset
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="media">
                                                        <div class="media-icon bg-primary-transparent text-primary">
                                                        </div>
                                                        <div class="media-body">
                                                            <span>{{trans('Profile/profile.Role')}}</span>
                                                            <div>
                                                                {{App\Helpers\General::roleUser(auth('admin') -> user() -> role) }}
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div><!-- main-profile-contact-list -->
                                            </div>
                                        </div>
										<hr class="mg-y-30">
                                        <div class="card mg-b-20">
                                            <div class="card-body">
                                                <div class="main-content-label tx-13 mg-b-25">
                                                    Contact
                                                </div>
                                                <div class="main-profile-contact-list">
                                                    <div class="media">
                                                        <div class="media-icon bg-primary-transparent text-primary">
                                                            <i class="icon ion-md-phone-portrait"></i>
                                                        </div>
                                                        <div class="media-body">
                                                            <span>{{trans('Profile/profile.Mobile')}}</span>
                                                            <div>
                                                                @isset($user->profile)
                                                               {{$user->profile->phone}}
                                                                @endisset
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="media">
                                                        <div class="media-icon bg-info-transparent text-info">
                                                            <i class="icon ion-md-locate"></i>
                                                        </div>
                                                        <div class="media-body">
                                                            <span>{{trans('Profile/profile.Current Address')}}</span>
                                                            <div>
                                                                @isset($user->profile)
                                                                {{$user->profile->address}}
                                                                @endisset
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div><!-- main-profile-contact-list -->
                                            </div>
                                        </div>
										<!--skill bar-->
									</div><!-- main-profile-overview -->
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-8">

                        <!-- Col -->
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="mb-4 main-content-label">{{trans('Profile/profile.Personal Information')}}</div>
                                    <form action="{{route('profile.update',$user->id)}}" method="POST" class="form-horizontal"
                                          enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group ">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <label class="form-label">{{trans('Profile/profile.User Name')}}</label>
                                                </div>
                                                <div class="col-md-9">
                                                    <input type="text" name="name" class="form-control"  placeholder="{{trans('Profile/profile.User Name')}}" value="{{$user->name}}">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group ">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <label class="form-label">{{trans('Profile/profile.password')}}</label>
                                                </div>
                                                <div class="col-md-9">
                                                    <input type="text" name="password" class="form-control"  placeholder="{{trans('Profile/profile.password')}}" value="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group ">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <label class="form-label">{{trans('Profile/profile.comfirm password')}}</label>
                                                </div>
                                                <div class="col-md-9">
                                                    <input type="text" name="confirm_password" class="form-control"   placeholder="{{trans('Profile/profile.comfirm password')}}" value="">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="mb-4 main-content-label">{{trans('Profile/profile.Contact Info')}}</div>
                                        <div class="form-group ">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <label class="form-label">{{trans('Profile/profile.Email')}}</label>
                                                </div>
                                                <div class="col-md-9">
                                                    <input type="text" name="email" class="form-control"  placeholder="{{trans('Profile/profile.Email')}}" value="{{$user->email}}">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group ">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <label class="form-label">{{trans('Profile/profile.phone number')}}</label>
                                                </div>
                                                <div class="col-md-9">
                                                    <input type="text" name="phone" class="form-control"  placeholder="{{trans('Profile/profile.phone number')}}" value="@isset($user->profile){{$user->profile->phone}}@endisset">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group ">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <label class="form-label">{{trans('Profile/profile.Address')}}</label>
                                                </div>
                                                <div class="col-md-9">
                                                    <textarea class="form-control" name="address" rows="2"  placeholder="{{trans('Profile/profile.Address')}}">@isset($user->profile){{$user->profile->address}}@endisset</textarea>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="mb-4 main-content-label">{{trans('Profile/profile.About Yourself')}}</div>
                                        <div class="form-group ">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <label class="form-label">{{trans('Profile/profile.Birthday Info')}}</label>
                                                </div>
                                                <div class="col-md-9">
                                                    <input   class="end_date form-control date-input" id="datetimepicker1" name="birthday" type="text" value="{{now()}}">

                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <label class="form-label">{{trans('Profile/profile.Image Info')}}</label>
                                                </div>
                                                <div class="col-md-9">
                                                    <input type="file" name="file" id="file" class="dropify" data-height="200" /></div>

                                                </div>
                                            </div>


                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn blue-button waves-effect waves-light">{{trans('Profile/profile.Update Profile')}}</button>
                                </div>
                                    </form>
                                </div>

                            </div>
                        </div>
					</div>
				</div>
				<!-- row closed -->

@endsection('content')

@section('scripts')

    <script src="{{asset('assets/js/editors/quill/katex.min.js')}}"></script>
    <script src="{{asset('assets/js/editors/quill/highlight.min.js')}}"></script>
    <script src="{{asset('assets/js/editors/quill/quill.min.js')}}"></script>
    <!--Internal  Datepicker js -->
    <script src="{{asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js')}}"></script>
    <!--Internal  spectrum-colorpicker js -->
    <script src="{{asset('assets/plugins/spectrum-colorpicker/spectrum.js')}}"></script>

    <!--Internal  jquery-simple-datetimepicker js -->
    <script src="{{asset('assets/plugins/amazeui-datetimepicker/js/amazeui.datetimepicker.min.js')}}"></script>

    <!--Internal  pickerjs js -->
    <script src="{{asset('assets/plugins/pickerjs/picker.min.js')}}"></script>

    <!-- Ionicons js -->
    <script src="{{asset('assets/plugins/jquery-simple-datetimepicker/jquery.simple-dtpicker.js')}}"></script>

    <script src="{{asset('assets/js/admin-pages/lectures/add.js')}}"></script>

    <!--Internal Fileuploads js-->
    <script src="{{asset('assets/plugins/fileuploads/js/fileupload.js')}}"></script>
    <script src="{{asset('assets/plugins/fileuploads/js/file-upload.js')}}"></script>

    <!--Internal Fancy uploader js-->
    <script src="{{asset('assets/plugins/fancyuploder/jquery.ui.widget.js')}}"></script>
    <script src="{{asset('assets/plugins/fancyuploder/jquery.fileupload.js')}}"></script>
    <script src="{{asset('assets/plugins/fancyuploder/jquery.iframe-transport.js')}}"></script>
    <script src="{{asset('assets/plugins/fancyuploder/jquery.fancy-fileupload.js')}}"></script>
    <script src="{{asset('assets/plugins/fancyuploder/fancy-uploader.js')}}"></script>
    <script src="{{ URL::asset('assets/plugins/notify/js/notifIt.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/notify/js/notifit-custom.js') }}"></script>

@endsection
