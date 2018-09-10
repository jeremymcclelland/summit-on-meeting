<?php
/**
* @package WordPress
 * @subpackage Muze
 * @since Muze ATX
 */
?>

<?php get_header(); ?>

<div id="main" class="main news-archive">

	<section class="page-hero simple">
		<div class="container row text-center">
			<div class="small-12 columns">
				<p class="pre-title">Search Results</p>
				<h1 class="primary-h1">Showing all articles matching “<?php echo esc_html( get_search_query( false ) ); ?>”</h1>
			</div>
		</div>
	</section>

	<section class="no-padding-top">
		<div class="container row">
			<div class="small-12 large-4 columns sidebar">
					<?php include('sidebar.php'); ?>
			</div>

			<div class="small-12 large-8 columns">

				<?php if (have_posts()) : ?>

					<div class="news-list">
						<?php while (have_posts()) : the_post();
						
							$article_link = get_the_permalink();
							$article_title = get_the_title();
							$article_preview = excerpt(40);
							$article_date = get_the_date();
							$article_image = get_the_post_thumbnail_url();	
							
							echo ' 	<article class="article">';

							if ($article_image) {
								echo '	<div class="preview-image" style="background-image: url(' . $article_image . ');"></div>
										<div class="article-content">';
							} else {
								echo '	<div class="article-content no-image">';
							}

							echo ' 			<h4 class="primary-h4">' . $article_title . '</h4>
											<p class="article-date">Posted ' . $article_date . '</p>
											<p class="article-preview">' . $article_preview . '</p>
											<a href="' . $article_link . '" class="simple-arrow">Read More</a>
										</div>
									</article>';
								

						endwhile; ?>
					</div>

					<div class="page-navigation">
		            	<?php next_posts_link( '<i class="fa fa-angle-double-left"></i> Older Articles', '' ); ?>
		            	<?php previous_posts_link( 'Newer Articles <i class="fa fa-angle-double-right"></i>' ); ?>
		            </div>

				<?php else : ?>

					<article class="article">
						<h4 class="primary-h4">No articles matched your search query. Please try again.</h4>
					</article>

				<?php endif; ?>

			</div>
		</div>
	</section>

</div>

<?php get_footer(); ?>
