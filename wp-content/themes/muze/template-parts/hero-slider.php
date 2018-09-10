<div id="hero-slider-container" class="hero-slider-container text-invert">
	<div id="hero-slider" class="hero-slider">
		
		<?php if( have_rows('slides') ):
			while( have_rows('slides') ): the_row(); 
				// vars
				$slideImage = get_sub_field('slide_image');
				$slideTitle = get_sub_field('slide_title');
				$slideText = get_sub_field('slide_text');
				$buttonText = get_sub_field('slide_button');
				$isVideo = get_sub_field('is_video');

				if( $isVideo == 'yes' ) {
					$buttonLink = get_sub_field('video_link');
				} else {
					$buttonLink = get_sub_field('slide_link');
				}

				echo '
					<div class="hero-slide image-background" style="background-image: url(' . $slideImage . ');">
						<div class="container row text-center">
							<div class="small-12 columns">
								<h1 class="primary-h1">' . $slideTitle . '</h1>
								<p class="slider-text hide-small-and-down">' . $slideText . '</p>';

								if( $isVideo == 'yes' ) {
									echo do_shortcode('[video_lightbox_youtube video_id="' . $buttonLink . '&rel=0" width="640" height="480" anchor="' . $buttonText . '"]');
								} else {
									echo '<a href="' . $buttonLink . '" class="btn">' . $buttonText . '</a>';
								}

				echo '		</div>
						</div>
					</div>';
			endwhile; 
		endif; ?>

	</div>
	<div class="arrows-container hide-medium-only">
		<div class="container row">
			<div class="hero-arrows small-12 columns"></div>
		</div>
	</div>
	<div class="hero-dots hide-small-and-down"></div>
</div>