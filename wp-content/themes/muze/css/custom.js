jQuery(document).ready(function($){

	///////////////////// SLIDER /////////////////////

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

	
	///////////////////// NAVIGATION /////////////////////

  	// Position Menu drawer according to height of nav menu
  	function navTop() {
		var menuHeight = $('.nav-menu').height();
		var shrink = $(window).scrollTop();
		if (shrink > 70) {
	    	if ($(window).width() < 1024) {
				$('.nav-menu').css( "top", 0 - menuHeight - 20 );
			} else {
				$('.nav-menu').css( "top", 0 - menuHeight - 40 );
			}
	    } else {
	    	$('.nav-menu').css( "top", 0 - menuHeight );
	    }
	}
	navTop();
    
    // Position Menu drawer every time window is resized or scrolled
    $(window).resize(function() { navTop(); });
	$(window).scroll(function() { navTop(); });

	// Shrink header when scrolling down
	var shrinkHeader = function(width) {
		width = parseInt(width);
		var scroll = $(window).scrollTop();
		if (scroll > 70) {
			$('#header').addClass('header-shrink');
			$('#nav').addClass('nav-shrink');
		} else {
			$('#header').removeClass('header-shrink');
			$('#nav').removeClass('nav-shrink');
		}
	}
	$(window).scroll(function() {
	  shrinkHeader($(this).width());
	});

	// Check to see scroll on page load and shrink if necessary
	$(window).on('getScroll',function() {
    	shrinkHeader($(this).width());
	});
	$(window).trigger('getScroll');

	
	// Open Nav Drawer
	$('.nav-trigger').on('click', function(e) {
		e.preventDefault();
		$('.nav-menu').toggleClass('open');
		var windowWidth = $(window).width();
		if (windowWidth < 1024) {
			$('.hamburger').toggleClass('is-active');
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

	// Close nav drawer when window resizes
	$(window).resize(function() {
		$('.nav-menu').removeClass('open');
		shrinkHeader($(this).width());
		if ($(window).width() > 1023) {
			$('ul.menu li.menu-item-has-children ul.sub-menu').css( "display", "block" );
		} else {
			$('ul.menu li.menu-item-has-children ul.sub-menu').css( "display", "none" );
		}
	});


	///////////////////// MISC. FUNCTIONS /////////////////////


	// People & Community Page - Hide/Show Careers listings
	$('.career-trigger').on('click', function(e) {
		e.preventDefault();
		$('.nav-menu').toggleClass('trigger-open');
	});

    // Replace all SVG images with inline SVG
    $('img.svg').each(function(){
        var img = $(this);
        var imgID = img.attr('id');
        var imgClass = img.attr('class');
        var imgURL = img.attr('src');

        $.get(imgURL, function(data) {
            var svg = $(data).find('svg');

            // Add replaced image's ID to the new SVG
            if(typeof imgID !== 'undefined') {
                svg = svg.attr('id', imgID);
            }
            // Add replaced image's classes to the new SVG
            if(typeof imgClass !== 'undefined') {
                svg = svg.attr('class', imgClass+' replaced-svg');
            }

            // Remove invalid XML tags
            svg = svg.removeAttr('xmlns:a');

            // Replace image with new SVG
            img.replaceWith(svg);

        }, 'xml');

    });

});

