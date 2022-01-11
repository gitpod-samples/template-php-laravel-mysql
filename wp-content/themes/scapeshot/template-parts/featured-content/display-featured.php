<?php
/**
 * The template for displaying featured content
 *
 * @package ScapeShot
 */
?>

<?php
$scapeshot_enable_content = get_theme_mod( 'scapeshot_featured_content_option', 'disabled' );

if ( ! scapeshot_check_section( $scapeshot_enable_content ) ) {
	// Bail if featured content is disabled.
	return;
}

$scapeshot_classes[] = 'layout-three';
$scapeshot_classes[] = 'featured-content';
$scapeshot_classes[] = 'section';

$scapeshot_title     = get_option( 'featured_content_title', esc_html__( 'Contents', 'scapeshot' ) );
$scapeshot_description = get_option( 'featured_content_content' );

if( ! $scapeshot_title && ! $scapeshot_description ) {
 	$scapeshot_classes[] = 'no-section-heading';
}
?>

<div id="featured-content-section" class="<?php echo esc_attr( implode( ' ', $scapeshot_classes ) ); ?>">
	<div class="wrapper">
	<?php if ( '' !== $scapeshot_title || $scapeshot_description ) : ?>
		<div class="section-heading-wrapper">
		<?php if ( $scapeshot_title ) : ?>
			<div class="section-title-wrapper">
				<h2 class="section-title"><?php echo esc_html( $scapeshot_title ); ?></h2>
			</div><!-- .page-title-wrapper -->
		<?php endif; ?>

		<?php if ( $scapeshot_description ) : ?>
			<div class="section-description">
				<?php echo wpautop( wp_kses_post( $scapeshot_description ) ); ?>
			</div><!-- .section-description-wrapper -->
		<?php endif; ?>
		</div><!-- .section-heading-wrapper -->
	<?php endif; ?>

		<div class="section-content-wrapper featured-content-wrapper layout-three">
			<?php
			get_template_part( 'template-parts/featured-content/post-types-featured' );
			?>
		</div><!-- .section-content-wrap -->
	</div><!-- .wrapper -->
</div><!-- #featured-content-section -->
