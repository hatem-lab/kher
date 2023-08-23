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
            <h4 class="content-title mb-0 my-auto f-z-30"> <a href="{{route('blogs.index')}}" class="text-dark">{{trans('Blog/Blog.Blogs')}}</a></h4>
                <span class="text-muted mt-1 tx-13 ms-2 mb-0"> / <a href="{{route('blogs.records')}}">{{trans('Blog/Blog.order create blog')}}</a></span>
            </div>
        </div>

    </div>

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
                                     لا يوجد طلبات انشاء مدونات بعد.
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
                            <img alt="" class="rounded-circle avatar avatar-md" src="{{$one->user->profile ? URL::to('/') . '/Profile/' . $one->user ->name.'/'.$one->user -> profile->image : URL::to('/') . '/assets/img/faces/default.jpg'}} ">


                        </div>
                        <div class="dropdown-menu tx-13">
                            <div class="main-header-profile">
                                <div class="tx-16 h5 mg-b-0">{{$one->user->name}}</div>

                            </div>

                            <a class="dropdown-item" href="{{route('user.show',$one->user->id)}}">{{trans('Blog/Blog.view')}}</a>
                        </div>

                        <a style="margin-top: 14px;margin-right: 12px" class="drop-down-profile" >{{$one->user->name}}


                        </a>

                        <span style="margin-right: -59px;margin-top: 40px" class="tx-12 text-muted">{{$one->created_at->diffforhumans()}}</span><span
                            class="badge bg-primary-transparent text-primary ms-auto float-end"></span>


                        <div class="ms-auto">
                            <div class="">

                                <a class="p-2 text-muted" data-bs-toggle="dropdown"><i
                                        class="fas fa-ellipsis-v"></i></a>
                                <div class="dropdown-menu tx-13 dropleft">

                                    <a   class=" dropdown-item modal-effect btn btn-sm btn-danger" data-effect="effect-scale"
                                       data-id="{{ $one->id }}"
                                       data-bs-toggle="modal" href="#accept-sub"
                                       title="قبول"><span style="color: red">{{trans('Blog/Blog.Accept')}}</span></a>

                                    <a   class=" dropdown-item modal-effect btn btn-sm btn-danger" data-effect="effect-scale"
                                         data-id="{{ $one->id }}"
                                         data-bs-toggle="modal" href="#reject-sub"
                                         title="رفض"><span style="color: red">{{trans('Blog/Blog.Refusal')}}</span></a>

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

            </div>

        </div>
        <div class="col-xl-4 col-md-2">

        </div>

    </div>
    @endforeach
    <div class="modal" id="accept-sub">
        <div class="modal-dialog" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6 class="modal-title">{{trans('general.Accept')}}</h6>
                    <button aria-label="Close" class="close"
                            data-bs-dismiss="modal" type="button"><span
                            aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <div class="modal-body">
                        <p>{{trans('general.accept_warning')}} </p><br>

                    </div>
                    <div class="modal-footer">
                        <button class="btn ripple btn-danger" id="accept_btn"
                                type="submit">{{trans('general.Accept')}}</button>
                        <button class="btn ripple btn-secondary" data-bs-dismiss="modal"
                                type="button">{{trans('general.Cancel')}}</button>
                    </div>

                </div>

            </div>
        </div>
    </div>

    <div class="modal" id="reject-sub">
        <div class="modal-dialog" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6 class="modal-title">رفض المدونة</h6>
                    <button aria-label="Close" class="close"
                            data-bs-dismiss="modal" type="button"><span
                            aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <div class="modal-body">
                        <p>هل تريد رفض هذه المدونة</p><br>

                    </div>
                    <div class="modal-footer">
                        <button class="btn ripple btn-danger" id="reject_btn"
                                type="submit">رفض</button>
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
