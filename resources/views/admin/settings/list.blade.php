@extends('layouts.app')

@section('styles')

    <!-- Interenal Accordion Css -->


    <link href="{{asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('assets/css-rtl/editors/quill/katex.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css-rtl/editors/quill/monokai-sublime.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css-rtl/editors/quill/quill.snow.css')}}">

    <!---Internal Fileupload css-->
    <link href="{{asset('assets/plugins/fileuploads/css/fileupload.css')}}" rel="stylesheet" type="text/css"/>

@endsection

@section('content')

    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto f-z-30"><a href="{{route('settings')}}"
                                                                 class="text-dark">{{trans('settings/settings.Settings')}}</a>
                </h4>
            <!-- <span
                    class="text-muted mt-1 tx-13 ms-2 mb-0">/ {{trans('settings/settings.list')}}
                </span> -->

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
                                <a href="#about" data-bs-toggle="tab" aria-expanded="true" class="active"> <span
                                        class="visible-xs"><i
                                            class="las la-user-circle tx-20 me-1"></i></span> <span
                                        class="hidden-xs">{{trans('settings/settings.about')}}</span> </a>
                            </li>
                            <li class="">
                                <a href="#contact" data-bs-toggle="tab" aria-expanded="false"> <span
                                        class="visible-xs"><i class="fas fa-address-card tx-20 me-1"></i></span>
                                    <span class="hidden-xs">{{trans('settings/settings.contact')}}</span> </a>
                            </li>

                            <li class="">
                                <a href="#images" data-bs-toggle="tab" aria-expanded="false"> <span
                                        class="visible-xs"><i class="fas fa-photo-video tx-20 me-1"></i></span>
                                    <span class="hidden-xs">{{trans('settings/settings.site_images')}}</span> </a>
                            </li>

                        </ul>
                    </div>
                    <div class="tab-content border-start border-bottom border-right border-top-0 p-4">

                        <div class="tab-pane active" id="about">
                            <div class="row row-sm">
                                <div class="col-xl-12">
                                    <div class="card">

                                        <div class="card-header pb-0">
                                            <div class="d-flex justify-content-between">
                                                <h4 class="card-title mtb f-z-30 mg-b-0">{{trans('settings/settings.about_info')}}</h4>
                                                <i class="mdi mdi-dots-horizontal text-gray"></i>
                                            </div>

                                        </div>
                                        <div class="card-body">
                                            <form action="{{route('settings.about.update')}}" method="POST"
                                                  id="about_form" enctype="multipart/form-data"
                                                  data-parsley-validate="">
                                                @csrf

                                                <div class="row row-sm mt-2">
                                                    <div class="col-12">
                                                        <div class="form-group mg-b-0">
                                                            <label
                                                                class="form-label style-title">{{trans('settings/settings.about_us')}} </label>
                                                            <input class="form-control" type="hidden" name="about_desc"
                                                                   id="about_desc">
                                                            <div id="blog-editor-wrapper">
                                                                <div id="blog-editor-container">
                                                                    <div class="editor" style="min-height: 200px">
                                                                        {!! $settings->about_desc !!}

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>


                                                <div class="row row-sm mt-2">
                                                    <div class="col-12">
                                                        <div class="form-group mg-b-0">
                                                            <label
                                                                class="form-label style-title">{{trans('settings/settings.goals')}} </label>
                                                            <input class="form-control" type="hidden" name="goals"
                                                                   id="goals">
                                                            <div id="blog-editor-wrapper">
                                                                <div id="blog-editor-container-goals">
                                                                    <div class="editor-goals" style="min-height: 200px">
                                                                        {!! $settings->goals !!}

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="row row-sm">
                                                    <div class="col-12">
                                                        <div class="form-group mg-b-0">
                                                            <label
                                                                class="form-label style-title">{{trans('settings/settings.address')}}
                                                                : </label>
                                                            <input class="form-control" name="address"
                                                                   placeholder="{{trans('settings/settings.plc_address')}}"
                                                                   value="{{$settings->address}}" type="text">
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="row row-sm">
                                                    <div class="col-12">
                                                        <div class="form-group mg-b-0">
                                                            <label
                                                                class="form-label style-title">{{trans('settings/settings.video')}}
                                                                : </label>
                                                            <input type="file" name="preview" class="form-control"
                                                                   accept="video/*">
                                                            <div class="meta-preview">
                                                                <input type="text" class="form-control"
                                                                       value="{{$settings->video}}" disabled id="file">
                                                                <div class="ml-2 col-md-8">
                                                                    <video width="100%" height="100%"
                                                                           poster="/images/w3schools_green.jpg" controls>
                                                                        <source src="{{ URL::asset($settings->video)}}"
                                                                                id="preview_video" type="video/mp4">
                                                                        <source src="{{ URL::asset($settings->video)}}"
                                                                                id="preview_video" type="video/ogg">
                                                                    </video>
                                                                </div>
                                                            </div>

                                                            <p class="fs-14">{{trans('settings/settings.preview_rest')}}</p>


                                                        </div>
                                                    </div>
                                                </div>


{{--                                                <div class="file-upload-wrap file-upload-wrap-2 file--upload-wrap">--}}
{{--                                                    <input type="file" name="preview" class="file-upload-input"--}}
{{--                                                           accept="video/*">--}}
{{--                                                    <span class="file-upload-text"><i class="la la-upload mr-2"></i>{{trans('admin/course.upload_preview')}}</span>--}}
{{--                                                    <div class="meta-preview">--}}
{{--                                                        <input type="text" class="form-control"--}}
{{--                                                               value="{{$settings->video}}" disabled id="file">--}}
{{--                                                        <div class="ml-2 col-md-8">--}}
{{--                                                            <video width="100%" height="100%"--}}
{{--                                                                   poster="/images/w3schools_green.jpg" controls>--}}
{{--                                                                <source src="{{ URL::asset($settings->video)}}"--}}
{{--                                                                        id="preview_video" type="video/mp4">--}}
{{--                                                                <source src="{{ URL::asset($settings->video)}}"--}}
{{--                                                                        id="preview_video" type="video/ogg">--}}
{{--                                                            </video>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}

{{--                                                    <p class="fs-14">{{trans('admin/course.preview_rest')}}</p>--}}

{{--                                                </div><!-- file-upload-wrap -->--}}

{{--                                                <div class="row row-sm mt-2">--}}
{{--                                                    <div class="col-lg-12 col-md-12">--}}
{{--                                                        <div class="card">--}}
{{--                                                            <div class="card-body">--}}
{{--                                                                <div>--}}
{{--                                                                    <h6 class="card-title mb-1 style-title">{{trans('settings/settings.logo')}}</h6>--}}
{{--                                                                    <p class="text-muted card-sub-title">{{trans('settings/settings.logo_res')}}</p>--}}
{{--                                                                </div>--}}
{{--                                                                <div class="row mb-4">--}}
{{--                                                                    <div class="col-sm-12 col-md-4">--}}
{{--                                                                        <input type="file" class="dropify"--}}
{{--                                                                               data-default-file="{{URL::asset($settings->logo)}}"--}}
{{--                                                                               data-height="200" name="logo"--}}
{{--                                                                               accept=".jpg, .png, image/jpeg, image/png"/>--}}
{{--                                                                    </div>--}}

{{--                                                                </div>--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}


                                                {{--                                                <div class="row row-sm mt-2">--}}
                                                {{--                                                    <div class="col-lg-12 col-md-12">--}}
                                                {{--                                                        <div class="card">--}}
                                                {{--                                                            <div class="card-body">--}}
                                                {{--                                                                <div>--}}
                                                {{--                                                                    <h6 class="card-title mb-1 style-title">{{trans('settings/settings.logo')}}</h6>--}}
                                                {{--                                                                    <p class="text-muted card-sub-title">{{trans('settings/settings.logo_res')}}</p>--}}
                                                {{--                                                                </div>--}}
                                                {{--                                                                <div class="row mb-4">--}}
                                                {{--                                                                    <div class="col-sm-12 col-md-4">--}}
                                                {{--                                                                        <input type="file" class="dropify"--}}
                                                {{--                                                                               data-default-file="{{URL::asset($settings->logo)}}"--}}
                                                {{--                                                                               data-height="200" name="logo"--}}
                                                {{--                                                                               accept=".jpg, .png, image/jpeg, image/png"/>--}}
                                                {{--                                                                    </div>--}}

                                                {{--                                                                </div>--}}
                                                {{--                                                            </div>--}}
                                                {{--                                                        </div>--}}
                                                {{--                                                    </div>--}}
                                                {{--                                                </div>--}}

                                                <div>
                                                    <div class="col-12">
                                                        <button class="btn blue-button mb-15 pd-x-20 mg-t-10"
                                                                type="submit">{{trans('general.Update')}}</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane" id="contact">


                            <div class="row row-sm">
                                <div class="col-xl-12">
                                    <div class="card">

                                        <div class="card-header pb-0">
                                            <div class="d-flex justify-content-between">
                                                <h4 class="card-title mg-b-0 mtb f-z-30">{{trans('settings/settings.contact_info')}}</h4>
                                                <i class="mdi mdi-dots-horizontal text-gray"></i>
                                            </div>

                                        </div>
                                        <div class="card-body">
                                            <form action="{{route('settings.contact.update')}}" method="POST"
                                                  id="contact_form" class="" enctype="multipart/form-data"
                                                  data-parsley-validate="">
                                                @csrf


                                                <div class="row row-sm">
                                                    <div class="col-12">
                                                        <div class="form-group mg-b-0">
                                                            <label
                                                                class="form-label">{{trans('settings/settings.whats_phone')}}
                                                                : </label>
                                                            <input class="form-control" name="whats_phone"
                                                                   value="{{$contacts->whats_phone}}"
                                                                   placeholder="+96xxxxxxxxx" type="text">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row row-sm mt-2 repeater" id="mobile_div">
                                                    <div data-repeater-list="mobiles">
                                                        <?php $m_phones = json_decode($contacts->mobile_phones); ?>
                                                        @foreach($m_phones as $phone)
                                                            <div data-repeater-item>
                                                                <div class="row d-flex align-items-end">
                                                                    <div class="col-md-4 col-12">
                                                                        <div class="mb-1">
                                                                            <label class="form-label"
                                                                                   for="itemname">{{trans('settings/settings.mobile_phone')}}</label>
                                                                            <input
                                                                                type="text"
                                                                                class="form-control"
                                                                                name="mobile_phone"
                                                                                id="itemname"
                                                                                aria-describedby="itemname"
                                                                                value="{{$phone}}"
                                                                                placeholder="+9xxxxxxxxxx"
                                                                            />
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-2 col-12 mb-50">
                                                                        <div class="mb-1">
                                                                            <button
                                                                                class="btn btn-outline-danger text-nowrap px-1"
                                                                                data-repeater-delete type="button">
                                                                                <i data-feather="x" class="me-25"></i>
                                                                                <span>{{trans('general.Delete')}}</span>
                                                                            </button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <hr/>
                                                            </div>

                                                        @endforeach

                                                        <div data-repeater-item>
                                                            <div class="row d-flex align-items-end">
                                                                <div class="col-md-4 col-12">
                                                                    <div class="mb-1">
                                                                        <label class="form-label"
                                                                               for="itemname">{{trans('settings/settings.mobile_phone')}}</label>
                                                                        <input
                                                                            type="text"
                                                                            class="form-control"
                                                                            name="mobile_phone"
                                                                            id="itemname"
                                                                            aria-describedby="itemname"
                                                                            placeholder="+9xxxxxxxxxx"
                                                                        />
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-2 col-12 mb-50">
                                                                    <div class="mb-1">
                                                                        <button
                                                                            class="btn btn-outline-danger text-nowrap px-1"
                                                                            data-repeater-delete type="button">
                                                                            <i data-feather="x" class="me-25"></i>
                                                                            <span>{{trans('general.Delete')}}</span>
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <hr/>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <button class="btn blue-button mb-15" type="button"
                                                                    data-repeater-create>
                                                                <i data-feather="plus" class="me-25"></i>
                                                                <span>{{trans('settings/settings.add_new_m_phone')}}</span>
                                                            </button>
                                                        </div>
                                                    </div>


                                                </div>

                                                <div class="row row-sm mt-2 repeater" id="land_div">
                                                    {{--                                                    <form class="mobile-repeater">--}}

                                                    <div data-repeater-list="lands" class="repeater-default-land">
                                                        <?php $l_phones = json_decode($contacts->land_phones); ?>
                                                        @foreach($l_phones as $phone)
                                                            <div data-repeater-item>
                                                                <div class="row d-flex align-items-end">
                                                                    <div class="col-md-4 col-12">
                                                                        <div class="mb-1">
                                                                            <label class="form-label"
                                                                                   for="itemname">{{trans('settings/settings.land_phone')}}</label>
                                                                            <input
                                                                                type="text"
                                                                                class="form-control"
                                                                                name="land_phone"
                                                                                id="itemname"
                                                                                aria-describedby="itemname"
                                                                                value="{{$phone}}"
                                                                                placeholder="+xxxxxxxxxx"
                                                                            />
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-2 col-12 mb-50">
                                                                        <div class="mb-1">
                                                                            <button
                                                                                class="btn btn-outline-danger text-nowrap px-1"
                                                                                data-repeater-delete type="button">
                                                                                <i data-feather="x" class="me-25"></i>
                                                                                <span>{{trans('general.Delete')}}</span>
                                                                            </button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <hr/>
                                                            </div>

                                                        @endforeach

                                                        <div data-repeater-item>
                                                            <div class="row d-flex align-items-end">
                                                                <div class="col-md-4 col-12">
                                                                    <div class="mb-1">
                                                                        <label class="form-label"
                                                                               for="itemname">{{trans('settings/settings.land_phone')}}</label>
                                                                        <input
                                                                            type="text"
                                                                            class="form-control"
                                                                            name="land_phone"
                                                                            id="itemname"
                                                                            aria-describedby="itemname"
                                                                            placeholder="+xxxxxxxxxx"
                                                                        />
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-2 col-12 mb-50">
                                                                    <div class="mb-1">
                                                                        <button
                                                                            class="btn btn-outline-danger text-nowrap px-1"
                                                                            data-repeater-delete type="button">
                                                                            <i data-feather="x" class="me-25"></i>
                                                                            <span>{{trans('general.Delete')}}</span>
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <hr/>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <button class="btn blue-button mb-15" type="button"
                                                                    data-repeater-create>
                                                                <i data-feather="plus" class="me-25"></i>
                                                                <span>{{trans('settings/settings.add_new_l_phone')}}</span>
                                                            </button>
                                                        </div>
                                                    </div>
                                                    {{--                                                    </form>--}}


                                                </div>
                                                <div class="row row-sm mt-4">
                                                    <div class="col-12">
                                                        <div class="form-group mg-b-0">
                                                            <label
                                                                class="form-label">ايميل التواصل
                                                                : </label>
                                                            <input class="form-control" name="email"
                                                                   value="{{$contacts->email}}"
                                                                   placeholder="email" type="text">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row row-sm mt-4">
                                                    <div class="col-12">
                                                        <div class="form-group mg-b-0">
                                                            <label
                                                                class="form-label">{{trans('settings/settings.whats_link')}}
                                                                : </label>
                                                            <input class="form-control" name="whats_link"
                                                                   value="{{$contacts->whats_link}}"
                                                                   placeholder="www.whatsup.com" type="text">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row row-sm mt-2">
                                                    <div class="col-12">
                                                        <div class="form-group mg-b-0">
                                                            <label
                                                                class="form-label">{{trans('settings/settings.face_link')}}
                                                                : </label>
                                                            <input class="form-control" name="facebook_link"
                                                                   value="{{$contacts->facebook_link}}"
                                                                   placeholder="www.facebook.com" type="text">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row row-sm mt-2">
                                                    <div class="col-12">
                                                        <div class="form-group mg-b-0">
                                                            <label
                                                                class="form-label">{{trans('settings/settings.insta_link')}}
                                                                : </label>
                                                            <input class="form-control" name="insta_link"
                                                                   value="{{$contacts->insta_link}}"
                                                                   placeholder="www.instagram.com" type="text">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row row-sm mt-2">
                                                    <div class="col-12">
                                                        <div class="form-group mg-b-0">
                                                            <label
                                                                class="form-label">{{trans('settings/settings.twitter_link')}}
                                                                : </label>
                                                            <input class="form-control" name="twitter_link"
                                                                   value="{{$contacts->twitter_link}}"
                                                                   placeholder="www.twitter.com" type="text">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row row-sm mt-2">
                                                    <div class="col-12">
                                                        <div class="form-group mg-b-0">
                                                            <label
                                                                class="form-label">{{trans('settings/settings.linkedin_link')}}
                                                                : </label>
                                                            <input class="form-control" name="linkedin_link"
                                                                   value="{{$contacts->linkedin_link}}"
                                                                   placeholder="www.linkedin.com" type="text">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row row-sm mt-2">
                                                    <div class="col-12">
                                                        <div class="form-group mg-b-0">
                                                            <label
                                                                class="form-label">{{trans('settings/settings.telegram_link')}}
                                                                : </label>
                                                            <input class="form-control" name="telegram_link"
                                                                   value="{{$contacts->telegram_link}}"
                                                                   placeholder="www.telegram.com" type="text">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div>
                                                    <div class="col-12">
                                                        <button class="btn blue-button mb-15 pd-x-20 mg-t-10"
                                                                type="submit">{{trans('general.Update')}}</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                            </div>


                        </div>

                        <div class="tab-pane" id="images">
                            <div class="row row-sm">
                                <div class="col-xl-12">
                                    <div class="card">

                                        <div class="card-header pb-0">
                                            <div class="d-flex justify-content-between">
                                                <h4 class="card-title mg-b-0 mtb f-z-30">{{trans('settings/settings.site_images')}}</h4>
                                                <i class="mdi mdi-dots-horizontal text-gray"></i>
                                            </div>

                                        </div>
                                        <div class="card-body">
                                            <form action="{{route('settings.images.update')}}" method="POST"
                                                  id="images_form" enctype="multipart/form-data"
                                                  data-parsley-validate="">
                                                @csrf

                                                <div class="row row-sm mt-2">
                                                    <div class="col-lg-12 col-md-12">
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <div>
                                                                    <h6 class="card-title mb-1">{{trans('settings/settings.image1')}}</h6>
                                                                </div>
                                                                <div class="row row-sm mt-2">
                                                                    <div class="col-12">
                                                                        <div class="form-group mg-b-0">
                                                                            <label
                                                                                class="form-label">{{trans('settings/settings.desc_img_1')}}
                                                                                : </label>
                                                                            <input class="form-control"
                                                                                   name="desc_img_1"
                                                                                   value="{{ $image1 ? $image1->caption :'' }}"
                                                                                   placeholder="{{trans('settings/settings.desc_img_1_plc')}}"
                                                                                   type="text">
                                                                        </div>
                                                                    </div>
                                                                </div>


                                                                <div class="row mt-2 mb-2">

                                                                    <div class="col-sm-12 col-md-4">
                                                                        <input type="file" class="dropify"
                                                                               data-default-file="{{$image1 ? URL::asset($image1->path): ''}}"
                                                                               data-height="200" name="image1"
                                                                               accept=".jpg, .png, image/jpeg, image/png"/>
                                                                    </div>

                                                                </div>
                                                                <small >{{trans('settings/settings.slider_res')}}</small>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row row-sm mt-2">
                                                    <div class="col-lg-12 col-md-12">
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <div>
                                                                    <h6 class="card-title mb-1">{{trans('settings/settings.image2')}}</h6>
                                                                </div>
                                                                <div class="row row-sm mt-2">
                                                                    <div class="col-12">
                                                                        <div class="form-group mg-b-0">
                                                                            <label
                                                                                class="form-label">{{trans('settings/settings.desc_img_2')}}
                                                                                : </label>
                                                                            <input class="form-control"
                                                                                   name="desc_img_2"
                                                                                   value="{{ $image2 ? $image2->caption :'' }}"
                                                                                   placeholder="{{trans('settings/settings.desc_img_2_plc')}}"
                                                                                   type="text">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row mt-2 mb-2">
                                                                    <div class="col-sm-12 col-md-4">
                                                                        <input type="file" class="dropify"
                                                                               data-default-file="{{$image2 ? URL::asset($image2->path): ''}}"
                                                                               data-height="200" name="image2"
                                                                               accept=".jpg, .png, image/jpeg, image/png"/>
                                                                    </div>

                                                                </div>
                                                                <small >{{trans('settings/settings.slider_res')}}</small>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="row row-sm mt-2">
                                                    <div class="col-lg-12 col-md-12">
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <div>
                                                                    <h6 class="card-title mb-1">{{trans('settings/settings.image3')}}</h6>
                                                                </div>
                                                                <div class="row row-sm mt-2">
                                                                    <div class="col-12">
                                                                        <div class="form-group mg-b-0">
                                                                            <label
                                                                                class="form-label">{{trans('settings/settings.desc_img_3')}}
                                                                                : </label>
                                                                            <input class="form-control"
                                                                                   name="desc_img_3"
                                                                                   value="{{ $image3 ? $image3->caption :'' }}"
                                                                                   placeholder="{{trans('settings/settings.desc_img_3_plc')}}"
                                                                                   type="text">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row mt-2 mb-2">
                                                                    <div class="col-sm-12 col-md-4">
                                                                        <input type="file" class="dropify"
                                                                               data-default-file="{{ $image3 ? URL::asset($image3->path) : ''}}"
                                                                               data-height="200" name="image3"
                                                                               accept=".jpg, .png, image/jpeg, image/png"/>
                                                                    </div>

                                                                </div>
                                                                <small >{{trans('settings/settings.slider_res')}}</small>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

{{--                                                <div class="row row-sm mt-2">--}}
{{--                                                    <div class="col-lg-12 col-md-12">--}}
{{--                                                        <div class="card">--}}
{{--                                                            <div class="card-body">--}}
{{--                                                                <div>--}}
{{--                                                                    <h6 class="card-title mb-1">{{trans('settings/settings.image4')}}</h6>--}}
{{--                                                                </div>--}}
{{--                                                                <div class="row row-sm mt-2">--}}
{{--                                                                    <div class="col-12">--}}
{{--                                                                        <div class="form-group mg-b-0">--}}
{{--                                                                            <label--}}
{{--                                                                                class="form-label">{{trans('settings/settings.desc_img_4')}}--}}
{{--                                                                                : </label>--}}
{{--                                                                            <input class="form-control"--}}
{{--                                                                                   name="desc_img_4"--}}
{{--                                                                                   value="{{ $image4 ? $image4->caption :'' }}"--}}
{{--                                                                                   placeholder="{{trans('settings/settings.desc_img_4_plc')}}"--}}
{{--                                                                                   type="text">--}}
{{--                                                                        </div>--}}
{{--                                                                    </div>--}}
{{--                                                                </div>--}}
{{--                                                                <div class="row mt-2 mb-2">--}}
{{--                                                                    <div class="col-sm-12 col-md-4">--}}
{{--                                                                        <input type="file" class="dropify"--}}
{{--                                                                               data-default-file="{{$image4 ? URL::asset($image4->path) : ''}}"--}}
{{--                                                                               data-height="200" name="image4"--}}
{{--                                                                               accept=".jpg, .png, image/jpeg, image/png"/>--}}
{{--                                                                    </div>--}}

{{--                                                                </div>--}}
{{--                                                                <small >{{trans('settings/settings.slider_res')}}</small>--}}

                                                {{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
                                                <div>
                                                    <div class="col-12">
                                                        <button class="btn blue-button mb-15 pd-x-20 mg-t-10"
                                                                type="submit">{{trans('general.Update')}}</button>
                                                    </div>
                                                </div>
                                            </form>
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
    <script src="{{asset('assets/plugins/select2/js/select2.min.js')}}"></script>

    <script src="{{asset('assets/js/editors/quill/katex.min.js')}}"></script>
    <script src="{{asset('assets/js/editors/quill/highlight.min.js')}}"></script>
    <script src="{{asset('assets/js/editors/quill/quill.min.js')}}"></script>

    <!--Internal  Parsley.min js -->
    <script src="{{asset('assets/plugins/parsleyjs/parsley.min.js')}}"></script>

    <!--Internal  Perfect-scrollbar js -->
    <script src="{{asset('assets/plugins/perfect-scrollbar/perfect-scrollbar.min-rtl.js')}}"></script>

    <!-- Internal Form-validation js -->
    {{--    <script src="{{asset('assets/js/form-validation.js')}}"></script>--}}
    <!--Internal Fileuploads js-->
    <script src="{{asset('assets/plugins/fileuploads/js/fileupload.js')}}"></script>
    <script src="{{asset('assets/plugins/fileuploads/js/file-upload.js')}}"></script>



    <script src="{{asset('assets/js/repeater/jquery.repeater.min.js') }}"></script>

    {{--    <script src="{{ asset(mix('js/scripts/forms/form-repeater.js')) }}"></script>--}}


    <script src="{{asset('assets/js/form-elements.js')}}"></script>

    <script src="{{asset('assets/js/admin-pages/settings/settings.js')}}"></script>

@endsection

