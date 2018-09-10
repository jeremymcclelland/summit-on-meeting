<?php
/**
* @package WordPress
 * @subpackage Muze
 * @since Muze ATX
 */
?>

<?php get_header(); ?>

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<?php 
	
		$floorplanPopup = get_field('floor_plan_shadowbox');

		echo '<img class="hero-img" alt="Hero Background Image"  src="' . $floorplanPopup . '"/>';               

		?>

	<?php endwhile; endif; ?>

<?php get_footer(); ?>
