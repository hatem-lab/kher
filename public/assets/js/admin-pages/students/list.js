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

            url: '/admin/students/delete/' + sub_id,


            success: function (response) {
                if (response.status === 200) {
                    $('#delete-sub').modal('hide');
                    // dtUserTable.DataTable().ajax.reload();
                    $('#row-' + sub_id).hide();
                    setTimeout(function () {
                        toastr['success'](
                            Lang.get('js_local.Student_Deleted_Successfully'),
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

    $('#status-sub').on('show.bs.modal', function (e) {

        let course_id = $(e.relatedTarget).data('id');
        let status = $(e.relatedTarget).data('status');


        $('#student_id').val(course_id);
        // $('#status_btn').data('id', course_id);


        if (status == 1) {
            $('#status_btn').text(Lang.get('js_local.Block'));
            $('#itemDeleteModalTitle').text(Lang.get('js_local.student_block_warning'));
            $('#myModalLabel22').text(Lang.get('js_local.Block'));
        } else {
            $('#status_btn').text(Lang.get('js_local.Activate'));
            $('#itemDeleteModalTitle').text(Lang.get('js_local.student_activate_warning'));
            $('#myModalLabel22').text(Lang.get('js_local.Activate'));
        }



    });


});
