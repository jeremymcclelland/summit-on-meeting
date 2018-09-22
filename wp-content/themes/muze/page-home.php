<?php
/**
* @package WordPress
 * @subpackage Muze
 * @since Muze ATX
 */
?>

<?php get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>


<div id="main" class="page-homepage">
	
	<section class="homepage-hero no-padding-bottom no-padding-top">
		<div class="hero-text">
			<div class="container row text-invert">
				<div class="small-12 columns">
					<?php the_content(); ?>
					<div class="home-page-flash">
						Visit our<br />leasing center at<br /><span><a href="https://goo.gl/maps/nbUsDSS6CTp" target="_blank">363<br />King Street, Charleston, SC</a></span>
					</div>
				</div>
			</div>
		</div>
		<?php
			$hero_img = wp_get_attachment_url( get_post_thumbnail_id($post->ID), 'full' );
			$hero_img_mobile = get_field('mobile_featured_image');
            
            echo '	<img class="home-hero-img hide-small-and-down" alt="Hero Background Image" src="' . $hero_img . '"/>
            		<img class="home-hero-img hide-medium-and-up" alt="Hero Background Image" src="' . $hero_img_mobile . '"/>';
        ?>
	</section>

	<section class="hidden pano image-background">
		<div class="container row text-invert">
			<div class="small-12 large-6 columns">
				<h2><?php echo the_field('pano_headline'); ?></h2>
			</div>
			<div class="small-12 large-6 columns">
				<a class="popup-link hide-small-and-down" data-fancybox="flythrough" href="https://muzeatx.com/muze-flythrough-video/muze-flythrough.mp4">
					<div class="video-button"></div>
					Fly-through Video
				</a>
				<a class="popup-link hide-medium-and-up" data-fancybox="flythrough-mobile" href="https://muzeatx.com/muze-flythrough-video/muze-flythrough-mobile.mp4">
					<div class="video-button"></div>
					Fly-through Video
				</a>
				<a class="popup-link" data-fancybox="pano" data-type="iframe" data-src="https://muzeatx.com/360VR/tour.html" href="javascript:;">
					<div class="pano-button"></div>
					3D Virtual Reality Tour
				</a>
			</div>
		</div>
	</section>

	<section class="floorplans">
		<div class="container row">
			<div class="small-12 large-9 columns">
				<h2><?php echo the_field('floor_plans_headline'); ?></h2>
			</div>
			<div class="small-12 large-3 columns">
				<?php 
					$floorplans_link = get_field('floor_plans_link');
					$floorplans_url = $floorplans_link['url'];
					$floorplans_title = $floorplans_link['title'];

					echo '<a class="btn" href="' . $floorplans_url . '">' . $floorplans_title . '</a>';
				?>
			</div>
		</div>
		<div class="container row">
			<div class="small-10 small-push-1 columns">
				<?php
					$loop = new WP_Query( array( 
								'post_type' => 'floorplan',  
								'posts_per_page' => '-1', 
								'order' => 'ASC' ) 
							);

						if ( $loop->have_posts() ) :
	    					
							echo '<div id="floorplans-slider" class="floorplans-slider">';

	    					while ( $loop->have_posts() ) : $loop->the_post();
	    						
	    						$floorplan_title = get_the_title();
	    						$floorplan_layout = get_field('layout');
	    						$floorplan_sf = get_field('square_footage');
	    						$floorplan_image = get_field('image');
	    						$floorplan_popup = get_field('floor_plan_shadowbox');
	    					

	    						echo '	<div class="floorplans-slide">
	    									<img class="floorplan-slide-image" src="' . $floorplan_image . '" />
	    									<div class="floorplan-info">
		    									<p class="floorplan-slide-title">' . $floorplan_title . ' | ' . $floorplan_layout . '</h3>
		    									<p class="">' . $floorplan_sf . '</p>
	    									</div>
	    									<a class="floorplan-link btn small" data-fancybox="floorplans" href="' . $floorplan_popup . '">View Floor Plan</a>
	    								</div>';

	    					endwhile;

	    					echo '</div>';

	    				endif;
					wp_reset_query();
				?>
			</div>
			<div class="small-12 columns">
				<div class="slider-arrows"></div>
			</div>
		</div>
	</section>

	<section class="amenities image-background">
		<div class="container row text-invert">
			<div class="small-12 large-7 columns">
				<h2><?php echo the_field('amenities_headline'); ?></h2>
				<?php 
					$amenities_link = get_field('amenities_link');
					$amenities_url = $amenities_link['url'];
					$amenities_title = $amenities_link['title'];

					echo '<a class="btn invert" href="' . $amenities_url . '">' . $amenities_title . '</a>';
				?>
			</div>
	</section>
	<section class="amenities-images no-padding-bottom no-padding-top hide-small-and-down">
		<div class="row collapse">
			<div class="small-12 medium-6 columns">
				<img class="amenity-img shift-left" src="<?php echo get_template_directory_uri();?>/images/home-pool.jpg" />
			</div>
			<div class="small-12 medium-6 columns">
				<img class="amenity-img shift-right" src="<?php echo get_template_directory_uri();?>/images/home-lounge2.jpg" />
			</div>
		</div>
	</section>

	<section class="location">
		<div class="container row">
			<div class="small-12 large-9 columns">
				<h2><?php echo the_field('map_headline'); ?></h2>
				<?php echo the_field('map_copy'); ?>
			</div>
			<div class="hidden small-12 columns">
				<img class="map-flash" src="<?php echo get_template_directory_uri();?>/images/home-location-flash.png" />
			</div>
		</div>
		<div id="map-canvas" class="hidden map-canvas"></div>
	</section>

	<section id="map-wrapper">
		<?php get_sidebar('google-map'); ?>
	</section>

	<section class="pre-footer">
		<div class="container row">
			<div class="small-12 large-4 columns social-feed">
				<h3><i class="fa fa-twitter"></i> Tweets <span>by @SummitPlace1</span></h2>
				<?php echo do_shortcode( '[custom-twitter-feeds]' ); ?>
			</div>
			<div class="small-12 large-4 columns social-feed">
				<h3><i class="fa fa-instagram"></i> Instagram <span>by @SummitPlace1</span></h2>
				<?php echo do_shortcode( '[instagram-feed]' ); ?>
			</div>
			<div class="small-12 large-4 columns social-feed">
				<h3><i class="fa fa-facebook-square"></i> Facebook <span>by @SummitPlace1</span></h2>
				<?php echo do_shortcode( '[custom-facebook-feed]' ); ?>
			</div>
		</div>
	</section>

</div>

<?php endwhile; ?>
<?php // include('template-parts/map-build.php'); ?>
<?php get_footer(); ?>
