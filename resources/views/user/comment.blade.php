@foreach($comments as $item)

    @if($item->parent_id ==null)
        <div class="comment-item">
            <div class="comment-author_img">
                @if($item -> user)

                    <img src="{{asset('end-user/assets/img/avatar-male.png')}}" alt="Image">


                @else

                    <img src="{{asset('end-user/assets/img/avatar-male.png')}}" alt="Image">

                @endif
            </div>
            <div class="comment-author_text">
                <div class="comment-author_info">
                    <h6>
                        @if($item -> user)
                            {{$item -> user -> name}}
                        @else
                            {{$item -> student -> name_ar}}
                        @endif
                    </h6>
                    <p>{{$item->created_at->diffforhumans()}}</p>
                </div>
                <p>{{$item -> desc}}</p>
                @if(auth('student')->user())
                    <form action="{{route('reply.store')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <input type="text" class="form-control" name="desc">
                        <input type="hidden" class="form-control" name="blog_id" value="{{$blog_id}}">
                        <input type="hidden" class="form-control" name="parent_id" value="{{$item->id}}">
                    </div>
                    <button class="btn bg-color1 text-white btn-sm" type="submit">{{trans('Blog/Blog.Reply')}}</button>
                </form>
                @elseif(auth('user')->user())
                    <form action="{{route('reply.userstore')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <input type="text" class="form-control" name="desc">
                            <input type="hidden" class="form-control" name="blog_id" value="{{$blog_id}}">
                            <input type="hidden" class="form-control" name="parent_id" value="{{$item->id}}">
                        </div>
                        <button class="btn bg-color1 text-white btn-sm" type="submit">{{trans('Blog/Blog.Reply')}}</button>
                    </form>
                @else
                    <form action="{{route('reply.store')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <input type="text" class="form-control" name="desc">
                            <input type="hidden" class="form-control" name="blog_id" value="{{$blog_id}}">
                            <input type="hidden" class="form-control" name="parent_id" value="{{$item->id}}">
                        </div>
                        <button class="btn bg-color1 text-white btn-sm" type="submit">{{trans('Blog/Blog.Reply')}}</button>
                    </form>
                @endif
                @include("user.comment",['comments'=>$item->replies])
            </div>
        </div>
    @endif
    @if($item->parent_id !=null)
        <br>
        <div class="comment-item reply">
            <div class="comment-author_img">
                @if($item -> user)

                    <img src="{{asset('end-user/assets/img/avatar-male.png')}}" alt="Image">

                @else

                    <img src="{{asset('end-user/assets/img/avatar-male.png')}}" alt="Image">

                @endif            </div>
            <div class="comment-author_text">
                <div class="comment-author_info">
                    <h6> @if($item -> user)
                            {{$item -> user -> name}}
                        @else
                            {{$item -> student -> name_ar}}
                        @endif
                    </h6>
                    <p>{{$item->created_at->diffforhumans()}}</p>
                </div>
                <p>{{$item -> desc}}</p>
                @if(auth('student')->user())
                <form action="{{route('reply.store')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <input type="text" class="form-control" name="desc">
                        <input type="hidden" class="form-control" name="blog_id" value="{{$blog_id}}">
                        <input type="hidden" id="parent_id" class="form-control" name="parent_id" value="{{$item->id}}">
                    </div>
                    <button id="replay" class="btn bg-color1 text-white btn-sm"
                            type="submit">{{trans('Blog/Blog.Reply')}}</button>
                </form>
                @elseif(auth('user')->user())
                    <form action="{{route('reply.userstore')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <input type="text" class="form-control" name="desc">
                            <input type="hidden" class="form-control" name="blog_id" value="{{$blog_id}}">
                            <input type="hidden" id="parent_id" class="form-control" name="parent_id" value="{{$item->id}}">
                        </div>
                        <button id="replay" class="btn bg-color1 text-white btn-sm"
                                type="submit">{{trans('Blog/Blog.Reply')}}</button>
                    </form>
                @else
                    <form action="{{route('reply.store')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <input type="text" class="form-control" name="desc">
                            <input type="hidden" class="form-control" name="blog_id" value="{{$blog_id}}">
                            <input type="hidden" id="parent_id" class="form-control" name="parent_id" value="{{$item->id}}">
                        </div>
                        <button id="replay" class="btn bg-color1 text-white btn-sm"
                                type="submit">{{trans('Blog/Blog.Reply')}}</button>
                    </form>
                @endif
                @include("user.comment",['comments'=>$item->replies])
            </div>
        </div>
    @endif

@endforeach



