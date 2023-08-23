@extends('user.layouts.master-page')

@section('title','تسجيل حساب جديد')

@section('style')
    <link href="{{asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">


@endsection
<style>
    .form-group select {
        text-align: right;
        border-radius: 35px !important;
        width: 100%;
        /*border: none;*/
        background: transparent;
        /*border-radius: 0;*/
        border: 1px solid #ddd;
        padding: 10px 10px 10px 20px;
        height: 60px;
    }

    .login-form .login-body {
        border: 1px solid #fff;
        padding: -68px;
        border-radius: 5px;
    }

    .login-form .login-body1 {
        padding: 25px;
    }
</style>

@section('content')

    <!-- page wrapper Start -->
    <div class="page-wrapper">


        <!-- Header  end -->
        <!-- Breadcrumb  start -->
        <section class="breadcrumb-wrap br-bg-register h-img-700">
            <div class="overlay op-6 bg-black"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="breadcrumb-title">
                            <h2>{{trans('enduser/Home/Home.Register')}}</h2>
                            <ul class="breadcrumb-menu">
                                <li><a href="{{route('site.home')}}">{{trans('enduser/Home/Home.Home')}}</a></li>
                                <li>{{trans('enduser/Home/Home.Register')}}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Breadcrumb  end -->
        <!-- Register Section start -->
        <section class="Login-wrap pt-100 pb-100">
            <div class="container">
                <div class="col-xl-6 offset-xl-3 col-lg-8 offset-lg-2 col-md-10 offset-md-1">
                    <div class="login-form m-r-4 m-r-83 w-827 m-r-176">
                        <div class="login-header bg-blue">
                            <h2 class="text-center mb-0">{{trans('enduser/Home/Home.Register')}}</h2>
                        </div>
                        <div class="login-body1 mt-2">
                            <form class="form-wrap" method="post" action="{{route('site.register.create')}}">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="name">{{trans('enduser/Home/Home.Name_Ar')}}</label>
                                            <input id="name" name="name_ar" type="text"
                                                   placeholder="{{trans('enduser/Home/Home.Name_Ar')}}" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="name">{{trans('enduser/Home/Home.Name_Er')}}</label>
                                            <input id="name" name="name_en" type="text"
                                                   placeholder="{{trans('enduser/Home/Home.Name_Er')}}" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="name">{{trans('enduser/Home/Home.Address')}}</label>
                                            <input id="name" name="address" type="text"
                                                   placeholder="{{trans('enduser/Home/Home.Name_Er')}}" required>
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="name">{{trans('enduser/Home/Home.Certificate')}}</label>
                                            <select name="certificate_id" required
                                                    class="form-control select2 select2-type">
{{--                                                <option>--}}
{{--                                                    {{trans('courses/courses.sel_diploma')}}--}}
{{--                                                </option>--}}
                                                @foreach($certificate as $one)
                                                    <option value="{{$one->id}}">
                                                        {{$one->name_ar}}
                                                    </option>
                                                @endforeach


                                            </select>

                                        </div>

                                    </div>


                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="name">{{trans('enduser/Home/Home.Email Address')}}</label>
                                            <input id="email" name="email" type="email"
                                                   placeholder="* {{trans('enduser/Home/Home.Email Address')}} "
                                                   required>
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="phone">{{trans('enduser/Home/Home.Phone Number')}}</label>
                                            <input required id="phone" name="phone" type="number" placeholder="Phone Number">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="phone">{{trans('enduser/Home/Home.Password')}}</label>
                                            <input required id="pwd_2" name="password" type="password"
                                                   placeholder="{{trans('enduser/Home/Home.Password')}}">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div type="submit" class="form-group">
                                            <button class="btn v6">{{trans('enduser/Home/Home.Register')}}</button>
                                        </div>
                                    </div>
                                    <div class="col-md-12 text-center">
                                        <p class="mb-0">{{trans('enduser/Home/Home.Already Have An Account?')}} <a
                                                class="link"
                                                href="{{route('getLogin')}}">{{trans('enduser/Home/Home.Login')}}</a>
                                        </p>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Register Section end -->

        <!-- Footer  end -->
    </div>
    <!-- Page wrapper end -->

@endsection
@section('script')
    <script src="{{asset('assets/plugins/select2/js/select2.min.js')}}"></script>


@endsection
