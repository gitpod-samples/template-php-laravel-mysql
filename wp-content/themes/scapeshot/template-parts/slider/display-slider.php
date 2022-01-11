<?php
/**
 * The template used for displaying slider
 *
 * @package ScapeShot
 */
?>
<?php
$scapeshot_enable_slider = get_theme_mod( 'scapeshot_slider_option', 'disabled' );

if ( ! scapeshot_check_section( $scapeshot_enable_slider ) ) {
	return;
}
?>

<div id="feature-slider-section" class="section">
	<div class="wrapper section-content-wrapper feature-slider-wrapper">
		<div class="main-slider owl-carousel">
			<?php
			get_template_part( 'template-parts/slider/post-type-slider' );
			?>
		</div><!-- .main-slider -->
		<div class="scroll-down">
			<span><?php esc_html_e( 'Scroll', 'scapeshot' ); ?></span>
			<?php echo scapeshot_get_svg( array( 'icon' => 'angle-down' ) ); ?>
		</div><!-- .scroll-down -->
	</div><!-- .wrapper -->
</div><!-- #feature-slider -->

