<?php
/**
* @package WordPress
 * @subpackage Muze
 * @since Muze ATX
 */
?>

<?php get_header(); ?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<div id="main" class="page-smart-housing">
	<?php include('template-parts/page-hero.php'); ?>
	
	<section class="smart-housing-intro">
		<div class="container row">
			<div class="small-12 columns">
				<h2><?php the_title(); ?></h2>
			</div>
			<div class="small-12 large-7 columns">
				<h3><?php echo the_field('subhead'); ?></h3>
			</div>
			<div class="small-12 large-5 columns">
				<a href="<?php echo the_field('button_link'); ?>" class="btn" target="_blank"><?php echo the_field('button_text'); ?></a>
			</div>
			<div class="small-12 columns">
				<?php echo the_field('text'); ?>
			</div>
		</div>
	</section>

	<section class="general-page-content silver-background">
		<div class="container row">
			<div class="small-12 columns">
				<?php the_content(); ?>
			</div>
		</div>
	</section>
</div>


<?php endwhile; endif; ?>
<?php get_footer(); ?>
