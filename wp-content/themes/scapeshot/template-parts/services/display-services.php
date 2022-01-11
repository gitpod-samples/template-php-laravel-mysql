<?php
/**
 * The template for displaying services content
 *
 * @package ScapeShot
 */
?>

<?php
$scapeshot_enable_content = get_theme_mod( 'scapeshot_service_option', 'disabled' );

if ( ! scapeshot_check_section( $scapeshot_enable_content ) ) {
	// Bail if services content is disabled.
	return;
}

$scapeshot_classes[] = 'services-section';
$scapeshot_classes[] = 'section';

$scapeshot_title    = get_option( 'ect_service_title', esc_html__( 'Services', 'scapeshot' ) );
$scapeshot_description = get_option( 'ect_service_content' );

if( ! $scapeshot_title && ! $scapeshot_description ) {
 	$scapeshot_classes[] = 'no-section-heading';
}
?>

<div id="services-section" class="<?php echo esc_attr( implode( ' ', $scapeshot_classes ) ); ?>">
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
		<?php endif; ?>
		
		<div class="section-content-wrapper services-content-wrapper layout-three">
			<?php
			get_template_part( 'template-parts/services/post-types-services' );
			?>
		</div><!-- .services-wrapper -->
	</div><!-- .wrapper -->
</div><!-- #services-section -->
