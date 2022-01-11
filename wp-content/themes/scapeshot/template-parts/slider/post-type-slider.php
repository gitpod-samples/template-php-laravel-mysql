<?php
/**
 * The template used for displaying slider
 *
 * @package ScapeShot
 */

$scapeshot_quantity        = get_theme_mod( 'scapeshot_slider_number', 4 );
$scapeshot_no_of_post      = 0; // for number of posts
$scapeshot_post_list       = array(); // list of valid post/page ids

$scapeshot_args = array(
	'post_type'           => 'any',
	'orderby'             => 'post__in',
	'ignore_sticky_posts' => 1, // ignore sticky posts
);

//Get valid number of posts
for ( $scapeshot_i = 1; $scapeshot_i <= $scapeshot_quantity; $scapeshot_i++ ) {
	$scapeshot_post_id = '';

	$scapeshot_post_id = get_theme_mod( 'scapeshot_slider_page_' . $scapeshot_i );

	if ( $scapeshot_post_id && '' !== $scapeshot_post_id ) {
		$scapeshot_post_list = array_merge( $scapeshot_post_list, array( $scapeshot_post_id ) );

		$scapeshot_no_of_post++;
	}
}
	$scapeshot_args['post__in'] = $scapeshot_post_list;

if ( ! $scapeshot_no_of_post ) {
	return;
}

$scapeshot_args['posts_per_page'] = $scapeshot_no_of_post;

$scapeshot_loop = new WP_Query( $scapeshot_args );

while ( $scapeshot_loop->have_posts() ) :
	$scapeshot_loop->the_post();

	$scapeshot_text_align 		=  'text-align-left';
	$scapeshot_content_align 	= 'content-align-right';

	$scapeshot_classes = 'post post-' . get_the_ID() . ' hentry slides ' . esc_attr( $scapeshot_text_align . ' ' . $scapeshot_content_align );
	$scapeshot_layout = absint( get_theme_mod( 'scapeshot_slider_layout', 1 ) );
	$scapeshot_thumbnail = 'scapeshot-slider';
	?>
	<article class="<?php echo esc_attr( $scapeshot_classes ); ?>">
		<div class="hentry-inner">
			<?php scapeshot_post_thumbnail( $scapeshot_thumbnail, 'html', true, true ); ?>
			
			<div class="entry-container">
				<div class="content-wrapper">
					<header class="entry-header">
						<?php 
						$scapeshot_logo = get_theme_mod( 'scapeshot_slider_logo_image_' . absint( $scapeshot_loop->current_post +1 ) );
						
						if ( $scapeshot_logo ) : ?>
							<div class="slider-image-logo"><img src="<?php echo esc_url( $scapeshot_logo ); ?>" title="<?php the_title_attribute(); ?>" /></div>
						<?php endif; ?>	

						<h2 class="entry-title">
							<a title="<?php the_title_attribute(); ?>" href="<?php the_permalink(); ?>">
								<?php the_title(); ?>
							</a>
						</h2>
					</header>
				</div><!-- .content-wrapper -->
			</div><!-- .entry-container -->
		</div><!-- .hentry-inner -->
	</article><!-- .slides -->
<?php
endwhile;

wp_reset_postdata();
