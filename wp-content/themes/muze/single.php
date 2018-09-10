<?php
/**
* @package WordPress
 * @subpackage Muze
 * @since Muze ATX
 */
?>

<?php get_header(); ?>

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<div id="main" class="main blog-single">

			<?php include('template-parts/page-hero.php'); ?>
			<section class="news-article">
				<div class="container row">
					<div class="small-12 columns article-header">
						<h2><?php the_title(); ?></h2>
						<p class="post-meta">Posted: <?php the_date(); ?><span class="hide-medium-and-up"><br /></span> <span class="hide-small-and-down">&nbsp;&nbsp;|&nbsp;&nbsp;</span> By: <?php the_author(); ?></p>
						<div class="social-sharing">
							<i class="fa fa-share-alt"></i>
							<?php echo do_shortcode('[ess_post]'); ?>
						</div>
					</div>
					<div class="small-12 large-8 columns">
						<?php
							$article_image = get_the_post_thumbnail_url();
							$article_content = get_the_content();
							$article_content_tagged = wpautop($article_content);

							echo ' 	<article class="article-single">
										<img class="article-image" src="' . $article_image . '" />
										' . $article_content_tagged . '
									</article>';

						?>
					</div>
					<div class="small-12 large-4 columns sidebar hide-medium-and-down">
							<?php include('sidebar.php'); ?>
					</div>
				</div>
			</section>

		</div>

	<?php endwhile; endif; ?>

<?php get_footer(); ?>
