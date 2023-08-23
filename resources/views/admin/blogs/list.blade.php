@extends('layouts.app')

@section('styles')
    <!-- Interenal Accordion Css -->
    <link href="{{asset('assets/plugins/accordion/accordion.css')}}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/plugins/notify/css/notifIt.css') }}" rel="stylesheet" />
@endsection

@section('content')

    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto f-z-30"> <a href="{{route('blogs.index')}}">{{trans('Blog/Blog.Blogs')}}</a></h4>
                <span class="text-muted mt-1 tx-13 ms-2 mb-0">/ {{trans('Blog/Blog.Blog')}}</span>
            </div>
        </div>

    </div>

    @if (session()->has('edit'))
        <script>
            window.onload = function() {
                notif({
                    msg: " Blog information has updated successfully",
                    type: "success"
                });
            }

        </script>
    @endif

    @if (session()->has('success'))
        <script>
            window.onload = function() {
                notif({
                    msg: "Blog has uploded to admin to approve it",
                    type: "success"
                });
            }

        </script>
    @endif

    @if($blogs->isEmpty())
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="card" id="basic-alert">
                    <div class="card-body">
                        <div class="text-wrap">
                            <div class="example">
                                <div class="alert alert-success" role="alert">
                                    <button aria-label="Close" class="close" data-bs-dismiss="alert"
                                            type="button" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    لا يوجد مدونات بعد.
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    @endif
    @foreach($blogs as $one)
    <div id="row-{{$one->id}}" class="row">

        <div class="col-xl-2 col-md-2">

        </div>
        <div class="col-xl-8 col-md-8">
            <div class="card custom-card">

                <div class="card-body">
                    <div class="todo-widget-header d-flex pb-2 pd-20">
                        <div class="drop-down-profile" data-bs-toggle="dropdown">
                            @if($one->user -> profile->image)
                            <img alt="" class="rounded-circle avatar avatar-md " src="{{URL::to('/') . '/Profile/' . $one->user ->name.'/'.$one->user -> profile->image}}">
                            @else
                                <img alt="" class="rounded-circle avatar avatar-md " src="{{URL::to('/') . '/assets/img/faces/default.jpg'}}">


                                @endif
                        </div>
                        <div class="dropdown-menu tx-13">
                            <div class="main-header-profile">
                                <div class="tx-16 h5 mg-b-0">{{$one->user->name}}</div>

                            </div>

                            <a class="dropdown-item " href="{{route('user.show',$one->user->id)}}">{{trans('Blog/Blog.view')}}</a>
                        </div>

                        <a style="margin-top: 14px;margin-right: 12px" class="drop-down-profile" >{{$one->user->name}}</a>

                        <span style="margin-right: -59px;margin-top: 40px" class="tx-12 text-muted">{{$one->created_at->diffforhumans()}}</span><span
                            class="badge bg-primary-transparent text-primary ms-auto float-end"></span>


                        <div class="ms-auto">
                            <div class="">

                                <a class="p-2 text-muted" data-bs-toggle="dropdown"><i
                                        class="fas fa-ellipsis-v"></i></a>
                                <div class="dropdown-menu tx-13 dropleft">

{{--                                    TODO--}}
                                    <a class="dropdown-item  btn btn-sm btn-danger"
                                       href="{{route('blog.edit',$one->id)}}"
                                       title="Edit"><span style="color: blue">{{trans('Blog/Blog.Edit')}}</span></a>
                                    <a class=" dropdown-item modal-effect btn btn-sm btn-danger" data-effect="effect-scale"
                                       data-id="{{ $one->id }}"
                                       data-bs-toggle="modal" href="#delete-sub"
                                       title="{{trans('general.Delete')}}"><span style="color: orangered">{{trans('Blog/Blog.Delete')}}</span></a>
                                    <a   class=" dropdown-item modal-effect btn btn-sm btn-danger" data-effect="effect-scale"
                                       data-id="{{ $one->id }}"
                                       data-bs-toggle="modal" href="#block-sub"
                                       title="Block"><span id="block-{{$one->id}}" style="color: red">
                                            @if($one->status ==2)
                                                 الغاء الحجب
                                            @else
                                                حجب
                                            @endif
                                        </span></a>

                                </div>
                            </div>
                        </div>
                    </div>

                    @if($one->image !=null)
                    <img class="card-img-top w-100 bg-danger-transparent" src="{{URL::to('/') . '/Blogs/' . $one->id.'/'.$one->image}}" alt="">
                    @endif
                    <hr>
                    <h4 class="card-title">{{$one->title}}</h4>
                    <a href="javascript:" class="dropdown-item" data-bs-toggle="modal"
                       data-bs-target="#info-sub" data-desc="{{$one->desc}}"
                       data-title="{{$one->title}}"
                    >
                        {!! substr($one->desc,0,25) !!}
                        <span style="color: blue">
                            {{trans('lectures/lectures.read_more')}}...
                        </span>
                    </a>
                </div>
                <hr>
                <div class="card-body">
                    <div class="panel-group1" id="accordion11">

                            <div class="panel panel-default  mb-4">
                                <div class="panel-heading1 blue-button">
                                    <h4 class="panel-title1">
                                        <a class="accordion-toggle collapsed" data-bs-toggle="collapse"
                                           data-bs-parent="#accordion11" href="#collapse{{$one->id}}"
                                           aria-expanded="false">{{trans('Blog/Blog.Comments')}}<i class="fe fe-arrow-left me-2"></i></a>
                                    </h4>
                                </div>
                                <div id="collapse{{$one->id}}" class="panel-collapse collapse" role="tabpanel"
                                     aria-expanded="false">
                                    <div class="panel-body border">
                                        @foreach($one->comments as $comment)
                                            <div id="row-comment-{{$comment->id}}" class="card-body p-4">
                                                @if($comment->parent_id ==null)
                                                <div class="d-flex flex-start">
                                                    @if($comment->user ===null)
                                                        @if($comment->student->profile->image===null)

                                                            <img
                                                                class="rounded-circle shadow-1-strong me-3"
                                                                src="{{URL::to('/') . '/assets/img/faces/default.jpg'}}"
                                                                alt="avatar"
                                                                width="60"
                                                                height="60"
                                                            />
                                                        @else
                                                            <img
                                                        class="rounded-circle shadow-1-strong me-3"
                                                        src="{{URL::to('/') . '/Profile/Students/' .$comment->student->profile->image}}"
                                                        alt="avatar"
                                                        width="60"
                                                        height="60"
                                                            />
                                                        @endif

                                                            @else
                                                        @if($comment->user->profile->image===null)
                                                             <img
                                                                 class="rounded-circle shadow-1-strong me-3"
                                                                 src="{{URL::to('/') . '/assets/img/faces/default.jpg'}}"
                                                                 alt="avatar"
                                                                 width="60"
                                                                 height="60"
                                                             />
                                                                @else
                                                             <img
                                                            class="rounded-circle shadow-1-strong me-3"
                                                            src="{{URL::to('/') . '/Profile/' . $comment->user->name.'/'.$comment->user->profile->image}}"

                                                            alt="avatar"
                                                            width="60"
                                                            height="60"
                                                             />
                                                                @endif
                                                            @endif

                                                    <div>
                                                        <h6 class="fw-bold mb-1">@if($comment->student_id===null){{$comment->user->name}} @else{{$comment->student->getTranslatedName()}} @endif </h6>
                                                        <div class="d-flex align-items-center mb-3">
                                                            <p class="mb-0">
                                                               {{$comment->created_at->diffforhumans()}}

                                                            </p>
                                                            <a style="margin-right: 484px" class="modal-effect btn btn-sm btn-danger" data-effect="effect-scale"
                                                               data-id="{{ $comment->id }}"
                                                               data-bs-toggle="modal" href="#comment-sub"
                                                               title="{{trans('general.Delete')}}"><i
                                                                    class="las la-trash"></i></a>
                                                        </div>
                                                        <p class="mb-0">
                                                            {{$comment->desc}}
                                                        </p>
                                                    </div>
                                                </div>
                                                @endif
                                                  <br>
                                                    @foreach($comment->replies as $reply)
                                                        <div id="row-comment-{{$reply->id}}" class="card-body p-4">
                                                <div style="margin-right: 50px" class="d-flex flex-start">
                                                    @if($reply->user ===null)
                                                        @if($reply->student->profile->image===null)

                                                            <img
                                                                class="rounded-circle shadow-1-strong me-3"
                                                                src="{{URL::to('/') . '/assets/img/faces/default.jpg'}}"
                                                                alt="avatar"
                                                                width="60"
                                                                height="60"
                                                            />
                                                        @else
                                                            <img
                                                                class="rounded-circle shadow-1-strong me-3"
                                                                src="{{URL::to('/') . '/Profile/Students/' .$reply->student->profile->image}}"

                                                                alt="avatar"
                                                                width="60"
                                                                height="60"
                                                            />
                                                        @endif

                                                    @else
                                                        @if($reply->user->profile->image===null)
                                                            <img
                                                                class="rounded-circle shadow-1-strong me-3"
                                                                src="{{URL::to('/') . '/assets/img/faces/default.jpg'}}"
                                                                alt="avatar"
                                                                width="60"
                                                                height="60"
                                                            />
                                                        @else
                                                            <img
                                                                class="rounded-circle shadow-1-strong me-3"
                                                                src="{{URL::to('/') . '/Profile/' . $reply->user->name.'/'.$reply->user->profile->image}}"
                                                                alt="avatar"
                                                                width="60"
                                                                height="60"
                                                            />
                                                        @endif
                                                    @endif

                                                    <div>
                                                        <h6 class="fw-bold mb-1">@if($reply->student_id===null){{$reply->user->name}} @else{{$reply->student->getTranslatedName()}} @endif </h6>
                                                        <div class="d-flex align-items-center mb-3">
                                                            <p class="mb-0">
                                                                {{$reply->created_at->diffforhumans()}}

                                                            </p>
                                                            <a style="margin-right: 450px" class="modal-effect btn btn-sm btn-danger" data-effect="effect-scale"
                                                               data-id="{{ $reply->id }}"
                                                               data-bs-toggle="modal" href="#comment-sub"
                                                               title="{{trans('general.Delete')}}"><i
                                                                    class="las la-trash"></i></a>
                                                        </div>
                                                        <p class="mb-0">
                                                            {{$reply->desc}}
                                                        </p>
                                                    </div>
                                                </div>
                                                        </div>
                                                    @endforeach

                                            </div>

                                            <hr class="my-0" />
                                        @endforeach
                                    </div>
                                </div>
                            </div>

                    </div>
                </div>
            </div>

        </div>
        <div class="col-xl-4 col-md-2">

        </div>

    </div>

    <div class="modal" id="block-sub">
        <div class="modal-dialog" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6 id="" class="modal-title">
                        عملية الحجب أو الغاء الحجب
                    </h6>
                    <button aria-label="Close" class="close"
                            data-bs-dismiss="modal" type="button"><span
                            aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <div class="modal-body">
                        <p id="">
                            هل انت متأكد من هذه العملية ؟
                            </p>
                        <br>
                    </div>
                    <div class="modal-footer">
                        <button class="btn ripple btn-danger" id="block_btn"
                                type="submit">
                            <span id="">
                               نعم
                            </span>
                        </button>
                        <button class="btn ripple btn-secondary" data-bs-dismiss="modal"
                                type="button">{{trans('general.Cancel')}}</button>
                    </div>

                </div>

            </div>
        </div>
    </div>

    @endforeach
    <div class="modal" id="delete-sub">
        <div class="modal-dialog" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6 class="modal-title">{{trans('general.Delete')}}</h6>
                    <button aria-label="Close" class="close"
                            data-bs-dismiss="modal" type="button"><span
                            aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <div class="modal-body">
                        <p>{{trans('general.delete_warning')}} </p><br>

                    </div>
                    <div class="modal-footer">
                        <button class="btn ripple btn-danger" id="delete_btn"
                                type="submit">{{trans('general.Delete')}}</button>
                        <button class="btn ripple btn-secondary" data-bs-dismiss="modal"
                                type="button">{{trans('general.Cancel')}}</button>
                    </div>

                </div>

            </div>
        </div>
    </div>



    <div class="modal" id="comment-sub">
        <div class="modal-dialog" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6 class="modal-title">{{trans('general.Delete')}}</h6>
                    <button aria-label="Close" class="close"
                            data-bs-dismiss="modal" type="button"><span
                            aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <div class="modal-body">
                        <p>{{trans('general.delete_warning')}} </p><br>

                    </div>
                    <div class="modal-footer">
                        <button class="btn ripple btn-danger" id="comment_btn"
                                type="submit">{{trans('general.Delete')}}</button>
                        <button class="btn ripple btn-secondary" data-bs-dismiss="modal"
                                type="button">{{trans('general.Cancel')}}</button>
                    </div>

                </div>

            </div>
        </div>
    </div>

    <div class="shown-event-ex">
        <div
            class="modal fade text-start"
            id="info-sub"
            tabindex="-1"
            aria-labelledby="myModalLabel22"
            aria-hidden="true"
        >
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">

                        <h4 class="modal-title"
                            id="myModalLabel22">{{trans('lectures/lectures.desc_for')}}<span
                                id="d-title"></span></h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        {{--                        <span class="la la-exclamation-circle fs-60 text-warning"></span>--}}
                        <h4 class="modal-title fs-19 font-weight-semi-bold pt-2 pb-1"
                            id="d-desc"></h4>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary"
                                data-bs-dismiss="modal">{{trans('general.Cancel')}}</button>
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection('content')

@section('scripts')

    <!-- Internal Select2 js-->
    <script src="{{asset('assets/plugins/select2/js/select2.min.js')}}"></script>
    <script src="{{asset('assets/js/admin-pages/blog/list.js')}}"></script>
    <script src="{{ URL::asset('assets/plugins/notify/js/notifIt.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/notify/js/notifit-custom.js') }}"></script>



@endsection
