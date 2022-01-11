<?php
/**
 * The template part for displaying an Author biography
 *
 * @package ScapeShot
 */
?>

<div class="author-info">
	<div class="author-avatar">
		<?php
		/**
		 * Filter the ScapeShot author bio avatar size.
		 *
		 * @since ScapeShot Pro 1.0
		 *
		 * @param int $scapeshot_size The avatar height and width size in pixels.
		 */
		$scapeshot_author_bio_avatar_size = apply_filters( 'scapeshot_author_bio_avatar_size', 105 );

		echo get_avatar( get_the_author_meta( 'user_email' ), $scapeshot_author_bio_avatar_size );
		?>
	</div><!-- .author-avatar -->

	<div class="author-description">
		<h2 class="author-title"><span class="author-heading screen-reader-text"><?php esc_html_e( 'Author:', 'scapeshot' ); ?></span> <?php echo get_the_author(); ?></h2>

		<p class="author-bio">
			<?php the_author_meta( 'description' ); ?>
		</p><!-- .author-bio -->

		<a class="author-link" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author">
			<?php printf( __( 'View all posts by %s', 'scapeshot' ), get_the_author() ); ?>
		</a>
	</div><!-- .author-description -->
</div><!-- .author-info -->
