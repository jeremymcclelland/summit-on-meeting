<?php
/**
* @package WordPress
 * @subpackage Muze
 * @since Muze ATX
 */
?>

<?php get_header(); ?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<div id="main" class="page-floorplans">

	<?php include('template-parts/page-hero.php'); ?>
	
	<section class="after-hero">
		<div class="container row">
			<div class="small-12 columns">
				<?php the_content(); ?>
			</div>
		</div>
	</section>

	<section class="floor-plans silver-background">
		<div class="container row">
			<div class="small-12 large-8 columns">
				<h2>Find your perfect floor plan.</h2>
			</div>
			<div class="hidden small-12 large-4 columns">
				<a href="<?php echo get_page_link( get_page_by_title( 'S.M.A.R.T. Housing' )->ID ); ?>" class="btn" href="">WHAT IS S.M.A.R.T. HOUSING?</a>
			</div>
			<div class="small-12 columns">
				<?php echo do_shortcode("[pt_view id=018521fg0t]"); ?>
			</div>
		</div>
	</section>

	<?php include('template-parts/blue-gallery.php'); ?>

</div>


<?php endwhile; endif; ?>
<?php get_footer(); ?>
