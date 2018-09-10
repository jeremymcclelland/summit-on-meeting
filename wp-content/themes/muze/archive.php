<?php
/**
* @package WordPress
 * @subpackage Muze
 * @since Muze ATX
 */
?>

<?php get_header(); ?>

<div id="main" class="blog-archive">
	<?php include('template-parts/page-hero.php'); ?>
	
	<section class="general-page-content">
		<div class="container row">
			<div class="small-12 columns">
				<h2>Always stay up to date.</h2>
			</div>
		</div>
	</section>

	<section class="blog-posts no-padding-top">
		<div class="container row">
			<div class="small-12 columns">
				<select class="author-dropdown" name="author-dropdown" id="author-dropdown--1" onchange="document.location.href=this.options[this.selectedIndex].value;">
				    <option value="<?php echo get_post_type_archive_link( 'blog' ); ?>"><?php echo esc_attr( __( 'All Authors' ) ); ?></option> 
				    <?php 
					    // loop through the users
					    $users = get_users('role=author');
					    foreach ($users as $user) 
					    {
					        // get user who have posts only
					        if(count_user_posts( $user->id ) >0)
					        {
					          // We need to add our url to the authors page
					          echo '<option value="'.get_author_posts_url( $user->id, $post_type='blog' ).'">';
					          // Display name of the auther you could use another like nice_name
					          echo $user->display_name;
					          echo '</option>'; 
					        } 

					    }
						$users = get_users('role=administrator');
					    foreach ($users as $user) 
					    {
					        // get user who have posts only
					        if(count_user_posts( $user->id, $post_type='blog' ) >0)
					        {
					          // We need to add our url to the authors page
					          echo '<option value="'.get_author_posts_url( $user->id ).'">';
					          // Display name of the auther you could use another like nice_name
					          echo $user->display_name;
					          echo '</option>'; 
					        } 
					    }
				    ?>
				</select> 
				<?php if (have_posts()) : ?>
					<?php while (have_posts()) : the_post();
						echo 'Post!';
					endwhile; ?>
				<?php endif; ?>
			</div>
		</div>
	</section>
</div>

<?php get_footer(); ?>
