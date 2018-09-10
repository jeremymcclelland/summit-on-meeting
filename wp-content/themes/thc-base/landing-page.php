<?php
/*
 * Template Name: Landing
 *
 *
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	
<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-N3QXWWS');</script>
<!-- End Google Tag Manager -->
	
	
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">

<!-- CUSTOM FIELD GLOBAL VARIABLES (OPTIONS PAGE) -->
<?php include( locate_template( 'globals.php', false, false ) ); ?>
<link rel="icon" href="<?php echo $favicon; ?>">

<?php wp_head(); ?>

<!-- BOOTSTRAP CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">

<!-- LANDING PAGE CSS -->
<link rel="stylesheet" href="/wp-content/themes/thc-base/landing-page-styles.css">

<!-- FONT AWESOME -->
<script src="https://use.fontawesome.com/3b1a1fce80.js"></script>

<!-- MONTSERRAT -->
<link href="https://fonts.googleapis.com/css?family=Montserrat:100,200,400,500,600,700,800" rel="stylesheet">
	

</head>


<body <?php body_class(); ?>>

<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-N3QXWWS"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
	
	
	
<div id="page-wrapper" class="container-fluid">

	<a class="skip-link screen-reader-text" href="#content">Skip to content</a>
    <div class="sticky-top">
	<header class="container-fluid">

    <!-- HEADER NAV -->
    <nav id="main-nav" class="navbar navbar-expand-lg">
		<!-- Logo -->
      	<a class="navbar-brand" href="/">
			<div id="logo"></div>
       </a>

		<div id="top-white-banner"><img alt="Student Living. Coming Fall 2019." src="/wp-content/uploads/2018/04/corner-banner.png"></div>

	  <!-- mobile menu button -->
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#toggledHeaderNav" aria-controls="toggledHeaderNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="sr-only">Toggle navigation</span>
        <i class="fa fa-bars"></i>
      </button>

			<!-- HEADER MENU -->
      <div class="collapse navbar-collapse" id="toggledHeaderNav">
        <ul class="navbar-nav justify-content-end">
          <!-- MENU ITEM 1 -->
          <li class="nav-item">
            <span id="landing-register-link" class="nav-link header-landing-register-link">SIGN UP</span>
          </li>

          <!-- MENU ITEM 2 -->
          <li class="nav-item dropdown">
            <span id="landing-map-link" class="nav-link">LOCATION</span>
          </li>

          <!-- MENU ITEM 3 -->
          <li class="nav-item">
            <span id="landing-social-link" class="nav-link">SOCIAL</span>
          </li>
        </ul>
      </div>
    </nav><!-- END HEADER NAV -->
	</header>
	</div>

	<div id="content" class="container-fluid">

		<div id="landing-page-hero-section">
			<!-- HERO COPY SECTION -->
			<!--
			<div id="landing-page-hero-copy-section">
				<img src="/wp-content/uploads/2018/04/copy-section-2.jpg">
			</div> --><!-- end .row -->
			<div class="landing-register-link">
				<h2 style="padding-top: 250px; padding-left: 10%; color: #fff;">Discover the Muze in West Campus<br />for reimagined student living.</h2><br />
				<span style="padding-left: 10%; color: #fff;">SIGN UP TODAY FOR THE <strong>VIP WAITLIST!</strong><a href="#"><img style="margin-left: 20px; width: 32px;" src="<?php echo $SITE_URL; ?>/wp-content/uploads/2018/04/down-arrow.png" /></a></span>
			</div>
			
			<!-- FLOATING IMAGE -->
				<div class="image-container">
					<img src="<?php echo $SITE_URL; ?>/wp-content/uploads/2018/04/address-circle.png" />
				</div>
			
		<!-- FORM SECTION -->
		<div id="landing-page-form-section">
			<h3>Interested in signing up for the VIP waitlist?</h3>
			<p>Register using the form below to receive email updates and more.</p>
			<!-- FORM -->
			<?php echo do_shortcode('[wpforms id="256"]'); ?>
		</div>			

			<!-- LARGE LETTERS -->
			<div id="muze-large-letters">
				<!--<img src="/wp-content/uploads/2018/04/muze-letters-large.png">-->
				<img src="<?php echo $SITE_URL; ?>/wp-content/uploads/2018/04/muze-large-letters-1.png" />
			</div>
		</div><!-- end #landing-hero-section -->

		<!-- MOSAIC PHOTO GALLERY (change img src and data-img attr to update an image) -->
		<div id="landing-page-mosaic-gallery" class="row">
			<!-- row 1 -->
			<div style="background-image: url(/wp-content/uploads/2018/04/R03-POOL_THE-MUZE_LR_04.16.18.jpg);" class="col-sm-12 col-md-5 landing-page-gallery-image-wrapper">
					<div class="landing-page-gallery-hover-box">
					<i class="fa fa-search-plus landing-page-image-zoom-in-button" data-img="/wp-content/uploads/2018/04/R03-POOL_THE-MUZE_LR_04.16.18.jpg"></i>
					<div class="landing-page-gallery-hover-box-inner-wrapper">
						<h3>POOL</h3>
						<p>Rooftop area includes pool, outdoor kitchen &amp; theater</p>
					</div>
				</div>
			</div>
			<div style="background-image: url(/wp-content/uploads/2018/04/R06-FIRST-FLOOR-1_THE-MUZE_LR_04.19.18.jpg);" class="col-sm-12 col-md-7 landing-page-gallery-image-wrapper">
				<div class="landing-page-gallery-hover-box">
					<i class="fa fa-search-plus landing-page-image-zoom-in-button" data-img="/wp-content/uploads/2018/04/R06-FIRST-FLOOR-1_THE-MUZE_LR_04.19.18.jpg"></i>
					<div class="landing-page-gallery-hover-box-inner-wrapper">
						<h3>CONCIERGE</h3>
						<p>Front-desk manned by on-site management team</p>
					</div>
				</div>
			</div>

			<!-- row 2 -->
			<div style="background-image: url(/wp-content/uploads/2018/04/R04-SKYLOUNGE-1_THE-MUZE_LR_04.19.18.jpg);" class="col-sm-12 col-md-7 landing-page-gallery-image-wrapper">
				<div class="landing-page-gallery-hover-box">
					<i class="fa fa-search-plus landing-page-image-zoom-in-button" data-img="/wp-content/uploads/2018/04/R04-SKYLOUNGE-1_THE-MUZE_LR_04.19.18.jpg"></i>
					<div class="landing-page-gallery-hover-box-inner-wrapper">
						<h3>SKY LOUNGE</h3>
						<p>Top-floor lounge with downtown views</p>
					</div>
				</div>
			</div>
			<div style="background-image: url(/wp-content/uploads/2018/04/R08-FITNESS_THE-MUZE_LR_03.28.18.jpg);" class="col-sm-12 col-md-5 landing-page-gallery-image-wrapper">
				<div class="landing-page-gallery-hover-box">
					<i class="fa fa-search-plus landing-page-image-zoom-in-button" data-img="/wp-content/uploads/2018/04/R08-FITNESS_THE-MUZE_LR_03.28.18.jpg"></i>
					<div class="landing-page-gallery-hover-box-inner-wrapper">
						<h3>FITNESS CENTER</h3>
						<p>Ultra-modern equipment and views of downtown</p>
					</div>
				</div>
			</div>

			<!-- row 3 -->
			<div style="background-image: url(/wp-content/uploads/2018/04/R01-AERIAL_THE-MUZE_LR_04.16.18.jpg);" class="col-sm-12 col-md-5 landing-page-gallery-image-wrapper">
				<div class="landing-page-gallery-hover-box">
					<i class="fa fa-search-plus landing-page-image-zoom-in-button" data-img="/wp-content/uploads/2018/04/R01-AERIAL_THE-MUZE_LR_04.16.18.jpg"></i>
					<div class="landing-page-gallery-hover-box-inner-wrapper">
						<h3>WEST CAMPUS</h3>
						<p>Close to downtown. Close to campus.</p>
					</div>
				</div>
			</div>
			<div style="background-image: url(/wp-content/uploads/2018/04/R07-FIRST-FLOOR-2_THE-MUZE_LR_04.16.18.jpg);" class="col-sm-12 col-md-7 landing-page-gallery-image-wrapper">
				<div class="landing-page-gallery-hover-box">
					<i class="fa fa-search-plus landing-page-image-zoom-in-button" data-img="/wp-content/uploads/2018/04/R07-FIRST-FLOOR-2_THE-MUZE_LR_04.16.18.jpg"></i>
					<div class="landing-page-gallery-hover-box-inner-wrapper">
						<h3>STUDY ROOMS</h3>
						<p>Genius Lounge and multiple private study rooms</p>
					</div>
				</div>
			</div>

			<!-- row 4 -->
			<div style="background-image: url(/wp-content/uploads/2018/04/R10-UNIT-BEDROOM_THE-MUZE_LR_04.16.18.jpg);" class="col-sm-12 col-md-7 landing-page-gallery-image-wrapper">
				<div class="landing-page-gallery-hover-box">
					<i class="fa fa-search-plus landing-page-image-zoom-in-button" data-img="/wp-content/uploads/2018/04/R10-UNIT-BEDROOM_THE-MUZE_LR_04.16.18.jpg"></i>
					<div class="landing-page-gallery-hover-box-inner-wrapper">
						<h3>BEDROOM</h3>
						<p>Custom furniture packages in every room</p>
					</div>
				</div>
			</div>
			<div style="background-image: url(/wp-content/uploads/2018/04/R09-1-UNIT-KITCHEN_THE-MUZE_LR_04.19.18.jpg);" class="col-sm-12 col-md-5 landing-page-gallery-image-wrapper">
				<div class="landing-page-gallery-hover-box">
					<i class="fa fa-search-plus landing-page-image-zoom-in-button" data-img="/wp-content/uploads/2018/04/R09-1-UNIT-KITCHEN_THE-MUZE_LR_04.19.18.jpg"></i>
					<div class="landing-page-gallery-hover-box-inner-wrapper">
						<h3>FLOOR PLANS</h3>
						<p>Hardwood-style floors and 9-ft ceilings</p>
					</div>
				</div>
			</div>

			<!-- row 5 -->
			<div style="background-image: url(/wp-content/uploads/2018/04/R09-2-UNIT-LIVING-ROOM_THE-MUZE_LR_04.19.18.jpg);" class="col-sm-12 col-md-5 landing-page-gallery-image-wrapper">
				<div class="landing-page-gallery-hover-box">
					<i class="fa fa-search-plus landing-page-image-zoom-in-button" data-img="/wp-content/uploads/2018/04/R09-2-UNIT-LIVING-ROOM_THE-MUZE_LR_04.19.18.jpg"></i>
					<div class="landing-page-gallery-hover-box-inner-wrapper">
						<h3>KITCHEN</h3>
						<p>Quartz countertops and stainless-steel appliances</p>
					</div>
				</div>
			</div>
			<div style="background-image: url(/wp-content/uploads/2018/04/R11-UNIT-BATHROOM_THE-MUZE_LR_04.16.18.jpg);" class="col-sm-12 col-md-7 landing-page-gallery-image-wrapper">
				<div class="landing-page-gallery-hover-box">
					<i class="fa fa-search-plus landing-page-image-zoom-in-button" data-img="/wp-content/uploads/2018/04/R11-UNIT-BATHROOM_THE-MUZE_LR_04.16.18.jpg"></i>
					<div class="landing-page-gallery-hover-box-inner-wrapper">
						<h3>BATHROOM</h3>
						<p>Luxury tile bath surrounds and glass shower enclosures</p>
					</div>
				</div>
			</div>
		</div>

		<!-- MAP SECTION -->
		<div id="landing-page-map-section">
			<div id="landing-page-map-canvas"></div>
		</div>

	</div><!-- #content -->

	<!-- FOOTER -->
	<footer id="main-footer" class="site-footer">

    <div class="row">

      <!-- FOOTER COLUMN 1 -->
      <div id="landing-footer-social-links" class="col-sm-12 col-md-6 col-xl-3">
	      <div class="landing-page-footer-column-inner-wrapper">
					<h6>FOLLOW US ON SOCIAL MEDIA</h6>
					<p>
						@MuzeATX
						<!-- FACEBOOK -->
						<a target="_blank" href="https://facebook.com/muzeatx"><i class='fa fa-facebook-square'></i></a>
						<!-- TWITTER -->
						<a target="_blank" href="https://twitter.com/muzeatx"><i class='fa fa-twitter'></i></a>
						<!-- INSTAGRAM -->
						<a target="_blank" href="https://instagram.com/muzeatx"><i class='fa fa-instagram'></i></a>
					</p>
				</div>
      </div><!-- end column 1 -->


      <!-- FOOTER COLUMN 2 -->
      <div class="col-sm-12 col-md-6 col-xl-3">
	      <div class="landing-page-footer-column-inner-wrapper">
	        <H6>TAKE A TOUR AT</H6>
	        <p>2350 Guadalupe St. Austin. TX 78705 <i class="fa fa-map-marker"></i></p>
				</div>
      </div><!-- end column 2 -->

      <!-- FOOTER COLUMN 3 -->
      <div class="col-sm-12 col-md-6 col-xl-3">
	      <div class="landing-page-footer-column-inner-wrapper">
	        <h6>CONTACT US AT:</h6>
	        <p>
				<a href="tel:5123665664">512 366 5664</a> <i class="fa fa-phone"></i>
				<br>
				<a href="mailto:muze@achliving.com">muze@achliving.com</a> <i class="fa fa-envelope" style="font-size: 1.7em;"></i>
			</p>
				</div>
      </div><!-- end column 3 -->

      <!-- FOOTER COLUMN 4 -->
      <div class="col-sm-12 col-md-6 col-xl-3">
	      <div class="landing-page-footer-column-inner-wrapper">
	        <img src="<?php echo $footer_logo; ?>">
				</div>
      </div><!-- end column 4 -->
    </div><!-- .row -->

	</footer><!-- #colophon -->
</div><!-- #page -->


<!-- IMAGE LIGHTBOX POPUP WINDOW -->
<div id="landing-page-image-popup-window">
	<!-- CLOSE BUTTON -->
	<i id="landing-page-image-zoom-out-button" class="fa fa-times-circle"></i>
	<div id="landing-page-lightbox-background-fade"></div>
	<!-- PREVIOUS SLIDE ARROW -->
	<div id="landing-page-lightbox-previous-arrow" class="lightbox-pagination-arrow">
		<img src="/wp-content/uploads/2018/04/left-arrow.png">
	</div>
	<!-- IMAGE INNER WRAPPER -->
	<div id="landing-page-image-popup-window-inner-wrapper">
		<img id="landing-page-image-popup-image" src="">
	</div>
	<!-- NEXT SLIDE ARROW -->
	<div id="landing-page-lightbox-next-arrow" class="lightbox-pagination-arrow">
		<img src="/wp-content/uploads/2018/04/right-arrow.png">
	</div>
</div>


<!-- JQUERY -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>

<!-- BOOTSTRAP JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
	
<script>
$(window).scroll(function() {
  if ($(this).scrollTop() > 40) {
	$('#main-nav').addClass('new-color');
	$('.fa-bars').addClass('new-color-2');
	$('.navbar-nav .nav-link').addClass('new-color-2');
	$('#logo').addClass('blue-logo');
  }
  else {
    $('#main-nav').removeClass('new-color');
    $('.fa-bars').removeClass('new-color-2');	  
	$('.navbar-nav .nav-link').removeClass('new-color-2');
	$('#logo').removeClass('blue-logo');
  }
});
</script>
	
<!-- HERO IMAGE PAGE SCROLL SCRIPT -->
<script>
// 	link to form section
$('#landing-register-link, .header-landing-register-link, .landing-register-link').click(function() {
	formSectionPosition = $('#landing-page-form-section').offset().top;
	$('html, body').animate({
		scrollTop: formSectionPosition
	}, 600);
	if ( $(this).hasClass('header-landing-register-link') ) {
		$('header .navbar-toggler').click();
	}
});
	
// 	link to map section
$('#landing-map-link').click(function() {
	formSectionPosition = $('#landing-page-map-section').offset().top;
	$('html, body').animate({
		scrollTop: formSectionPosition
	}, 1000);
	$('header .navbar-toggler').click();
});
	
// 	link to contact/social section
$('#landing-social-link').click(function() {
	formSectionPosition = $('#main-footer').offset().top;
	$('html, body').animate({
		scrollTop: formSectionPosition
	}, 1000);
	$('header .navbar-toggler').click();
});
</script>



<!-- GALLERY IMAGE ZOOM SCRIPTS -->
<script>
$('.landing-page-image-zoom-in-button').click(function() {
	var image = $(this).attr('data-img');
	var slideNumber = $(this).attr('data-slide-number');
	$('#landing-page-image-popup-image').attr('src', image);
	$('#landing-page-image-popup-window').show();
	$('#landing-page-image-popup-window').attr('data-slide-number', slideNumber);
	
});

$('#landing-page-image-zoom-out-button, #landing-page-lightbox-background-fade').click(function() {
	$('#landing-page-image-popup-window').hide();
});
$(window).keyup(function(event) {
	if (event.keyCode == 27) {
		$('#landing-page-image-popup-window').hide();
	}
});
	
// LIGHTBOX GALLERY PAGINATION
// add index numbers for slide pagination
$(window).load(function() {
	$('.landing-page-image-zoom-in-button').each(function(index) {
		$(this).attr('data-slide-number', index);
	});
});
// HANDLE NEXT ARROW CLICK
$('#landing-page-lightbox-next-arrow, #landing-page-image-popup-window-inner-wrapper').click(function() {
	var slideNumber = $('#landing-page-image-popup-window').attr('data-slide-number');
	var lastSlide = $('#landing-page-mosaic-gallery .landing-page-gallery-image-wrapper:last-of-type .landing-page-image-zoom-in-button').attr('data-slide-number');
	if (slideNumber == lastSlide) {
		var imageUrl = $('#landing-page-mosaic-gallery .landing-page-gallery-image-wrapper:first-of-type .landing-page-image-zoom-in-button').attr('data-img');
		$('#landing-page-image-popup-image').attr('src', imageUrl);
		$('#landing-page-image-popup-window').attr('data-slide-number', '0');
	} else {
		var imageUrl = $('.landing-page-image-zoom-in-button[data-slide-number="' + (parseInt(slideNumber) + 1) + '"]').attr('data-img');
		$('#landing-page-image-popup-window').attr('data-slide-number', (parseInt(slideNumber) + 1));
		$('#landing-page-image-popup-image').attr('src', imageUrl);
	} // end if (slideNumber == lastSlide)
});
// HANDLE PREVIOUS ARROW CLICK
$('#landing-page-lightbox-previous-arrow').click(function() {
	var slideNumber = $('#landing-page-image-popup-window').attr('data-slide-number');
	var firstSlide = $('#landing-page-mosaic-gallery .landing-page-gallery-image-wrapper:first-of-type .landing-page-image-zoom-in-button').attr('data-slide-number');
	var lastSlide = $('#landing-page-mosaic-gallery .landing-page-gallery-image-wrapper:last-of-type .landing-page-image-zoom-in-button').attr('data-slide-number');
	if (slideNumber == firstSlide) {
		var imageUrl = $('#landing-page-mosaic-gallery .landing-page-gallery-image-wrapper:last-of-type .landing-page-image-zoom-in-button').attr('data-img');
		$('#landing-page-image-popup-image').attr('src', imageUrl);
		$('#landing-page-image-popup-window').attr('data-slide-number', lastSlide);
	} else {
		var imageUrl = $('.landing-page-image-zoom-in-button[data-slide-number="' + (parseInt(slideNumber) - 1) + '"]').attr('data-img');
		$('#landing-page-image-popup-image').attr('src', imageUrl);
		$('#landing-page-image-popup-window').attr('data-slide-number', (parseInt(slideNumber) - 1));
	} // end if (slideNumber == lastSlide)
});
</script>


<!-- MAP SCRIPTS -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD6CG1xmRJTwYgAlRQnaH-NlENfGzdVgsM"></script>

<script>
function initialize() {
	const mapOptions = {
		zoom: 15,
		center: new google.maps.LatLng(30.284076, -97.744151),
		mapTypeId: google.maps.MapTypeId.ROADMAP,
		panControl: true,
		zoomControl: true,
		scaleControl: true,
		scrollwheel: false,
		draggable: true,
		styles: [{"featureType":"administrative","elementType":"labels.text.fill","stylers":[{"color":"#444444"}]},{"featureType":"administrative","elementType":"labels.text.stroke","stylers":[{"color":"#ff0000"},{"lightness":"100"}]},{"featureType":"administrative.country","elementType":"labels.text.fill","stylers":[{"color":"#0fbcd9"}]},{"featureType":"administrative.province","elementType":"labels.text.fill","stylers":[{"color":"#0fbcd9"}]},{"featureType":"administrative.locality","elementType":"labels.text.fill","stylers":[{"color":"#0fbcd9"},{"visibility":"on"}]},{"featureType":"administrative.neighborhood","elementType":"labels.text.fill","stylers":[{"color":"#0fbcd9"}]},{"featureType":"administrative.land_parcel","elementType":"labels.text.fill","stylers":[{"color":"#0fbcd9"}]},{"featureType":"landscape","elementType":"all","stylers":[{"color":"#ffffff"}]},{"featureType":"poi","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"road","elementType":"all","stylers":[{"saturation":-100},{"lightness":45}]},{"featureType":"road","elementType":"geometry","stylers":[{"color":"#f5f5f5"}]},{"featureType":"road","elementType":"labels.text.fill","stylers":[{"color":"#9c9c9c"},{"saturation":"-100"},{"lightness":"35"}]},{"featureType":"road.highway","elementType":"all","stylers":[{"visibility":"simplified"},{"lightness":"3"}]},{"featureType":"road.arterial","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"transit","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"water","elementType":"all","stylers":[{"color":"#0fbcd9"},{"visibility":"on"}]}]
	}; /* end const mapOptions */

	const map = new google.maps.Map(document.getElementById('landing-page-map-canvas'), mapOptions);

	<!-- MAP MARKER ONE (Property) -->
	markerOne = new google.maps.Marker({
		position: new google.maps.LatLng(30.284076, -97.744151),
		map: map,
		icon: "/wp-content/uploads/2018/04/map-pin-blue-e1522848433379.png",
		zIndex: 100
	});

	infoWindowOne = new google.maps.InfoWindow({
		content: "<p style='font-size: 20px; font-weight: bold; color: #09bcda;'>Muze</p><p>2100 Nueces<br />Austin. TX 78705<br><a target='_blank' href='https://www.google.com/maps/dir//2100+Nueces,+Austin,+TX+78705/@30.2869567,-97.7453505,16z'>Get directions</a></p>"
	});

	var infoWindowOneOpen = false;

	google.maps.event.addListener(markerOne, 'click', function() {
		if (infoWindowOneOpen) {
			infoWindowOne.close(map, markerOne)
			infoWindowOneOpen = false;
		} else {
			infoWindowOne.open(map, markerOne)
			infoWindowOneOpen = true;
		}
	});

	<!-- MAP MARKER TWO (Leasing Office) -->
	markerTwo = new google.maps.Marker({
		position: new google.maps.LatLng(30.287412, -97.741888),
		map: map,
		icon: "/wp-content/uploads/2018/04/map-pin-black-e1522848442375.png",
		zIndex: 100
	});

	infoWindowTwo = new google.maps.InfoWindow({
		content: "<p style='font-size: 20px; font-weight: bold; color: #09bcda;'>Leasing<br>Office</p><p>2350 Guadalupe St.<br />Austin. TX 78705<br><a target='_blank' href='https://www.google.com/maps/dir//2350+Guadalupe+St,+Austin,+TX+78705/@30.2869567,-97.7453505,16z'>Get directions</a></p>"
	});

	var infoWindowTwoOpen = false;

	google.maps.event.addListener(markerTwo, 'click', function() {
		if (infoWindowTwoOpen) {
			infoWindowTwo.close(map, markerTwo)
			infoWindowTwoOpen = false;
		} else {
			infoWindowTwo.open(map, markerTwo)
			infoWindowTwoOpen = true;
		}
	});
	
	// Define the LatLng coordinates for the polygon's path.
	const UniversityOfTexasOutlineCoords = [
		new google.maps.LatLng(30.281885, -97.742110),
		new google.maps.LatLng(30.289795, -97.741365),
		new google.maps.LatLng(30.289137, -97.730468),
		new google.maps.LatLng(30.286731, -97.725282),
		new google.maps.LatLng(30.278594, -97.730505),
		new google.maps.LatLng(30.281885, -97.742110)
	];

	// Construct the polygon.
	var UniversityOfTexasOutline = new google.maps.Polygon({
		paths: UniversityOfTexasOutlineCoords,
		strokeColor: '#09bcda',
		strokeOpacity: 0.8,
		strokeWeight: 0,
		fillColor: '#09bcda',
		fillOpacity: 0.25
	});

	UniversityOfTexasOutline.setMap(map);
} /* end initialize() */

google.maps.event.addDomListener(window, 'load', initialize);
		
</script>

<?php wp_footer(); ?>

</body>
</html>