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

    $('#question_form').on('submit', function () {
        $('#desc').val(blogEditor.container.firstChild.innerHTML);
    });

    setDisplay(1);


    $("#type").on('change', function (e) {

        var selected_val = $("#type").val();

        // console.log(selected_val);
        setDisplay(selected_val);
    });

    function setDisplay(selected_val){

        if(selected_val == 3 || selected_val == 4){
            $('#option_div').attr('hidden', false);
            $('#itemname').attr('required', true);

        }else{
            $('#option_div').attr('hidden', true);
            $('#itemname').attr('required', false);

        }
    }

    $('.invoice-repeater, .repeater-default').repeater({
        show: function () {
            $(this).slideDown();
            // Feather Icons
            if (feather) {
                feather.replace({width: 14, height: 14});
            }
        },
        hide: function (deleteElement) {
            if (confirm(Lang.get('js_local.option_delete_warning'))) {
                $(this).slideUp(deleteElement);
            }
        }
    });


})(window, document, jQuery);
