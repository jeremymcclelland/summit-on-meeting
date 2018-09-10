<?php 
	$background = '';
	if( get_field('gray_background') == 'yes' ) {
		$background = 'silver-background';
	} 
?>

<section class="blue-gallery <?php echo $background; ?>">
	<div class="row container">
		<?php 
			if( have_rows('gallery') ):
				while( have_rows('gallery') ): the_row(); 
					
					// vars
					$image_background = get_sub_field('gallery_image');
					$image_width = get_sub_field('image_width');
					$overlay_text = get_sub_field('overlay_text');
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
						<div class="image-wrapper ' . $div_width . ' columns">
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

