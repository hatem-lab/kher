
@section('main')
<?php $i = 0; ?>
    @foreach($attachments as $attachment)
    <?php $i++; ?>
    <tr id="row-{{$attachment->id}}">
        <td>{{ $i }}</td>
{{--        <td>{{ $attachment->name }}</td>--}}
        <td>{{ $attachment->created_at }}</td>
        <td colspan="2">
{{--            <a class="btn btn-outline-success btn-sm"--}}
{{--               href="{{ route('lecture.View_file',['path'=>$attachment->path,'file_name'=>$attachment->name])  }}"--}}
{{--               role="button"><i class="fas fa-eye"></i>&nbsp;--}}
{{--                </a>--}}

{{--            <a class="btn btn-outline-info btn-sm"--}}
{{--               href="{{route('lecture.download',['path'=>$attachment->path,'file_name'=>$attachment->name]) }}"--}}
{{--               role="button"><i--}}
{{--                    class="fas fa-download"></i>&nbsp;--}}
{{--                </a>--}}

            {{--   @can('حذف المرفق')  --}}
{{--            <a class="modal-effect btn btn-sm btn-danger" data-effect="effect-scale"--}}
{{--               data-id="{{ $attachment->id }}"--}}
{{--               data-bs-toggle="modal" href="#delete-sub"--}}
{{--               title="{{trans('general.Delete')}}"><i--}}
{{--                    class="las la-trash"></i></a>--}}
            {{--   @endcan  --}}

        </td>
    </tr>
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


<script>
    <script src="{{asset('assets/js/admin-pages/lectures/delete_file.js')}}"></script>

</script>

@stop
