<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ScapeShot
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( '' ); ?>>
	<div class="post-wrapper hentry-inner">
		<?php scapeshot_post_thumbnail(); ?>

		<div class="entry-container">
			<header class="entry-header">
				<?php if ( is_sticky() ) { ?>
					<span class="sticky-post">
						<span><?php esc_html_e( 'Featured', 'scapeshot' ); ?></span>
					</span>
				<?php } ?>
				
				<div class="entry-meta">
					<?php scapeshot_cat_list(); ?>
				</div>

				<?php
				if ( is_singular() ) :
					the_title( '<h1 class="entry-title">', '</h1>' );
				else :
					the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
				endif;?>

				<?php if ( 'post' === get_post_type() ) : ?>
				<div class="entry-meta">
					<?php scapeshot_posted_on(); ?>
					<?php scapeshot_by_line(); ?>
				</div><!-- .entry-meta -->
				<?php
				endif; ?>
				
			</header><!-- .entry-header -->

			<div class="entry-summary">
				<?php
				the_excerpt();
				?>
			</div><!-- .entry-summary -->
		</div><!-- .entry-container -->
	</div><!-- .hentry-inner -->
</article><!-- #post-<?php the_ID(); ?> -->
