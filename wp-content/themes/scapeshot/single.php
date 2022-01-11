<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package ScapeShot
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
			<?php
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content/content', 'single' );

				//the_post_navigation();

                the_post_navigation( array(
                	'prev_text' => '<span class="screen-reader-text">' . esc_html__( 'Previous Post', 'scapeshot' ) . '</span><span aria-hidden="true" class="meta-nav">' . scapeshot_get_svg( array( 'icon' => 'angle-left' ) ) . esc_html__( 'Prev Post', 'scapeshot' ) . '</span><span class="post-title">%title</span>',
                	'next_text' => '<span class="screen-reader-text">' . esc_html__( 'Next Post', 'scapeshot' ) . '</span><span aria-hidden="true" class="meta-nav">' . esc_html__( 'Next Post', 'scapeshot' ) . scapeshot_get_svg( array( 'icon' => 'angle-right' ) ) . '</span><span class="post-title">%title</span>',
                ) );


				get_template_part( 'template-parts/content/content', 'comment' );

			endwhile; // End of the loop.
			?>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
