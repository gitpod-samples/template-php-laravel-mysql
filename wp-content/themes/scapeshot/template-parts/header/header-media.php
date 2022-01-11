<?php
/**
 * Display Header Media
 *
 * @package ScapeShot
 */

if ( 'disable' === get_theme_mod( 'scapeshot_header_media_option', 'entire-site' ) ) {
	return;
}

$scapeshot_header_image = scapeshot_featured_overall_image();

$scapeshot_header_media_text = scapeshot_has_header_media_text();

if ( ( ( is_header_video_active() && has_header_video() ) || 'disable' !== $scapeshot_header_image ) || $scapeshot_header_media_text ) :
?>
<div class="custom-header header-media">
	<div class="wrapper">
		<div class="custom-header-media">
			<?php
			if ( is_header_video_active() && has_header_video() ) {
				the_custom_header_markup();
			} elseif ( 'disable' !== $scapeshot_header_image ) {
				echo '<div id="wp-custom-header" class="wp-custom-header"><img src="' . esc_url( $scapeshot_header_image ) . '"/></div>	';
			}
			?>
			<?php scapeshot_header_media_text(); ?>

			<div class="scroll-down">
				<span><?php esc_html_e( 'Scroll', 'scapeshot' ); ?></span>
				<?php echo scapeshot_get_svg( array( 'icon' => 'angle-down' ) ); ?>
			</div><!-- .scroll-down -->
		</div>
	</div><!-- .wrapper -->
	<div class="custom-header-overlay"></div><!-- .custom-header-overlay -->
</div><!-- .custom-header -->
<?php endif; ?>
