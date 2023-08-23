
@section('main')
<?php $i = 0; ?>

    <?php $i++; ?>
    <tr id="row-{{$blog->id}}">
        <td>{{ $i }}</td>
        <td><img src="{{URL::to('/') . '/Blogs/' . $blog->id.'/'.$blog->image}}" alt="Avatar" height="100" width="100"></td>
        <td colspan="2">
            {{--   @can('حذف المرفق')  --}}
            <a class="modal-effect btn btn-sm btn-danger" data-effect="effect-scale"
               data-id="{{ $blog->id }}"
               data-bs-toggle="modal" href="#delete-sub"
               title="{{trans('general.Delete')}}"><i
                    class="las la-trash"></i></a>
            {{--   @endcan  --}}
        </td>
    </tr>

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
    <script src="{{asset('assets/js/admin-pages/blog/delete_file.js')}}"></script>

</script>

@stop
