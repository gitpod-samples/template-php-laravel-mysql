<?php
/**
 * The template for displaying featured content items
 *
 * @package ScapeShot
 */

$scapeshot_number = get_theme_mod( 'scapeshot_service_number', 3 );

if ( ! $scapeshot_number ) {
	// If number is 0, then this section is disabled
	return;
}

$scapeshot_args = array(
	'orderby'             => 'post__in',
	'ignore_sticky_posts' => 1 // ignore sticky posts
);

$scapeshot_post_list  = array();// list of valid post/page ids
$scapeshot_no_of_post = 0; // for number of posts
$scapeshot_args['post_type'] = 'ect-service';

	for ( $scapeshot_i = 1; $scapeshot_i <= $scapeshot_number; $scapeshot_i++ ) {
		$scapeshot_post_id = '';

		$scapeshot_post_id =  get_theme_mod( 'scapeshot_service_cpt_' . $scapeshot_i );

		if ( $scapeshot_post_id && '' !== $scapeshot_post_id ) {
			// Polylang Support.
			if ( class_exists( 'Polylang' ) ) {
				$scapeshot_post_id = pll_get_post( $scapeshot_post_id, pll_current_language() );
			}

			$scapeshot_post_list = array_merge( $scapeshot_post_list, array( $scapeshot_post_id ) );

			$scapeshot_no_of_post++;
		}
	}

	$scapeshot_args['post__in'] = $scapeshot_post_list;

if ( 0 === $scapeshot_no_of_post ) {
	return;
}

$scapeshot_args['posts_per_page'] = $scapeshot_no_of_post;
$scapeshot_loop     = new WP_Query( $scapeshot_args );

if ( $scapeshot_loop -> have_posts() ) :
	while ( $scapeshot_loop -> have_posts() ) :
		$scapeshot_loop -> the_post();

		get_template_part( 'template-parts/services/content-services' );

	endwhile;
	wp_reset_postdata();
endif;
