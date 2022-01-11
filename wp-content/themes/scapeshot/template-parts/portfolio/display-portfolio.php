<?php
/**
 * The template for displaying portfolio items
 *
 * @package ScapeShot
 */
?>

<?php
$scapeshot_enable = get_theme_mod( 'scapeshot_portfolio_option', 'disabled' );

if ( ! scapeshot_check_section( $scapeshot_enable ) ) {
	// Bail if portfolio section is disabled.
	return;
}
$scapeshot_layout    = 'layout-three';
$scapeshot_classes[] = 'layout-three';
$scapeshot_classes[] = 'jetpack-portfolio';
$scapeshot_classes[] = 'section';

$scapeshot_title     = get_option( 'jetpack_portfolio_title', esc_html__( 'Projects', 'scapeshot' ) );
$scapeshot_description = get_option( 'jetpack_portfolio_content' );

if( ! $scapeshot_title && ! $scapeshot_description ) {
 	$scapeshot_classes[] = 'no-section-heading';
}
?>

<div id="portfolio-content-section" class="<?php echo esc_attr( implode( ' ', $scapeshot_classes ) ); ?>">
	<div class="wrapper">
		<?php if ( $scapeshot_title || $scapeshot_description ) : ?>
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

		<div class="section-content-wrapper portfolio-content-wrapper <?php echo esc_attr( $scapeshot_layout ); ?>">
			<div class="grid">
				<?php
				get_template_part( 'template-parts/portfolio/post-types', 'portfolio' );
				?>
			</div>
		</div><!-- .section-content-wrap -->
	</div><!-- .wrapper -->
</div><!-- #portfolio-section -->
