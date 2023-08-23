(function($) {
    "use strict";
    /* -------------------------------------
               Prealoder
         -------------------------------------- */
    $(window).on('load', function(event) {
        $('.js-preloader').delay(50).fadeOut(50);
    });

        /* -------------------------------------
               Prealoder
         -------------------------------------- */



     /* -------------------------------------
            Buy Now Button
    -------------------------------------- */
    // $('body').append("<a href='https://themeforest.net/checkout/83946270/create_account?_ga=2.241992770.1760831447.1644976051-651307116.1644976051' class='buy-now-btn' target='_blank'><img src='assets/img/envato.png' alt='envato'/>Buy Now</a>");

    /* -------------------------------------
          Open Search box
    -------------------------------------- */
    $('.shopcart').on('click', function() {
        $('.cart-popup').addClass('open');
        $('.body_overlay').addClass('open');
    });
    $('.close-popup, .body_overlay').on('click', function() {
        $('.cart-popup').removeClass('open');
        $('.body_overlay').removeClass('open');
    });

    $('.sidebar-menu').on('click', function() {
        $('.contact-popup').addClass('open');
        $('.body_overlay').addClass('open');
    });
    $('.close-popup, .body_overlay').on('click', function() {
        $('.contact-popup').removeClass('open');
        $('.body_overlay').removeClass('open');

    });

    /* -------------------------------------
          Progressbar Animation
    -------------------------------------- */
    if ($('.skills').length) {
        var offsetTop = $('.skills').offset().top;
        $(window).scroll(function() {
            var height = $(window).height();
            if ($(window).scrollTop() + height > offsetTop) {
                $('.skillbar').each(function() {
                    $(this).find('.skillbar-bar').animate({
                        width: $(this).attr('data-percent')
                    }, 1500);
                });
            }
        });
    }



    /*--------------------------
                 Count Down Timer
      ----------------------------*/
    $('[data-countdown]').each(function() {
        var $this = $(this),
            finalDate = $(this).data('countdown');
        $this.countdown(finalDate, function(event) {
            $this.html(event.strftime('<span class="cdown day"><span class="time-count">%-D</span> <p>Days</p></span> <span class="cdown hour"><span class="time-count">%-H</span> <p>Hours</p></span> <span class="cdown minutes"><span class="time-count">%M</span> <p>mins</p></span> <span class="cdown second"><span class="time-count">%S</span> <p>secs</p></span>'));
        });
    });


    /* -------------------------------------
          Product Quantity
    -------------------------------------- */
    var minVal = 1,
        maxVal = 20;
    $(".increaseQty").on('click', function() {
        var $parentElm = $(this).parents(".qtySelector");
        $(this).addClass("clicked");
        setTimeout(function() {
            $(".clicked").removeClass("clicked");
        }, 100);
        var value = $parentElm.find(".qtyValue").val();
        if (value < maxVal) {
            value++;
        }
        $parentElm.find(".qtyValue").val(value);
    });
    // Decrease product quantity on cart page
    $(".decreaseQty").on('click', function() {
        var $parentElm = $(this).parents(".qtySelector");
        $(this).addClass("clicked");
        setTimeout(function() {
            $(".clicked").removeClass("clicked");
        }, 100);
        var value = $parentElm.find(".qtyValue").val();
        if (value > 1) {
            value--;
        }
        $parentElm.find(".qtyValue").val(value);
    });


    /* -------------------------------------
          Header Topbar
    -------------------------------------- */

    $('.mobile-top-bar').on('click', function() {
        $('.header-top-right').addClass('open')
    });
    $('.close-header-top').on('click', function() {
        $('.header-top-right').removeClass('open')
    });
    /* -------------------------------------
          sticky Header
    -------------------------------------- */
    var wind = $(window);
    var sticky = $('.header-wrap');
    wind.on('scroll', function() {
        var scroll = wind.scrollTop();
        if (scroll < 100) {
            sticky.removeClass('sticky');
        } else {
            sticky.addClass('sticky');
        }
    });



    /*---------------------------------
        Responsive mmenu
    ---------------------------------*/
    $('.mobile-menu a').on('click', function() {
        $('.main-menu-wrap').addClass('open');
        $('.mobile-bar-wrap.style2 .mobile-menu').addClass('open');
    });

    $('.mobile_menu a').on('click', function() {
        $(this).parent().toggleClass('open');
        $('.main-menu-wrap').toggleClass('open');
    });

    $('.menu-close').on('click', function() {
        $('.main-menu-wrap').removeClass('open')
    });
    $('.mobile-top-bar').on('click', function() {
        $('.header-top').addClass('open')
    });
    $('.close-header-top button').on('click', function() {
        $('.header-top').removeClass('open')
    });
    var $offcanvasNav = $('.main-menu'),
        $offcanvasNavSubMenu = $offcanvasNav.find('.sub-menu');
    $offcanvasNavSubMenu.parent().prepend('<span class="menu-expand"><i class="las la-angle-down"></i></span>');

    $offcanvasNavSubMenu.slideUp();

    $offcanvasNav.on('click', 'li a, li .menu-expand', function(e) {
        var $this = $(this);
        if (($this.parent().attr('class').match(/\b(has-children|sub-menu)\b/)) && ($this.attr('href') === '#' || $this.hasClass('menu-expand'))) {
            e.preventDefault();
            if ($this.siblings('ul:visible').length) {
                $this.siblings('ul').slideUp('slow');
            } else {
                $this.closest('li').siblings('li').find('ul:visible').slideUp('slow');
                $this.siblings('ul').slideDown('slow');
            }
        }
        if ($this.is('a') || $this.is('span') || $this.attr('class').match(/\b(menu-expand)\b/)) {
            $this.parent().toggleClass('menu-open');
        } else if ($this.is('li') && $this.attr('class').match(/\b('has-children')\b/)) {
            $this.toggleClass('menu-open');
        }
    });


    /* -------------------------------------
                Category Dropdown
    -------------------------------------- */
    $('.has-subcat').on('click', function() {
        $(this).toggleClass('open');
        $(this).find('.subcategory').slideToggle(500);
        $(this).siblings().find('.subcategory').slideUp(500);
        $(this).siblings().removeClass('open');
    })
    /* -------------------------------------
                 range slider
        -------------------------------------- */
    $("#slider-range_one").slider({
        range: true,
        min: 0,
        max: 400,
        values: [10, 300],
        slide: function(event, ui) {
            $("#amount_one").val("$" + ui.values[0] + " - " + "$" + ui.values[1]);
        }
    });
    $(" #amount_one").val("$" + $("#slider-range_one").slider("values", 0) +
        " - " + "$" + $("#slider-range_one").slider("values", 1));

    /*---------------------------------
           Hero Slider
    ---------------------------------*/


    var hero_slider_two = new Swiper('.hero-slider-two', {
        spaceBetween: 0,
        slidesPerView: 1,
        loop: true,
        autoplay: {
            delay: 9000,
            disableOnInteraction: true,
        },
        autoHeight: true,
        speed: 1500,
        pagination: {
            el: '.hero-pagination',
            clickable: true,
            dynamicBullets: true,
        },

    });


    /*---------------------------------
        Single  Product Slider
    ---------------------------------*/
    var galleryThumbs = new Swiper('.gallery-thumbs', {
        spaceBetween: 30,
        slidesPerView: 2,
        freeMode: true,
        watchSlidesVisibility: true,
        watchSlidesProgress: true,

    });
    var galleryTop = new Swiper('.gallery-top', {
        spaceBetween: 30,
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        thumbs: {
            swiper: galleryThumbs
        }
    });



    /*---------------------------------
            Testimonial  Slider
    ---------------------------------*/
    var testimonial_one = new Swiper('.testimonial-slider-one', {
        slidesPerView: 2,
        loop: true,
        speed: 1500,
        pagination: {
            el: '.testimonial-pagination',
            clickable: true,
        },
        breakpoints: {
            0: {
                slidesPerView: 1,
                spaceBetween: 20,

            },
            768: {
                slidesPerView: 2,
                spaceBetween: 35,


            }

        }

    });


    /* ----------------------------------------
               Magnific Popup Video
         ------------------------------------------*/
    $('.video-play').magnificPopup({
        type: 'iframe',
        mainClass: 'mfp-fade',
        preloader: true,
    });



    /*-------------------------------------
         Scroll to top
    ----------------------------------*/

    // Show or hide the  button
    $(window).on('scroll', function(event) {
        if ($(this).scrollTop() > 600) {
            $('.back-to-top').fadeIn(200)
        } else {
            $('.back-to-top').fadeOut(200)
        }
    });


    //Animate the scroll to top
    $('.back-to-top').on('click', function(event) {
        event.preventDefault();

        $('html, body').animate({
            scrollTop: 0,
        }, 1500);
    });

    function inVisible(element) {
        //Checking if the element is
        //visible in the viewport
        var WindowTop = $(window).scrollTop();
        var WindowBottom = WindowTop + $(window).height();
        var ElementTop = element.offset().top;
        var ElementBottom = ElementTop + element.height();
        //animating the element if it is
        //visible in the viewport
        if ((ElementBottom <= WindowBottom) && ElementTop >= WindowTop)
          animate(element);
      }

      function animate(element) {
        //Animating the element if not animated before
        if (!element.hasClass('ms-animated')) {
          var maxval = element.data('max');
          var html = element.html();
          element.addClass("ms-animated");
          $({
            countNum: element.html()
          }).animate({
            countNum: maxval
          }, {
            //duration 5 seconds
            duration: 5000,
            easing: 'linear',
            step: function() {
              element.html(Math.floor(this.countNum) + html);
            },
            complete: function() {
              element.html(this.countNum + html);
            }
          });
        }

      }

      //When the document is ready
      $(function() {
        //This is triggered when the
        //user scrolls the page
        $(window).scroll(function() {
          //Checking if each items to animate are
          //visible in the viewport
          $("span[data-max]").each(function() {
            inVisible($(this));
          });
        })
      });
      //====================================================

    $(".but").click (function(){
        // Close all open windows
        $(".content").stop().slideUp(300);
        // Toggle this window open/close
        $(this).next(".content").stop().slideToggle(300);

      });
    $("#but2").click (function(){
        // Close all open windows
        $(".content2").stop().slideUp(300);
        // Toggle this window open/close
        $(this).next(".content2").stop().slideToggle(300);

      });
      //=================================================================

    //to show and hide card diploma in end user

    // $('.showpanel').slideUp();
    $('.click-button').click(function(){
$('.desc').css('display','none')
$(this).parent().find('.desc').css('display','block')
    });
    $('.toggler-2').css('display','none');
    $('.toggler-1').click(function(){
            var divelement = document.querySelector('.showpanel');
            if(divelement.style.display == 'none')
              divelement.style.display = 'block';
            else
              divelement.style.display = 'none';
        //   }
        // $(this).parent().parent().find('.showpanel').slideToggle();
        // alert($(this));
    })
//     $('.toggler-1').on('click',function(){
// alert('t')
// $(this).parent().find('.showpanel').css('display','block');
// console.log($(this).parent().find('.showpanel'));
//     })
    // $('.toggler-1').on('click',function(){
    //     // $('.blog-card').removeClass('heightblog');
    //     // $('.blog-card').removeClass('heightblog1440');
    //     // $('.blog-card').removeClass('heightblog1024');
    //     // $('.blog-card').removeClass('heightblog768');
    //     $(this).parent().children().toggle();  //swaps the display:none between the two spans
    //     $(this).parent().parent().find('.showpanel').slideToggle();  //swap the display of the main content with slide action
    // });
    $('.toggler-2').on('click',function(){
        $(this).parent().children().toggle();  //swaps the display:none between the two spans
        $('.toggler-1').css('display','block');
        $(this).parent().parent().find('.showpanel').slideUp();
          //swap the display of the main content with slide action
    });

//
//     $(".course-card").hover(function () {
//         // $(this).parent().children().toggle();
//         $('.showcourse').slideDown(1000);

//     });
//         $(".course-card"). mouseleave(function () {
//             $('.showcourse').slideUp(500);
//         })
//     $('.course-card').hover(
//         function() {
//     $('.showcourse').slideDown();
//   }, function() {
//    $('.showcourse').slideUp();
//   }
//     );
$('.showcourse').slideUp();
$('.toggler-4').css('display','none');
$('.toggler-3').on('click',function(){
    $(this).parent().children().toggle();
    $(this).parent().parent().find('.showcourse').slideToggle();
    // $('.blog-card').addClass('heightblog');
    // $('.blog-card').addClass('heightblog1440');
    // $('.blog-card').addClass('heightblog1024');
    // $('.blog-card').addClass('heightblog768');
    });
$('.toggler-4').on('click',function(){
        $(this).parent().children().toggle();  //swaps the display:none between the two spans
        $(this).parent().parent().find('.showcourse').slideUp();
        $('.toggle-3').css('display','block');
        $('.blog-card').removeClass('heightblog');
        $('.blog-card').removeClass('heightblog1440');
        $('.blog-card').removeClass('heightblog1024');
        $('.blog-card').removeClass('heightblog768');
        // $('.blog-card').animate({height:'200px'}, 500);
        //swap the display of the main content with slide action
    });


  //===========================================Drowpdown notifcation=========================



        // if ($("#dropdown-menu-notif").css('display','block')){
        //     $(".notification-drop .item").find('ul').css('display','none');
        //     $("#dropdown-menu-notif").css('display','none');
        // }
//    $(document).mouseup(function(e){
//     var ul = $("#ul-notifcation");
//     if(!ul.is(e.target) && ul.has(e.target).length ===0){
//         ul.hide();
//     }
//    })

//    $(".notification-drop .item").on('click',function() {
//     $(this).find('ul').toggle();

//     $("body").mouseup(function(){
//         if($(this).find('#ul-notifcation').css('display') == 'block'){

//             $(this).$('#ul-notifcation').toggle();
//         }
//     });
// });

$('.alert').click(function(){
    $('#ul-notifcation').toggle();
})
// $("body").mouseup(function(){
//     $('#ul-notifcation').hide();
// })
  //===========================================Drowpdown notifcation=========================
// ======================section features====================
// $(document).ready(function() {
//     $('.circle-container').find('a').click(function(event) {
//         event.preventDefault();
//     });
//     $('.circle-container').find('li').hover(function() {
//         $('.circle-container').find('li').removeClass('active');
//         $(this).addClass('active');
//         $('.services-container').find('li.active').removeClass('active animated fadeIn');

//         $(".services-container").find('li').eq($(this).data('id')).addClass('active animated fadeIn');

//     });

// });

//=======================close div nafication when you clock outside===========






// ======================section about acadimic====================



var x = document.getElementById("tabs-1");
x.onclick = function() {
    var div = document.getElementById('tabs-content-1');
    var div1 = document.getElementById('tabs-content-2');
    var div2 = document.getElementById('tabs-content-3');
    var div3 = document.getElementById('tabs-content-4');
    if (div.style.display !== 'none') {
        div.style.display = 'none';
        div1.style.display = 'none';
        div2.style.display = 'none';
        div3.style.display = 'none';
    }
    else {
        div.style.display = 'block';
        div1.style.display = 'none';
        div2.style.display = 'none';
        div3.style.display = 'none';
    }
};
var x = document.getElementById("tabs-2");
x.onclick = function() {
    var div = document.getElementById('tabs-content-1');
    var div1 = document.getElementById('tabs-content-2');
    var div2 = document.getElementById('tabs-content-3');
    var div3 = document.getElementById('tabs-content-4');
    if (div1.style.display !== 'none') {
        div.style.display = 'none';
        div1.style.display = 'none';
        div2.style.display = 'none';
        div3.style.display = 'none';
    }
    else {
        div1.style.display = 'block';
        div.style.display = 'none';
        div2.style.display = 'none';
        div3.style.display = 'none';
    }
};
var x = document.getElementById("tabs-3");
x.onclick = function() {
    var div = document.getElementById('tabs-content-1');
    var div1 = document.getElementById('tabs-content-2');
    var div2 = document.getElementById('tabs-content-3');
    var div3 = document.getElementById('tabs-content-4');
    if (div2.style.display !== 'none') {
        div.style.display = 'none';
        div1.style.display = 'none';
        div2.style.display = 'none';
        div3.style.display = 'none';
    }
    else {
        div2.style.display = 'block';
        div1.style.display = 'none';
        div.style.display = 'none';
        div3.style.display = 'none';
    }
};
var x = document.getElementById("tabs-4");
x.onclick = function() {
    var div = document.getElementById('tabs-content-1');
    var div1 = document.getElementById('tabs-content-2');
    var div2 = document.getElementById('tabs-content-3');
    var div3 = document.getElementById('tabs-content-4');
    if (div3.style.display !== 'none') {
        div.style.display = 'none';
        div1.style.display = 'none';
        div2.style.display = 'none';
        div3.style.display = 'none';
    }
    else {
        div3.style.display = 'block';
        div1.style.display = 'none';
        div2.style.display = 'none';
        div.style.display = 'none';
    }
};

// ======================section about acadimic====================

})(jQuery);


      //==================================================================






// function to set a given theme/color-scheme
function setTheme(themeName) {
    localStorage.setItem('theme', themeName);
    document.documentElement.className = themeName;
}

// function to toggle between light and dark theme
function toggleTheme() {
    if (localStorage.getItem('theme') === 'theme-dark') {
        setTheme('theme-light');
    } else {
        setTheme('theme-dark');
    }
}

// Immediately invoked function to set the theme on initial load
(function () {
    if (localStorage.getItem('theme') === 'theme-dark') {
        setTheme('theme-dark');
        document.getElementById('slider').checked = false;
    } else {
        setTheme('theme-light');
        document.getElementById('slider').checked = true;
    }
})

();


