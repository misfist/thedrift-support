<?php
/**
 * Additional features to allow styling of the templates
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since Twenty Seventeen 1.0
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function twentyseventeen_body_classes( $classes ) {
	// Add class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	// Add class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	if ( is_page_template( array( 'page-templates/page-narrow.php' ) ) ) {
		$classes[] = 'content-narrow';
	}

	// Add class if we're viewing the Customizer for easier styling of theme options.
	if ( is_customize_preview() ) {
		$classes[] = 'twentyseventeen-customizer';
	}

	// Add class on front page.
	if ( is_front_page() && 'posts' !== get_option( 'show_on_front' ) ) {
		$classes[] = 'twentyseventeen-front-page';
	}

	// Add a class if there is a custom header.
	if ( has_header_image() ) {
		$classes[] = 'has-header-image';
	}

	// Add class if sidebar is used.
	if ( is_active_sidebar( 'sidebar-1' ) && ! is_page() ) {
		$classes[] = 'has-sidebar';
	}

	// Add class for one or two column page layouts.
	if ( is_page() || is_archive() ) {
		if ( 'one-column' === get_theme_mod( 'page_layout' ) ) {
			$classes[] = 'page-one-column';
		} else {
			$classes[] = 'page-two-column';
		}
	}

	global $post;
	if ( isset( $post ) ) {
		$classes[] = $post->post_type . '-' . $post->post_name;
	}

	// Add class if the site title and tagline is hidden.
	if ( 'blank' === get_header_textcolor() ) {
		$classes[] = 'title-tagline-hidden';
	}

	// Get the colorscheme or the default if there isn't one.
	$colors    = twentyseventeen_sanitize_colorscheme( get_theme_mod( 'colorscheme', 'light' ) );
	$classes[] = 'colors-' . $colors;

	return $classes;
}
add_filter( 'body_class', 'twentyseventeen_body_classes' );

/**
 * Add Breadcrumbs
 * 
 * @since 2.5
 *
 * @return void
 */
function drift_add_breadcrumbs() {
	echo do_shortcode( '[flexy_breadcrumb]' );
}
add_action( 'drift_after_main_container', 'drift_add_breadcrumbs' );

/**
 * Modify Title
 * 
 * @link https://developer.wordpress.org/reference/hooks/the_title/
 *
 * @param string $title
 * @param integer $id
 * @return string $title
 */
function drift_the_title( $title, $post_id ) {
	if( is_admin() || ! in_the_loop() ) {
		return $title;
	}
	if( ( $subtitle = get_post_meta( $post_id, 'post_subsitle', true ) ) || ( $subtitle = get_post_meta( $post_id, 'subtitle', true ) ) || ( $subtitle = get_post_meta( $post_id, 'current_issue_subtitle', true ) ) ) {
		$title = sprintf( '<span class="post-title">%s</span> <span class="separator">|</span> <span class="post-subtitle">%s</span>', $title, $subtitle );
	}
	return $title;
}
add_filter( 'the_title', 'drift_the_title', 10, 2 );

/**
 * Count our number of active panels.
 *
 * Primarily used to see if we have any panels active, duh.
 */
function twentyseventeen_panel_count() {

	$panel_count = 0;

	/**
	 * Filter number of front page sections in Twenty Seventeen.
	 *
	 * @since Twenty Seventeen 1.0
	 *
	 * @param int $num_sections Number of front page sections.
	 */
	$num_sections = apply_filters( 'twentyseventeen_front_page_sections', 4 );

	// Create a setting and control for each of the sections available in the theme.
	for ( $i = 1; $i < ( 1 + $num_sections ); $i++ ) {
		if ( get_theme_mod( 'panel_' . $i ) ) {
			$panel_count++;
		}
	}

	return $panel_count;
}

/**
 * Checks to see if we're on the front page or not.
 */
function twentyseventeen_is_frontpage() {
	return ( is_front_page() && ! is_home() );
}

/**
 * Add Items to Mobile Nav Menu
 * 
 * @link https://developer.wordpress.org/reference/hooks/wp_nav_menu_items/
 *
 * @param string $items
 * @param obj $args
 * @return string $items
 */
function drift_wp_nav_menu_items( $items, $args ) {
    if ( $args->theme_location == 'mobile' ) {
        $items .= '<li class="mob-search"><a><i class="fa fa-search"></i></a></li>';
		$items .= sprintf( '<div class="drift_searchForm">%s</div>', get_search_form() );
    }
    return $items;
}
// add_filter( 'wp_nav_menu_items', 'add_loginout_link', 10, 2 );
