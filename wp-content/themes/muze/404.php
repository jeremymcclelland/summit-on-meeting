<?php
/**
 * @package WordPress
 * @subpackage Muze
 * @since Muze ATX
 */
?>

<?php get_header(); ?>

<section class="page-hero image-background" style="background-image: url('<?php echo get_template_directory_uri(); ?>/images/hematite-forest.jpg');">
	<div class="container row text-center text-invert">
		<div class="small-12 columns">
			<p class="pre-title">Uh-Oh</p>
			<h1 class="primary-h1">404 Error - Page Not Found</h1>
		</div>
	</div>
</section>

<div id="main" class="main error-404">
	<section class="general-page-content">
		<div class="container row">
			<div class="small-12 columns">
				<h2 class="primary-h2">Sorry, we can't seem to find that page.</h2>
				<p>The page you were looking for doesn't exist, or may have been moved. Please use the navigation links above to find your way back to our site.</p>
			</div>
		</div>
	</section>
</div>

<?php get_footer(); ?>
