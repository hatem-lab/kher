@extends('user.layouts.master-page')

@section('title','تفاصيل المدونة')

@section('style')

@endsection


@section('content')


    <!-- Breadcrumb  start -->
    <section class="breadcrumb-wrap bg-f br-bg-blog h-img-700">
        <div class="overlay op-6 bg-black"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumb-title">
                        <h2>{{trans('Blog/Blog.Blog Details')}}</h2>
                        <ul class="breadcrumb-menu">
                            <li><a href="">{{trans('Blog/Blog.Home')}} </a></li>
                            <li>{{trans('Blog/Blog.Blog Details')}}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb  end -->
    <!-- Blog Details start -->
    <div class="post-details pt-100 pb-100">
        <div class="container">
            <div class="row gx-5">

                <div class="col-xl-8 col-lg-8 order-xl-2 order-lg-1 order-md-1 order-1">
                    <div class="content-wrapper">
                        <article>
                            <div class="post-content ">
                                <div class="post-img">
                                <!-- <img  src="{{URL::to('/') . '/Blogs/' . $blog->id.'/'.$blog->image}}" alt="Image"> -->
                                    <img src="{{asset('end-user/assets/img/blog.jpg')}}" alt="Image">
                                </div>
                                <h2 class="post-subtitle">{{$blog->title}}</h2>
                                <blockquote class="wp-block-quote">
                                    <p>{{$blog->desc}}</p>
                                    <i class="ri-double-quotes-l"></i>
                                </blockquote>
                            </div>
                        </article>

                        <div id="list-comments" class="post-comment-wrap style2">
                            <h4 class="comment-title">{{trans('Blog/Blog.Comments')}} {{$blog->comments->count()}} </h4>
                            @include("user.comment",['comments'=>$blog->comments, 'blog_id'=>$blog->id])
                        </div>


                        <div class="comment-form-wrap">
                            <div class="comment-form-title style2">
                                <p>{{trans('Blog/Blog.You Have To Login Before Comment This Blog')}}*
                                </p>
                            </div>

                            @if(auth('student') -> user())

                            <div class="row gx-3">
                                <form action="{{route('comment.store')}}" method="post">
                                    @csrf
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="msg">{{trans('Blog/Blog.Enter Your Comment')}}</label>

                                            <textarea name="desc" id="desc" cols="30" rows="10"
                                                      placeholder="{{trans('Blog/Blog.Your comments...')}}"></textarea>
                                        </div>
                                        <div class="form-group">

                                            <input hidden name="blog_id" value="{{$blog->id}}" id="blog_id" cols="30"
                                                   rows="10" placeholder="{{trans('Blog/Blog.Your comments...')}}"/>
                                        </div>
                                    </div>



                                    <div class="col-lg-12">
                                        <button type="submit" id="comment"
                                                class="btn v1 d-block w-100">{{trans('Blog/Blog.Post A Comment')}}</button>
                                    </div>

                                </form>
                            </div>
                            @elseif(auth('user') -> user())
                                <div class="row gx-3">
                                    <form action="{{route('comment.userstore')}}" method="post">
                                        @csrf
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label for="msg">{{trans('Blog/Blog.Enter Your Comment')}}</label>

                                                <textarea name="desc" id="desc" cols="30" rows="10"
                                                          placeholder="{{trans('Blog/Blog.Your comments...')}}"></textarea>
                                            </div>
                                            <div class="form-group">

                                                <input hidden name="blog_id" value="{{$blog->id}}" id="blog_id" cols="30"
                                                       rows="10" placeholder="{{trans('Blog/Blog.Your comments...')}}"/>
                                            </div>
                                        </div>



                                        <div class="col-lg-12">
                                            <button type="submit" id="comment"
                                                    class="btn v1 d-block w-100">{{trans('Blog/Blog.Post A Comment')}}</button>
                                        </div>

                                    </form>
                                </div>
                            @else
                                <div class="row gx-3">
                                    <form action="{{route('comment.store')}}" method="post">
                                        @csrf
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label for="msg">{{trans('Blog/Blog.Enter Your Comment')}}</label>

                                                <textarea name="desc" id="desc" cols="30" rows="10"
                                                          placeholder="{{trans('Blog/Blog.Your comments...')}}"></textarea>
                                            </div>
                                            <div class="form-group">

                                                <input hidden name="blog_id" value="{{$blog->id}}" id="blog_id" cols="30"
                                                       rows="10" placeholder="{{trans('Blog/Blog.Your comments...')}}"/>
                                            </div>
                                        </div>



                                        <div class="col-lg-12">
                                            <button type="submit" id="comment"
                                                    class="btn v1 d-block w-100">{{trans('Blog/Blog.Post A Comment')}}</button>
                                        </div>

                                    </form>
                                </div>
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Blog Details end -->
@endsection

@section('script')

@endsection


