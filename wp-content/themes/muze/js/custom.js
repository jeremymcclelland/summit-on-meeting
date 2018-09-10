jQuery(document).ready(function($){

	///////////////////// SLIDER /////////////////////

	// Slick Slider initialization
	$('.floorplans-slider').slick({
		centerMode: true,
        centerPadding: '0px',
		slidesToShow: 3,
		slidesToScroll: 1,
		draggable: false,
		initialSlide: 2,
		appendArrows: $('.slider-arrows'),
		responsive: [
		    {
		      breakpoint: 1023,
		      settings: {
		        slidesToShow: 1
		      }
		    },
		  ]
	});

	///////////////////// FULL-SCREEN FANCYBOX /////////////////////
	// $('[data-fancybox="flythrough"]').fancybox({
	// 	fullScreen: {
	//         autoStart: true
	//     }
	// });

	$('[data-fancybox="pano"]').fancybox({
		fullScreen: {
	        autoStart: true
	    }
	});
	
	///////////////////// NAVIGATION /////////////////////

	// Check window size and make appropriate changes
	var onScreenSize = function(width) {
		width = parseInt(width);
		if (width <  1025) {
			$('#header').addClass('nav-collapse').removeClass('nav-expand');
		} else {
			$('#header').addClass('nav-expand').removeClass('nav-collapse');
			if ($('#nav-drawer').hasClass('drawer-open')) {
				$('#nav-drawer').removeClass('drawer-open');
			}
		}
	}
	onScreenSize($(this).width());

	$(window).resize(function() {
		onScreenSize($(this).width());
	});

	// Shrink sticky expanded nav when scrolling down
	$(window).scroll(function() {
	  	if ($(document).scrollTop() > 100) {
		    $('header').addClass('shrink');
		} else {
		    $('header').removeClass('shrink');
	  	}
	});

	// Over class on menu first level, expanded nav
	$('.nav-menu .nav-list li.has-subnav').hover(function() {
		if ($('#header').hasClass('nav-expand')) {
			$(this).toggleClass('hover');
		}
	});

	// Open Nav Drawer
	$('#nav-open').on('click', function(e) {
		e.preventDefault();
		$('#nav-drawer').toggleClass('drawer-open');
		var windowWidth = $(window).width();
		if (windowWidth < 1024) {
			$('.hamburger').toggleClass('is-active');
		}
	});
	// Close Nav Drawer
	$('#nav-close').on('click', function(e) {
		e.preventDefault();
		$('#nav-drawer').removeClass('drawer-open');
	});

	// Open subnavs on nav drawer
	$('#nav-drawer a').on('click', function(e) {
		if ($(this).parent('li').hasClass('has-subnav')) {
			e.preventDefault();
			if ($(this).parent('li').hasClass('open-subnav')) {
				$(this).parent('li').removeClass('open-subnav');
				$(this).siblings('ul.subnav').slideUp('fast');
			} else {
				$('#nav-drawer ul.subnav').slideUp('fast');
				$('#nav-drawer li.has-subnav').removeClass('open-subnav');
				$(this).siblings('ul.subnav').slideDown('fast');
				$(this).parent('li').addClass('open-subnav');
			}
		}
	});


	///////////////////// MISC. FUNCTIONS /////////////////////


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

    // Resize Hero header div to match image
	// function resizeHero() {
	// 	var heroDiv = $('.page-hero');
	// 	var heroImage = $('.hero-img');
	// 	var heroImageMobile = $('.hero-img-mobile');
	// 	var windowWidth = document.documentElement.clientWidth;
	// 	if (windowWidth > 625) {
	// 		heroDiv.height(heroImage.height());
	// 	}
	// 	else {
	// 		heroDiv.height(heroImageMobile.height());
	// 	}
	// }
	// resizeHero();

	$(window).resize(function() { resizeHero(); });

	// Gallery Filter Functionality
	$('.show-all').on('click', function(e) {
		e.preventDefault();
		$(this).addClass('active');
		$(this).siblings().removeClass('active');
		$('.exterior').fadeIn('fast');
		$('.amenity').fadeIn('fast');
		$('.apartment').fadeIn('fast');
		$('.construction').fadeIn('fast');
	});
	$('.show-exterior').on('click', function(e) {
		e.preventDefault();
		$(this).addClass('active');
		$(this).siblings().removeClass('active');
		$('.exterior').fadeIn('fast');
		$('.amenity').fadeOut('fast');
		$('.apartment').fadeOut('fast');
		$('.construction').fadeOut('fast');
	});
	$('.show-amenity').on('click', function(e) {
		e.preventDefault();
		$(this).addClass('active');
		$(this).siblings().removeClass('active');
		$('.exterior').fadeOut('fast');
		$('.amenity').fadeIn('fast');
		$('.apartment').fadeOut('fast');
		$('.construction').fadeOut('fast');
	});
	$('.show-apartment').on('click', function(e) {
		e.preventDefault();
		$(this).addClass('active');
		$(this).siblings().removeClass('active');
		$('.exterior').fadeOut('fast');
		$('.amenity').fadeOut('fast');
		$('.apartment').fadeIn('fast');
		$('.construction').fadeOut('fast');
	});
	$('.show-construction').on('click', function(e) {
		e.preventDefault();
		$(this).addClass('active');
		$(this).siblings().removeClass('active');
		$('.exterior').fadeOut('fast');
		$('.amenity').fadeOut('fast');
		$('.apartment').fadeOut('fast');
		$('.construction').fadeIn('fast');
	});

});

