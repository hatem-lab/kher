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

        let lecture_id = $(e.relatedTarget).data('lecture');
        let student_id = $(e.relatedTarget).data('student');
        let status = $(e.relatedTarget).data('status');

        if (status == 1) {

            $('#itemDeleteModalTitle').text(Lang.get('js_local.absent_warning'));
            var has_class_success = $('#delete_btn').hasClass('btn-success')


            if(has_class_success){
                $('#delete_btn').removeClass('btn-success')

            }
            $('#delete_btn').addClass('btn-danger')

        } else {
            $('#itemDeleteModalTitle').text(Lang.get('js_local.present_warning'));
            var has_class_danger = $('#delete_btn').hasClass('btn-danger')

            if(has_class_danger){
                $('#delete_btn').removeClass('btn-danger')

            }

            $('#delete_btn').addClass('btn-success')

        }

        $('#delete_btn').data('lecture', lecture_id);
        $('#delete_btn').data('student', student_id);
        $('#delete_btn').data('status', status);


    });


    $("#delete_btn").on('click', function (e) {

        e.preventDefault();
        let lecture_id = $("#delete_btn").data('lecture');
        let student_id = $("#delete_btn").data('student');
        let status = $("#delete_btn").data('status');

        let sub_id = $("#delete_btn").data('id');
        let url = window.location.href;


        $.ajax({
            type: 'POST',

            url: '/admin/lectures/students/changePresent',

            data: {
                lecture_id : lecture_id,
                student_id : student_id,
                status : status,
            },

            success: function (response) {
                if (response.status === 200) {
                    $('#delete-sub').modal('hide');
                    // dtUserTable.DataTable().ajax.reload();
                    // $('#row-' + sub_id).hide();
                    setTimeout(function () {
                        toastr['success'](
                            Lang.get('js_local.Status_Changed_Success'),
                            {
                                closeButton: true,
                                tapToDismiss: false,
                                rtl: isRtl
                            }
                        );
                        window.location.reload();
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


});
