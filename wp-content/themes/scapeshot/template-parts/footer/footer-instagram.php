<?php
/**
 * Displays footer instagram widget
 *
 * @package ScapeShot
 */
?>

<?php
if ( class_exists( 'Catch_Instagram_Feed_Gallery_Widget' ) ||  class_exists( 'Catch_Instagram_Feed_Gallery_Widget_Pro' ) ) :
	if ( is_active_sidebar( 'sidebar-instagram' ) ) :
	?>
	<div id="footer-instagram" class="widget-area section" role="complementary">
		<div class="wrapper">
			<div class="footer-instagram">
				<?php dynamic_sidebar( 'sidebar-instagram' ); ?>
			</div>
		</div><!-- .wrapper -->
	</div><!-- .widget-area -->
	<?php endif;
endif;
