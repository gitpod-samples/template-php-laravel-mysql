<?php
/**
 * The template for displaying featured posts on the front page
 *
 * @package ScapeShot
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="hentry-inner">
		<?php
		scapeshot_post_thumbnail( 'scapeshot-featured' );
		?>

		<div class="entry-container">
			<header class="entry-header">
				<?php the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">','</a></h2>' ); ?>
				
			</header>
			<?php
			$scapeshot_excerpt = get_the_excerpt();
			echo '<div class="entry-summary"><p>' . $scapeshot_excerpt . '</p></div><!-- .entry-summary -->';
			?>
		</div><!-- .entry-container -->
	</div><!-- .hentry-inner -->
</article>
