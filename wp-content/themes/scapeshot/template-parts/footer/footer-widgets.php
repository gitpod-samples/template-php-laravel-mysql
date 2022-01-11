<?php
/**
 * Displays footer widgets if assigned
 *
 * @package ScapeShot
 */

?>

<?php
if (
	 is_active_sidebar( 'sidebar-2' ) ||
	 is_active_sidebar( 'sidebar-3' ) ||
	 is_active_sidebar( 'sidebar-4' ) ||
	 is_active_sidebar( 'sidebar-5' ) ) :
?>

<aside <?php scapeshot_footer_sidebar_class(); ?> role="complementary">
	<div class="wrapper">
		<?php if ( is_active_sidebar( 'sidebar-2' ) ) : ?>
			<div class="widget-column footer-widget-1">
				<?php dynamic_sidebar( 'sidebar-2' ); ?>
			</div><!-- .widget-area -->
		<?php endif; ?>

		<?php if ( is_active_sidebar( 'sidebar-3' ) ) : ?>
			<div class="widget-column footer-widget-2">
				<?php dynamic_sidebar( 'sidebar-3' ); ?>
			</div><!-- .widget-area -->
		<?php endif; ?>

		<?php if ( is_active_sidebar( 'sidebar-4' ) ) : ?>
			<div class="widget-column footer-widget-3">
				<?php dynamic_sidebar( 'sidebar-4' ); ?>
			</div><!-- .widget-area -->
		<?php endif; ?>

		<?php if ( is_active_sidebar( 'sidebar-5' ) ) : ?>
			<div class="widget-column footer-widget-4">
				<?php dynamic_sidebar( 'sidebar-5' ); ?>
			</div><!-- .widget-area -->
		<?php endif; ?>


	</div><!-- .footer-widgets-wrapper -->
</aside><!-- .footer-widgets -->

<?php endif;
