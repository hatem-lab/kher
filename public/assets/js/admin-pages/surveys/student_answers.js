(function (window, document, $) {
    'use strict';
    calculateMarks();

    $('#answers_form').keydown(function (e) {
        if (e.keyCode == 13) {
            e.preventDefault();
            return false;
        }
    });

   $('.question_mark').on('change', function (e){

       calculateMarks();
       // console.log(total_mark);
   });

   function calculateMarks(){
       var marks = document.getElementsByClassName('question_mark');
       var total_mark = 0;
       $.each(marks, function (k,mark){

           var mark_num = parseInt(mark.value, 10);

           total_mark = total_mark +mark_num;

           $('#total_mark').val(total_mark);
       });
   }
})(window, document, jQuery);
