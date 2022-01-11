<?php
/**
 * The template for displaying testimonial items
 *
 * @package ScapeShot
 */
?>

<?php
$scapeshot_number = get_theme_mod( 'scapeshot_testimonial_number', 3 );

if ( ! $scapeshot_number ) {
	// If number is 0, then this section is disabled
	return;
}

$scapeshot_args = array(
	'ignore_sticky_posts' => 1 // ignore sticky posts
);

$scapeshot_post_list  = array();// list of valid post/page ids

$scapeshot_args['post_type'] = 'jetpack-testimonial';

for ( $scapeshot_i = 1; $scapeshot_i <= $scapeshot_number; $scapeshot_i++ ) {
	$scapeshot_post_id = '';
	
	$scapeshot_post_id =  get_theme_mod( 'scapeshot_testimonial_cpt_' . $scapeshot_i );

	if ( $scapeshot_post_id && '' !== $scapeshot_post_id ) {
		// Polylang Support.
		if ( class_exists( 'Polylang' ) ) {
			$scapeshot_post_id = pll_get_post( $scapeshot_post_id, pll_current_language() );
		}

		$scapeshot_post_list = array_merge( $scapeshot_post_list, array( $scapeshot_post_id ) );
	}
}

$scapeshot_args['post__in'] = $scapeshot_post_list;
$scapeshot_args['orderby'] = 'post__in';

$scapeshot_args['posts_per_page'] = $scapeshot_number;
$scapeshot_loop = new WP_Query( $scapeshot_args );

if ( $scapeshot_loop -> have_posts() ) :
	while ( $scapeshot_loop -> have_posts() ) :
		$scapeshot_loop -> the_post();

		get_template_part( 'template-parts/testimonial/content', 'testimonial' );
	endwhile;
	wp_reset_postdata();
endif;
