@extends('layouts.custom-app')

@section('styles')

@endsection

@section('class')

    <div class="error-page1 bg-light text-dark">
    @endsection

    @section('content')

        <!-- container -->
            <div class="container-fluid">

                <div class="row no-gutter row-login ">
                    <!-- The content half -->
                    <div class="col-md-6 col-lg-6 col-xl-5 bg-white row-boxx">
                        <div class="login d-flex align-items-center py-2">
                            <!-- Demo content-->

                            <div class="container p-0">

                                <div class="row">
                                    <div class="col-md-10 col-lg-10 col-xl-9 mr-center mt-200">
                                        <div class="card-sigin">
                                            <div class="card-sigin">
                                                <div class="card-sigin card-imge ">
                                                     <a href="#">
                                                        <img src="{{asset('assets/img/brand/logo-1.png')}}" class="sign-favicon-a " alt="logo">
                                                     </a><br>
                                                     </div>

                                                <div class="card-sigin">
                                                    <div class="main-signup-header">
                                                         <h2>{{trans('login/login.login')}}</h2>
                                                         <h5>{{trans('login/login.Please sign in to continue .')}}</h5>

                                                        @include('includes.alerts.errors')
                                                        @include('includes.alerts.success')
                                                        <form method="POST" action="{{route('admin.login')}}">
                                                            @csrf
                                                            <input type="hidden" id="not" name="not_t">

                                                            <div class="form-group form-right">
                                                                <label class="box-label">{{trans('login/login.login')}}</label>
                                                                <div class="box-group">
                                                                      <i class="fas fa-user"></i>
                                                                    <input class="form-control box-input" name="email" placeholder="{{trans('login/login.Enter your email')}}" type="email">
                                                                </div>
                                                                 @error('email')
                                                                <span class="text-danger">{{$message}}</span>
                                                                @enderror
                                                            </div>


                                                            <div class="form-group">
                                                                <label class="box-label">{{trans('login/login.Password')}}</label>
                                                                <div class="box-group">
                                                                <i class="fas fa-lock"></i>
                                                                <input class="form-control box-input" name="password" placeholder="{{trans('login/login.Enter your password')}}" type="password">
                                                            </div>
                                                                @error('password')
                                                                <span class="text-danger">{{$message}}</span>
                                                                @enderror
                                                            </div>

                                                            <button type="submit" class="btn btn-block btn-box" >{{trans('login/login.login')}}</button>

                                                        </form>
{{--                                                        <div class="box-signup">--}}
{{--                                                            <span> {{trans("login/login.Don't have an account?")}}</span> <a class="sign-a" href="#"> {{trans('login/login.Create an Account')}} </a>--}}
{{--                                                       </div>--}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- End -->
                            </div>
                        </div><!-- End -->
                    </div>
                </div>

            </div>
            <!-- container -->

@endsection('content')

@section('scripts')

@endsection
