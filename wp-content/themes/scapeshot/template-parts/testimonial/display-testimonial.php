<?php
/**
 * The template for displaying testimonial items
 *
 * @package ScapeShot
 */
?>

<?php
$scapeshot_enable = get_theme_mod( 'scapeshot_testimonial_option', 'disabled' );

if ( ! scapeshot_check_section( $scapeshot_enable ) ) {
	// Bail if featured content is disabled
	return;
}

$scapeshot_classes[] = 'section testimonial-content-section';

// Get Jetpack options for testimonial.
$jetpack_defaults = array(
	'page-title' => esc_html__( 'Testimonials', 'scapeshot' ),
);

// Get Jetpack options for testimonial.
$jetpack_options = get_theme_mod( 'jetpack_testimonials', $jetpack_defaults );

$scapeshot_title    = get_option( 'jetpack_testimonial_title', esc_html__( 'Testimonials', 'scapeshot' ) );
$scapeshot_description = get_option( 'jetpack_testimonial_content' );

if( ! $scapeshot_title && ! $scapeshot_description ) {
 	$scapeshot_classes[] = 'no-section-heading';
}
?>

<div id="testimonial-content-section" class="<?php echo esc_attr( implode( ' ', $scapeshot_classes ) ); ?>">
	<div class="wrapper">
		<?php if ( $scapeshot_title || $scapeshot_description ) : 
		?>
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
		<?php endif;
		$scapeshot_content_classes = 'section-content-wrapper testimonial-content-wrapper';

		$scapeshot_content_classes .= ' testimonial-slider owl-carousel';

		$scapeshot_content_classes .= ' owl-dots-enabled'; 
		?>

		<div class="<?php echo esc_attr( $scapeshot_content_classes ); ?>">
			<?php
			get_template_part( 'template-parts/testimonial/post-types', 'testimonial' );
			?>
		</div><!-- .section-content-wrapper -->
	</div><!-- .wrapper -->
</div><!-- .testimonial-content-section -->
