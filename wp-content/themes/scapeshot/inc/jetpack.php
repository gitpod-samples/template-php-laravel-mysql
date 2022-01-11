<?php
/**
 * Jetpack Compatibility File
 *
 * @link https://jetpack.com/
 *
 * @package ScapeShot
 */

/**
 * Jetpack setup function.
 *
 * See: https://jetpack.com/support/infinite-scroll/
 * See: https://jetpack.com/support/responsive-videos/
 * See: https://jetpack.com/support/content-options/
 */
function scapeshot_jetpack_setup() {
	// Add theme support for Infinite Scroll.
	add_theme_support( 'infinite-scroll', array(
		'type'           => 'click',
		'container'      => 'infinite-post-wrap',
		'wrapper'        => false,
		'render'         => 'scapeshot_infinite_scroll_render',
		'footer'         => false,
	) );
}
add_action( 'after_setup_theme', 'scapeshot_jetpack_setup' );

/**
 * Custom render function for Infinite Scroll.
 */
function scapeshot_infinite_scroll_render() {
	while ( have_posts() ) {
		the_post();
		if ( is_search() ) :
			get_template_part( 'template-parts/content/content', 'search' );
		else :
			get_template_part( 'template-parts/content/content', get_post_format() );
		endif;
	}
}
