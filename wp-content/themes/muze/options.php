<?php

function optionsframework_option_name() {

	// This gets the theme name from the stylesheet
	$themename = get_option( 'stylesheet' );
	$themename = preg_replace("/\W/", "_", strtolower($themename) );

	$optionsframework_settings = get_option( 'optionsframework' );
	$optionsframework_settings['id'] = $themename;
	update_option( 'optionsframework', $optionsframework_settings );
}

function optionsframework_options() {

	// Pull all the categories into an array
	$options_categories = array();
	$options_categories_obj = get_categories();
	foreach ($options_categories_obj as $category) {
		$options_categories[$category->cat_ID] = $category->cat_name;
	}
	
	// Pull all tags into an array
	$options_tags = array();
	$options_tags_obj = get_tags();
	foreach ( $options_tags_obj as $tag ) {
		$options_tags[$tag->term_id] = $tag->name;
	}

	// Pull all the pages into an array
	$options_pages = array();
	$options_pages_obj = get_pages('sort_column=post_parent,menu_order');
	$options_pages[''] = 'Select a page:';
	foreach ($options_pages_obj as $page) {
		$options_pages[$page->ID] = $page->post_title;
	}

	$options = array();

	// Pay Rent Link
	$options[] = array(
		'name' => __('Pay Rent Link', 'html5reset'),
		'type' => 'heading');
	$options[] = array(
		'name' => __('Pay Rent Link', 'html5reset'),
		'desc' => __('Input link to rent payment site here'),
		'id' => 'pay_rent',
		'std' => '',
		'type' => 'text');


	// Leasing Center Details
	$options[] = array(
		'name' => __('Leasing Center Info', 'html5reset'),
		'type' => 'heading');
	$options[] = array(
		'name' => __('Leasing Center Address', 'html5reset'),
		'desc' => __('Street address and suite number, if applicable'),
		'id' => 'leasing_address',
		'std' => '',
		'type' => 'text');
	$options[] = array(
		'name' => __('City', 'html5reset'),
		'desc' => __('City'),
		'id' => 'leasing_city',
		'std' => '',
		'type' => 'text');
	$options[] = array(
		'name' => __('State', 'html5reset'),
		'desc' => __('State'),
		'id' => 'leasing_state',
		'std' => '',
		'type' => 'text');
	$options[] = array(
		'name' => __('Zip Code', 'html5reset'),
		'desc' => __('Zip Code'),
		'id' => 'leasing_zip',
		'std' => '',
		'type' => 'text');
	$options[] = array(
		'name' => __('Phone', 'html5reset'),
		'desc' => __('Primary phone number'),
		'id' => 'leasing_phone',
		'std' => '',
		'type' => 'text');
	$options[] = array(
		'name' => __('Hours', 'html5reset'),
		'desc' => __('Sales Center Hours'),
		'id' => 'leasing_hours',
		'std' => '',
		'type' => 'textarea');


	// Social Links
	$options[] = array(
		'name' => __('Social Media', 'html5reset'),
		'type' => 'heading');
	$options[] = array(
		'name' => __('Social Handle', 'html5reset'),
		'desc' => __('For following on Twitter and Instagram'),
		'id' => 'social_handle',
		'std' => '',
		'type' => 'text');
	$options[] = array(
		'name' => __('Facebook', 'html5reset'),
		'desc' => __('Facebook Page URL'),
		'id' => 'social_facebook',
		'std' => '',
		'type' => 'text');
	$options[] = array(
		'name' => __('Twitter', 'html5reset'),
		'desc' => __('Twitter Profile URL'),
		'id' => 'social_twitter',
		'std' => '',
		'type' => 'text');
	$options[] = array(
		'name' => __('Instagram', 'html5reset'),
		'desc' => __('Instagram Profile URL'),
		'id' => 'social_insta',
		'std' => '',
		'type' => 'text');

	return $options;

}