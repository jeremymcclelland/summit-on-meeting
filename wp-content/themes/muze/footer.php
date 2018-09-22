		<footer id="footer" class="footer">
			<section>
				<div class="container row">
					<div class="small-12 medium-5 large-4 columns">
						<a alt="Muze Logo" href="<?php echo get_home_url(); ?>"><div class="footer-logo">Muze</div></a>
						<p class="logo-tag">Your New Home Awaits</p>
						<?php
                            $pay_rent = of_get_option('pay_rent');

                            if ($pay_rent) {
                            	echo '	<a href="https://themuzeapts.prospectportal.com/Apartments/module/application_authentication/" class="btn blue hide-large-and-up">Lease Now</a>
                            			<a href="' . $pay_rent . '" class="btn blue hide-large-and-up">Pay Rent</a>';
                            } else {
                            	echo '	<a href="https://themuzeapts.prospectportal.com/Apartments/module/application_authentication/" class="btn blue hide-large-and-up">Lease Now</a>';
                            }
                        ?>
					</div>
					<div class="small-12 medium-7 large-4 columns">
						<p class="footer-heading">Take a tour at:</p>
						<?php
                            $address = of_get_option('leasing_address');
                            $city = of_get_option('leasing_city');
                            $state = of_get_option('leasing_state');
                            $zip = of_get_option('leasing_zip');
                            $pay_rent = of_get_option('pay_rent');

                            if ($address) {
                                echo '	<p>' . $address . ', ' . $city . ' ' . $state . ' ' . $zip . '</p>';
                            }

                            if ($pay_rent) {
                            	echo '	<a href="' . $pay_rent . '" class="btn blue hide-medium-and-down">Pay Rent</a>
                        				<a href="'. get_page_link( get_page_by_title( 'Apply' )->ID ) .'" class="btn blue hide-medium-and-down">Apply Now</a>';
                            } else {
                            	echo '	<a target="_blank" href="https://themuzeapts.prospectportal.com/Apartments/module/application_authentication/" class="btn blue hide-medium-and-down">Lease Now</a>';
                            }
                        ?>
					</div>
					<div class="small-12 medium-7 large-2 columns">
						<p class="footer-heading">Follow us:</p>
						<?php
                            $template_directory = get_template_directory_uri();
                            $handle = of_get_option('social_handle');
                            $twitter_link = of_get_option('social_twitter');
                            $facebook_link = of_get_option('social_facebook');
                            $instagram_link = of_get_option('social_insta');

                            if ($handle) {
                            	echo $handle;
                            }

                            echo '<ul class="social-links">';
	                            if ($facebook_link) {
	                                echo '	<li>
	                                			<a href="' . $facebook_link . '" target="_blank">
	                                				<p>Facebook</p>
	                                				<i class="fa fa-facebook-square"></i>
	                                			</a>
	                                		</li>';
	                            }
	                            if ($twitter_link) {
	                                echo '	<li>
				                                <a href="' . $twitter_link . '" target="_blank">
		                                			<p>Twitter</p>
		                                			<i class="fa fa-twitter"></i>
		                                		</a>
		                                	</li>';
	                            }
	                            if ($instagram_link) {
	                                echo '	<li>
	                                			<a href="' . $instagram_link . '" target="_blank">
	                                				<p>Instagram</p>
	                                				<i class="fa fa-instagram"></i>
	                                			</a>
	                                		</li>';
	                            }
                            echo '</ul>';
                        ?>
					</div>
					<div class="small-12 medium-7 large-2 columns">
						<p class="footer-heading"><a href="<?php echo get_page_link(176); ?>">Contact:</a></p>
						<?php
                            $phone_number = of_get_option('leasing_phone');
                            if ($phone_number) {
                                echo '	<a href="tel:' . $phone_number . '">' . $phone_number . '</a>';
                            }
                        ?>
					</div>
				</div>
			</section>
		</footer>

		<div id="nav-drawer" class="nav-drawer">
			<div class="row">
				<div class="small-12 columns">
					<nav id="mobile-nav" class="mobile-nav-menu">
						<?php wp_nav_menu( array( 'theme_location' => 'main-menu', 'container_class' => 'mobile-nav-list' ) ); ?>
					</nav>
					<div class="mobile-social">
						<?php
                            $template_directory = get_template_directory_uri();
                            $twitter_link = of_get_option('social_twitter');
                            $facebook_link = of_get_option('social_facebook');
                            $instagram_link = of_get_option('social_insta');

                            echo '<ul class="mobile-social-links">';
	                            if ($facebook_link) {
	                                echo '	<li>
	                                			<a href="' . $facebook_link . '" target="_blank">
	                                				<p>Facebook</p>
	                                				<i class="fa fa-facebook-square"></i>
	                                			</a>
	                                		</li>';
	                            }
	                            if ($twitter_link) {
	                                echo '	<li>
				                                <a href="' . $twitter_link . '" target="_blank">
		                                			<p>Twitter</p>
		                                			<i class="fa fa-twitter"></i>
		                                		</a>
		                                	</li>';
	                            }
	                            if ($instagram_link) {
	                                echo '	<li>
	                                			<a href="' . $instagram_link . '" target="_blank">
	                                				<p>Instagram</p>
	                                				<i class="fa fa-instagram"></i>
	                                			</a>
	                                		</li>';
	                            }
                            echo '</ul>';
                        ?>
					</div>
				</div>
			</div>
		</div>

	</div> <!-- body wrapper -->

		<?php wp_footer(); ?>
		<script>
			jQuery(document).foundation($);
		</script>

	</body>
</html>
