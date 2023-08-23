(function (window, document, $) {
    'use strict';

    var editor = '#blog-editor-container .editor';
    var editor_goals = '#blog-editor-container-goals .editor-goals';
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

    var blogEditorGoals = new Quill(editor_goals, {
        bounds: editor_goals,
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

    $('#about_form').on('submit', function () {
        $('#about_desc').val(blogEditor.container.firstChild.innerHTML);
        $('#goals').val(blogEditorGoals.container.firstChild.innerHTML);
    });

    $('.repeater').repeater({
        show: function () {
            $(this).slideDown();
            // Feather Icons
            if (feather) {
                feather.replace({width: 14, height: 14});
            }
        },
        hide: function (deleteElement) {
            if (confirm(Lang.get('js_local.mobile_delete_warning'))) {
                $(this).slideUp(deleteElement);
            }
        }
    });

    $('input[name="preview"]').change(function(e) {
        $(".meta-preview").prop('hidden',false)
        var fileName = e.target.files[0].name;
        $("#file").val(fileName);

        // var reader = new FileReader();
        // reader.onload = function(e) {
        //     // get loaded data and render thumbnail.
        //     document.getElementById("preview_video").src = e.target.result;
        // };
        // // read the image file as a data URL.
        // reader.readAsDataURL(this.files[0]);


        var $source = $('#preview_video');
        console.log($source)

        $source[0].src = URL.createObjectURL(this.files[0]);
        $source.parent()[0].load();
    });


})(window, document, jQuery);
