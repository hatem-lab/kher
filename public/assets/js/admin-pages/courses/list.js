$(function () {
    'use strict';
    var isRtl = true;
    var select = $('.select2');
    var dtUserTable = $('.table');


    $.ajaxSetup({

        headers: {

            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

        }

    });

    $('#delete-sub').on('show.bs.modal', function (e) {

        let course_id = $(e.relatedTarget).data('id');

        $('#delete_btn').data('id', course_id);


    });


    $("#delete_btn").on('click', function (e) {

        e.preventDefault();

        let sub_id = $("#delete_btn").data('id');
        let url = window.location.href;


        $.ajax({
            type: 'POST',

            url: '/admin/courses/delete/' + sub_id,


            success: function (response) {
                if (response.status === 200) {
                    $('#delete-sub').modal('hide');
                    // dtUserTable.DataTable().ajax.reload();
                    $('#row-' + sub_id).hide();
                    setTimeout(function () {
                        toastr['success'](
                            Lang.get('js_local.Course_Deleted_Successfully'),
                            {
                                closeButton: true,
                                tapToDismiss: false,
                                rtl: isRtl
                            }
                        );
                    }, 500);

                } else {
                    setTimeout(function () {
                        toastr['error'](
                            Lang.get('js_local.Operation_Failed'),
                            {
                                closeButton: true,
                                tapToDismiss: false,
                                rtl: isRtl
                            }
                        );
                    }, 500);
                }


            },
            error: function (jqXHR) {
                alert(jQuery.parseJSON(jqXHR.responseText).message);

            }
        });
    });

    $('#info-sub').on('show.bs.modal', function (e) {

        let title = $(e.relatedTarget).data('title');
        let desc = $(e.relatedTarget).data('desc');

        $('#d-title')[0].innerHTML= title;
        $('#d-desc')[0].innerHTML= desc;


    });

    $('#status-sub').on('show.bs.modal', function (e) {

        let course_id = $(e.relatedTarget).data('id');
        let status = $(e.relatedTarget).data('status');


        $('#course_id').val(course_id);



        if (status == 0) {
            $('#status_btn').text(Lang.get('js_local.Finish'));
            $('#itemDeleteModalTitle3').text(Lang.get('js_local.course_finish_warning'));
            $('#myModalLabel223').text(Lang.get('js_local.Finish'));
        } else {
            $('#status_btn').text(Lang.get('js_local.Activate'));
            $('#itemDeleteModalTitle3').text(Lang.get('js_local.course_activate_warning'));
            $('#myModalLabel223').text(Lang.get('js_local.Activate'));
        }



    });

});
