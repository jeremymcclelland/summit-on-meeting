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

<?php wp_head(); ?>

<!-- BOOTSTRAP CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">

<!-- SLICK SLIDER CSS -->
<link rel="stylesheet" type="text/css" href="/slick/slick.css">
<link rel="stylesheet" type="text/css" href="/slick/slick-theme.css">

<!-- FONT AWESOME -->
<script src="https://use.fontawesome.com/3b1a1fce80.js"></script>

<!-- JQUERY -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>

<?php include( locate_template( 'globals.php', false, false ) ); ?>
</head>


<body <?php body_class(); ?>>

<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-N3QXWWS"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
	
	
	
<div id="page-wrapper" class="container-fluid">

  <a class="skip-link screen-reader-text" href="#content">Skip to content</a>

	<header class="container-fluid">

    <!-- HEADER NAV -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top">
      <a class="navbar-brand" href="/">
        <?php
        if ( $header_logo ) {

          echo "<img src='" . $header_logo . "' alt='" . $header_logo_alt_text . "'>";

        } else {

          echo get_bloginfo( 'name' );

        } // end if ( $header_logo )
        ?>
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#toggledHeaderNav" aria-controls="toggledHeaderNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="sr-only">Toggle navigation</span>
        <i class="fa fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="toggledHeaderNav">
        <ul class="navbar-nav justify-content-end">

          <!-- LINK 1 -->
          <li class="nav-item">
            <a class="nav-link" href="/test-post">Test Post</a>
          </li>

          <!-- LINK 2 -->
          <li class="nav-item dropdown">
            <span class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown</span>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="/test-page">Test Page</a>
              <a class="dropdown-item" href="#">Another action</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#">Something else here</a>
            </div>
          </li>

          <!-- LINK 3 -->
          <li class="nav-item">
            <a class="nav-link" href="/blog">Blog</a>
          </li>

        </ul>
      </div>
    </nav><!-- END HEADER NAV -->
	</header>

	<div id="content" class="container-fluid">
