<?php
/**
* @package WordPress
 * @subpackage Muze
 * @since Muze ATX
 */
?>

<!DOCTYPE html>
<!--[if IE 8]><html class="no-js lt-ie10 lt-ie9" lang="en"> <![endif]-->
<!--[if IE 9]><html class="no-js lt-ie10" lang="en"> <![endif]-->
<html lang="en" xml:lang="en">
	<head>
		
		<!-- Global site tag (gtag.js) - Google Analytics -->

<script async src="https://www.googletagmanager.com/gtag/js?id=UA-128081557-2"></script>

<script>

  window.dataLayer = window.dataLayer || [];

  function gtag(){dataLayer.push(arguments);}

  gtag('js', new Date());

 

  gtag('config', 'UA-128081557-2');

</script>
		
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title><?php bloginfo('name'); ?> | <?php is_front_page() ? bloginfo('description') : wp_title(''); ?></title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="Discover the Muze in West Campus near the University of Texas in Austin, for Reimagined Student Living.">

		<link rel="apple-touch-icon" sizes="57x57" href="<?php echo get_template_directory_uri(); ?>/images/favicons/apple-icon-57x57.png?v=1.2">
		<link rel="apple-touch-icon" sizes="60x60" href="<?php echo get_template_directory_uri(); ?>/images/favicons/apple-icon-60x60.png?v=1.2">
		<link rel="apple-touch-icon" sizes="72x72" href="<?php echo get_template_directory_uri(); ?>/images/favicons/apple-icon-72x72.png?v=1.2">
		<link rel="apple-touch-icon" sizes="76x76" href="<?php echo get_template_directory_uri(); ?>/images/favicons/apple-icon-76x76.png?v=1.2">
		<link rel="apple-touch-icon" sizes="114x114" href="<?php echo get_template_directory_uri(); ?>/images/favicons/apple-icon-114x114.png?v=1.2">
		<link rel="apple-touch-icon" sizes="120x120" href="<?php echo get_template_directory_uri(); ?>/images/favicons/apple-icon-120x120.png?v=1.2">
		<link rel="apple-touch-icon" sizes="144x144" href="<?php echo get_template_directory_uri(); ?>/images/favicons/apple-icon-144x144.png?v=1.2">
		<link rel="apple-touch-icon" sizes="152x152" href="<?php echo get_template_directory_uri(); ?>/images/favicons/apple-icon-152x152.png?v=1.2">
		<link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_template_directory_uri(); ?>/images/favicons/apple-icon-180x180.png?v=1.2">
		<link rel="icon" type="image/png" sizes="192x192"  href="<?php echo get_template_directory_uri(); ?>/images/favicons/android-icon-192x192.png?v=1.2">
		<link rel="icon" type="image/png" sizes="32x32" href="<?php echo get_template_directory_uri(); ?>/images/favicons/favicon-32x32.png?v=1.2">
		<link rel="icon" type="image/png" sizes="96x96" href="<?php echo get_template_directory_uri(); ?>/images/favicons/favicon-96x96.png?v=1.2">
		<link rel="icon" type="image/png" sizes="16x16" href="<?php echo get_template_directory_uri(); ?>/images/favicons/favicon-16x16.png?v=1.2">
		<link rel="manifest" href="<?php echo get_template_directory_uri(); ?>/images/favicons/manifest.json">
		<meta name="msapplication-TileColor" content="#ffffff">
		<meta name="msapplication-TileImage" content="<?php echo get_template_directory_uri(); ?>/images/favicons/ms-icon-144x144.png?v=1.2">
		<meta name="theme-color" content="#ffffff">

		<!-- Font Awesome -->
		<script src="https://use.fontawesome.com/3b1a1fce80.js"></script>

		<!-- Google Webfonts -->
		<link href="https://fonts.googleapis.com/css?family=Montserrat:200,300,400,500,600,700" rel="stylesheet" />

		<?php wp_head(); ?>

		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.3.5/jquery.fancybox.min.css" />
		<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.3.5/jquery.fancybox.min.js"></script>

		<?php
	    	if( !function_exists('mobile_user_agent_switch') ){
				function mobile_user_agent_switch(){
					$templateDirectory = get_template_directory_uri();
					$device = '';
					
					if( stristr($_SERVER['HTTP_USER_AGENT'],'ipad') ) {
						$device = "ipad";
					} else if( stristr($_SERVER['HTTP_USER_AGENT'],'iphone') || strstr($_SERVER['HTTP_USER_AGENT'],'iphone') ) {
						$device = "iphone";
					} else if( stristr($_SERVER['HTTP_USER_AGENT'],'blackberry') ) {
						$device = "blackberry";
					} else if( stristr($_SERVER['HTTP_USER_AGENT'],'android') ) {
						$device = "android";
					}
					
					if( $device ) {
						echo '<link rel="stylesheet" type="text/css" href="' . $templateDirectory . '/css/mobile.css" />'; 
					} return false; {
						return false;
					}
				}
			}
			echo mobile_user_agent_switch();
		?>

		<!-- GA Tracking -->
		<script>
		  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

		  ga('create', 'UA-49919521-52', 'auto');
		  ga('send', 'pageview');
		</script>

		<!-- Google Tag Manager -->
		<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
		new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
		j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
		'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
		})(window,document,'script','dataLayer','GTM-N3QXWWS');</script>
		<!-- End Google Tag Manager -->
		
	</head>
	
	<body 
		<?php 
			global $wp_query;
			$slug = $wp_query->post->post_name;
			$type = $wp_query->post->post_type;
			$bodyClass = $type . '_' . $slug;

			body_class($bodyClass); 
		?>
	>

		<!-- Google Tag Manager (noscript) -->
		<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-N3QXWWS"
		height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
		<!-- End Google Tag Manager (noscript) -->

		<div class="body-wrapper">

			<header id="header" class="header">
				<div class="colour-overlay"></div>
				<div class="row header-container">
					<div class="small-12 columns">
						<a class="home-link" alt="Muze Logo" href="<?php echo get_home_url(); ?>"><div class="header-logo">Muze</div></a>
						<nav id="nav" class="nav-menu hide-medium-and-down">
							<?php wp_nav_menu( array( 'theme_location' => 'main-menu', 'container_class' => 'nav-list' ) ); ?>
						</nav>
						<div class="contact-nav hide-medium-and-down">
							<ul>
								<?php
		                            $number = of_get_option('leasing_phone');
		                            $twitter = of_get_option('social_twitter');
		                            $facebook = of_get_option('social_facebook');
		                            $instagram = of_get_option('social_insta');
		                            $rent = of_get_option('pay_rent');

		                            if ($number) {
		                                echo '	<li class="telephone">
		                                			<a href="tel:' . $number . '">' . $number . '</a>
		                                		</li>';
		                            }
		                            if ($facebook) {
		                                echo '	<li class="facebook">
		                                			<a href="' . $facebook . '" target="_blank"><i class="fa fa-facebook-square"></i></a>
		                                		</li>';
		                            }
		                            if ($twitter) {
		                                echo '	<li class="twitter">
					                                <a href="' . $twitter . '" target="_blank"><i class="fa fa-twitter"></i></a>
			                                	</li>';
		                            }
		                            if ($instagram) {
		                                echo '	<li class="instagram">
		                                			<a href="' . $instagram . '" target="_blank"><i class="fa fa-instagram"></i></a>
		                                		</li>';
		                            }
		                            if ($rent) {
		                            	echo '	<li class="pay-rent">
		                            				<a href="' . $rent . '">Pay Rent</a>
		                            			</li>';
		                            }
		                        ?>
		                    </ul>
						</div>
						<div class="contact-nav-mobile hide-large-and-up">
							<ul>
								<?php
		                            $rent = of_get_option('pay_rent');
		                            if ($rent) {
		                            	echo '	<li class="pay-rent">
		                            				<a href="' . $rent . '">Pay Rent</a>
		                            			</li>';
		                            }
		                        ?>
		                    </ul>
						</div>
					</div>
					<div id="nav-open" class="nav-trigger open hide-large-and-up">
						<div class="hamburger">
						  	<div class="hamburger-box">
						    	<div class="hamburger-inner"></div>
						  	</div>
						</div>
					</div>
				</div>
			</header>
