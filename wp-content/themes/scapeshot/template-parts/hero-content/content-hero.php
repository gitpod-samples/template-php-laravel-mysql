<?php
/**
 * The template used for displaying hero content
 *
 * @package ScapeShot
 */

$scapeshot_enable_section = get_theme_mod( 'scapeshot_hero_content_visibility', 'disabled' );

if ( ! scapeshot_check_section( $scapeshot_enable_section ) ) {
	// Bail if hero content is not enabled
	return;
}
get_template_part( 'template-parts/hero-content/post-type-hero' );

