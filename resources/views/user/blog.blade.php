@extends('user.layouts.master-page')

@section('title','المدونات')

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
    <section class="breadcrumb-wrap  br-bg-blog h-img-700">
        <div class="overlay op-6 bg-black"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumb-title">
                        <h2>{{trans('Blog/Blog.Blogs')}}</h2>
                        <ul class="breadcrumb-menu">
                            <li><a href="{{route('site.home')}}">{{trans('Blog/Blog.Home')}}</a></li>
                            <li>{{trans('Blog/Blog.Blogs') }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb  end -->
    <!-- Blog  start -->
    <!-- Blog Section Start -->
    <div class="blog-wrap pt-100 pb-70">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title style1 text-center mb-40">

                        <h2>{{trans('enduser/Home/Home.Latest News & Blogs')}}</h2>
                    </div>
                </div>
            </div>
            <div class="row justify-content-md-evenly">
                @foreach($blogs as $blog)
                    <div class="col-xl-2 col-lg-2 col-md-4">
                        <div class="blog-card">
                            <a href="{{route('blog_details',$blog->id)}}" class="blog-img blog-im">

                                @if($blog->image != null)
                                    <img style="height:100%;width: 100%"
                                         src="{{URL::to('/') . '/Blogs/' . $blog->id.'/'.$blog->image}}" alt="Image">
                                @else
                                    <img style="height:100%;width: 100%"
                                         src="{{asset('end-user/assets/img/Crafting-the-Blog-opt-750x498.jpg')}}"
                                         alt="Image">
                                @endif
                            </a>
                            <div class="blog-info" style="padding: 3px 7px 25px">
                                <div class="blog-date">
                                    <h6>{{$blog->created_at->diffforhumans()}}</h6>
                                </div>
                                <h3><a href="{{route('blog_details',$blog->id)}}">{!!$blog->title!!}</a></h3>
                            <!-- <div class="m-b-40">
                                        <p class="float-left course-des toggler-3  btn-toggle-course">{{trans('courses/courses.Show More')}}</p>
                                        <p class="float-left toggler-4  btn-toggle-close">{{trans('enduser/Home/Home.Show Less')}}</p>
                                    </div>
                                <div class="showcourse team-member-info mt-80" style="overflow:hidden" >
                                    <p class="basic-desc ">{!!$blog->desc!!}</p>
                                </div> -->

                                <div class="blog-author-wrap">
                                    <div class="blog-author">
                                        <div class="blog-author-img">

                                            <img src="{{asset('end-user/assets/img/avatar-male.png')}}" alt="Image">
                                        </div>
                                        <div class="blog-author-name">
                                            <p>{{trans('enduser/Home/Home.By')}}<a
                                                    href="{{route('blog_details',$blog->id)}}">{{$blog->user->name}}</a>
                                            </p>
                                        </div>
                                        <a href="{{route('blog_details',$blog->id)}}" class="read-more"><i
                                                class="las la-arrow-left fs-24"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>


            <div class="page-navigation">
                <div class="row">
                    <div class="col-lg-12 ">
                        <ul class="page-nav">
                            {!! $blogs->links() !!}
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Blog Details end -->
@endsection

@section('script')


@endsection


