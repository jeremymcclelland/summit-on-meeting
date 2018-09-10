<?php
/**
* @package WordPress
 * @subpackage Muze
 * @since Muze ATX
 */
?>

<?php get_header(); ?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<div id="main" class="page-gallery">

	<?php include('template-parts/page-hero.php'); ?>
	
	<section class="pano-tour-container">
		<div class="container row">
			<div class="small-12 columns">
				<?php the_content(); ?>
			</div>
			<div class="small-12 columns pano-tour">
				<div class="pano-container pano-16x9">
					<iframe class="panorama" src="https://muzeatx.com/360VR/tour.html" allowfullscreen></iframe>
				</div>
			</div>
			<div class="small-12 columns">
				<h2>Watch our <strong>fly through video.</strong></h2>
			</div>
			<div class="small-12 columns pano-tour">
				<video id="walkthrough" src="<?php echo get_template_directory_uri();?>/video/muze-flythrough.mp4" height="1080" width="1920" poster="" controls autoplay muted loop>Muze Fly-through Video</video>
			</div>
		</div>
	</section>

	<section class="gallery-nav no-padding-bottom">
		<div class="container row">
			<div class="small-12 columns">
				<h2>View photos and renderings below.</h2>
				<ul class="filter-navigation">
					<li class="show-all active">All Renderings</li>
					<li class="show-amenity">Amenity<span class="hide-medium-and-down"> Renderings</span></li>
					<li class="show-apartment">Apartment<span class="hide-medium-and-down"> Renderings</span></li>
					<li class="show-exterior">Exterior<span class="hide-medium-and-down"> Renderings</span></li>
					<!-- <li class="show-construction">Construction<span class="hide-medium-and-down"> Progress</span></li> -->
				</ul>
			</div>
		</div>
	</section>

	<section class="blue-gallery silver-background">
		<div class="row container">
			<?php 
				if( have_rows('gallery') ):
					while( have_rows('gallery') ): the_row(); 
						
						// vars
						$image_background = get_sub_field('gallery_image');
						$image_width = get_sub_field('image_width');
						$overlay_text = get_sub_field('overlay_text');
						$image_category = get_sub_field('image_category');
						$div_width = '';

						if ($image_width == 'full') {
							$div_width = 'small-12 medium-6 large-12';
						}
						elseif ($image_width == 'third') {
							$div_width = 'small-12 medium-6 large-4';
						}
						elseif ($image_width == 'five') {
							$div_width = 'small-12 medium-6 large-5';
						}
						elseif ($image_width == 'seven') {
							$div_width = 'small-12 medium-6 large-7';
						}

						echo '
							<div class="image-wrapper ' . $div_width . ' columns ' . $image_category . '">
								<div class="gallery-image image-background" style="background-image: url(' . $image_background . ');">
									<div class="overlay">
										' . $overlay_text . '
										<a data-lightbox="gallery" href="' . $image_background . '"><div class="expand"></div></a>
									</div>
								</div>
							</div>';
					endwhile; 
				endif;
				                                            
			?>
		</div>
	</section>

</div>


<?php endwhile; endif; ?>
<?php get_footer(); ?>
