jQuery(document).ready(function($){
	
	// Slick Slider initialization
	$('.hero-slider').slick({
    	infinite: true,
    	dots: true,
    	arrows: true,
    	draggable: true,
    	focusOnSelect: false,
    	appendDots: $('.hero-dots'),
    	appendArrows: $('.hero-arrows')
  	});

  	// Position Menu drawer according to height of nav menu
  	var menuHeight = $('.nav-menu').height();
  	$('.nav-menu').css( "top", 0 - menuHeight );

	// Shrink header when scrolling down
	var shrinkHeader = function(width) {
		width = parseInt(width);
		var scroll = $(window).scrollTop();
		var menuHeight = $('.nav-menu').height();
		if (scroll > 70) {
			$('#header').addClass('header-shrink');
			$('#nav').addClass('nav-shrink');
			if ($(window).width() < 1024) {
				$('.nav-menu').css( "top", 0 - menuHeight - 20 );
			} else {
				$('.nav-menu').css( "top", 0 - menuHeight - 40 );
			}
		} else {
			$('#header').removeClass('header-shrink');
			$('#nav').removeClass('nav-shrink');
			$('.nav-menu').css( "top", 0 - menuHeight );
		}
	}
	$(window).scroll(function() {
	  shrinkHeader($(this).width());
	});
	$(window).resize(function() {
		shrinkHeader($(this).width());
	});

	// Check to see scroll on page load and shrink if necessary
	$(window).on('getScroll',function() {
    	shrinkHeader($(this).width());
	});
	$(window).trigger('getScroll');

	// Open Nav Drawer
	$('#nav-trigger').on('click', function(e) {
		e.preventDefault();
		$('.nav-menu').toggleClass('open');
		var windowWidth = $(window).width();
		if (windowWidth < 1024) {
			$('#nav li.menu-item-has-children').removeClass('open-subnav');
			$('#nav ul.sub-menu').slideUp('fast');
		}
	});

	// Expanding subnavs in nav drawer on medium and small screens
	$('#nav a').on('click', function(e) {
		var windowWidth = $(window).width();
		if (windowWidth < 1024) {
			if ($(this).parent('li').hasClass('menu-item-has-children')) {
				e.preventDefault();
				if ($(this).parent('li').hasClass('open-subnav')) {
					$(this).parent('li').removeClass('open-subnav');
					$(this).siblings('ul.sub-menu').slideUp('fast');
				} else {
					$('#nav ul.sub-menu').slideUp('fast');
					$('#nav li.menu-item-has-children').removeClass('open-subnav');
					$(this).siblings('ul.sub-menu').slideDown('fast');
					$(this).parent('li').addClass('open-subnav');
				}
			}
		}
	});

	// Checks to run when window resizes
	$(window).resize(function() {
		$('.nav-menu').removeClass('open');
		if ($(window).width() > 1023) {
			$('ul.menu li.menu-item-has-children ul.sub-menu').css( "display", "block" );
		} else {
			$('ul.menu li.menu-item-has-children ul.sub-menu').css( "display", "none" );
		}
	});

});

