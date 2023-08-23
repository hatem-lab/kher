@extends('user.layouts.master-page')

@section('title','تواصل معنا ')
@section('style')
    <link href="{{asset('end-user/assets/css/contact_us.css')}}" rel="stylesheet">
@endsection

@section('content')
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 text-center mb-5">
                </div>
            </div>
            <div class="row justify-content-center m-t-80">
                <div class="col-md-10">
                    <div class="wrapper">
                        <div class="row no-gutters">
                            <div class="col-md-12 col-lg-6">
                                <div class="contact-wrap w-100 p-lg-5 p-4">
                                    <h3 class="mb-4">{{trans('enduser/Home/Home.Send us a message')}}</h3>
                                    <div id="form-message-warning" class="mb-4"></div>
                                    <form method="POST" action="{{route('send_email')}}"  name="contactForm" class="contactForm">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="name"
                                                           class="text-white f-r fs-20">{{trans('enduser/Home/Home.name')}}
                                                        :</label>
                                                    <input type="text" class="form-control" name="name" id="name"
                                                           placeholder="{{trans('enduser/Home/Home.name')}}">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="name"
                                                           class="text-white f-r fs-20">{{trans('enduser/Home/Home.email')}}
                                                        :</label>
                                                    <input required type="email" class="form-control" name="email" id="email"
                                                           placeholder="{{trans('enduser/Home/Home.email')}}">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="name"
                                                           class="text-white f-r fs-20">{{trans('enduser/Home/Home.Subject')}}
                                                        :</label>
                                                    <input type="text" class="form-control" name="subject" id="subject"
                                                           placeholder="{{trans('enduser/Home/Home.Subject')}}">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="name"
                                                           class="text-white f-r fs-20">{{trans('enduser/Home/Home.message')}}
                                                        :</label>
                                                    <textarea name="message" class="form-control" id="message" cols="30"
                                                              rows="6"
                                                              placeholder="{{trans('enduser/Home/Home.message')}}"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <button type="submit"
                                                            class="btn btn-primary">{{trans('enduser/Home/Home.Send Message')}}</button>
{{--                                                    <div class="submitting"></div>--}}
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-6 d-flex align-items-stretch ">
                                <div class="info-wrap w-100 p-lg-5 p-4 img diss-none">
                                    <h3 class="">{{trans('enduser/Home/Home.contact information')}}</h3>
                                    <p class="mb-4 title-contact">{{trans('enduser/Home/Home.contact info')}}</p>
                                    <div class="dbox w-100 d-flex align-items-start">
                                        <div class="icon d-flex align-items-center justify-content-center">
                                            <i class="i-color ri-facebook-fill"></i>
                                        </div>
                                        <div class="m-r-20 m-t-6 pl-3">
                                            <p><span>facebook : </span> {{$contact->facebook_link}}</p>
                                        </div>
                                    </div>
                                    @foreach ( json_decode($contact->mobile_phones) as $phone )
                                        <div class="dbox w-100 d-flex align-items-center">
                                            <div class="icon d-flex align-items-center justify-content-center">
                                                <i class="i-color  fa fa-phone"></i>
                                            </div>
                                            <div class="m-r-20 m-t-6 pl-3">
                                                <p><span>Phone:</span> <a href="tel://1234567920">{{$phone}}</a></p>

                                            </div>

                                        </div>
                                    @endforeach
                                    <div class="dbox w-100 d-flex align-items-center">
                                        <div class="icon d-flex align-items-center justify-content-center">
                                            <i class="fa fa-envelope i-color"></i>
                                        </div>
                                        <div class="m-r-20 m-t-6 pl-3">
                                            <p><span>Email:</span> <a
                                                    href="mailto:info@yoursite.com">{{$contact->email}}</a></p>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
