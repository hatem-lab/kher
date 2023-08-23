(function (window, document, $) {
    'use strict';

    var select = $('.select2');


    // Basic Select2 select
    select.each(function () {
        var $this = $(this);
        $this.wrap('<div class="position-relative"></div>');
        $this.select2({
            // the following code is used to disable x-scrollbar when click in select input and
            // take 100% width in responsive also
            dropdownAutoWidth: true,
            width: '100%',
            placeholder: Lang.get('js_local.Choose_one'),
            dropdownParent: $this.parent()
        });
    });
    var editor = '#blog-editor-container .editor';
    var Font = Quill.import('formats/font');
    Font.whitelist = ['sofia', 'slabo', 'roboto', 'inconsolata', 'ubuntu'];
    Quill.register(Font, true);
    //
    var blogEditor = new Quill(editor, {
        bounds: editor,
        modules: {
            formula: true,
            syntax: true,
            toolbar: [
                [
                    {
                        font: []
                    },
                    {
                        size: []
                    }
                ],
                ['bold', 'italic', 'underline', 'strike'],
                [
                    {
                        color: []
                    },
                    {
                        background: []
                    }
                ],
                [
                    {
                        script: 'super'
                    },
                    {
                        script: 'sub'
                    }
                ],
                [
                    {
                        header: '1'
                    },
                    {
                        header: '2'
                    },
                    'blockquote',
                    'code-block'
                ],
                [
                    {
                        list: 'ordered'
                    },
                    {
                        list: 'bullet'
                    },
                    {
                        indent: '-1'
                    },
                    {
                        indent: '+1'
                    }
                ],
                [
                    'direction',
                    {
                        align: []
                    }
                ],
                ['link', 'image', 'video', 'formula'],
                ['clean']
            ]
        },
        theme: 'snow',
        placeholder: 'Enter description...',

    });

    $('#lecture_form').on('submit', function () {
        $('#desc').val(blogEditor.container.firstChild.innerHTML);
    });

    $('#datetimepicker').datetimepicker();
    $('#datetimepicker1').datetimepicker();

    $("#type").on('change', function (e) {

        var selected_val = $("#type").val();

        console.log(selected_val);
        if(selected_val == 1){
            $('#link-div').attr('hidden', false);
            $('#link').attr('required', true);
            $('.star-span').attr('hidden', true);
            $('.date-input').attr('required', false);

        }else{
            $('#link-div').attr('hidden', true);
            $('#link').attr('required', false);
            $('.star-span').attr('hidden', false);
            $('.date-input').attr('required', true);

        }
    });

})(window, document, jQuery);
