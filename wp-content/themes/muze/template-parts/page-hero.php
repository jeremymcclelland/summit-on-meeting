<?php 

	if ( is_page() ) {
	
		$hero_title = get_field('hero_title');
		$hero_image = get_field('hero_image');
		$hero_image_mobile = get_field('hero_image_mobile');
		$hero_flash = get_field('hero_flash');
		$flash_link = get_field('flash_link');
		$link_url = $flash_link['url'];

		echo'	<section class="page-hero no-padding-bottom no-padding-top">
					<div class="hero-text">
						<div class="container row text-invert">
							<div class="small-12 medium-10 large-10 columns">
								<h1>' . $hero_title . '</h1>
							</div>
						</div>
					</div>
					<img class="hero-img" alt="Hero Background Image"  src="' . $hero_image . '"/>
					<img class="hero-img-mobile" alt="Hero Background Image"  src="' . $hero_image_mobile . '"/>
				</section>
				<div class="container row hide-small-and-down">
					<div class="small-12 columns">';

		if ($flash_link) {
			echo '		<a href="' . $link_url . '" target="_blank"><img class="hero-flash" alt=""  src="' . $hero_flash . '"/></a>';
		} 
		else {
			echo '		<img class="hero-flash" alt=""  src="' . $hero_flash . '"/>';
		}

		echo '
					</div>
				</div>';
	}

	if ( is_single() || is_archive() ) {
		$template_directory = get_template_directory_uri();


		$blog_header_image = get_field('blog_header_image', 'option');
		$blog_mobile_header_image = get_field('blog_mobile_header_image', 'option');
		$blog_header_title = get_field('blog_title', 'option');

		if(!$blog_header_image){
			$blog_header_image =  $template_directory . '/images/blog-hero.jpg';
		}

		if(!$blog_mobile_header_image){
			$blog_mobile_header_image =  $template_directory . '/images/blog-hero-mobile.jpg';
		}

		echo'	<section class="page-hero no-padding-bottom no-padding-top">
					<div class="hero-text">
						<div class="container row text-invert">
							<div class="small-12 columns">
								<h1>' . $blog_header_title . '</h1>
							</div>
						</div>
					</div>
					<img class="hero-img" alt="Hero Background Image"  src="' . $blog_header_image . '"/>
					<img class="hero-img-mobile" alt="Hero Background Image"  src="' . $blog_mobile_header_image . '"/>
				</section>';
    }
                                              

?>

