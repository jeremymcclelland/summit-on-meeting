<?php
/*
Plugin Name: Muze Functionality
Description: Site specific functionality for the Muze ATX website independant of the visual theme
Version: 1.0
*/

/*
*
* Navigation Setup
*
*/

	// Set up editable nav
	function register_custom_menus() {
			register_nav_menu('main-menu',__( 'Main Menu' ));
			register_nav_menu('footer-menu',__( 'Contact Menu' ));
	}
	add_action( 'init', 'register_custom_menus' );

	add_theme_support( 'post-thumbnails' );

/*
*
* Custom Post Types
*
*/

	// Add Custom Post Type for Blog Posts
	function custom_post_blog() {
		$labels = array(
			'name'					=> _x( 'Blog', 'post type general name' ),
			'singular_name'			=> _x( 'Blog Post', 'post type singular name' ),
			'add_new'				=> __( 'Add New', 'book' ),
			'add_new_item'			=> __( 'Add New Blog Post' ),
			'edit_item'				=> __( 'Edit Blog Post' ),
			'new_item'				=> __( 'New Blog Post' ),
			'all_items'				=> __( 'All Blog Posts' ),
			'view_items'			=> __( 'View Blog Posts' ),
			'search_items'			=> __( 'Search Blog Posts' ),
			'not_found'				=> __( 'No blog posts found' ),
			'not_found_in_trash'	=> __( 'No blog posts found in trash' ),
			'parent_item_colon'		=> '',
			'menu_name'				=> 'Blog'
		);

		$args = array(
			'labels'		=> $labels,
			'description'	=> 'Muze Blog Posts',
			'taxonomies'  	=> array( 'category' ),
			'public'		=> true,
			'supports'		=> array( 'title', 'editor', 'author', 'thumbnail', 'excerpt' ),
			'has_archive'	=> true,
			'menu_icon'		=> 'dashicons-megaphone',
		);

		register_post_type( 'blog', $args );
	}
	add_action( 'init', 'custom_post_blog' );

	// Add Custom Post Type for Floor Plans
	function custom_post_floorplans() {
		$labels = array(
			'name'					=> _x( 'Floor Plans', 'post type general name' ),
			'singular_name'			=> _x( 'Floor Plan', 'post type singular name' ),
			'add_new'				=> __( 'Add New', 'book' ),
			'add_new_item'			=> __( 'Add New Floor Plan' ),
			'edit_item'				=> __( 'Edit Floor Plan' ),
			'new_item'				=> __( 'New Floor Plan' ),
			'all_items'				=> __( 'All Floor Plans' ),
			'view_items'			=> __( 'View Floor Plans' ),
			'search_items'			=> __( 'Search Floor Plans' ),
			'not_found'				=> __( 'No Floor Plans found' ),
			'not_found_in_trash'	=> __( 'No Floor Plans found in trash' ),
			'parent_item_colon'		=> '',
			'menu_name'				=> 'Floor Plans'
		);

		$args = array(
			'labels'		=> $labels,
			'description'	=> 'Muze Floor Plans',
			'taxonomies'  	=> array( 'category' ),
			'public'		=> true,
			'supports'		=> array( 'title', 'editor', 'thumbnail', 'excerpt' ),
			'has_archive'	=> true,
			'menu_icon'		=> 'dashicons-grid-view',
		);

		register_post_type( 'floorplan', $args );
	}
	add_action( 'init', 'custom_post_floorplans' );

	// Add Custom Post Type for FAQs
	function custom_post_faq() {
		$labels = array(
			'name'					=> _x( 'FAQs', 'post type general name' ),
			'singular_name'			=> _x( 'FAQ', 'post type singular name' ),
			'add_new'				=> __( 'Add New', 'book' ),
			'add_new_item'			=> __( 'Add New FAQ' ),
			'edit_item'				=> __( 'Edit FAQ' ),
			'new_item'				=> __( 'New FAQ' ),
			'all_items'				=> __( 'All FAQs' ),
			'view_items'			=> __( 'View FAQs' ),
			'search_items'			=> __( 'Search FAQs' ),
			'not_found'				=> __( 'No FAQs found' ),
			'not_found_in_trash'	=> __( 'No FAQs found in trash' ),
			'parent_item_colon'		=> '',
			'menu_name'				=> 'FAQs'
		);

		$args = array(
			'labels'		=> $labels,
			'description'	=> 'Muze Frequently Asked Questions',
			'taxonomies'  	=> array( 'category' ),
			'public'		=> true,
			'supports'		=> array( 'title', 'editor', 'thumbnail', 'excerpt' ),
			'has_archive'	=> true,
			'menu_icon'		=> 'dashicons-info',
		);

		register_post_type( 'faq', $args );
	}
	add_action( 'init', 'custom_post_faq' );

	
	// Remove vanilla post type
	function remove_menus(){
		  remove_menu_page( 'edit.php' );
		}
	add_action( 'admin_menu', 'remove_menus' );

	// Display custom post types to archive pages
	function namespace_add_custom_types( $query ) {
	  if( is_category() || is_tag() && empty( $query->query_vars['suppress_filters'] ) ) {
	    $query->set( 'post_type', array(
	     'post', 'nav_menu_item', 'blog'
	    ));
	    return $query;
	  }
	}
	add_filter( 'pre_get_posts', 'namespace_add_custom_types' );

?>