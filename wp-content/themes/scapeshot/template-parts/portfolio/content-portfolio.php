<?php
/**
 * The template used for displaying projects on index view
 *
 * @package ScapeShot
 */
$scapeshot_classes = 'grid-item';
?>

<article id="portfolio-post-<?php the_ID(); ?>" <?php post_class( esc_attr( $scapeshot_classes ) ); ?>>
	<div class="hentry-inner">
		<?php scapeshot_post_thumbnail( 'scapeshot-portfolio' ); ?>
		<div class="entry-container">
			<header class="entry-header">
			<?php the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>
				<div class="entry-meta">
					<?php scapeshot_posted_on(); ?>
				</div>
			</header>
		</div><!-- .entry-container -->
	</div><!-- .hentry-inner -->
</article>
