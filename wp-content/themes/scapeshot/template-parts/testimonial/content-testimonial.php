<?php
/**
 * The template used for displaying testimonial on front page
 *
 * @package ScapeShot
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="hentry-inner">
		<div class="entry-container">
			<div class="entry-content">
				<?php the_excerpt(); ?>
			</div>

			<?php $scapeshot_position = get_post_meta( get_the_id(), 'ect_testimonial_position', true ); ?>	
		</div><!-- .entry-container -->	
		<?php scapeshot_post_thumbnail( 'thumbnail', 'html', true, false ); ?>
			<header class="entry-header">
				<?php the_title( '<h2 class="entry-title"><a href="'. get_the_permalink() . '">', '</a></h2>' );
				?>
				<?php if ( $scapeshot_position ) : ?>
					<p class="entry-meta"><span class="position">
						<?php echo esc_html( $scapeshot_position ); ?></span>
					</p>
				<?php endif; ?>
			</header>
	</div><!-- .hentry-inner -->
</article>
