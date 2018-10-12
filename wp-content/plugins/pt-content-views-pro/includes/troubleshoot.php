<?php
/**
 * Fix FB share wrong image
 * @since 3.9.4
 */
add_action( 'wp_head', 'cvp_troubleshoot_fb_share_wrong_img', 100 );
function cvp_troubleshoot_fb_share_wrong_img() {
	$fix_fb_share = PT_CV_Functions::get_option_value( 'fb_share_wrong_image' );
	if ( $fix_fb_share ) {
		global $post;
		$attachment_url = '';
		if ( is_singular() ) {
			$attachment_id	 = is_attachment() ? $post->ID : get_post_thumbnail_id( $post->ID );
			$attachment_url	 = wp_get_attachment_url( $attachment_id );

			if ( empty( $attachment_url ) ) {
				$attachment_url = PT_CV_Hooks_Pro::get_inside_image( $post, 'full', $post->post_content );
			}
		}

		if ( $attachment_url ) {
			printf( '<meta property="og:image" content="%s"/>', esc_url( $attachment_url ) );
		}
	}
}

add_action( PT_CV_PREFIX_ . 'before_query', 'cvp_troubleshoot_action_before_query' );
add_action( PT_CV_PREFIX_ . 'after_query', 'cvp_troubleshoot_action_after_query' );
function cvp_troubleshoot_action_before_query() {
	cvp_troubleshoot_action___query( 'remove_action' );
}

function cvp_troubleshoot_action_after_query() {
	cvp_troubleshoot_action___query( 'add_action' );
}

function cvp_troubleshoot_action___query( $function ) {
	/* Fix: invalid output because of query was modified by plugin "Woocommerce Exclude Categories PRO"
	 * @since 4.2
	 */
	if ( function_exists( 'wctm_pre_get_posts_query' ) ) {
		$function( 'pre_get_posts', 'wctm_pre_get_posts_query' );
	}
}

/** Fix: The Events Calendar with WPML (when suppress filter = false), the event plugin adds filters which modify View result */
add_filter( PT_CV_PREFIX_ . 'query_parameters', 'cvp_comp_plugin_the_events_calendar', 9999 );
function cvp_comp_plugin_the_events_calendar( $args ) {
	$args[ 'tribe_remove_date_filters' ] = true;
	return $args;
}

add_action( PT_CV_PREFIX_ . 'do_replace_layout', 'cvp_troubleshoot_do_replace_layout' );
function cvp_troubleshoot_do_replace_layout() {
	/** Fix: SearchWP can't apply its order when use CVP to replace search results
	 * @since 4.2
	 */
	add_filter( 'searchwp_outside_main_query', '__return_true' );

	/**
	 * Fix: the "RYO Category Visibility" plugin caused the No posts found issue
	 * when replacing layout of category pages
	 *
	 * @since 4.9.0
	 */
	remove_action( 'pre_get_posts', 'ryocatvis_posts', 10, 1 );
}

/**
 * Fix conflict with Photon feature of Jetpack plugin: thumbnail is not visible in mobile devices, when enable lazyload
 * @since 4.3.1
 */
add_filter( 'jetpack_photon_skip_for_url', 'cvp_jetpack_photon_skip_for_url', 100, 4 );
function cvp_jetpack_photon_skip_for_url( $skip, $image_url, $args, $scheme ) {
	if ( strpos( $image_url, 'lazy_image.png' ) !== false ) {
		$skip = true;
	}

	return $skip;
}

/**
 * "Search Everything" plugin
 * Issue: Replace Layout in Taxonomy Archives doesn't work
 * @since 4.6.0
 */
add_action( 'pre_get_posts', 'cvp_comp_plugin_searcheverything' );
function cvp_comp_plugin_searcheverything( $query ) {
	if ( $query->get( 'by_contentviews' ) && class_exists( 'SearchEverything' ) && !empty( $GLOBALS[ 'wp_filter' ][ 'posts_search' ][ 10 ] ) ) {
		$arr = (array) $GLOBALS[ 'wp_filter' ][ 'posts_search' ][ 10 ];
		foreach ( array_keys( $arr ) as $filter ) {
			if ( strpos( $filter, 'se_search_where' ) !== false ) {
				remove_filter( 'posts_search', $filter );
			}
		}
	}

	return $query;
}

/**
 * Prevent effect of Lazyload to [gallery]
 * Especially, when this shortcode was executed in 'field_content_excerpt' before get_inside_image()
 */
add_filter( 'the_content', 'cvp_start_gallery_shortcode', 1 );
add_filter( 'the_content', 'cvp_end_gallery_shortcode', 9999 );
function cvp_start_gallery_shortcode( $content ) {
	if ( preg_match( '/\[gallery[^\]]+\]/', $content ) ) {
		$GLOBALS[ 'cvp_prevent_lazyload' ] = true;
	}
	return $content;
}

function cvp_end_gallery_shortcode( $content ) {
	if ( preg_match( '/\[gallery[^\]]+\]/', $content ) ) {
		$GLOBALS[ 'cvp_prevent_lazyload' ] = false;
	}
	return $content;
}

/**
 * WP Rocket plugin
 * Fix broken Pinterest layout with WP Rocket lazyload
 * @since 4.7.0
 */
add_filter( 'wp_get_attachment_image_attributes', 'cvp_comp_plugin_wprocket', 999, 3 );
add_filter( 'cvp_get_attachment_image_attributes', 'cvp_comp_plugin_wprocket', 999, 3 );
function cvp_comp_plugin_wprocket( $attr, $attachment = null, $size = null ) {
	if ( function_exists( 'cv_is_active_plugin' ) && cv_is_active_plugin( 'wp-rocket' ) ) {
		global $cvp_process_settings;
		if ( $cvp_process_settings ) {
			$attr[ 'data-no-lazy' ] = 1;
		}
	}

	return $attr;
}

/**
 * Get image inside post content, for Visual Composer plugin
 * @since 4.7.1
 */
add_filter( 'pt_cv_field_content_excerpt', 'cvp_comp_plugin_visual_composer_image_content', 100, 3 );
function cvp_comp_plugin_visual_composer_image_content( $args, $fargs, $post ) {
	// Run only when extracting image in content
	if ( empty( $fargs ) ) {
		if ( class_exists( 'WPBMap' ) && method_exists( 'WPBMap', 'addAllMappedShortcodes' ) ) {
			// Prevent lazyload from applying to VC image, which makes lazyload get & show its lazy image instead of VC image
			$GLOBALS[ 'cvp_prevent_lazyload' ] = true;

			WPBMap::addAllMappedShortcodes();
			$args = do_shortcode( $args );

			$GLOBALS[ 'cvp_prevent_lazyload' ] = false;
		}
	}

	return $args;
}

/**
 * Woocommerce double read-more buttons, if product is not purchasable or out of stock
 */
add_filter( 'woocommerce_loop_add_to_cart_link', 'cvp_comp_plugin_woocommerce_double_readmore', 999, 2 );
function cvp_comp_plugin_woocommerce_double_readmore( $link, $product ) {
	global $cvp_process_settings;
	if ( $cvp_process_settings ) {
		if ( strpos( $link, __( 'Read more', 'woocommerce' ) ) !== false ) {
			$dargs = PT_CV_Functions::get_global_variable( 'dargs' );
			// Hide Woocommerce readmore, if enabled CVPRO readmore
			if ( !empty( $dargs[ 'field-settings' ][ 'content' ] ) && $dargs[ 'field-settings' ][ 'content' ][ 'show' ] === 'excerpt' && isset( $dargs[ 'field-settings' ][ 'content' ][ 'readmore' ] ) ) {
				$link = '';
			}
		}
	}

	return $link;
}

/**
 * Disable WP responsive image feature to prevent layout issues
 * @since 4.9.0
 */
add_filter( PT_CV_PREFIX_ . 'disable_responsive_image', 'cvp_comp_fix_pinterest_issue' );
function cvp_comp_fix_pinterest_issue( $args ) {
	$view_type	 = PT_CV_Functions::get_global_variable( 'view_type' );
	$glp		 = ('grid' === $view_type) && PT_CV_Functions::setting_value( PT_CV_PREFIX . 'grid-same-height' );
	if ( in_array( $view_type, array( 'pinterest', 'masonry' ) ) || PT_CV_Functions::setting_value( PT_CV_PREFIX . 'enable-taxonomy-filter' ) || $glp ) {
		$args = true;
	}

	return $args;
}

/**
 * Convert term slug to id, to be translated automatically
 * @since 4.9.0
 */
add_filter( PT_CV_PREFIX_ . 'query_parameters', 'cvp_comp_terms_slug_to_id', 9999 );
function cvp_comp_terms_slug_to_id( $params ) {
	$tplugin = PT_CV_Functions_Pro::has_translation_plugin();
	if ( !$tplugin ) {
		return $params;
	}

	if ( !empty( $params[ 'tax_query' ] ) ) {
		foreach ( $params[ 'tax_query' ] as $key => $tax ) {
			if ( !isset( $tax[ 'terms' ], $tax[ 'taxonomy' ] ) ) {
				continue;
			}

			if ( !is_array( $tax[ 'terms' ] ) ) {
				continue;
			}

			// Leverage the WP filter 'get_terms_args' to translate terms automatically
			$tids = array();
			foreach ( $tax[ 'terms' ] as $term ) {
				$gterm = cvp_get_term_by_slug( $term, $tax[ 'taxonomy' ] );
				if ( $gterm ) {
					$tids[] = $gterm->term_id;
				}
			}

			if ( $tids ) {
				$terms = get_terms( array(
					'taxonomy'	 => $tax[ 'taxonomy' ],
					'include'	 => $tids,
					'hide_empty' => false,
					) );

				if ( !empty( $terms ) && !is_wp_error( $terms ) ) {
					$new_terms = array();
					foreach ( $terms as $term ) {
						$new_terms[ $term->term_id ] = $term->slug;
					}
					$params[ 'tax_query' ][ $key ][ 'terms' ]		 = array_keys( $new_terms );
					$params[ 'tax_query' ][ $key ][ 'terms_slugs' ]	 = array_values( $new_terms );
					$params[ 'tax_query' ][ $key ][ 'field' ]		 = 'term_id';
					PT_CV_Functions::set_global_variable( 'slug_to_id', true );
				}
			}
		}
	}

	if ( $tplugin === 'WPML' ) {
		foreach ( array( 'post__in', 'post__not_in' ) as $key ) {
			if ( !empty( $params[ $key ] ) ) {
				$tran_ids = array();
				foreach ( $params[ $key ] as $pid ) {
					$tran_ids[] = icl_object_id( $pid, 'any' );
				}
				$params[ $key ] = $tran_ids;
			}
		}
	}

	return $params;
}

function cvp_get_term_by_slug( $value, $taxonomy ) {
	global $wpdb;
	$_field		 = 't.slug';
	$tax_clause	 = $wpdb->prepare( "AND tt.taxonomy = %s", $taxonomy );
	$term		 = $wpdb->get_row( $wpdb->prepare( "SELECT t.*, tt.* FROM $wpdb->terms AS t INNER JOIN $wpdb->term_taxonomy AS tt ON t.term_id = tt.term_id WHERE $_field = %s", $value ) . " $tax_clause LIMIT 1" );
	return $term;
}

/**
 * a3 Lazy Load (1.8.2) prevents images from showing
 */
add_filter( 'a3_lazy_load_skip_images_classes', 'cvp_comp_plugin_a3lazyload' );
function cvp_comp_plugin_a3lazyload( $classes ) {
	$classes .= ',' . PT_CV_PREFIX . 'thumbnail';
	return $classes;
}

// Fix: Visual Composer's shortcodes are visible in Live Filter result
add_action( 'pt_cv_before_content', 'cvp_comp_plugin_visualcomposer', 9 );
function cvp_comp_plugin_visualcomposer() {
	if ( defined( 'CVP_LIVE_FILTER_RELOAD' ) && class_exists( 'WPBMap' ) && method_exists( 'WPBMap', 'addAllMappedShortcodes' ) ) {
		WPBMap::addAllMappedShortcodes();
	}
}

/**
 * Support Digital Access Pass (DAP) plugin
 * Hide posts which users don't have access
 */
add_filter( 'pt_cv_query_parameters', 'cvp_comp_plugin_dap', 11 );
function cvp_comp_plugin_dap( $args ) {
	if ( shortcode_exists( 'DAP' ) ) {
		$args[ 'suppress_filters' ] = false;
	}
	return $args;
}

/**
 * Use results of Relevanssi, and prevent "No posts found" when search by keyword (in search page using replace layout, in any page using live filter search)
 * It adds filter to 'the_posts'
 */
add_filter( 'the_posts', 'cvp_comp_plugin_relevanssi_query', 9, 2 );
function cvp_comp_plugin_relevanssi_query( $posts, $query = false ) {
	if ( function_exists( 'relevanssi_do_query' ) ) {
		$reps	 = !empty( $query->query_vars[ 'cvp_replace_layout_page' ] ) && $query->query_vars[ 'cvp_replace_layout_page' ] === 'search';
		$lfs	 = !empty( $query->query_vars[ 'by_contentviews' ] ) && !empty( $query->query_vars[ 's' ] );

		if ( $reps || $lfs ) {
			// This only works for default search query
			remove_filter( 'the_posts', 'relevanssi_query', 99 );

			if ( defined( 'PT_CV_POST_TYPE' ) ) {
				remove_shortcode( PT_CV_POST_TYPE );
			}

			if ( PT_CV_Functions_Pro::user_can_manage_view() ) {
				printf( '<div class="alert" style="background:#ffeb3b5e;padding:10px">%s</div>', __( 'For Administrator only: To support the Relevanssi plugin, if you are enabling pagination in View, please use the Normal (Type) pagination.', 'content-views-pro' ) );
			}

			$posts = relevanssi_do_query( $query );
		}
	}
	return $posts;
}

/**
 * Fix: Shortcodes of Fresh Builder of Ark Theme is visible
 * (The theme registered only 4 shortcodes, other shortcodes are executed using custom function)
 */
add_filter( 'pt_cv_field_content_excerpt', 'cvp_comp_theme_ark', 999, 3 );
function cvp_comp_theme_ark( $content, $fargs, $post ) {
	if ( function_exists( 'ffContainer' ) && function_exists( 'getThemeFrameworkFactory' ) && function_exists( 'getThemeBuilderManager' ) && function_exists( 'renderButNotPrint' ) ) {
		$themeBuilderManager = ffContainer()->getThemeFrameworkFactory()->getThemeBuilderManager();
		$content			 = $themeBuilderManager->renderButNotPrint( $content );
	}

	return $content;
}

// Show notices
add_action( PT_CV_PREFIX_ . 'add_global_variables', 'cvp_core_notices', PHP_INT_MAX );
function cvp_core_notices() {
	if ( !PT_CV_Functions_Pro::user_can_manage_view() ) {
		return;
	}

	if ( PT_CV_Functions::get_global_variable( 'reused_view' ) && PT_CV_Functions::get_global_variable( 'lf_enabled' ) ) {
		printf( '<div class="alert" style="background:#ffeb3b5e;padding:10px">%s</div>', __( 'For Administrator only: Live Filter is not supported well when reusing a View. Please create a new View to use Live Filter. Thank you!', 'content-views-pro' ) );
	}
}

/** Fix: When showing Media, its image is shown in full content, duplicate to thumbnail
 * @since 5.1.2
 */
add_action( 'pt_cv_before_content', 'cvp_comp_common_wp_attachment_in_content' );
function cvp_comp_common_wp_attachment_in_content() {
	remove_filter( 'the_content', 'prepend_attachment' );
}

/** Disable Jetpack modules
 * @since 5.1.2
 */
add_action( 'pt_cv_view_process_start', 'cvp_comp_plugin_jetpack_modules' );
function cvp_comp_plugin_jetpack_modules() {
	// disable carousel (which adds all image sizes to image data)
	add_filter( 'jp_carousel_maybe_disable', '__return_true' );

	// disable lazy-images (which causes blank thumbnail images)
	if ( class_exists( 'Jetpack_Lazy_Images' ) && method_exists( 'Jetpack_Lazy_Images', 'instance' ) ) {
		$jp = Jetpack_Lazy_Images::instance();
		$jp->remove_filters();
	}
}

/** Disable smart load of Hueman, Customizr theme which caused layout issue
 * @since 5.1.2
 */
add_action( 'pt_cv_view_process_start', 'cvp_comp_theme_feature_smart_load' );
function cvp_comp_theme_feature_smart_load() {
	add_filter( 'hu_disable_img_smart_load', '__return_true', PHP_INT_MAX, 2 );
	add_filter( 'czr_disable_img_smart_load', '__return_true', PHP_INT_MAX, 2 );
}

/** Get thumbnail for the wpadverts plugin
 */
add_filter( 'pt_cv_field_content_excerpt', 'cvp_comp_plugin_wpadverts_get_thumbnail', 100, 3 );
function cvp_comp_plugin_wpadverts_get_thumbnail( $args, $fargs, $post ) {
	if ( empty( $fargs ) && function_exists( 'adverts_single_rslides' ) ) {
		ob_start();
		adverts_single_rslides( $post->ID );
		$args = ob_get_clean();
	}
	return $args;
}

/** Fix: With BJ Lazy Load plugin, CVP lazyload shows blank image
 * @since 5.3
 */
add_action( PT_CV_PREFIX_ . 'add_global_variables', 'cvp_comp_plugin_bj_lazy_load', PHP_INT_MAX );
function cvp_comp_plugin_bj_lazy_load() {
	if ( PT_CV_Functions::get_global_variable( 'do-lazy-load' ) ) {
		add_filter( 'bj_lazy_load_run_filter', '__return_false' );
	}
}

/** Force to reload live filter */
add_filter( PT_CV_PREFIX_ . 'extra_custom_js', 'cvp_comp_feature_lf_reload' );
function cvp_comp_feature_lf_reload( $args ) {
	// Divi theme or plugin
	if ( strtolower( get_template() ) === 'divi' || cv_is_active_plugin( 'divi-builder' ) ) {
		$args = "window.cvp_lf_reload_url = true; \n" . $args;
	}
	return $args;
}

/** Get thumbnail from some specific plugins which don't use featured image
 */
add_filter( PT_CV_PREFIX_ . 'field_inside_image', 'cvp_comp_feature_get_thumbnail', PHP_INT_MAX, 3 );
function cvp_comp_feature_get_thumbnail( $img, $matches, $content ) {
	global $post;
	if ( empty( $img ) && isset( $post->ID ) ) {
		$mfield = array();
		if ( cv_is_active_plugin( 'novelist' ) ) {
			$mfield[] = 'novelist_cover';
		}
		if ( cv_is_active_plugin( 'ultimate-auction-pro' ) ) {
			$mfield[] = 'wdm_auction_thumb';
		}
		foreach ( $mfield as $ctf ) {
			$cover_id = get_post_meta( $post->ID, $ctf, true );
			if ( $cover_id ) {
				$img = wp_get_attachment_url( $cover_id );
				break;
			}
		}
	}

	return $img;
}

/** Fix color picker issue: not work with WP < 4.9, or with Nextgen Gallery 3.0 in WP > 4.9 */
add_filter( PT_CV_PREFIX_ . 'public_localize_script_extra', 'cvp_comp_feature_color_picker' );
function cvp_comp_feature_color_picker( $args ) {
	if ( is_admin() ) {
		// The old expression in admin "color-picker.js" mistakes with Nextgen Gallery 3.0 (which adds localize for wpColorPickerL10n)
		$args[ 'wp_before_49' ] = version_compare( $GLOBALS[ 'wp_version' ], '4.9', '<' );
	}

	return $args;
}

/** Remove unwanted styles/scripts from View page */
add_action( 'pt_cv_remove_unwanted_assets', 'cvp_comp_remove_unwanted_assets' );
function cvp_comp_remove_unwanted_assets() {
	/* "insert-post-ads" plugin, it modifies Color picker
	 * cause JS error, prevent editing View settings
	 */
	wp_dequeue_script( 'insert-post-adschart-admin' );
}

add_action( 'save_post', 'cvp_comp_prevent_redirect_on_saving_post', 1, 3 );
function cvp_comp_prevent_redirect_on_saving_post( $post_id, $post, $updated ) {
	/** With Yoast SEO plugin:
	 * Add a View which show products (show add-to-cart link) to a new page, click publish
	 * The process won't complete and stop at /wp-admin/post.php
	 */
	remove_shortcode( 'add_to_cart' );
}
