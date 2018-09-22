<?php
/**
* @package WordPress
 * @subpackage Muze
 * @since Muze ATX
 */
?>

<?php get_header(); ?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<div id="main" class="page-parents">

	<?php include('template-parts/page-hero.php'); ?>
	
	<section class="after-hero">
		<div class="container row">
			<div class="small-12 columns">
				<?php the_content(); ?>
			</div>
		</div>
	</section>

	<section class="tabbed-content no-padding-bottom">
		<div class="container row">
			<div class="small-12 large-8 columns">
				<h2>Learn about the Muze below.</h2>
			</div>
			<div class="hidden small-12 large-4 columns">
				<a href="<?php echo get_page_link( get_page_by_title( 'S.M.A.R.T. Housing' )->ID ); ?>" class="btn" href="">WHAT IS S.M.A.R.T. HOUSING?</a>
			</div>
		</div>
		<div class="row collapse">
			<div class="small-12 columns">
				<div class="tab-menu">
					<div class="container">
					<?php 
						if( have_rows('tabbed_info') ):
							$count = 0;
							echo '<ul class="tabs" data-tabs id="muze-info">';
							while( have_rows('tabbed_info') ): the_row(); 
								// vars
								$tabIcon = get_sub_field('icon');
								$tabTitle = get_sub_field('tab_title');
								$count ++;
								$active = "";

								if ($count == 1) {
									$active = "is-active";
								}

								echo '
									<li class="tabs-title ' . $active . '">
										<img class="tab-icon" src="' . $tabIcon . '" />
										<a href="#panel' . $count . '" aria-selected="true">' . $tabTitle . '</span></a>
									</li>';
							endwhile;
							echo '</ul>'; 
						endif; 
					?>
	            	</div>
	            </div>

				<div class="info-tabs">
					<!-- Tabs container -->
	                <div class="tabs-content" data-tabs-content="muze-info">
	                    <?php 
							if( have_rows('tabbed_info') ):
								$count = 0;
								while( have_rows('tabbed_info') ): the_row(); 
									// vars
									$tabHeadline = get_sub_field('headline');
									$tabCopy = get_sub_field('copy');
									$count ++;
									$active = "";

									if ($count == 1) {
										$active = "is-active";
									}

									echo '	<div class="tabs-panel ' . $active . '" id="panel' . $count . '">
						                        <div class="container">
						                        	<h3>' . $tabHeadline . '</h3>
						                        	' . $tabCopy . '
						                        </div>
						                    </div>';
								endwhile;
							endif; 
						?>
	                </div>
				</div>
			</div>
		</div>
	</section>

	<section class="frequently-asked-questions">
		<div class="container row">
			<div class="small-12 columns">
				<h2>Scan through our <strong>FAQ’s.</strong></h2>
			</div>
			<div class="small-12 large-6 columns">
				<?php echo do_shortcode("[pt_view id=07812dbwul]"); ?>
			</div>
			<div class="small-12 large-6 columns">
				<?php echo do_shortcode("[pt_view id=c152451xd5]"); ?>
			</div>
		</div>
	</section>

</div>


<?php endwhile; endif; ?>
<?php get_footer(); ?>
