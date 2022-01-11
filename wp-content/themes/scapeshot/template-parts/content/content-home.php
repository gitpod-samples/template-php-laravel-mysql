<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ScapeShot
 */

if( has_post_thumbnail() ) {
	$scapeshot_thumb = get_the_post_thumbnail_url( get_the_ID(), 'scapeshot-slider' );	
}
else {
	$scapeshot_thumb = trailingslashit( esc_url( get_template_directory_uri() ) ) . 'assets/images/no-thumb-1920x1080.jpg';
}
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> style="background-image: url( <?php echo esc_url( $scapeshot_thumb ); ?> )">
	<div class="post-wrapper hentry-inner">
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
					<?php scapeshot_by_line(); ?>
					<?php scapeshot_posted_on(); ?>
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
