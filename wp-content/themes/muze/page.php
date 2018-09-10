<?php
/**
* @package WordPress
 * @subpackage Muze
 * @since Muze ATX
 */
?>

<?php get_header(); ?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<div id="main" class="main">
	<?php include('template-parts/page-hero.php'); ?>
	
	<section class="general-page-content">
		<div class="container row">
			<div class="small-12 columns">
				<?php the_content(); ?>
			</div>
		</div>
	</section>
</div>


<?php endwhile; endif; ?>
<?php get_footer(); ?>
