<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ScapeShot
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( '' ); ?>>
	<div class="post-wrapper hentry-inner">
		<div class="entry-container">
			<header class="entry-header">
				<?php if ( 'post' === get_post_type() ) : ?>
					<div class="entry-meta">
						<?php scapeshot_cat_list(); ?>
					</div>
				<?php endif; ?>
				<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
				<?php if ( 'post' === get_post_type() ) : ?>
					<div class="entry-meta">
						<?php scapeshot_posted_on(); ?>
						<?php scapeshot_by_line(); ?>
					</div><!-- .entry-meta -->
				<?php endif; ?>
			</header><!-- .entry-header -->

			<div class="entry-summary">
				<?php the_excerpt(); ?>
			</div><!-- .entry-summary -->
		</div><!-- .entry-container -->
	</div><!-- .hentry-inner -->
</article><!-- #post-<?php the_ID(); ?> -->
