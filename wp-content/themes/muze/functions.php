<?php
/**
 * Muze custom theme functions
 */


// Add theme scripts and styles
function muze_scripts() {
	wp_enqueue_style( 'foundation-styles', get_template_directory_uri() . '/css/foundation.min.css', array() );
	wp_enqueue_style( 'slick-styles', get_template_directory_uri() . '/css/slick.css', array() );
  wp_enqueue_style( 'lightbox', get_template_directory_uri() . '/js/lightbox-js/css/lightbox.css', array() );
	wp_enqueue_style( 'muze-styles', get_template_directory_uri() . '/css/muze-styles.css?v=1.1', array() );
	wp_enqueue_script( 'easing-js', get_template_directory_uri() . '/js/jquery.easing.1.3.js', array(), '1.0.0', true );
	wp_enqueue_script( 'slick-js', get_template_directory_uri() . '/js/slick.min.js', array('jquery'), '1.0.0', true );
  wp_enqueue_script( 'lightbox-js', get_template_directory_uri() . '/js/lightbox-js/js/lightbox.js', array('jquery'), '1.0.0', true );
	wp_enqueue_script( 'muze-scripts', get_template_directory_uri() . '/js/custom.js', array('jquery'), '1.0.0', true );
	wp_enqueue_script( 'foundation-js', get_template_directory_uri() . '/js/foundation.min.js', array(), '1.0.0', true );

}
add_action( 'wp_enqueue_scripts', 'muze_scripts' );


// Add class to page next/prev links
add_filter('next_posts_link_attributes', 'posts_link_attributes');
add_filter('previous_posts_link_attributes', 'posts_link_attributes');
function posts_link_attributes() {
    return 'class="news-link"';
}

// add editor the privilege to edit theme
// $role_object = get_role( 'editor' );
// $role_object->add_cap( 'edit_theme_options' );


// Restrict search results to just news
function searchfilter($query) {
    if ($query->is_search && !is_admin() ) {
        $query->set('post_type',array('blog'));
    }
	return $query;
}
add_filter('pre_get_posts','searchfilter');


// Change/Control default post excerpt length
function excerpt($limit) {
  $excerpt = explode(' ', get_the_excerpt(), $limit);
  if (count($excerpt)>=$limit) {
    array_pop($excerpt);
    $excerpt = implode(" ",$excerpt).' [...]';
  } else {
    $excerpt = implode(" ",$excerpt);
  }	
  $excerpt = preg_replace('`[[^]]*]`','',$excerpt);
  return $excerpt;
}

// Add custom post types to Author rchives

function post_types_author_archives($query) {
  
  // Add 'videos' post type to author archives
  if ( $query->is_author )
    $query->set( 'post_type', array('blog', 'post') );
  
  // Remove the action after it's run
  remove_action( 'pre_get_posts', 'post_types_author_archives' );
}
add_action( 'pre_get_posts', 'post_types_author_archives' );

// CVPro - Very custom HTML output for blog posts
add_filter( 'pt_cv_view_type_custom_output', 'cvp_theme_view_type_custom_output', 100, 3 );

/**
 * Customize HTML output of each post
 *
 * @param string $args       Current HTML output for a post
 * @param array $fields_html Array of fields (title, thumbnail, content...) and their HTML output
 * @param object $post       The current post object
 * @return string
 */
function cvp_theme_view_type_custom_output( $args, $fields_html, $post ) {
  // Do this for only specific Views
  global $pt_cv_id;
  if ( in_array( $pt_cv_id, array( '7392d1asdg' ) ) ) {
    ob_start();
    ?>
    <div class="post-image">
      <?php echo $fields_html[ 'thumbnail' ]?>
    </div>
    <?php echo $fields_html[ 'meta-fields' ]?>
    <h4><?php echo $fields_html[ 'title' ]?></h4>
    <div class="post-excerpt">
      <?php echo $fields_html[ 'content' ]?>
    </div>
    <div class="share-button">
      <i class="fa fa-share-alt"></i>
      <?php echo $fields_html[ 'social-buttons' ]?>
    </div>
    <?php
    $args = ob_get_clean();
  }

  return $args;
}
// CVPro - Change separator between meta fields
add_filter( 'pt_cv_field_meta_seperator', 'cvp_theme_field_meta_seperator', 10, 1 );
function cvp_theme_field_meta_seperator( $args ) {
  $args = '';
  return $args;
}
// CVPro - Use dropdown for Shuffle Filter in mobile devices
add_filter( 'pt_cv_sfilter_type', 'cvp_theme_sfilter_type_mobile', 100, 1 );
function cvp_theme_sfilter_type_mobile( $args ) {

  if ( method_exists( 'PT_CV_Functions_Pro', 'check_device' ) && PT_CV_Functions_Pro::check_device( 'mobile' ) ) {
    $args = 'vertical-dropdown';
  }
  return $args;
}