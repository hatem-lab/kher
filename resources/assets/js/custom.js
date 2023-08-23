$(function() {
	'use strict'
	
	// ______________LOADER
	$("#global-loader").fadeOut("slow");
	
	
	// This template is mobile first so active menu in navbar
	// has submenu displayed by default but not in desktop
	// so the code below will hide the active menu if it's in desktop
	if (window.matchMedia('(min-width: 992px)').matches) {
		$('.main-navbar .active').removeClass('show');
		$('.main-header-menu .active').removeClass('show');
	}
	// Shows header dropdown while hiding others
	$('.main-header .dropdown > a').on('click', function(e) {
		e.preventDefault();
		$(this).parent().toggleClass('show');
		$(this).parent().siblings().removeClass('show');
		$(this).find('.drop-flag').removeClass('show');
	});
	$('.country-flag1').on('click', function(e){
		
		$(this).parent().toggleClass('show');
		$('.main-header .dropdown > a').parent().siblings().removeClass('show');
	});
	
	// ______________Full screen
	$(document).on("click", ".full-screen", function toggleFullScreen() {
		$('html').addClass('fullscreen-button');
		if ((document.fullScreenElement !== undefined && document.fullScreenElement === null) || (document.msFullscreenElement !== undefined && document.msFullscreenElement === null) || (document.mozFullScreen !== undefined && !document.mozFullScreen) || (document.webkitIsFullScreen !== undefined && !document.webkitIsFullScreen)) {
			if (document.documentElement.requestFullScreen) {
				document.documentElement.requestFullScreen();
			} else if (document.documentElement.mozRequestFullScreen) {
				document.documentElement.mozRequestFullScreen();
			} else if (document.documentElement.webkitRequestFullScreen) {
				document.documentElement.webkitRequestFullScreen(Element.ALLOW_KEYBOARD_INPUT);
			} else if (document.documentElement.msRequestFullscreen) {
				document.documentElement.msRequestFullscreen();
			}
		} else {
			$('html').removeClass('fullscreen-button');
			if (document.cancelFullScreen) {
				document.cancelFullScreen();
			} else if (document.mozCancelFullScreen) {
				document.mozCancelFullScreen();
			} else if (document.webkitCancelFullScreen) {
				document.webkitCancelFullScreen();
			} else if (document.msExitFullscreen) {
				document.msExitFullscreen();
			}
		}
	})

	// ______________ RATING STAR
	var ratingOptions = {
		selectors: {
			starsSelector: '.rating-stars',
			starSelector: '.rating-star',
			starActiveClass: 'is--active',
			starHoverClass: 'is--hover',
			starNoHoverClass: 'is--no-hover',
			targetFormElementSelector: '.rating-value'
		}
	};
	$(".rating-stars").ratingStars(ratingOptions);
	
	
	// ______________Cover Image
	$(".cover-image").each(function() {
		var attr = $(this).attr('data-bs-image-src');
		if (typeof attr !== typeof undefined && attr !== false) {
			$(this).css('background', 'url(' + attr + ') center center');
		}
	});
	
	
	// ______________Toast
	$(".toast").toast();	
	
	/* Headerfixed */
	$(window).on("scroll", function(e){
		if ($(window).scrollTop() >= 66) {
			$('main-header').addClass('fixed-header');
		}
		else {
			$('.main-header').removeClass('fixed-header');
		}
    });
	
	// ______________Search
	$('body, .main-header form[role="search"] button[type="reset"]').on('click keyup', function(event) {
		if (event.which == 27 && $('.main-header form[role="search"]').hasClass('active') ||
		$(event.currentTarget).attr('type') == 'reset') {
		closeSearch();
		}
	});
	function closeSearch() {
		var $form = $('.main-header form[role="search"].active')
		$form.find('input').val('');
		$form.removeClass('active');
	}
	// Show Search if form is not active // event.preventDefault() is important, this prevents the form from submitting
	$(document).on('click', '.main-header form[role="search"]:not(.active) button[type="submit"]', function(event) {
		event.preventDefault();
		var $form = $(this).closest('form'),
		$input = $form.find('input');
		$form.addClass('active');
		$input.focus();
	});
	// if your form is ajax remember to call `closeSearch()` to close the search container
	$(document).on('click', '.main-header form[role="search"].active button[type="submit"]', function(event) {
		event.preventDefault();
		var $form = $(this).closest('form'),
		$input = $form.find('input');
		$('#showSearchTerm').text($input.val());
		closeSearch()
	});
	
	
	
	/* ----------------------------------- */
	
	// Showing submenu in navbar while hiding previous open submenu
	$('.main-navbar .with-sub').on('click', function(e) {
		e.preventDefault();
		$(this).parent().toggleClass('show');
		$(this).parent().siblings().removeClass('show');
	});
	// this will hide dropdown menu from open in mobile
	$('.dropdown-menu .main-header-arrow').on('click', function(e) {
		e.preventDefault();
		$(this).closest('.dropdown').removeClass('show');
	});
	// this will show navbar in left for mobile only
	$('#mainNavShow, #azNavbarShow').on('click', function(e) {
		e.preventDefault();
		$('body').addClass('main-navbar-show');
	});
	// this will hide currently open content of page
	// only works for mobile
	$('#mainContentLeftShow').on('click touch', function(e) {
		e.preventDefault();
		$('body').addClass('main-content-left-show');
	});
	// This will hide left content from showing up in mobile only
	$('#mainContentLeftHide').on('click touch', function(e) {
		e.preventDefault();
		$('body').removeClass('main-content-left-show');
	});
	// this will hide content body from showing up in mobile only
	$('#mainContentBodyHide').on('click touch', function(e) {
		e.preventDefault();
		$('body').removeClass('main-content-body-show');
	})
	// navbar backdrop for mobile only
	$('body').append('<div class="main-navbar-backdrop"></div>');
	$('.main-navbar-backdrop').on('click touchstart', function() {
		$('body').removeClass('main-navbar-show');
	});
	// Close dropdown menu of header menu
	$(document).on('click touchstart', function(e) {
		e.stopPropagation();
		// closing of dropdown menu in header when clicking outside of it
		var dropTarg = $(e.target).closest('.main-header .dropdown').length;
		if (!dropTarg) {
			$('.main-header .dropdown').removeClass('show');
		}
		// closing nav sub menu of header when clicking outside of it
		if (window.matchMedia('(min-width: 992px)').matches) {
			// Navbar
			var navTarg = $(e.target).closest('.main-navbar .nav-item').length;
			if (!navTarg) {
				$('.main-navbar .show').removeClass('show');
			}
			// Header Menu
			var menuTarg = $(e.target).closest('.main-header-menu .nav-item').length;
			if (!menuTarg) {
				$('.main-header-menu .show').removeClass('show');
			}
			if ($(e.target).hasClass('main-menu-sub-mega')) {
				$('.main-header-menu .show').removeClass('show');
			}
		} else {
			//
			if (!$(e.target).closest('#mainMenuShow').length) {
				var hm = $(e.target).closest('.main-header-menu').length;
				if (!hm) {
					$('body').removeClass('main-header-menu-show');
				}
			}
		}
	});
	$('#mainMenuShow').on('click', function(e) {
		e.preventDefault();
		$('body').toggleClass('main-header-menu-show');
	})
	$('.main-header-menu .with-sub').on('click', function(e) {
		e.preventDefault();
		$(this).parent().toggleClass('show');
		$(this).parent().siblings().removeClass('show');
	})
	$('.main-header-menu-header .close').on('click', function(e) {
		e.preventDefault();
		$('body').removeClass('main-header-menu-show');
	})
	
	$(".card-header-right .card-option .fe fe-chevron-left").on("click", function() {
		var a = $(this);
		if (a.hasClass("icofont-simple-right")) {
			   a.parents(".card-option").animate({
				width: "35px",
			})
		} else {
		   a.parents(".card-option").animate({
			width: "180px",
			})
		}
		$(this).toggleClass("fe fe-chevron-right").fadeIn("slow")
	});
	
	 // ___________TOOLTIP	
	 var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
	 var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
	   return new bootstrap.Tooltip(tooltipTriggerEl)
	 })
	
	
	// __________POPOVER
	var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))
	var popoverList = popoverTriggerList.map(function (popoverTriggerEl) {
	  return new bootstrap.Popover(popoverTriggerEl)
	})

	
	// Enable Eva-icons with SVG markup
	eva.replace();
	
	
	// ______________Horizontal-menu Active Class
	$(document).ready(function() {
		$(".horizontalMenu-list li a").each(function() {
			var pageUrl = window.location.href.split(/[?#]/)[0];
			if (this.href == pageUrl) {
				$(this).addClass("active");
				$(this).parent().addClass("active"); // add active to li of the current link
				$(this).parent().parent().prev().addClass("active"); // add active class to an anchor
				$(this).parent().parent().prev().click(); // click the item to make it drop
			}
		});
	});
	
	
	// ______________Active Class
	$(document).ready(function() {
		$(".horizontalMenu-list li a").each(function() {
			var pageUrl = window.location.href.split(/[?#]/)[0];
			if (this.href == pageUrl) {
				$(this).addClass("active");
				$(this).parent().addClass("active"); // add active to li of the current link
				$(this).parent().parent().prev().addClass("active"); // add active class to an anchor
				$(this).parent().parent().prev().click(); // click the item to make it drop
			}
		});
		$(".horizontal-megamenu li a").each(function() {
			var pageUrl = window.location.href.split(/[?#]/)[0];
			if (this.href == pageUrl) {
				$(this).addClass("active");
				$(this).parent().addClass("active"); // add active to li of the current link
				$(this).parent().parent().parent().parent().parent().parent().parent().prev().addClass("active"); // add active class to an anchor
				$(this).parent().parent().prev().click(); // click the item to make it drop
			}
		});
		$(".horizontalMenu-list .sub-menu .sub-menu li a").each(function() {
			var pageUrl = window.location.href.split(/[?#]/)[0];
			if (this.href == pageUrl) {
				$(this).addClass("active");
				$(this).parent().addClass("active"); // add active to li of the current link
				$(this).parent().parent().parent().parent().prev().addClass("active"); // add active class to an anchor
				$(this).parent().parent().prev().click(); // click the item to make it drop
			}
		});
	});
	
	
	// ______________ Back to Top

	var btn = $('#back-to-top');

	$(window).scroll(function() {
	  if ($(window).scrollTop() > 300) {
		$('#back-to-top').fadeIn();
	  } else {
		$('#back-to-top').fadeOut(); 
	  }
	});
	
	btn.on('click', function(e) {
	  e.preventDefault();
	  $('html, body').animate({scrollTop:0}, '300');
	});
		

	
	// ______________Switcher
	
	
	/*Skin modes*/
	$(document).on("click", '#myonoffswitch7', function () {    
		if (this.checked) {
			$('body').addClass('body-default');
			$('body').removeClass('body-style1');
			localStorage.setItem("body-default", "True");
		}
		else {
			$('body').removeClass('body-default');
			localStorage.setItem("body-default", "false");
		}
	});
	$(document).on("click", '#myonoffswitch6', function () {    
		if (this.checked) {
			$('body').addClass('body-style1');
			$('body').removeClass('body-default');
			localStorage.setItem("body-style1", "True");
		}
		else {
			$('body').removeClass('body-style1');
			localStorage.setItem("body-style1", "false");
		}
	});
	
	/*Horizontal Styles*/
	$(document).on("click", '#myonoffswitch2', function () {    
		if (this.checked) {
			$('body').addClass('horizontal-light');
			$('body').removeClass('horizontal-color');
			$('body').removeClass('horizontal-dark');
			$('body').removeClass('horizontal-gradient');
			localStorage.setItem("horizontal-light", "True");
		}
		else {
			$('body').removeClass('horizontal-light');
			localStorage.setItem("horizontal-light", "false");
		}
	});
	$(document).on("click", '#myonoffswitch3', function () {    
		if (this.checked) {
			$('body').addClass('horizontal-color');
			$('body').removeClass('horizontal-light');
			$('body').removeClass('horizontal-dark');
			$('body').removeClass('horizontal-gradient');
			localStorage.setItem("horizontal-color", "True");
		}
		else {
			$('body').removeClass('horizontal-color');
			localStorage.setItem("horizontal-color", "false");
		}
	});
	$(document).on("click", '#myonoffswitch4', function () {    
		if (this.checked) {
			$('body').addClass('horizontal-dark');
			$('body').removeClass('horizontal-color');
			$('body').removeClass('horizontal-light');
			$('body').removeClass('horizontal-gradient');
			localStorage.setItem("horizontal-dark", "True");
		}
		else {
			$('body').removeClass('horizontal-dark');
			localStorage.setItem("horizontal-dark", "false");
		}
	});
	$(document).on("click", '#myonoffswitch5', function () {    
		if (this.checked) {
			$('body').addClass('horizontal-gradient');
			$('body').removeClass('horizontal-color');
			$('body').removeClass('horizontal-light');
			$('body').removeClass('horizontal-dark');
			localStorage.setItem("horizontal-gradient", "True");
		}
		else {
			$('body').removeClass('horizontal-gradient');
			localStorage.setItem("horizontal-gradient", "false");
		}
	});	
	$(document).on("click", '#myonoffswitch8', function () {    
		if (this.checked) {
			$('body').addClass('reset');
			$('body').removeClass('horizontal-color');
			$('body').removeClass('horizontal-light');
			$('body').removeClass('horizontal-dark');
			$('body').removeClass('horizontal-gradient');
			$('body').removeClass('themestyle');
			localStorage.setItem("reset", "True");
		}
		else {
			$('body').removeClass('reset');
			localStorage.setItem("reset", "false");
		}
	});
	
	/*Leftmenu Styles*/
	$(document).on("click", '#myonoffswitch9', function () {    
		if (this.checked) {
			$('body').addClass('leftmenu-light');
			$('body').removeClass('leftmenu-color');
			$('body').removeClass('leftmenu-dark');
			$('body').removeClass('leftmenu-gradient');
			localStorage.setItem("leftmenu-light", "True");
		}
		else {
			$('body').removeClass('leftmenu-light');
			localStorage.setItem("leftmenu-light", "false");
		}
	});
	$(document).on("click", '#myonoffswitch10', function () {    
		if (this.checked) {
			$('body').addClass('leftmenu-color');
			$('body').removeClass('leftmenu-light');
			$('body').removeClass('leftmenu-dark');
			$('body').removeClass('leftmenu-gradient');
			localStorage.setItem("leftmenu-color", "True");
		}
		else {
			$('body').removeClass('leftmenu-color');
			localStorage.setItem("leftmenu-color", "false");
		}
	});
	$(document).on("click", '#myonoffswitch11', function () {    
		if (this.checked) {
			$('body').addClass('leftmenu-dark');
			$('body').removeClass('leftmenu-color');
			$('body').removeClass('leftmenu-light');
			$('body').removeClass('leftmenu-gradient');
			localStorage.setItem("leftmenu-dark", "True");
		}
		else {
			$('body').removeClass('leftmenu-dark');
			localStorage.setItem("leftmenu-dark", "false");
		}
	});
	$(document).on("click", '#myonoffswitch12', function () {    
		if (this.checked) {
			$('body').addClass('leftmenu-gradient');
			$('body').removeClass('leftmenu-color');
			$('body').removeClass('leftmenu-light');
			$('body').removeClass('leftmenu-dark');
			localStorage.setItem("leftmenu-gradient", "True");
		}
		else {
			$('body').removeClass('leftmenu-gradient');
			localStorage.setItem("leftmenu-gradient", "false");
		}
	});	
	$(document).on("click", '#myonoffswitch13', function () {    
		if (this.checked) {
			$('body').addClass('reset');
			$('body').removeClass('leftmenu-color');
			$('body').removeClass('leftmenu-light');
			$('body').removeClass('leftmenu-dark');
			$('body').removeClass('leftmenu-gradient');
			$('body').removeClass('leftbgimage1');
			$('body').removeClass('leftbgimage2');
			$('body').removeClass('leftbgimage3');
			$('body').removeClass('leftbgimage4');
			$('body').removeClass('leftbgimage5');
			$('body').removeClass('leftbgimage6');
			$('body').removeClass('leftbgimage7');
			$('body').removeClass('leftbgimage8');
			$('body').removeClass('leftbgimage9');
			$('body').removeClass('leftbgimage10');
			$('body').removeClass('body-style1');
			localStorage.setItem("reset", "True");
		}
		else {
			$('body').removeClass('reset');
			localStorage.setItem("reset", "false");
		}
	});
	
	
	
	/*Left-menu-style1*/
	$(document).on("click", '#myonoffswitch16', function () {    
		if (this.checked) {
			$('body').addClass('default-leftmenu');
			$('body').removeClass('style1-leftmenu');
			localStorage.setItem("default-leftmenu", "True");
		}
		else {
			$('body').removeClass('default-leftmenu');
			localStorage.setItem("default-leftmenu", "false");
		}
	});
	$(document).on("click", '#myonoffswitch17', function () {    
		if (this.checked) {
			$('body').addClass('style1-leftmenu');
			$('body').removeClass('default-leftmenu');
			localStorage.setItem("default-leftmenu", "True");
		}
		else {
			$('body').removeClass('style1-leftmenu');
			localStorage.setItem("style1-leftmenu", "false");
		}
	});

	/*Left-menu-theme styles*/

    $(document).on("click", '#myonoffswitch30', function() {
        if (this.checked) {
            $('body').addClass('light-mode');
            $('body').removeClass('dark-theme');
            $('body').removeClass('default-leftmenu');
            $('body').removeClass('style1-leftmenu');
            localStorage.setItem("light-mode", "True");
        } else {
            $('body').removeClass('light-mode');
            localStorage.setItem("light-mode", "false");
        }
    });
    $(document).on("click", '#myonoffswitch31', function() {
        if (this.checked) {
            $('body').addClass('dark-theme');
            $('body').removeClass('light-mode');
            $('body').removeClass('default-leftmenu');
            $('body').removeClass('style1-leftmenu');
            localStorage.setItem("dark-theme", "True");
        } else {
            $('body').removeClass('dark-theme');
            localStorage.setItem("dark-theme", "false");
        }
    });

	/*Horizontal-menu-theme styles*/

	$(document).on("click", '#myonoffswitch32', function() {
        if (this.checked) {
            $('body').addClass('default-horizontal');
            $('body').removeClass('color-horizontal');
            $('body').removeClass('dark-theme');
            $('body').removeClass('default-leftmenu');
            $('body').removeClass('style1-leftmenu');
            localStorage.setItem("default-horizontal", "True");
        } else {
            $('body').removeClass('default-horizontal');
            localStorage.setItem("default-horizontal", "false");
        }
    });
    
    $(document).on("click", '#myonoffswitch33', function() {
        if (this.checked) {
            $('body').addClass('dark-theme');
            $('body').removeClass('color-horizontal');
            $('body').removeClass('default-horizontal');
            $('body').removeClass('default-leftmenu');
            $('body').removeClass('style1-leftmenu');
            localStorage.setItem("dark-theme", "True");
        } else {
            $('body').removeClass('dark-theme');
            localStorage.setItem("dark-theme", "false");
        }
    });

	
	/*--- Left-menu Image --*/
	$('#leftmenuimage1').on('click', function() {
	  $('body').removeClass('leftbgimage2');
	  $('body').removeClass('leftbgimage3');
	  $('body').removeClass('leftbgimage4');
	  $('body').removeClass('leftbgimage5');
	  $('body').removeClass('leftbgimage6');
	  $('body').removeClass('leftbgimage7');
	  $('body').removeClass('leftbgimage8');
	  $('body').removeClass('leftbgimage9');
	  $('body').removeClass('leftbgimage10');
	  $('body').addClass('leftbgimage1');
	  return false;
	});
	
	$('#leftmenuimage2').on('click', function() {
	  $('body').removeClass('leftbgimage1');
	  $('body').removeClass('leftbgimage3');
	  $('body').removeClass('leftbgimage4');
	  $('body').removeClass('leftbgimage5');
	  $('body').removeClass('leftbgimage6');
	  $('body').removeClass('leftbgimage7');
	  $('body').removeClass('leftbgimage8');
	  $('body').removeClass('leftbgimage9');
	  $('body').removeClass('leftbgimage10');
	  $('body').addClass('leftbgimage2');
	  return false;
	});
	
	$('#leftmenuimage3').on('click', function() {
	  $('body').removeClass('leftbgimage1');
	  $('body').removeClass('leftbgimage2');
	  $('body').removeClass('leftbgimage4');
	  $('body').removeClass('leftbgimage5');
	  $('body').removeClass('leftbgimage6');
	  $('body').removeClass('leftbgimage7');
	  $('body').removeClass('leftbgimage8');
	  $('body').removeClass('leftbgimage9');
	  $('body').removeClass('leftbgimage10');
	  $('body').addClass('leftbgimage3');
	  return false;
	});
	
	$('#leftmenuimage4').on('click', function() {
	  $('body').removeClass('leftbgimage1');
	  $('body').removeClass('leftbgimage2');
	  $('body').removeClass('leftbgimage3');
	  $('body').removeClass('leftbgimage5');
	  $('body').removeClass('leftbgimage6');
	  $('body').removeClass('leftbgimage7');
	  $('body').removeClass('leftbgimage8');
	  $('body').removeClass('leftbgimage9');
	  $('body').removeClass('leftbgimage10');
	  $('body').addClass('leftbgimage4');
	  return false;
	});
	
	$('#leftmenuimage5').on('click', function() {
	  $('body').removeClass('leftbgimage1');
	  $('body').removeClass('leftbgimage2');
	  $('body').removeClass('leftbgimage3');
	  $('body').removeClass('leftbgimage4');
	  $('body').removeClass('leftbgimage6');
	  $('body').removeClass('leftbgimage7');
	  $('body').removeClass('leftbgimage8');
	  $('body').removeClass('leftbgimage9');
	  $('body').removeClass('leftbgimage10');
	  $('body').addClass('leftbgimage5');
	  return false;
	});
	
	$('#leftmenuimage6').on('click', function() {
	  $('body').removeClass('leftbgimage1');
	  $('body').removeClass('leftbgimage2');
	  $('body').removeClass('leftbgimage3');
	  $('body').removeClass('leftbgimage4');
	  $('body').removeClass('leftbgimage5');
	  $('body').removeClass('leftbgimage7');
	  $('body').removeClass('leftbgimage8');
	  $('body').removeClass('leftbgimage9');
	  $('body').removeClass('leftbgimage10');
	  $('body').addClass('leftbgimage6');
	  return false;
	});
	
	$('#leftmenuimage7').on('click', function() {
	  $('body').removeClass('leftbgimage1');
	  $('body').removeClass('leftbgimage2');
	  $('body').removeClass('leftbgimage3');
	  $('body').removeClass('leftbgimage4');
	  $('body').removeClass('leftbgimage5');
	  $('body').removeClass('leftbgimage6');
	  $('body').removeClass('leftbgimage8');
	  $('body').removeClass('leftbgimage9');
	  $('body').removeClass('leftbgimage10');
	  $('body').addClass('leftbgimage7');
	  return false;
	});
	
	$('#leftmenuimage8').on('click', function() {
	  $('body').removeClass('leftbgimage1');
	  $('body').removeClass('leftbgimage2');
	  $('body').removeClass('leftbgimage3');
	  $('body').removeClass('leftbgimage4');
	  $('body').removeClass('leftbgimage5');
	  $('body').removeClass('leftbgimage6');
	  $('body').removeClass('leftbgimage7');
	  $('body').removeClass('leftbgimage9');
	  $('body').removeClass('leftbgimage10');
	  $('body').addClass('leftbgimage8');
	  return false;
	});
	
	$('#leftmenuimage9').on('click', function() {
	  $('body').removeClass('leftbgimage1');
	  $('body').removeClass('leftbgimage2');
	  $('body').removeClass('leftbgimage3');
	  $('body').removeClass('leftbgimage4');
	  $('body').removeClass('leftbgimage5');
	  $('body').removeClass('leftbgimage6');
	  $('body').removeClass('leftbgimage7');
	  $('body').removeClass('leftbgimage8');
	  $('body').removeClass('leftbgimage10');
	  $('body').addClass('leftbgimage9');
	  return false;
	});
	
	$('#leftmenuimage10').on('click', function() {
	  $('body').removeClass('leftbgimage1');
	  $('body').removeClass('leftbgimage2');
	  $('body').removeClass('leftbgimage3');
	  $('body').removeClass('leftbgimage4');
	  $('body').removeClass('leftbgimage5');
	  $('body').removeClass('leftbgimage6');
	  $('body').removeClass('leftbgimage7');
	  $('body').removeClass('leftbgimage8');
	  $('body').removeClass('leftbgimage9');
	  $('body').addClass('leftbgimage10');
	  return false;
	});


	/*-- width styles ---*/
    $('#myonoffswitch18').click(function() {
        if (this.checked) {
            $('body').addClass('default');
            $('body').removeClass('boxed');
            localStorage.setItem("default", "True");
        } else {
            $('body').removeClass('default');
            localStorage.setItem("default", "false");
        }
    });
    $('#myonoffswitch19').click(function() {
        if (this.checked) {
            $('body').addClass('boxed');
            $('body').removeClass('default');
            localStorage.setItem("boxed", "True");
        } else {
            $('body').removeClass('boxed');
            localStorage.setItem("boxed", "false");
        }
    });


    /*LTR Left-menu-versions*/


    $('#myonoffswitch22').click(function() {
        if (this.checked) {
            $('body').addClass('default-leftmenu');
            $('body').removeClass('closed-leftmenu');
            $('body').removeClass('hover-submenu');
            $('body').removeClass('icon-overlay');
            $('body').removeClass('icon-text');
            localStorage.setItem("default-leftmenu", "True");
            $("head link#theme").attr("href", $(this));
            (document.getElementById("theme").setAttribute("href", "../../assets/css/sidemenu.css"))
        } else {
            $('body').removeClass('default-leftmenu');
            localStorage.setItem("default-leftmenu", "false");
        }
    });
    $('#myonoffswitch23').click(function() {
        if (this.checked) {
			console.log(document.getElementById("theme"));
            $('body').addClass('closed-leftmenu');
            $('body').removeClass('default-leftmenu');
            $('body').removeClass('default-sidebar');
            $('body').removeClass('hover-submenu');
            $('body').removeClass('icon-overlay');
            $('body').removeClass('icon-text');
            localStorage.setItem("closed-leftmenu", "True");
            $("head link#theme").attr("href", $(this));
            (document.getElementById("theme").setAttribute("href", "../../assets/css/closed-sidemenu.css"))
        } else {
            $('body').removeClass('closed-leftmenu');
            localStorage.setItem("closed-leftmenu", "false");
            (document.getElementById("theme").removeAttribute("href", "../../assets/css/closed-sidemenu.css"))
        }
    });
    $('#myonoffswitch24').click(function() {
        if (this.checked) {
            $('body').addClass('hover-submenu');
            $('body').addClass('sidenav-toggled');
            $('body').removeClass('default-leftmenu');
            $('body').removeClass('closed-leftmenu');
            $('body').removeClass('icon-overlay');
            $('body').removeClass('icon-text');
            localStorage.setItem("hover-submenu", "True");
            $("head link#theme").attr("href", $(this));
            (document.getElementById("theme").setAttribute("href", "../../assets/css/sidemenu3.css"))
            $("link#sidemenu").attr("src", $(this));
			console.log(document.getElementById("sidemenu"));
            (document.getElementById("sidemenu").setAttribute("src", "../../assets/plugins/sidemenu/sidemenu1.js"))
        } else {
            $('body').removeClass('hover-submenu');
            localStorage.setItem("hover-submenu", "false");
        }
    });

    $('#myonoffswitch25').click(function() {
        if (this.checked) {
            $('body').addClass('icon-overlay');
            // $('body').addClass('default-sidebar');
            $('body').removeClass('default-leftmenu');
            $('body').removeClass('closed-leftmenu');
            $('body').removeClass('hover-submenu');
            $('body').removeClass('icon-text');
            localStorage.setItem("icon-overlay", "True");
            $("head link#theme").attr("href", $(this));
            (document.getElementById("theme").setAttribute("href", "../../assets/css/sidemenu.css"))
            $("link#sidemenu").attr("src", $(this));
            (document.getElementById("sidemenu").setAttribute("src", "../../assets/plugins/sidemenu/sidemenu1.js"))
        } else {
            $('body').removeClass('icon-overlay');
            localStorage.setItem("icon-overlay", "false");
            (document.getElementById("theme").removeAttribute("href", "../../assets/css/sidemenu.css"))
        }
    });

    /*RTL Left-menu-versions*/


    $('#myonoffswitch26').click(function() {
        if (this.checked) {
            $('body').addClass('default-leftmenu');
            // $('body').addClass('default-sidebar');
            $('body').removeClass('closed-leftmenu');
            $('body').removeClass('hover-submenu');
            $('body').removeClass('icon-overlay');
            $('body').removeClass('icon-text');
            localStorage.setItem("default-leftmenu", "True");
            $("head link#theme").attr("href", $(this));
            (document.getElementById("theme").setAttribute("href", "../../assets/css-rtl/sidemenu.css"))
        } else {
            $('body').removeClass('default-leftmenu');
            localStorage.setItem("default-leftmenu", "false");
        }
    });
    $('#myonoffswitch27').click(function() {
        if (this.checked) {
            $('body').addClass('closed-leftmenu');
            $('body').removeClass('default-leftmenu');
            $('body').removeClass('default-sidebar');
            $('body').removeClass('hover-submenu');
            $('body').removeClass('icon-overlay');
            $('body').removeClass('icon-text');
            localStorage.setItem("closed-leftmenu", "True");
            $("head link#theme").attr("href", $(this));
            (document.getElementById("theme").setAttribute("href", "../../assets/css-rtl/closed-sidemenu.css"))
        } else {
            $('body').removeClass('closed-leftmenu');
            localStorage.setItem("closed-leftmenu", "false");
            (document.getElementById("theme").removeAttribute("href", "../../assets/css-rtl/closed-sidemenu.css"))
        }
    });
    $('#myonoffswitch28').click(function() {
        if (this.checked) {
            $('body').addClass('hover-submenu');
            $('body').addClass('sidenav-toggled');
            // $('body').addClass('default-sidebar');
            $('body').removeClass('default-leftmenu');
            $('body').removeClass('closed-leftmenu');
            $('body').removeClass('icon-overlay');
            $('body').removeClass('icon-text');
            localStorage.setItem("hover-submenu", "True");
            $("head link#theme").attr("href", $(this));
            (document.getElementById("theme").setAttribute("href", "../../assets/css-rtl/sidemenu3.css"))
            $("link#sidemenu").attr("src", $(this));
            (document.getElementById("sidemenu").setAttribute("src", "../../assets/plugins/sidemenu/sidemenu1.js"))
        } else {
            $('body').removeClass('hover-submenu');
            localStorage.setItem("hover-submenu", "false");
            (document.getElementById("theme").removeAttribute("href", "../../assets/css-rtl/sidemenu3.css"))
        }
    });

    $('#myonoffswitch29').click(function() {
        if (this.checked) {
            $('body').addClass('icon-overlay');
            // $('body').addClass('default-sidebar')
            $('body').removeClass('default-leftmenu');
            $('body').removeClass('closed-leftmenu');
            $('body').removeClass('hover-submenu');
            $('body').removeClass('icon-text');
            localStorage.setItem("icon-overlay", "True");
            $("head link#theme").attr("href", $(this));
            (document.getElementById("theme").setAttribute("href", "../../assets/css-rtl/sidemenu.css"))
            $("link#sidemenu").attr("src", $(this));
            (document.getElementById("sidemenu").setAttribute("src", "../../assets/plugins/sidemenu/sidemenu1.js"))
        } else {
            $('body').removeClass('icon-overlay');
            localStorage.setItem("icon-overlay", "false");
            (document.getElementById("theme").removeAttribute("href", "../../assets/css-rtl/sidemenu.css"))
        }
    });

	    /*-- LTR Horizontal Versions --*/
		$('#myonoffswitch34').click(function() {
			if (this.checked) {
				$('body').addClass('default-horizontal');
				$('body').removeClass('centerlogo-horizontal');
				localStorage.setItem("default-horizontal", "True");
			} else {
				$('body').removeClass('default-horizontal');
				localStorage.setItem("default-horizontal", "false");
			}
		});
		$('#myonoffswitch35').click(function() {
			if (this.checked) {
				$('body').addClass('centerlogo-horizontal');
				$('body').removeClass('default-horizontal');
				localStorage.setItem("centerlogo-horizontal", "True");
			} else {
				$('body').removeClass('centerlogo-horizontal');
				localStorage.setItem("centerlogo-horizontal", "false");
			}
		});
	
	
	// ______________Skins 
		
	////////////////////////////////////////////////////
	/*  ############# Horizontal version ########*/
	//////////////////////////////////////////////////


	/* ###########  Horizontal Light  ###########*/

	// $('body').addClass('horizontal-light'); //

	/* ###########  Horizontal color  ###########*/

	// $('body').addClass('horizontal-color'); //

	/* ###########  Horizontal dark  ###########*/

	// $('body').addClass(' horizontal-dark'); //

	/* ###########  Horizontal gradient  ###########*/

	// $('body').addClass(' horizontal-gradient'); //
		
		
	////////////////////////////////////////////////////
	/*  ############# Leftmenu version ########*/
	//////////////////////////////////////////////////

	/* ###########  Leftmenu Light  ###########*/

	// $('body').addClass('leftmenu-light'); //

	/* ###########  Leftmenu color  ###########*/

	//  $('body').addClass('leftmenu-color');  //

	/* ###########  Leftmenu dark  ###########*/

	// $('body').addClass('leftmenu-dark'); //

	/* ###########  Leftmenu gradient  ###########*/

	// $('body').addClass('leftmenu-gradient'); //


	////////////////////////////////////////////////////
	/*  ############# Leftmenu Light Image ########*/
	//////////////////////////////////////////////////
		
		
	/* ###########  backgroundimage-1  ###########*/

	// $('body').addClass(' leftbgimage1'); //

	/* ###########  backgroundimage-2  ###########*/

	// $('body').addClass(' leftbgimage2'); //

	/* ###########  backgroundimage-3  ###########*/

	// $('body').addClass(' leftbgimage3'); //

	/* ###########  backgroundimage-4  ###########*/

	// $('body').addClass(' leftbgimage4'); //

	/* ###########  backgroundimage-5	  ###########*/

	// $('body').addClass(' leftbgimage5'); //

});
	