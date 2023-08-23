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

    $('#accept-sub').on('show.bs.modal', function (e) {
        let id = $(e.relatedTarget).data('id');
        $('#accept_btn').data('id', id);

    });
    $("#accept_btn").on('click', function (e) {
        e.preventDefault();
        let sub_id = $("#accept_btn").data('id');
        let url = window.location.href;
        $.ajax({
            type: 'POST',
            url: '/admin/blog/accept/' + sub_id,
            success: function (response) {
                if (response.status === 200) {
                    $('#accept-sub').modal('hide');
                    // dtUserTable.DataTable().ajax.reload();
                    $('#row-' + sub_id).hide();
                    setTimeout(function () {
                        toastr['success'](
                            Lang.get('js_local.Blog_Accepted_Successfully'),
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

    $('#reject-sub').on('show.bs.modal', function (e) {
        let id_reject = $(e.relatedTarget).data('id');
        $('#reject_btn').data('id', id_reject);
    });
    $("#reject_btn").on('click', function (e) {

        e.preventDefault();

        let sub_id = $("#reject_btn").data('id');
        let url = window.location.href;
        $.ajax({
            type: 'POST',

            url: '/admin/blog/reject/' + sub_id,
            success: function (response) {
                if (response.status === 200) {
                    $('#reject-sub').modal('hide');
                    $('#row-' + sub_id).hide();
                    setTimeout(function () {
                        toastr['success'](
                            Lang.get('js_local.Blog_Rejected_Successfully'),
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

    $('#delete-sub').on('show.bs.modal', function (e) {

        let lecture_id = $(e.relatedTarget).data('id');

        $('#delete_btn').data('id', lecture_id);


    });
    $("#delete_btn").on('click', function (e) {

        e.preventDefault();

        let sub_id = $("#delete_btn").data('id');
        let url = window.location.href;


        $.ajax({
            type: 'POST',

            url: '/admin/blog/delete/' + sub_id,


            success: function (response) {
                if (response.status === 200) {
                    $('#delete-sub').modal('hide');
                    // dtUserTable.DataTable().ajax.reload();
                    $('#row-' + sub_id).hide();
                    setTimeout(function () {
                        toastr['success'](
                            Lang.get('js_local.Blog_Deleted_Successfully'),
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

    $('#block-sub').on('show.bs.modal', function (e) {

        let lecture_id = $(e.relatedTarget).data('id');

        $('#block_btn').data('id', lecture_id);


    });
    $("#block_btn").on('click', function (e) {

        e.preventDefault();

        let sub_id = $("#block_btn").data('id');
        let url = window.location.href;


        $.ajax({
            type: 'POST',

            url: '/admin/blog/block/' + sub_id,


            success: function (response) {
                if (response.status === 200) {
                    $('#block-sub').modal('hide');

                    $('#block-' + sub_id).empty().append(response.content);


                   if(response.block === 2)
                   {
                       $('#block_title-' + sub_id).empty().append('الغاء الحجب');
                       $('#block_botton-' + sub_id).empty().append(' الغاء حجب');
                       $('#block_body-'+sub_id).empty().append('هل تريد الغاء حجب عن هذه المدونة؟');
                       setTimeout(function () {
                           toastr['success'](
                               Lang.get('js_local.Blog_Blocked_Successfully'),
                               {
                                   closeButton: true,
                                   tapToDismiss: false,
                                   rtl: isRtl
                               }
                           );
                       }, 500);
                   }else
                   {
                       $('#block_title-' + sub_id).empty().append('حجب');
                       $('#block_botton-' + sub_id).empty().append('حجب');
                       $('#block_body-'+sub_id).empty().append('هل تريد حجب هذه المدونة؟');
                       setTimeout(function () {
                           toastr['success'](
                               Lang.get('js_local.Blog_UnBlocked_Successfully'),
                               {
                                   closeButton: true,
                                   tapToDismiss: false,
                                   rtl: isRtl
                               }
                           );
                       }, 500);
                   }

                }

                else {
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

    $('#comment-sub').on('show.bs.modal', function (e) {

        let attachment_id = $(e.relatedTarget).data('id');

        $('#comment_btn').data('id', attachment_id);


    });
    $("#comment_btn").on('click', function (e) {

        e.preventDefault();

        let sub_id = $("#comment_btn").data('id');
        let url = window.location.href;


        $.ajax({
            type: 'POST',

            url: '/admin/blog/delete_comment/' + sub_id,


            success: function (response) {
                if (response.status === 200) {
                    $('#comment-sub').modal('hide');
                    // dtUserTable.DataTable().ajax.reload();
                    $('#row-comment-' + sub_id).hide();
                    setTimeout(function () {
                        toastr['success'](
                            Lang.get('js_local.image_Deleted_Successfully'),
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


});
